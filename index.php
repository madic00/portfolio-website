<?php session_start() ?>

<!DOCTYPE html>
<html>

<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-178955703-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-178955703-1');
	</script>

	<title>Aleksandar Madic | Web developer</title>

	<meta charset="utf-8" />

	<meta name="description"
		content="Hi! My name is Aleksandar Madic and I'm a web developer from Belgrade, Serbia. I enjoy creating web apps, especially working 'under the hood'. Also, I enjoy spending my free time increasing my knowledge of Web Development and building new and challenging projects." />

	<meta name="keywords"
		content="aleksandar madic, alemadic, aleksandar madić, web developer, php developer, develop web app, developer, madic, alemadic" />

	<meta name="author" content="Aleksandar Madic" />

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1" />

	<link rel="canonical" href="https://alemadic.com" />

	<link rel="icon" href="assets/images/fav.png" type="image/ico" />

	<link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet" />

	<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&family=Russo+One&display=swap"
		rel="stylesheet" />

	<link rel="stylesheet" type="text/css" href="assets/css/default.css" />
	<!-- <link id="theme-style" rel="stylesheet" type="text/css" href=""> -->
</head>

<body>

	<section class="s1">
		<div class="main-container">
			<div class="greeting-wrapper">
				<h1>Hi, I'm Aleksandar Madic</h1>
			</div>


			<div class="intro-wrapper">
				<div class="nav-wrapper">

					<!-- Link around dots-wrapper added after tutorial video -->
					<a href="index.php" title="Home">
						<div class="dots-wrapper">
							<div id="dot-1" class="browser-dot"></div>
							<div id="dot-2" class="browser-dot"></div>
							<div id="dot-3" class="browser-dot"></div>
						</div>
					</a>


					<ul id="navigation">
						<!-- <li><a href="index.php">Home</a></li> -->
						<li><a href="index.php#about">About</a></li>
						<li><a href="index.php#projects">Projects</a></li>
						<li><a href="index.php#contact">Contact</a></li>

					</ul>
				</div>

				<div class="left-column">
					<img id="profile_pic" src="assets/images/author.jpg" alt="author Aleksandar Madic" />

				</div>

				<div class="right-column">

					<div id="preview-shadows">

						<div id="preview">
							<div id="corner-tl" class="corner"></div>
							<div id="corner-tr" class="corner"></div>
							<h3>Web Developer</h3>
							<!-- <p>I was a lead developer in a past life, now I enjoy teaching courses.</p> -->
							<p>I enjoy creating web apps, especially working "under the hood".</p>
							<div id="corner-br" class="corner"></div>
							<div id="corner-bl" class="corner"></div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="s2" id="about">
		<div class="main-container">

			<div class="about-wrapper">
				<div class="about-me">
					<h4>More about me</h4>

					<p>I am a young web developer, located in Belgrade, with a background in software engineering. Like
						many
						programmers, I
						love feeling of building staff with only pc and code.</p>

					<p>Goal oriented person, who loves working "under the hood" and collaborating with other developers.
						Looking for
						a junior backend developer position or internship.
					</p>

					<br /> <br />

					<h4>Top expertise</h4>

					<p>Developer with primary focus on PHP & MySQL + JavaScript: <a target="_blank"
							href="Aleksandar Madic - Resume.pdf">Download Resume</a></p>

					<div id="skills">
						<ul>
							<li>PHP</li>
							<li>MySQL</li>
							<li>JavaScript</li>
							<li>jQuery</li>
							<li>AJAX / JSON / XML</li>
						</ul>

						<ul>
							<li>C#</li>
							<li>SQL server</li>
							<li>Angular</li>
							<li>HTML / CSS / Bootstrap</li>
							<li>Linux</li>
						</ul>

					</div>


				</div>

				<div class="social-links">
					<h4>Education</h4>

					<p><b>ICT College of vocational studies</b> / Web programming</p>

					<p>Oct 2018 - June 2021 (expected) : Belgrade, Serbia</p>

					<p><b>Electrical Engineering School </b> / Computer network administrator</p>

					<p>Sep 2014 - May 2018 : Bor, Serbia</p>

					<!-- <hr /> -->

					<br /> <br />

					<h4>Connect with me</h4>

					<p> <a target="_blank" href="https://github.com/madic00">Github: @madic00</a></p>

					<p> <a target="_blank" href="https://linkedin.com/in/alemadic">Linkedin: @alemadic</a></p>

					<p> <a target="_blank" href="mailto:aleksmadic00@gmail.com">Mail: aleksmadic00@gmail.com</a></p>

					<!-- <p> <a target="_blank" href="https://dev.to/alemadic">Devto: @alemadic</a></p> -->



				</div>

			</div>

		</div>
	</section>

	<section class="s1" id="projects">
		<div class="main-container">
			<h3 class="section-title">Some of my past projects</h3>

			<div class="post-wrapper">

			</div>



		</div>
	</section>

	<section class="s2">
		<div class="main-container">
			<a href=""></a>
			<h3 class="section-title">Get In Touch</h3>

			<div id="moreInfo">
					<p>Aleksandar Madic, PHP developer, Aleksandar Madic, alemadic, php developer, web developer, web developer, web developer, Aleksandar Madic, Aleksandar Madic,Aleksandar Madic,Aleksandar Madic, alemadic, alemadic, Aleksandar Madic, php developer, web developer, alemadic, alemadic, alemadic, web developer, web developer</p>
				</div>


			<div id="sendingMailErrors">
				<?php 
					if(isset($_SESSION['msg'])) {
						if($_SESSION['state'] == true) {
							$class = "success";
						} else {
							$class = "mailError";
						}

						echo "<p class='{$class}'>" . $_SESSION['msg'] . "</p>";

					}

					if(isset($_SESSION['errors'])) {
						foreach($_SESSION['errors'] as $err) {
							echo "<p class='error'>{$err}</p>";
						}
					}

					session_unset();

				?>

			</div>

			<form id="contact-form" action="processContact.php" onSubmit="return checkContactForm()" method="POST">
				<a name="contact"></a>

				<div>
					<label for="name">Name</label>
					<input class="input-field" type="text" name="name" id="name" />
					<small class="error" id="nameErr"></small>

				</div>

				<div>
					<label for="subject">Subject</label>
					<input class="input-field" type="text" name="subject" id="subject" />
					<small class="error" id="subjectErr"></small>

				</div>

				<div>
					<label for="email">Email</label>
					<input class="input-field" type="text" name="email" id="email" />
					<small class="error" id="emailErr"></small>
				</div>

				<div>
					<label for="message">Message</label>
					<textarea class="input-field" name="message" id="message"></textarea>
					<small class="error" id="messageErr"></small>
				</div>

				<input id="submit-btn" type="submit" value="Send" name="submitContact" />

			</form>
		</div>
	</section>

	<script src="https://code.jquery.com/jquery-3.5.1.min.js"
		integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="assets/js/script.js"></script>
</body>

</html>