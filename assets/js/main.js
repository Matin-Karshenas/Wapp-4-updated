
/*
	Summary of Code Sections:
	-------------------------
	Line 10-19:   Cache commonly used jQuery objects for better performance.
	Line 21-28:   Define responsive design breakpoints using the 'breakpoints' library.
	Line 30-35:   Handle initial page load: remove 'is-preload' class to trigger animations.
	Line 37-56:   Apply a specific fix for a Flexbox min-height bug in Internet Explorer.
	Line 58-64:   Select navigation elements and apply styling for centering if items are even.
	Line 66-68:   Define core variables for transition delay and state locking.
	Line 70-120:  Define the `_show` function attached to $main to handle displaying an article with transitions.
	Line 122-170: Define the `_hide` function attached to $main to handle hiding the current article with transitions.
	Line 172-187: Iterate through each article element to add a close button and manage click propagation.
	Line 189-192: Add a global click handler on the body to close the article when clicking outside it.
	Line 194-205: Add a global keyup handler to close the article when the ESC key is pressed.
	Line 207-225: Add a hashchange event listener to show/hide articles based on the URL hash.
	Line 227-244: Implement manual scroll restoration for browsers that don't support the native feature or when needed.
	Line 246-247: Initialize the page by hiding the main content area and all articles.
	Line 249-253: Check the URL hash on page load and show the corresponding article if one is specified.
	Line 255:      End of the main IIFE scope.
	Line 256-267:  (Outside IIFE) Seems to be a misplaced or incomplete code snippet, likely related to activating an article after a delay. Its variables ($article, $window, locked, delay) are not in scope here.
*/

(function($) { // Start of an Immediately Invoked Function Expression (IIFE) to create a private scope and use '$' as alias for jQuery.

	// Line 12-19: Cache commonly used jQuery objects for better performance.
	// Selecting these elements once and storing them in variables avoids repeated DOM lookups.
	var	$window = $(window), // The browser window object.
		$body = $('body'), // The body element.
		$wrapper = $('#wrapper'), // The main wrapper div.
		$header = $('#header'), // The header element.
		$footer = $('#footer'), // The footer element.
		$main = $('#main'), // The main content container element.
		$main_articles = $main.children('article'); // All direct child 'article' elements within 'main'.

	// Line 21-28: Define responsive design breakpoints using the 'breakpoints' library.
	// This function (likely provided by an external script included with the template)
	// sets up CSS classes or triggers events based on the window width matching these ranges.
	breakpoints({
		xlarge:   [ '1281px',  '1680px' ], // Extra large screens
		large:    [ '981px',   '1280px' ], // Large screens
		medium:   [ '737px',   '980px'  ], // Medium screens
		small:    [ '481px',   '736px'  ], // Small screens
		xsmall:   [ '361px',   '480px'  ], // Extra small screens
		xxsmall:  [ null,      '360px'  ]  // Extra extra small screens (up to 360px)
	});

	// Line 30-35: Play initial animations on page load.
	// The 'is-preload' class usually prevents transitions/animations initially.
	$window.on('load', function() { // Execute when the entire page (including images and other resources) is fully loaded.
		window.setTimeout(function() { // Use setTimeout with 0ms delay to ensure this runs after the current execution thread.
			$body.removeClass('is-preload'); // Remove the preloading class, allowing CSS transitions/animations to run.
		}, 0); // Delay of 0 milliseconds.
	});

	// Line 37-56: Fix: Flexbox min-height bug on Internet Explorer.
	// IE sometimes struggles with min-height on flex containers, especially when content changes dynamically.
	if (browser.name == 'ie') { // Check if the browser is Internet Explorer (relies on 'browser' object, likely from skel.js or similar).

		var flexboxFixTimeoutId; // Variable to store the timeout ID for debouncing.

		// Attach a resize event listener specifically for this fix (namespaced with '.flexbox-fix').
		$window.on('resize.flexbox-fix', function() {

			clearTimeout(flexboxFixTimeoutId); // Clear any existing timeout to avoid running the fix too often during resize.

			// Set a new timeout to run the fix after a short delay (250ms) once resizing stops.
			flexboxFixTimeoutId = setTimeout(function() {
				// Check if the content inside the wrapper is taller than the window viewport.
				if ($wrapper.prop('scrollHeight') > $window.height())
					$wrapper.css('height', 'auto'); // If content overflows, let the wrapper height be determined by its content.
				else
					$wrapper.css('height', '100vh'); // Otherwise, force the wrapper to take up the full viewport height.

			}, 250); // Delay of 250 milliseconds.

		}).triggerHandler('resize.flexbox-fix'); // Immediately trigger the handler once on page load to set the initial height correctly.

	}

	// Line 58-64: Navigation: Select navigation element and its list items.
	var $nav = $header.children('nav'), // Get the 'nav' element directly inside the header.
		$nav_li = $nav.find('li'); // Get all 'li' elements within the nav.

	// If there is an even number of nav items, add classes for potential middle alignment styling.
	if ($nav_li.length % 2 == 0) { // Check if the number of list items is even.
		$nav.addClass('use-middle'); // Add 'use-middle' class to the nav element itself.
		$nav_li.eq(($nav_li.length / 2)).addClass('is-middle'); // Add 'is-middle' class to the list item exactly in the middle (the first of the two middle items).
	}

	// Line 66-68: Main functionality variables.
	var	delay = 325,  // Delay in milliseconds used for CSS transitions between states (e.g., showing/hiding articles).
		locked = false; // A flag (boolean) to prevent triggering new transitions while one is already in progress.

	// Line 70-120: Define a method `_show` attached to the $main jQuery object to show an article by its id.
	// This allows calling `$main._show('articleId')`.
	$main._show = function(id, initial) { // `id`: the ID of the article to show, `initial`: boolean, true if it's the initial load show.

		// Filter the cached list of articles to find the one with the matching id.
		var $article = $main_articles.filter('#' + id);

		// If no article with the specified ID is found, do nothing and exit the function.
		if ($article.length == 0)
			return;

		// Handle immediate showing (no transition) if transitions are locked or if it's the initial load.
		if (locked || (typeof initial != 'undefined' && initial === true)) {

			$body.addClass('is-switching'); // Add a class to indicate a state change is happening (might prevent user interaction).
			$body.addClass('is-article-visible'); // Add class to signify an article is now visible (used for styling).
			$main_articles.removeClass('active'); // Ensure no other articles are marked as active.
			$header.hide();  // Hide the main header.
			$footer.hide();  // Hide the main footer.
			$main.show();    // Show the main content container (which might have been hidden).
			$article.show(); // Make the target article visible (display: block or similar).
			$article.addClass('active'); // Mark the target article as active (triggers display/animation).
			locked = false;  // Reset the lock immediately since this was an instant change.

			// Remove the 'is-switching' class after a delay (longer delay for initial load).
			setTimeout(function() {
				$body.removeClass('is-switching');
			}, (initial ? 1000 : 0)); // 1000ms delay if initial, 0ms otherwise.

			return; // Exit the function as the article is shown.
		}

		// Lock transitions to prevent overlap if this is a standard show request.
		locked = true;

		// If an article is already visible, handle switching from one article to another.
		if ($body.hasClass('is-article-visible')) {

			// Find the currently active article.
			var $currentArticle = $main_articles.filter('.active');
			// Deactivate the current article (starts fade-out or similar transition).
			$currentArticle.removeClass('active');

			// After the transition delay (`delay` ms), hide the old article and show the new one.
			setTimeout(function() {
				$currentArticle.hide(); // Hide the previous article completely.
				$article.show();        // Make the new article visible (display: block).

				// After a very short delay (25ms), activate the new article (starts fade-in or similar).
				setTimeout(function() {
					$article.addClass('active'); // Add 'active' class to trigger its appearance transition.

					// Reset window scroll position to the top.
					$window
						.scrollTop(0)
						// Trigger the IE flexbox fix handler in case content height changed.
						.triggerHandler('resize.flexbox-fix');

					// After the main transition delay (`delay` ms), unlock transitions.
					setTimeout(function() {
						locked = false; // Allow new transitions.
					}, delay);

				}, 25); // 25ms delay before activating the new article.

			}, delay); // `delay` ms before swapping visibility.

		}
		// If no article is currently visible, handle showing the first article.
		else {

			$body.addClass('is-article-visible'); // Mark that an article is about to become visible.

			// After the transition delay (`delay` ms), hide header/footer and show the main content/article.
			setTimeout(function() {

				// Hide the site header and footer.
				$header.hide();
				$footer.hide();

				// Show the main container and the target article element.
				$main.show();
				$article.show();

				// After a very short delay (25ms), activate the article.
				setTimeout(function() {

					$article.addClass('active'); // Add 'active' class to trigger its appearance transition.

					// Reset scroll position and trigger IE fix.
					$window
						.scrollTop(0)
						.triggerHandler('resize.flexbox-fix');

					// After the main transition delay (`delay` ms), unlock transitions.
					setTimeout(function() {
						locked = false; // Allow new transitions.
					}, delay);

				}, 25); // 25ms delay before activating the article.

			}, delay); // `delay` ms before showing the article and hiding header/footer.

		}

	};

	// Line 122-170: Define a method `_hide` attached to the $main jQuery object to hide the currently visible article.
	$main._hide = function(addState) { // `addState`: boolean, if true, update browser history (remove hash).

		// Find the currently active article.
		var $article = $main_articles.filter('.active');

		// If no article is visible or active, do nothing and exit.
		if (!$body.hasClass('is-article-visible'))
			return;

		// If `addState` is true, modify the browser history to remove the hash fragment,
		// effectively changing the URL back to the base without triggering a full page reload or the hashchange event.
		if (typeof addState != 'undefined' && addState === true)
			history.pushState(null, null, '#'); // Push a null state with '#' hash.

		// Handle immediate hiding (no transition) if transitions are currently locked.
		if (locked) {

			$body.addClass('is-switching'); // Mark that a state change is happening.
			$article.removeClass('active'); // Deactivate the article immediately.
			$article.hide();  // Hide the article element.
			$main.hide();     // Hide the main container.
			$footer.show();   // Show the footer again.
			$header.show();   // Show the header again.
			$body.removeClass('is-article-visible'); // Unmark article visibility.
			locked = false;  // Unlock transitions immediately.
			$body.removeClass('is-switching'); // Remove the switching indicator.

			// Reset scroll position and trigger IE fix.
			$window
				.scrollTop(0)
				.triggerHandler('resize.flexbox-fix');

			return; // Exit the function.
		}

		// Lock transitions to prevent overlap during the hide animation.
		locked = true;

		// Deactivate the article (starts fade-out or similar transition).
		$article.removeClass('active');

		// After the transition delay (`delay` ms), hide elements and show header/footer.
		setTimeout(function() {

			$article.hide(); // Hide the article element completely.
			$main.hide();    // Hide the main container.
			$footer.show();  // Show the footer.
			$header.show();  // Show the header.

			// After a very short delay (25ms), remove the main visibility class.
			setTimeout(function() {

				$body.removeClass('is-article-visible'); // Remove the class indicating an article is visible.

				// Reset scroll position and trigger IE fix.
				$window
					.scrollTop(0)
					.triggerHandler('resize.flexbox-fix');

				// After the main transition delay (`delay` ms), unlock transitions.
				setTimeout(function() {
					locked = false; // Allow new transitions.
				}, delay);

			}, 25); // 25ms delay before removing 'is-article-visible'.

		}, delay); // `delay` ms before hiding the article and showing header/footer.

	};

	// Line 172-187: Process each article element.
	$main_articles.each(function() { // Loop through each article found earlier.

		var $this = $(this); // Cache the current article jQuery object.

		// Create a 'div' element with class 'close' and text 'Close'.
		$('<div class="close">Close</div>')
			.appendTo($this) // Append this new div to the current article.
			.on('click', function() { // Add a click event listener to the new 'close' div.
				// When the close button is clicked, set the location hash to empty ('').
				// This will trigger the 'hashchange' event listener defined later, which will hide the article.
				location.hash = '';
			});

		// Prevent clicks inside the article content area from bubbling up to the 'body'.
		$this.on('click', function(event) {
			event.stopPropagation(); // Stop the click event from propagating further up the DOM tree.
		});

	});

	// Line 189-192: Global click event handler on the body.
	$body.on('click', function(event) {
		// If an article is currently visible (body has 'is-article-visible' class)...
		if ($body.hasClass('is-article-visible'))
			// ...and the click was directly on the body (not stopped by propagation from within an article),
			// hide the article and update the browser history (remove the hash).
			$main._hide(true);
	});

	// Line 194-205: Keyup event handler for the whole window.
	$window.on('keyup', function(event) { // Listen for key releases.

		switch (event.keyCode) { // Check the key code of the released key.

			case 27: // ESC key
				// If an article is visible...
				if ($body.hasClass('is-article-visible'))
					// ...hide the article and update the browser history.
					$main._hide(true);
				break; // Exit switch statement.

			default: // For any other key, do nothing.
				break;
		}

	});

	// Line 207-225: Listen for hash changes in the URL (e.g., user clicks a link like <a href="#about">).
	$window.on('hashchange', function(event) { // Fired when the part of the URL after '#' changes.

		// If the hash is now empty or just '#'...
		if (location.hash == '' || location.hash == '#') {

			// Prevent the browser's default behavior for hash changes (like scrolling).
			event.preventDefault();
			event.stopPropagation();

			// Hide the currently shown article (don't need to update history as it's already '#').
			$main._hide();
		}
		// Otherwise, if the hash corresponds to the ID of one of the articles...
		else if ($main_articles.filter(location.hash).length > 0) { // Check if an article with ID matching the hash exists.

			// Prevent the browser's default behavior.
			event.preventDefault();
			event.stopPropagation();

			// Show the article matching the hash. `location.hash.substr(1)` removes the leading '#'.
			$main._show(location.hash.substr(1));
		}

	});

	// Line 227-244: Scroll restoration: Attempt to prevent the browser from scrolling to the top on hashchange/back navigation.
	// The default browser behavior can be disruptive in single-page apps where hash changes manage views.
	if ('scrollRestoration' in history) // Check if the browser supports the native history.scrollRestoration property.
		history.scrollRestoration = 'manual'; // If yes, tell the browser we'll handle scrolling ourselves.
	else { // If the native property is not supported, implement a basic manual fallback.

		var	oldScrollPos = 0, // Variable to store the previous scroll position.
			scrollPos = 0, // Variable to store the current scroll position.
			$htmlbody = $('html,body'); // Cache jQuery object for html and body (for cross-browser scroll position).

		// On scroll, update the scroll position variables.
		$window
			.on('scroll', function() {
				oldScrollPos = scrollPos; // Store the last known position.
				scrollPos = $htmlbody.scrollTop(); // Get the current scroll position.
			})
			// When the hash changes (often due to back/forward buttons)...
			.on('hashchange', function() {
				// ...restore the window scroll position to where it was *before* the hash change.
				$window.scrollTop(oldScrollPos);
			});

	}

	// Line 246-247: Initialization: Hide the main content area and all articles initially.
	// They will be shown selectively by the _show function.
	$main.hide();
	$main_articles.hide();

	// Line 249-253: If a hash exists in the URL when the page first loads...
	if (location.hash != '' && location.hash != '#')
		// ...wait until the window is fully loaded...
		$window.on('load', function() {
			// ...then show the corresponding article, passing `true` for the 'initial' flag
			// to ensure it appears immediately without the standard transition delay.
			$main._show(location.hash.substr(1), true);
		});

})(jQuery); // End of the IIFE, passing jQuery to it.

// Line 256-267: This block appears *outside* the main IIFE scope.
// It seems like a fragment of code possibly copied from within the `_show` or `_hide` functions.
// Variables like `$article`, `$window`, `locked`, and `delay` are NOT defined in this global scope,
// so this code block will likely cause errors or do nothing as written.
/*
setTimeout(function() {
    // This line tries to add 'active' class to an undefined '$article'.
    $article.addClass('active'); // This activates the CSS transition/animation.

    // Reset scroll and trigger flexbox fix using an undefined '$window'.
    $window
        .scrollTop(0)
        .triggerHandler('resize.flexbox-fix');

    // Unlock the transition using an undefined 'locked' and 'delay'.
    setTimeout(function() {
        locked = false;
    }, delay);
}, 25); // 25ms delay.
*/