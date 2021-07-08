<!DOCTYPE HTML>
<html>
	<head>
		<title>Control Panel</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		<style>
input[type=range][orient=vertical]
{
	writing-mode: bt-lr; /* Forcing IE to make it vertical */
	-webkit-appearance: slider-vertical; /* For Chrome */
	width: 16px;
	height: 320px;
	padding: 0 5px;
}
		</style>
		<script src="http://code.jquery.com/jquery-3.1.1.js"></script>
		<script type="text/javascript">
function doRefresh() {
	$("#status").load("includes/info.php");
}
$(function() {
	setInterval(doRefresh, 5000);
});
		</script>
	</head>
	<body class="homepage is-preload">
	<script type="text/javascript">

function volume() {
	var invol = document.getElementById("volin").value;
	fetch("controls.php?action=volume&volume="+invol);
}
	</script>
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header">

					<!-- Inner -->
						<div class="inner">
							<header>
								<h1><a href="panel.php" id="logo">Control Panel</a></h1>
								<hr />
								<p><div id="status"><?php require('./includes/info.php'); ?></div></p>
							</header>
						</div>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li>
									<a href="#">Controls</a>
									<ul>
										<li><a href="#banner" class="scrolly">Adjust Volume</a></li>
										<li><a href="#main" class="scrolly">Search for Games</a></li>
										<li><a href="#features" class="scrolly">Text to Speech</a></li>
										<li><a href="#final" class="scrolly">Soft Reset</a></li>
							</ul>
						</nav>

				</div>

			<!-- Banner -->
				<section id="banner">
					<header>
						<h2>Volume Control</h2>
						<p>
							<input type="range" min="0" max="100" value="<?php
require('./functions/getvol.php');
?>" id="volin" orient="vertical" onmouseup="volume()" ontouchend="volume()">
						</p>
					</header>
				</section>

			<!-- Main -->
				<div class="wrapper style2">

					<article id="main" class="container special">

						<header>
							<h2>Search for Games</h2>
							<p>
								<iframe src="includes/search.html" height="300px"></iframe>
							</p>
						</header>
					</article>

				</div>

			<!-- Features -->
				<div class="wrapper style1">

					<section id="features" class="container special">
						<header>
							<h2>Text to Speech</h2>
							<p><iframe src="includes/speak.php"></iframe></p>
						</header>
					</section>

				</div>

			<div align="center" id="final"><iframe src="includes/reset.html" height="400px" onload="this.width=screen.width;"></iframe></div>
		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
