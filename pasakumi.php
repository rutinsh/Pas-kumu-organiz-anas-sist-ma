<?php
include("backend/Auth.php");
require("backend/db_con.php");
?>

<!DOCTYPE html>
<html lang="lv">
<head>
	<meta charset="UTF-8">
	<title>Kristīgo Ebreju apvienība - Pasākumi un dievpakalpojumi</title>
	<link rel="stylesheet" href="resources/CSS/dievkalpojumi.css">
</head>
<body>
	<header>
		<nav>
			<ul>
				<li><a href="index.php">Sākums</a></li>
				<li><a href="dievkalpojumi.php">Dievkalpojumi</a></li>
                <li><a href="About.php">Par mums</a></li>
                <li><a href="kontakti.php">Kontakti</a></li>
			</ul>
            <a href="backend/logout.php" class="exit-btn">Iziet</a>
		</nav>
	</header>
	
	<main>
        <div class="list">
		<h1>Pasākumi</h2>
            <div class="tabulaBox">
                <table class="table-sortable" id="trow">
                    <thead>
                        <th>Datums</th>
                        <th>Laiks</th>
                        <th>Apraksts</th>
						<th>Rezervācija</th>
                    </thead>
                    <?php
                        $query = "SELECT * FROM pasakumi";
                        $result = mysqli_query($connection, $query);
                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr class="table">
                        <td><?php echo $row['Datums']; ?></td>
                        <td><?php echo $row['Laiks']; ?></td>
                        <td><?php echo $row['Apraksts']; ?></td>
                        <td><a href="#=<?php echo $row["PasakumaID"];?>"><button class="dzest1" id='dzest'>Pieteikties</button></td>
                    </tr>
                    <?php
                     }
                     ?>
                    </table>
            </div>
        </div>
	</main>
	
	<footer>
		<p>Kristīgo Ebreju apvienība &copy; 2023</p>
	</footer>
</body>
</html>
