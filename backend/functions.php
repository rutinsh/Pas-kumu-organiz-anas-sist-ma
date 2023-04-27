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

if (isset($_GET['PasakumaID'])) {
    DelPasakums();
}

function DelPasakums()
{
    include 'db_con.php';
    $sql = "DELETE FROM pasakumi WHERE PasakumaID='" . $_GET["PasakumaID"] . "'";
    if (mysqli_query($connection, $sql)) {
        header("Location: ../admin-pasakumi.php");
    } else {
        echo "Error deleting record: " . mysqli_error($connection);
    }
    mysqli_close($connection);
}

if (isset($_GET['PasakumaID'])) {
    DelPasakums();
}

function DelLietotajs()
{
    include 'db_con.php';
    $sql = "DELETE FROM lietotaji WHERE Lietotaja_ID='" . $_GET["Lietotaja_ID"] . "'";
    if (mysqli_query($connection, $sql)) {
        header("Location: lietotaji.php");
    } else {
        echo "Error deleting record: " . mysqli_error($connection);
    }
    mysqli_close($connection);
}
?>
