<?php
include("backend/Auth.php");
require("backend/db_con.php");
?>

<!DOCTYPE html>
<html lang="lv">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kristīgo Ebreju apvienība</title>
	<link rel="stylesheet" href="resources/CSS/kontakti.css">
	<link rel="icon" type="image/png" href="resources/Images/favicon.png">
</head>
<body>
<header>
		<nav>
			<ul>
				<li><a href="index.php">Sākums</a></li>
				<li><a href="pasakumi.php">Pasākumi</a></li>
				<li><a href="dievkalpojumi.php">Dievpakalpojumi</a></li>
				<li><a href="About.php">Par mums</a></li>
			</ul>
			<a href="backend/logout.php" class="exit-btn">Iziet</a>
		</nav>
	</header>
	<main>
		<section>
            <img src="resources/Images/prezidents.png" alt="Prezidents" class="center">
            <h2>Direktors - Staņislavs Jencītis</h2>
			<article>
				<p>Tālruņa numurs - +371 28 768 786</p>
				<p>E-pasts - stanislavsjencs@inbox.lv</p>
			</article>
		</section>
    </main>
    <footer>
		<p>&copy; Kristīgo Ebreju apvienība © 2023.</p>
	</footer>

</body>
</html>
		
		