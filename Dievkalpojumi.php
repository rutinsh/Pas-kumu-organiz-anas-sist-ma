<?php
include 'backend/Auth.php';
require('backend/db_con.php');

if (isset($_REQUEST['datums']) && isset($_REQUEST['laiks']) && isset($_REQUEST['apraksts']) && isset($_REQUEST['zaleID'])) {
    $datums = $_REQUEST['datums'];
    $laiks = $_REQUEST['laiks'];
    $apraksts = $_REQUEST['apraksts'];
    $zaleID = $_REQUEST['zaleID'];

    $query = "INSERT INTO dievkalpojumi (Datums, Laiks, Apraksts, ZaleID) VALUES ('$datums', '$laiks', '$apraksts', '$zaleID')";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "<h1 id='veiksmigi'>Veiksmīgi pievienots!</h1>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dievkalpojumi</title>
        <link rel="icon" href="resources/favicons/fav.png" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;1,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="resources/CSS/Dievkalpojumi.css"/>
    </head>
    <body>
        <div class="Fields">
            <button id="add-btn">Pievienot Dievkalpojumu</button>
            <form action="" method="post">
                <div id="add-pop">
                    <input name="datums" type="date" class="input" placeholder="Datums" required>
                    <input name="laiks" type="time" class="input" placeholder="Laiks" required>
                    <input name="apraksts" type="text" class="input" placeholder="Apraksts" required>
                    <input name="zaleID" type="number" class="input" placeholder="Zale ID" required>
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
                        <th>Zale ID</th>
                        <th>Rediģēt</th>
                    </thead>
                    <?php
                        $query = "SELECT * FROM dievkalpojumi";
                        $result = mysqli_query($connection, $query);
                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr class="table">
                        <td><?php echo $row["DievkalpojumaID"]; ?></td>
                        <td><?php echo $row['Datums']; ?></td>
                        <td><?php echo $row['Laiks']; ?></td>
                        <td><?php echo $row['Apraksts']; ?></td>
                        <td><?php echo $row['ZaleID']; ?></td>
                        <td><a href="backend/delete.php?DievkalpojumaID=<?php echo $row["DievkalpojumaID"];?>"><button class="dzest1" id='dzest'>Dzēst</button></a><br><a href="edit/edit-dievkalpojums.php?dievkalpojuma_id=<?php echo $row["DievkalpojumaID"]; ?>"><button class="labot1" id='labot'>Labot</button></a></td>
                    </tr>
                    <?php
                     }
                     ?>
                    </table>
            </div>
        </div>
            <script src="resources/js/table.js"></script>
        </body>
</html>
