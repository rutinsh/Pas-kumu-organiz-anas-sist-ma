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
	<link rel="stylesheet" href="resources/CSS/index.css">
	<link rel="icon" type="image/png" href="resources/Images/favicon.png">
</head>
<body>
	<header>
		<h1>Ebreju kristiešu draudze</h1>
		<nav>
			<ul style="list-style-type: '✡';">
				<li><a href="About.php">Par mums</a></li>
				<li><a href="dievkalpojumi.php">Dievkalpojumi</a></li>
				<li><a href="pasakumi.php">Pasākumi</a></li>
				<li><a href="kontakti.php">Kontakti</a></li>
			</ul>
		</nav>
	</header>
	<main>
		<section>
			<h2>Sveicināti "Kristīgo Ebreju apvienības" mājaslapā!</h2>
			<p>Mūsu mājaslapā jūs varat atrast visu nepieciešamo informāciju par mūsu organizāciju, tās pasākumiem un dievkalpojumiem.</p>
			<a href="pasakumi.php">
				<button>Pieteikties pasākumam</button>
			</a>
			<a href="dievkalpojumi.php">
				<button>Pieteikties dievkalpojumam</button>
			</a>
		</section>
		<section>
			<h2>Mēneša cilvēks - Eugēnijs Āboliņš</h2>
			<article>
				<p>Eugēnijs Āboliņš ir cilvēks, kas izgājis cauri lielam dzīves pagriezienam. Agrāk viņš bija atkarīgs no narkotiskajām vielām un alkohola, taču pēc ilgas un grūtas cīņas ar šīm atkarībām, viņš spēja atbrīvoties no šiem postījumiem un sākt jaunu dzīves posmu.</p>
				<p>Viņš uzsver, ka viņa atbrīvošanās no atkarībām būtu bijusi neiespējama bez Dieva palīdzības. Pateicoties viņa ticībai, viņš spēja atrast spēku un mieru savā sirdī, lai pārvarētu grūtības un turpinātu ceļu pretī labajam un veiksmīgam dzīves veidam.</p>
				<p>Šobrīd Eugēnijs ir aktīvs draudzes biedrs un darbojas kā mentorētājs citiem cilvēkiem, kas saskaras ar narkotisko vielu un alkohola atkarību. Viņš stāsta savu stāstu un dalās ar pieredzi, lai motivētu citus un palīdzētu tiem, kas var atrasties līdzīgā situācijā, kāda viņam bija agrāk.</p>
				<p>Viņš ir īsts piemērs tam, ka ar ticību, spēku un neatlaidību, ir iespējams pārvarēt pat visgrūtākās dzīves problēmas un atgūt savu dzīvi.</p>
				<img src="resources/Images/cilveks.png" alt="Mēneša cilvēks" class="center">
			</article>
		</section>
		
		
		
		
		
