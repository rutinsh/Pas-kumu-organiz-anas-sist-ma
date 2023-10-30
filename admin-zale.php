<?php
include 'backend/Auth.php';
require('backend/db_con.php');

if (isset($_REQUEST['VietuSkaits']) && isset($_REQUEST['Apraksts'])) {
    $VietuSkaits = $_REQUEST['VietuSkaits'];
    $Apraksts = $_REQUEST['Apraksts'];


    $query = "SELECT MAX(ZaleID) AS max_id FROM zale";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    $newZaleID = $row['max_id'] + 1;
    
    $insertQuery = "INSERT INTO zale (ZaleID, VietuSkaits, Apraksts) VALUES ('$newZaleID', '$VietuSkaits', '$Apraksts')";
    $insertResult = mysqli_query($connection, $insertQuery);
}
?>

<!DOCTYPE html>
<html lang="lv">
<head>
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Zāle</title>
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
                <li><a href="pasakumi.php">Pasākumi</a></li>
                <li><a href="Lietotaji.php">Lietotaji</a></li>
			</ul>
		</nav>
	</header>
    <div class="Fields">
            <button id="add-btn">Pievienot zāli</button>
            <form action="" method="post">
                <div id="add-pop">
                    <input name="VietuSkaits" type="number" class="input" placeholder="VietuSkaits" required>
                    <input name="Apraksts" type="text" class="input" placeholder="Apraksts" required>
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
                        <th>VietuSkaits</th>
                        <th>Apraksts</th>
                        <th>Rediģēt</th>
                    </thead>
                    <?php
                        $query = "SELECT * FROM zale";
                        $result = mysqli_query($connection, $query);
                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr class="table">
                        <td><?php echo $row["ZaleID"]; ?></td>
                        <td><?php echo $row['VietuSkaits']; ?></td>
                        <td><?php echo $row['Apraksts']; ?></td>
                        <td><a href="backend/functions.php?ZaleID=<?php echo $row["ZaleID"];?>"><button class="dzest1" id='dzest'>Dzēst</button></a></td>
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

    <footer>
		<p>Kristīgo Ebreju apvienība &copy; 2023</p>
	</footer>
        </body>
</html>
