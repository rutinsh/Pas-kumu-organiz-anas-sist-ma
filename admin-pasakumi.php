<?php
include 'backend/Auth.php';
require('backend/db_con.php');

if (isset($_REQUEST['datums']) && isset($_REQUEST['laiks']) && isset($_REQUEST['apraksts'])) {
    $datums = $_REQUEST['datums'];
    $laiks = $_REQUEST['laiks'];
    $apraksts = $_REQUEST['apraksts'];


    $query = "INSERT INTO pasakumi (Datums, Laiks, Apraksts) VALUES ('$datums', '$laiks', '$apraksts')";
    $result = mysqli_query($connection, $query);
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
				<li><a href="Dievkalpojumi.php">Dievkalpojumi</a></li>
                <li><a href="Lietotaji.php">Lietotaji</a></li>
                <li><a href="backend/logout.php" class="exit-btn">Iziet</a></li>
			</ul>
		</nav>
	</header>
    <div class="Fields">
            <button id="add-btn">Pievienot pasākumu</button>
            <form action="" method="post">
                <div id="add-pop">
                    <input name="datums" type="date" class="input" placeholder="Datums" required>
                    <input name="laiks" type="time" class="input" placeholder="Laiks" required>
                    <input name="apraksts" type="text" class="input" placeholder="Apraksts" required>
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
                        <th>Datums</th>
                        <th>Laiks</th>
                        <th>Apraksts</th>
                        <th>Rediģēt</th>
                    </thead>
                    <?php
                        $query = "SELECT * FROM pasakumi";
                        $result = mysqli_query($connection, $query);
                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr class="table">
                        <td><?php echo $row["PasakumaID"]; ?></td>
                        <td><?php echo $row['Datums']; ?></td>
                        <td><?php echo $row['Laiks']; ?></td>
                        <td><?php echo $row['Apraksts']; ?></td>
                        <td><a href="backend/functions.php?PasakumaID=<?php echo $row["PasakumaID"];?>"><button class="dzest1" id='dzest'>Dzēst</button></a><br><a href="edit-dievkalpojums.php?dievkalpojuma_id=<?php echo $row["PasakumaID"]; ?>"><button class="labot1" id='labot'>Labot</button></a></td>
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
