<?php
include("backend/Auth.php");
require("backend/db_con.php");
?>

<!DOCTYPE html>
<html lang="lv">
<head>
	<meta charset="UTF-8">
	<title>Kristīgo Ebreju apvienība - Pasākumi un dievpakalpojumi</title>
	<link rel="stylesheet" href="resources/CSS/pasakumi.css">
</head>
<body>
	<header>
		<nav>
			<ul>
				<li><a href="index.php">Sākums</a></li>
				<li><a href="pasakumi.php">Pasākumi</a></li>
				<li><a href="#">Dievkalpojumi</a></li>
				<li><a href="#">Pieteikšanās</a></li>
			</ul>
		</nav>
	</header>
	
	<main>
		<section>
			<h2>Plānotie pasākumi</h2>
			<ul>
				<li>
					<h3>Nosaukums</h3>
					<p>Datums: 10.05.2023</p>
					<p>Laiks: 18:00-20:00</p>
					<p>Apraksts: Šeit ievietojam pasākuma aprakstu un sīkāku informāciju</p>
				</li>
				<li>
					<h3>Nosaukums</h3>
					<p>Datums: 25.06.2023</p>
					<p>Laiks: 14:00-16:00</p>
					<p>Apraksts: Šeit ievietojam pasākuma aprakstu un sīkāku informāciju</p>
				</li>
			</ul>
		</section>
		
		<section>
			<h2>Plānotie dievkalpojumi</h2>
			<ul>
				<li>
					<h3>Nosaukums</h3>
					<p>Datums: 12.05.2023</p>
					<p>Laiks: 19:00-20:30</p>
					<p>Apraksts: Šeit ievietojam dievpakalpojuma aprakstu un sīkāku informāciju</p>
				</li>
				<li>
					<h3>Nosaukums</h3>
					<p>Datums: 27.06.2023</p>
					<p>Laiks: 10:00-11:30</p>
					<p>Apraksts: Šeit ievietojam dievpakalpojuma aprakstu un sīkāku informāciju</p>
				</li>
			</ul>
		</section>
	</main>
	
	<footer>
		<p>Kristīgo Ebreju apvienība &copy; 2023</p>
	</footer>
</body>
</html>
