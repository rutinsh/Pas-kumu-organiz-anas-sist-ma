<?php
include("backend/Auth.php");
require("backend/db_con.php");

$dievkalpojumi_id = null; // initialize variable

if (isset($_GET['dievkalpojumi_id'])) {
  $dievkalpojumi_id = $_GET['dievkalpojumi_id'];
  $query = "SELECT * FROM dievkalpojumi
            WHERE DievkalpojumaID = '$dievkalpojumi_id'";
  $result = mysqli_query($con, $query);
  $dievkalpojums = mysqli_fetch_assoc($result);
}

if (isset($_POST['update_dievkalpojums']) && isset($dievkalpojumi_id)) { // add isset check

  $datums = $_POST['datums'];
  $laiks = $_POST['laiks'];
  $apraksts = $_POST['apraksts'];
  $zaleID = $_POST['zaleID'];

  $query = "UPDATE dievkalpojumi
            SET Datums='$datums', Laiks='$laiks', Apraksts='$apraksts', ZaleID='$zaleID'
            WHERE DievkalpojumaID='$dievkalpojumi_id'";
  $result = mysqli_query($con, $query);
  if ($result) {
    header('Location: ../admin.php');
  }
}
else if (isset($_POST['update_dievkalpojums'])) { // handle new records
  
  $datums = $_POST['datums'];
  $laiks = $_POST['laiks'];
  $apraksts = $_POST['apraksts'];
  $zaleID = $_POST['zaleID'];

  $query = "INSERT INTO dievkalpojumi (Datums, Laiks, Apraksts, ZaleID)
            VALUES ('$datums', '$laiks', '$apraksts', '$zaleID')";
  $result = mysqli_query($con, $query);
  if ($result) {
    header('Location: ../Dievkalpojumi.php');
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
    <link rel="icon" href="../resources/favicons/fav.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/resources/CSS/Dievkalpojums.css"/>
  </head>
  <body>
      <div class="Fields">
        <h1 name="header-text">Dievkalpojuma ar ID <?php echo $dievkalpojumi_id; ?> rediģēšana</h1>
      </div>
      <div class="list">
        <div class="tabulaBox">
          <table class="table-sortable" id="trow">
            <thead>
              <th>ID</th>
              <th>Datums</th>
              <th>Laiks</th>
              <th>Apraksts</th>
              <th>Zāle</th>
              <th>Rediģēt</th>
            </thead>
            <form action="" method="post">
              <tr class="table">
                <td><input type="text" name='dievkalpojumi_id' value="<?php echo $dievkalpojumi_id?>"></td>
                <td><input type="text" name='datums' value="<?php echo $dievkalpojums['Datums']; ?>" ></td>
                <td><input type="text" name='laiks' value="<?php echo $dievkalpojums['Laiks']; ?>" ></td>
                <td><input type="text" name='apraksts' value="<?php echo $dievkalpojums['Apraksts']; ?>"></td>
                <td><select name="zaleID" required><option value="">Izvēlēties zāli</option>
                    <?php
                      $zales = mysqli_query($con, "SELECT * FROM zale");
                      while ($zale = mysqli_fetch_assoc($zales)) {
                      $selected = ($dievkalpojums['ZaleID'] == $zale['ZaleID']) ? 'selected' : '';
                     echo "<option value='{$zale['ZaleID']}' $selected>{$zale['Nosaukums']}</option>";}
                     ?>
               </select>
                </td>
                <td><button class='acceptbtn' type='submit' name='update_dievkalpojums'>Saglabāt</button></td>
                </tr>
                </form>
              </table>
            </div>
        </div>
    </body>
</html>