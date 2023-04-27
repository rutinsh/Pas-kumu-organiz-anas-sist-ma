<?php
include 'backend/Auth.php';
require('backend/db_con.php');

if (isset($_REQUEST['lietotajvards']) && isset($_REQUEST['parole']) && isset($_REQUEST['vards']) && isset($_REQUEST['uzvards']) && isset($_REQUEST['epasts']) && isset($_REQUEST['talrnr']) && isset($_REQUEST['admins'])) {
    $lietotajvards = $_REQUEST['lietotajvards'];
    $parole = $_REQUEST['parole'];
    $vards = $_REQUEST['vards'];
    $uzvards = $_REQUEST['uzvards'];
    $epasts = $_REQUEST['epasts'];
    $talrnr= $_REQUEST['talrnr'];
    $admins = $_REQUEST['admins'];



    $query = "INSERT INTO lietotaji (Lietotajvards, Parole, Vards, Uzvards, Epasts, Talr_nr,  Admins) VALUES ('$lietotajvards', '$parole', '$vards' ,'$uzvards', '$epasts',  '$talrnr', '$admins')";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "<h1 id='veiksmigi'>Veiksmīgi pievienots!</h1>";
    }
}
?>

<!DOCTYPE html>
<html lang="lv">
<head>
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dievkalpojumi</title>
        <link rel="icon" href="resources/Images/favicon.png" />
        <link rel="stylesheet" href="resources/CSS/admin.css"/>
</head>
<body>
	<header>
		<h1>Ebreju kristiešu draudze</h1>
		<nav>
			<ul>
				<li><a href="index.php">Sākums</a></li>
				<li><a href="admin.php">Dievkalpojumi</a></li>
                <li><a href="admin-pasakimi.php">Pasākumi</a></li>
			</ul>
		</nav>
	</header>
    <div class="Fields">
            <button id="add-btn">Pievienot lietotāju</button>
            <form action="" method="post">
                <div id="add-pop">
                    <input name="lietotajvards" type="varchar" class="input" placeholder="lietotajvards" required>
                    <input name="parole" type="varchar" class="input" placeholder="parole" required>
                    <input name="vards" type="varchar" class="input" placeholder="vards" required>
                    <input name="uzvards" type="varchar" class="input" placeholder="uzvards" required>
                    <input name="epasts" type="varchar" class="input" placeholder="epasts" required>
                    <input name="talrnr" type="int" class="input" placeholder="talrnr" required>
                    <input name="admins" type="tinyint" class="input" placeholder="admins" required>
                    <input class="btn" name="submit" type="submit" value="Pievienot">
                    <button id="close-btn">Atcelt</button>
                </div>
            </form>
        </div>
        <div class="list">
            <div class="tabulaBox">
                <table class="table-sortable" id="trow">
                    <thead>
                        <th>ID</th>
                        <th>Lietotajvārds</th>
                        <th>Parole</th>
                        <th>Vārds</th>
                        <th>Uzvārds</th>
                        <th>E-pasts</th>
                        <th>Tālruņa numurs</th>
                        <th>Admins</th>
                        <th>Rediģēt<th>
                    </thead>
                    <?php
                        $query = "SELECT * FROM lietotaji";
                        $result = mysqli_query($connection, $query);
                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr class="table">
                        <td><?php echo $row["Lietotaja_ID"]; ?></td>
                        <td><?php echo $row["Lietotajvards"]; ?></td>
                        <td><?php echo $row["Parole"]; ?></td>
                        <td><?php echo $row['Vards']; ?></td>
                        <td><?php echo $row['Uzvards']; ?></td>
                        <td><?php echo $row['Epasts']; ?></td>
                        <td><?php echo $row["Talr_nr"]; ?></td>
                        <td><?php echo $row["Admins"]; ?></td>
                        <td><a href="backend/functions.php?LietotajaID=<?php echo $row["Lietotaja_ID"];?>"><button class="dzest1" id='dzest'>Dzēst</button><button class="labot1" id='labot'>Labot</button></a></td>
                    </tr>
                    <?php
                     }
                     ?>
                    </table>
            </div>
        </div>
        <script>
    const addBtn = document.getElementById('add-btn');
    const addPop = document.getElementById('add-pop');
    const closeBtn = document.getElementById('close-btn');

    addBtn.addEventListener('click', () => {
        addPop.style.display = 'block';
    });

    closeBtn.addEventListener('click', () => {
        addPop.style.display = 'none';
    });
</script>

        </body>
</html>
