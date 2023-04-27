<?php
if (isset($_GET['DievkalpojumaID'])) {
    DelDievkalpojums();
}

function DelDievkalpojums()
{
    include 'db_con.php';
    $sql = "DELETE FROM dievkalpojumi WHERE DievkalpojumaID='" . $_GET["DievkalpojumaID"] . "'";
    if (mysqli_query($connection, $sql)) {
        header("Location: ../admin.php");
    } else {
        echo "Error deleting record: " . mysqli_error($connection);
    }
    mysqli_close($connection);
}
?>
