/*
	Dimension by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
*/

(function($) {

	// Cache commonly used jQuery objects for performance.
	var	$window = $(window),
		$body = $('body'),
		$wrapper = $('#wrapper'),
		$header = $('#header'),
		$footer = $('#footer'),
		$main = $('#main'),
		$main_articles = $main.children('article');

	// Define breakpoints for responsive design.
	breakpoints({
		xlarge:   [ '1281px',  '1680px' ],
		large:    [ '981px',   '1280px' ],
		medium:   [ '737px',   '980px'  ],
		small:    [ '481px',   '736px'  ],
		xsmall:   [ '361px',   '480px'  ],
		xxsmall:  [ null,      '360px'  ]
	});

	// Play initial animations on page load.
	$window.on('load', function() {
		window.setTimeout(function() {
			$body.removeClass('is-preload'); // Remove preloading class to start animations
		}, 0);
	});

	// Fix: Flexbox min-height bug on Internet Explorer.
	if (browser.name == 'ie') {

		var flexboxFixTimeoutId;

		$window.on('resize.flexbox-fix', function() {

			clearTimeout(flexboxFixTimeoutId);

			flexboxFixTimeoutId = setTimeout(function() {
				// If content overflows, set wrapper height to auto.
				if ($wrapper.prop('scrollHeight') > $window.height())
					$wrapper.css('height', 'auto');
				else
					$wrapper.css('height', '100vh'); // Otherwise, use full viewport height.

			}, 250);

		}).triggerHandler('resize.flexbox-fix');

	}

	// Navigation: Select navigation element and its list items.
	var $nav = $header.children('nav'),
		$nav_li = $nav.find('li');

	// If there is an even number of nav items, add middle alignment classes.
	if ($nav_li.length % 2 == 0) {
		$nav.addClass('use-middle');
		$nav_li.eq(($nav_li.length / 2)).addClass('is-middle');
	}

	// Main functionality variables.
	var	delay = 325,  // Delay used in transitions.
		locked = false; // Lock to prevent overlapping transitions.

	// Define a method to show an article by its id.
	$main._show = function(id, initial) {

		// Filter for the article with the given id.
		var $article = $main_articles.filter('#' + id);

		// Bail if no such article exists.
		if ($article.length == 0)
			return;

		// If transitions are locked or initial load, skip delays.
		if (locked || (typeof initial != 'undefined' && initial === true)) {

			$body.addClass('is-switching'); // Mark as switching.
			$body.addClass('is-article-visible'); // Mark article as visible.
			$main_articles.removeClass('active'); // Deactivate any active articles.
			$header.hide();  // Hide header.
			$footer.hide();  // Hide footer.
			$main.show();    // Show main container.
			$article.show(); // Show the desired article.
			$article.addClass('active'); // Activate the article.
			locked = false;  // Unlock transitions.

			// Remove switching class after an optional delay.
			setTimeout(function() {
				$body.removeClass('is-switching');
			}, (initial ? 1000 : 0));

			return;
		}

		// Lock transitions to avoid overlap.
		locked = true;

		// If an article is already visible, swap articles.
		if ($body.hasClass('is-article-visible')) {

			// Deactivate the current active article.
			var $currentArticle = $main_articles.filter('.active');
			$currentArticle.removeClass('active');

			// Swap articles after a delay.
			setTimeout(function() {
				$currentArticle.hide(); // Hide the current article.
				$article.show();        // Show the new article.

				// Activate the new article after a short delay.
				setTimeout(function() {
					$article.addClass('active');

					// Reset window scroll and trigger flexbox fix.
					$window
						.scrollTop(0)
						.triggerHandler('resize.flexbox-fix');

					// Unlock after the transition delay.
					setTimeout(function() {
						locked = false;
					}, delay);

				}, 25);

			}, delay);

		}
		// If no article is visible, handle as normal.
		else {

			$body.addClass('is-article-visible'); // Mark article as visible.

			setTimeout(function() {

				// Hide header and footer.
				$header.hide();
				$footer.hide();

				// Show main container and the article.
				$main.show();
				$article.show();

				// Activate the article after a short delay.
				setTimeout(function() {

					$article.addClass('active');

					// Reset scroll and trigger flexbox fix.
					$window
						.scrollTop(0)
						.triggerHandler('resize.flexbox-fix');

					// Unlock transitions after delay.
					setTimeout(function() {
						locked = false;
					}, delay);

				}, 25);

			}, delay);

		}

	};

	// Define a method to hide the currently visible article.
	$main._hide = function(addState) {

		var $article = $main_articles.filter('.active');

		// Bail if no article is visible.
		if (!$body.hasClass('is-article-visible'))
			return;

		// If addState is true, update browser history.
		if (typeof addState != 'undefined'
			&& addState === true)
			history.pushState(null, null, '#');

		// If transitions are locked, skip delays.
		if (locked) {

			$body.addClass('is-switching'); // Mark switching.
			$article.removeClass('active'); // Deactivate article.
			$article.hide();  // Hide article.
			$main.hide();     // Hide main container.
			$footer.show();   // Show footer.
			$header.show();   // Show header.
			$body.removeClass('is-article-visible'); // Unmark visibility.
			locked = false;  // Unlock transitions.
			$body.removeClass('is-switching'); // Remove switching mark.

			// Reset scroll and trigger flexbox fix.
			$window
				.scrollTop(0)
				.triggerHandler('resize.flexbox-fix');

			return;
		}

		// Lock transitions.
		locked = true;

		$article.removeClass('active'); // Deactivate article.

		// Hide article after a delay.
		setTimeout(function() {

			$article.hide(); // Hide the article.
			$main.hide();    // Hide the main container.
			$footer.show();  // Show the footer.
			$header.show();  // Show the header.m

			// Remove the visible class after a short delay.
			setTimeout(function() {

				$body.removeClass('is-article-visible');

				// Reset scroll and trigger flexbox fix.
				$window
					.scrollTop(0)
					.triggerHandler('resize.flexbox-fix');

				// Unlock transitions after the delay.
				setTimeout(function() {
					locked = false;
				}, delay);

			}, 25);

		}, delay);

	};

	// Process each article.
	$main_articles.each(function() {

		var $this = $(this);

		// Append a "close" button to each article.
		$('<div class="close">Close</div>')
			.appendTo($this)
			.on('click', function() {
				// When the close button is clicked, clear the URL hash.
				location.hash = '';
			});

		// Prevent clicks inside the article from bubbling up.
		$this.on('click', function(event) {
			event.stopPropagation();
		});

	});

	// Global click event on body to hide article if visible.
	$body.on('click', function(event) {
		if ($body.hasClass('is-article-visible'))
			$main._hide(true);
	});

	// Keyup event handler to hide article when ESC key is pressed.
	$window.on('keyup', function(event) {

		switch (event.keyCode) {

			case 27: // ESC key
				if ($body.hasClass('is-article-visible'))
					$main._hide(true);
				break;

			default:
				break;
		}

	});

	// Listen for hash changes in the URL.
	$window.on('hashchange', function(event) {

		// If the hash is empty, hide the current article.
		if (location.hash == '' || location.hash == '#') {

			event.preventDefault();
			event.stopPropagation();

			$main._hide();
		}
		// Otherwise, if there is a matching article, show it.
		else if ($main_articles.filter(location.hash).length > 0) {

			event.preventDefault();
			event.stopPropagation();

			$main._show(location.hash.substr(1));
		}

	});

	// Scroll restoration: prevent page from scrolling back to the top on hashchange.
	if ('scrollRestoration' in history)
		history.scrollRestoration = 'manual';
	else {

		var	oldScrollPos = 0,
			scrollPos = 0,
			$htmlbody = $('html,body');

		$window
			.on('scroll', function() {
				oldScrollPos = scrollPos;
				scrollPos = $htmlbody.scrollTop();
			})
			.on('hashchange', function() {
				$window.scrollTop(oldScrollPos);
			});

	}

	// Initialization: hide main and all articles.
	$main.hide();
	$main_articles.hide();

	// If a hash exists on page load, show the corresponding article.
	if (location.hash != '' && location.hash != '#')
		$window.on('load', function() {
			$main._show(location.hash.substr(1), true);
		});

})(jQuery);
setTimeout(function() {
    $article.addClass('active'); // This activates the CSS transition/animation.
    
    // Reset scroll and trigger flexbox fix.
    $window
        .scrollTop(0)
        .triggerHandler('resize.flexbox-fix');

    // Unlock the transition.
    setTimeout(function() {
        locked = false;
    }, delay);
}, 25);