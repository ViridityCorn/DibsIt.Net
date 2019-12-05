<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
		<!--Her hentes de CSS stylesheets som styler selve brugerflades i bruger.php, og til kalenderen-->
<link rel="stylesheet" type="text/css" href="brugerStyle.css" />
<link href="calendar.css"type="text/css"rel="stylesheet" />

	</head>
	<body>
		<!--Selve kalenderen hentes fra et andet php dokument-->
<?php
include ('calendar.php');
$calendar = new calendar();
echo $calendar -> show();
?>

		<nav>
			<!--Logoet øverst-->
		<img src="dibsitLogo.png">

			<!--Knappen som sender brugeren til login siden-->
			<button type="button" onclick="location.href='../../../System/loginPage.php'">Log ud</button>

		</nav>


		<!--Navigationsbaren til venstre-->
		<div id="nav">
			<p>Materialer</p>

			<!--Dropdown menuen defineres-->
			<ul>
				<li><a href ="#">Lokaler</a>
							<ul>
								<li><a href = "#">Lokale 1</a></li>
								<li><a href = "#">Lokale 2</a></li>
								<li><a href = "#">Lokale 3</a></li>
								<li><a href = "#">Lokale 4</a></li>
							</ul>
				</li>
					<li><a href ="#">3D-printere</a>
					<li><a href ="#">Græsslåmaskiner</a>
					<li><a href ="#">Hatte</a>
			</ul>


		 </div>

		 <!--Her defineres søgefeltet-->

		 <div class = "search-bar">
			 <input class="search-input" type = "text" name=""placeholder="Søg">
			 <a class = "search-btn" href = "#">

			 </a>
		 </div>

		 <!--Dato & Tid skitsen til højre-->

		 <div id="datetime">
			 <p>Dato & Tid</p>

			 <ul>
 				<li><a href ="#">Dato</a>
 							<ul>
 								<li><a href = "#">Mandag</a></li>
 								<li><a href = "#">Tirsdag</a></li>
 								<li><a href = "#">Onsdag</a></li>
 								<li><a href = "#">Torsdag</a></li>
								<li><a href = "#">Fredag</a></li>
								<li><a href = "#">Lørdag</a></li>
								<li><a href = "#">Søndag</a></li>
 							</ul>
 				</li>
 					<li><a href ="#">StartTid</a>
						<li><a href ="#">SlutTid</a>
 			</ul>


		 </div>

	</body>
</html>
