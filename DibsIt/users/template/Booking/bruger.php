<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
<link rel="stylesheet" type="text/css" href="brugerStyle.css" />
<link href="calendar.css"type="text/css"rel="stylesheet" />


	</head>
	<body>
<?php
include ('calendar.php');
$calendar = new calendar();
echo $calendar -> show();
?>

		<nav>
			<p>Computarum Booking</p>

			<button type="button" >Log ind</button>

		</nav>



		<div id="nav">
			<p>Materialer</p>

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

		 <div class = "search-bar">
			 <input class="search-input" type = "text" name=""placeholder="Søg">
			 <a class = "search-btn" href = "#">

			 </a>
		 </div>

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
