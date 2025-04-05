<!DOCTYPE HTML>

<?php

$conn = new mysqli("localhost", "root", "", "website_database");

session_start();

$Action_var = $_SESSION["Action"] ?? null;
$Name_var = $_SESSION["Name"] ?? null;
$Admin_var = $_SESSION["Admin"] ?? null;


$sql = "SELECT `DATA` FROM `data_table` WHERE `ROW` = 1";
$result = $conn->query($sql);
$content1 = ($result->num_rows > 0) ? $result->fetch_assoc()['DATA'] : "No content found.";

$sql = "SELECT `DATA` FROM `data_table` WHERE `ROW` = 2";
$result = $conn->query($sql);
$content2 = ($result->num_rows > 0) ? $result->fetch_assoc()['DATA'] : "No content found.";

$sql = "SELECT `DATA` FROM `data_table` WHERE `ROW` = 3";
$result = $conn->query($sql);
$content3 = ($result->num_rows > 0) ? $result->fetch_assoc()['DATA'] : "No content found.";

$sql = "SELECT `DATA` FROM `data_table` WHERE `ROW` = 4";
$result = $conn->query($sql);
$content4 = ($result->num_rows > 0) ? $result->fetch_assoc()['DATA'] : "No content found.";
$conn->close();



?>

<html>
	<head>
		<title>TRUMP WEBSITE</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/custom.css" />
		<link href="https://fonts.googleapis.com/css2?family=Doto:wght@100..900&display=swap" rel="stylesheet">
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>


		<style>
			input[type="file"]
			{
				display: none;
			}

			.custom_file_lable
			{
				display: inline-block;
				padding: 10px 20px;
				margin-left: 20px;
				background-color: none;
				border: 1px solid white;
				border-radius: 5px;
				cursor: pointer;
				transition: 0.2s;
			}

			.custom_file_lable:hover
			{
				background-color: gray;
				
			}
		</style>

		<script>
			
				// Function to handle different actions
				var Toldonce = false;
				const action_var = "<?php echo $_SESSION['Action']; ?>";
    			const name = "<?php echo $_SESSION['Name']; ?>";
    			const admin = "<?php echo $_SESSION['Admin']; ?>";
				function handleAction(action) {
				  
				  if (action_var === "Logged") {
					let button = document.getElementById("loginButton");
					button.value = "Send message by "+ name;
					let button2 = document.getElementById("import_Button");
					button2.value = "Add News by "+ name;

					let button3 = document.getElementById("update_Button");
					button3.value = "Update News by "+ getQueryParameter("NAME");
					
					addExtraButtons();	
					alert("Login was successful!");
					
				  } else if (action === "Not Logged") {
					alert("Password or Email was incorrect.");
				  } else {
					alert("Unknown action: " + action);
				  }
				}

				function addExtraButtons() {
					let ul = document.getElementById("actionsList"); // Get the <ul>
		
					// Create <li> for New Submit button
					let newSubmitLi = document.createElement("li");
					let newSubmitButton = document.createElement("input");
					newSubmitButton.type = "submit";
					newSubmitButton.value = "SIGN OUT";
					
					newSubmitButton.onclick = function() {
						removeQueryParamAndSubmit1();
					};
					newSubmitLi.appendChild(newSubmitButton);
		
		
					// Append new buttons without removing existing ones
					ul.appendChild(newSubmitLi);
				
				}
			
				// Extract the 'actionw' query parameter from the URL
				function getQueryParameter(name) {
				  const urlParams = new URLSearchParams(window.location.search);
				  return urlParams.get(name);
				}
			
				// Run on page load
				window.onload = function () {
				  
				  if(!Toldonce)
				  {
					// Add a slight delay before checking the query parameter
					setTimeout(function() {
						const action = getQueryParameter("actionw")
							
						console.log("Action parameter value: " + action); // Log the parameter value
						if (action) {
							handleAction(action); // Call the appropriate function based on the action
						} else {
							console.error("Action parameter is missing.");
						}

						Toldonce = true;
					}, 100); // Delay for 100ms
				  }
				  
				};

				function removeQueryParamAndSubmit() {
					
					const url = new URL(window.location.href);
					url.searchParams.delete('actionw');  // Remove the 'actionw' parameter
					
					// Update the URL without reloading the page
					window.history.replaceState({}, '', url);
		
					// Submit the form
					document.getElementById("myForm").submit();
				}

				function Import() {
					
					const url = new URL(window.location.href);
					
					
					document.getElementById("import_form").submit();
				}

				function update() {
					
					const url = new URL(window.location.href);
					
					
					document.getElementById("update_form").submit();
				}

				function removeQueryParamAndSubmit1() {
					
					const url = new URL(window.location.href);
					url.searchParams.delete('actionw');  // Remove the 'actionw' parameter
					
					// Update the URL without reloading the page
					window.history.replaceState({}, '', url);
		
					
				}
	</script>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="logo">
							<img class = "custom-image" src="result.png" alt="">
						</div>

						
						<div class="content">
							<div class="inner">
								<h1>Trump</h1>
								<p>A man who Made history</p>
							</div>
						</div>
						<nav>
							<ul>
								<li><a href="#intro">Education</a></li>
								<li><a href="#new">NEWS</a></li>
								<li><a href="#work">Work</a></li>
								<?php

									if(isset($Action_var))
									{
										if($Action_var == "Logged")
										{
											?>
											<li><a href="Logout.php">Logout</a></li>
											<?php
										}else{
											?>
											<li><a href="#Login">Login</a></li>
											<?php
										}
									}else
									{
										?>
										<li><a href="#Login">Login</a></li>
										<?php
									}
									
									
								?>
								<li><a href="#life">Life</a></li>
								<li><a href="#about">Presidancy</a></li>
								<li><a href="#contact">Contact</a></li>
								
								<!--<li><a href="#elements">Elements</a></li>-->
							</ul>
						</nav>
					</header>

				<!-- Main -->
					<div id="main">

						<!-- Intro -->
							<article id="intro">
								<h2 class="major">Education</h2>
								<span class="image main"><img src="images/pic3.jpg" alt="" /></span>
								<p><?php echo($content1) ?></p>
							</article>

						<!-- Work -->
							<article id="work">
								<h2 class="major">Work</h2>
								<span class="image main"><img src="images/pic2.png" alt="" /></span>
								<p><?php echo($content2) ?></p>



							</article>

						<!-- About -->
							<article id="about">
								<h2 class="major">Presidancy</h2>
								<span class="image main"><img src="images/pic1.png" alt="" /></span>
								<p> <?php echo($content3) ?> </p>
							</article>


							<article id="life">
								<h2 class="major">life</h2>
								<span class="image main"><img src="images/Pic4.jpg" alt="" /></span>
								<p> <?php echo($content4) ?> </p>
							</article>

							<article id="edit">
								<h2 class="major">Edit</h2>
								<?php
            						$con = mysqli_connect("localhost","root","","website_database");
            						$data = mysqli_query($con, "SELECT * FROM new_data");
            						mysqli_close($con);

            						$row = mysqli_fetch_array($data);
            						$row_count = mysqli_fetch_lengths($data);


									$current_url = strtok($_SERVER["REQUEST_URI"], '?');


            						while($row)
            						{
										$query = $_GET;
										$query['row'] = $row['row']; 
										$new_query_string = http_build_query($query);
                					?>

										<span class="image main"><img src="<?php echo($row["image"])  ?>" alt="" /></span>

                        				<p><?php echo($row["text"]) ?></p>
										<button ><a href="<?= $current_url . '?' . $new_query_string ?>#update">UPDATE</a></button>
										<button><a href="remove.php?row=<?php echo($row['row'])?>">REMOVE</a></button>
                    					
                					<?php

                					$row = mysqli_fetch_array($data);
                
            						}

            

        						?>	


								<p> <?php echo("No More content") ?> </p>
							</article>

							<article id="new">

								<?php
									if(isset($Action_var))
									{
										$state = $Action_var;
										if($state == 'Logged' && $Admin_var == 1)
										{
											?>
											<button ><a href="#Import">ADD</a></button>
											<button><a href="#edit">EDIT</a></button>
											<?php
										}
			
									}

								?>
								<br>
								<br>								
								<h2 class="major">Top News</h2>
								<?php
            						$con = mysqli_connect("localhost","root","","website_database");
            						$data = mysqli_query($con, "SELECT * FROM new_data");
            						mysqli_close($con);

            						$row = mysqli_fetch_array($data);
            						$row_count = mysqli_fetch_lengths($data);


            


            						while($row)
            						{
                					?>

										<span class="image main"><img src="<?php echo($row["image"])  ?>" alt="" /></span>

                        				<p><?php echo($row["text"]) ?></p>
                    					
                					<?php

                					$row = mysqli_fetch_array($data);
                
            						}

            

        						?>	


								<p> <?php echo("No More content") ?> </p>
							</article>

							<article id="Import">
								<h2 class="major">ADD CONTENT</h2>
								<br>
								<br>
								<form method="POST" action="import.php" id = "import_form" enctype="multipart/form-data">
									<div class="fields">

										<label for = "IMAGE" class = "custom_file_lable">Choose file</label>
										<input type="file" class = "IMAGE" id = "IMAGE" name = "IMAGE" placeholder="IMAGE">
										<div class="field">
											<label for="message">Content</label>
											<textarea name="message" id="message" rows="4"></textarea>
										</div>
									</div>
									<ul class="actions" id = "actionsList">
										<li><input type="submit" id = "import_Button" value="IMPORT" onclick="Import(); return false;" class="primary" /></li>
										<li><input type="reset" value="Reset" /></li>
									</ul>
								</form>
							</article>


							<article id="update">
								<h2 class="major">Update content</h2>
								<br>
								<br>
								<form method="POST" action="update.php?row=<?php echo($_GET["row"])?>" id = "update_form" enctype="multipart/form-data">
									<div class="fields">

										<label for = "IMAGE1" class = "custom_file_lable">Choose file</label>
										<input type="file" class = "IMAGE1" id = "IMAGE1" name = "IMAGE1" placeholder="IMAGE">
										<div class="field">
											<label for="message1">Content</label>
											<textarea name="message1" id="message1" rows="4"></textarea>
										</div>
									</div>
									<ul class="actions" id = "actionsList">
										<li><input type="submit" id = "update_Button" value="UPDATE" onclick="update(); return false;" class="primary" /></li>
										<li><input type="reset" value="Reset" /></li>
									</ul>
								</form>
							</article>

							

						<!-- Contact -->
							<article id="contact">
								<h2 class="major">Contact</h2>
								<form method="post" action="#Login" id = "myForm">
									<div class="fields">
										
										<div class="field">
											<label for="message">Message</label>
											<textarea name="message" id="message" rows="4"></textarea>
										</div>
									</div>
									<ul class="actions" id = "actionsList">
										<li><input type="submit" id = "loginButton" value="Login" onclick="removeQueryParamAndSubmit(); return false;" class="primary" /></li>
										<li><input type="reset" value="Reset" /></li>
									</ul>
								</form>
								<ul class="icons">
									<li><a href="https://x.com/realdonaldtrump?lang=en" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="https://www.facebook.com/DonaldTrump/" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
									<li><a href="https://www.instagram.com/realdonaldtrump/?hl=en" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
									
								</ul>
							</article>

							<article id="Login">
								<h2 class="major">Login</h2>
								<form method="post" action="Login.php" id = "myForm">
									<div class="fields">
									
									
										<div class="field">
											<label for="message">Email</label>
											<textarea name="email" id="email" rows="1"></textarea>
										</div>

										<div class="field">
											<label for="message">Password</label>
											<textarea name="password" id="password" rows="1"></textarea>
										</div>

										<script>
											const emailTextarea = document.getElementById('email');
											emailTextarea.addEventListener('input', function () {
											  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
											  if (!emailPattern.test(this.value)) {
												this.style.borderColor = 'red';
											  } else {
												this.style.borderColor = 'green';
											  }
											});
										</script>

										<script>
											const passwordTextarea = document.getElementById('password');
											
										</script>
										  
									</div>
									<ul class="actions">
										<li><input type="submit" value="Login" class="primary" /></li>
										
										<style>
											.LinkClass
											{
												border-bottom: none;
											}

											.button_class
											{
												font-size: 10px;
											}
										</style>
										<li><a href="#SignUp" class="button">Need an account?</a></li>
									</ul>
								</form>
								
							</article>


							<article id="SignUp">
								<h2 class="major">SignUp</h2>
								<form method="post" action="Sql_php.php">
									<div class="fields">
										<div class="field">
											<label for="message">Name</label>
											<textarea name="Name" id="Name" rows="1"></textarea>
										</div>
									
										<div class="field">
											<label for="message">Email</label>
											<textarea name="email" id="email" rows="1"></textarea>
										</div>

										<div class="field">
											<label for="message">Password</label>
											<textarea name="password" id="password" rows="1"></textarea>
										</div>

										<script>
											const emailTextareaS = document.getElementById('email');
											emailTextareaS.addEventListener('input', function () {
											  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
											  if (!emailPattern.test(this.value)) {
												this.style.font = 'red';
											  } else {
												this.style.borderColor = 'green';
											  }
											});
										</script>

										<script>
											const passwordTextareaS = document.getElementById('password');
											
										</script>
										  
									</div>
									<ul class="actions">
										<li><input type="submit" value="Join" class="primary" /></li>
										
										<style>
											.LinkClass
											{
												border-bottom: none;
											}

											.button_class
											{
												font-size: 10px;
											}
										</style>
										<li><a href="#Login" class="button">Already hace an account?</a></li>
									</ul>
								</form>
								
							</article>

							

						<!-- Elements -->
							<article id="elements">
								<h2 class="major">Elements</h2>

								<section>
									<h3 class="major">Text</h3>
									<p>This is <b>bold</b> and this is <strong>strong</strong>. This is <i>italic</i> and this is <em>emphasized</em>.
									This is <sup>superscript</sup> text and this is <sub>subscript</sub> text.
									This is <u>underlined</u> and this is code: <code>for (;;) { ... }</code>. Finally, <a href="#">this is a link</a>.</p>
									<hr />
									<h2>Heading Level 2</h2>
									<h3>Heading Level 3</h3>
									<h4>Heading Level 4</h4>
									<h5>Heading Level 5</h5>
									<h6>Heading Level 6</h6>
									<hr />
									<h4>Blockquote</h4>
									<blockquote>Fringilla nisl. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan faucibus. Vestibulum ante ipsum primis in faucibus lorem ipsum dolor sit amet nullam adipiscing eu felis.</blockquote>
									<h4>Preformatted</h4>
									<pre><code>i = 0;

while (!deck.isInOrder()) {
    print 'Iteration ' + i;
    deck.shuffle();
    i++;
}

print 'It took ' + i + ' iterations to sort the deck.';</code></pre>
								</section>

								<section>
									<h3 class="major">Lists</h3>

									<h4>Unordered</h4>
									<ul>
										<li>Dolor pulvinar etiam.</li>
										<li>Sagittis adipiscing.</li>
										<li>Felis enim feugiat.</li>
									</ul>

									<h4>Alternate</h4>
									<ul class="alt">
										<li>Dolor pulvinar etiam.</li>
										<li>Sagittis adipiscing.</li>
										<li>Felis enim feugiat.</li>
									</ul>

									<h4>Ordered</h4>
									<ol>
										<li>Dolor pulvinar etiam.</li>
										<li>Etiam vel felis viverra.</li>
										<li>Felis enim feugiat.</li>
										<li>Dolor pulvinar etiam.</li>
										<li>Etiam vel felis lorem.</li>
										<li>Felis enim et feugiat.</li>
									</ol>
									<h4>Icons</h4>
									<ul class="icons">
										<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
										<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
										<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
										<li><a href="#" class="icon brands fa-github"><span class="label">Github</span></a></li>
									</ul>

									<h4>Actions</h4>
									<ul class="actions">
										<li><a href="#" class="button primary">Default</a></li>
										<li><a href="#" class="button">Default</a></li>
									</ul>
									<ul class="actions stacked">
										<li><a href="#" class="button primary">Default</a></li>
										<li><a href="#" class="button">Default</a></li>
									</ul>
								</section>

								<section>
									<h3 class="major">Table</h3>
									<h4>Default</h4>
									<div class="table-wrapper">
										<table>
											<thead>
												<tr>
													<th>Name</th>
													<th>Description</th>
													<th>Price</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Item One</td>
													<td>Ante turpis integer aliquet porttitor.</td>
													<td>29.99</td>
												</tr>
												<tr>
													<td>Item Two</td>
													<td>Vis ac commodo adipiscing arcu aliquet.</td>
													<td>19.99</td>
												</tr>
												<tr>
													<td>Item Three</td>
													<td> Morbi faucibus arcu accumsan lorem.</td>
													<td>29.99</td>
												</tr>
												<tr>
													<td>Item Four</td>
													<td>Vitae integer tempus condimentum.</td>
													<td>19.99</td>
												</tr>
												<tr>
													<td>Item Five</td>
													<td>Ante turpis integer aliquet porttitor.</td>
													<td>29.99</td>
												</tr>
											</tbody>
											<tfoot>
												<tr>
													<td colspan="2"></td>
													<td>100.00</td>
												</tr>
											</tfoot>
										</table>
									</div>

									<h4>Alternate</h4>
									<div class="table-wrapper">
										<table class="alt">
											<thead>
												<tr>
													<th>Name</th>
													<th>Description</th>
													<th>Price</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Item One</td>
													<td>Ante turpis integer aliquet porttitor.</td>
													<td>29.99</td>
												</tr>
												<tr>
													<td>Item Two</td>
													<td>Vis ac commodo adipiscing arcu aliquet.</td>
													<td>19.99</td>
												</tr>
												<tr>
													<td>Item Three</td>
													<td> Morbi faucibus arcu accumsan lorem.</td>
													<td>29.99</td>
												</tr>
												<tr>
													<td>Item Four</td>
													<td>Vitae integer tempus condimentum.</td>
													<td>19.99</td>
												</tr>
												<tr>
													<td>Item Five</td>
													<td>Ante turpis integer aliquet porttitor.</td>
													<td>29.99</td>
												</tr>
											</tbody>
											<tfoot>
												<tr>
													<td colspan="2"></td>
													<td>100.00</td>
												</tr>
											</tfoot>
										</table>
									</div>
								</section>

								<section>
									<h3 class="major">Buttons</h3>
									<ul class="actions">
										<li><a href="#" class="button primary">Primary</a></li>
										<li><a href="#" class="button">Default</a></li>
									</ul>
									<ul class="actions">
										<li><a href="#" class="button">Default</a></li>
										<li><a href="#" class="button small">Small</a></li>
									</ul>
									<ul class="actions">
										<li><a href="#" class="button primary icon solid fa-download">Icon</a></li>
										<li><a href="#" class="button icon solid fa-download">Icon</a></li>
									</ul>
									<ul class="actions">
										<li><span class="button primary disabled">Disabled</span></li>
										<li><span class="button disabled">Disabled</span></li>
									</ul>
								</section>

								<section>
									<h3 class="major">Form</h3>
									<form method="post" action="#">
										<div class="fields">
											<div class="field half">
												<label for="demo-name">Name</label>
												<input type="text" name="demo-name" id="demo-name" value="" placeholder="Jane Doe" />
											</div>
											<div class="field half">
												<label for="demo-email">Email</label>
												<input type="email" name="demo-email" id="demo-email" value="" placeholder="jane@untitled.tld" />
											</div>
											<div class="field">
												<label for="demo-category">Category</label>
												<select name="demo-category" id="demo-category">
													<option value="">-</option>
													<option value="1">Manufacturing</option>
													<option value="1">Shipping</option>
													<option value="1">Administration</option>
													<option value="1">Human Resources</option>
												</select>
											</div>
											<div class="field half">
												<input type="radio" id="demo-priority-low" name="demo-priority" checked>
												<label for="demo-priority-low">Low</label>
											</div>
											<div class="field half">
												<input type="radio" id="demo-priority-high" name="demo-priority">
												<label for="demo-priority-high">High</label>
											</div>
											<div class="field half">
												<input type="checkbox" id="demo-copy" name="demo-copy">
												<label for="demo-copy">Email me a copy</label>
											</div>
											<div class="field half">
												<input type="checkbox" id="demo-human" name="demo-human" checked>
												<label for="demo-human">Not a robot</label>
											</div>
											<div class="field">
												<label for="demo-message">Message</label>
												<textarea name="demo-message" id="demo-message" placeholder="Enter your message" rows="6"></textarea>
											</div>
										</div>
										<ul class="actions">
											<li><input type="submit" value="Send Message" class="primary" /></li>
											<li><input type="reset" value="Reset" /></li>
										</ul>
									</form>
								</section>

							</article>

					</div>

				<!-- Footer -->
					<footer id="footer">
						<p></p>
					</footer>

			</div>

		<!-- BG -->
			<div id="bg"></div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
