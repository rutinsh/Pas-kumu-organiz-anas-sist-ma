<?php
require_once('backend/db_con.php');
$con = $connection;

$check = false;
$checkpw = false;
$create = false;

if (isset($_REQUEST['username']) && isset($_REQUEST['email']) && isset($_REQUEST['password']) && isset($_REQUEST['passwordx2']) && isset($_REQUEST['name']) && isset($_REQUEST['lastname']) && isset($_REQUEST['phone'])) {

    $username = mysqli_real_escape_string($con, $_REQUEST['username']);
    $email = mysqli_real_escape_string($con, $_REQUEST['email']);
    $password = mysqli_real_escape_string($con, $_REQUEST['password']);
    $passwordx2 = mysqli_real_escape_string($con, $_REQUEST['passwordx2']);
    $name = mysqli_real_escape_string($con, $_REQUEST['name']);
    $lastname = mysqli_real_escape_string($con, $_REQUEST['lastname']);
    $phone = mysqli_real_escape_string($con, $_REQUEST['phone']);

    $check_query = "SELECT * FROM lietotaji WHERE Lietotajvards = '$username'";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        $check = true;
    } else {
        if($password != $passwordx2){
            $checkpw = true;
        }else{
            // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO lietotaji (Lietotajvards, Parole, Vards, Uzvards, Epasts, Talrunis) VALUES ('$username','$password','$name','$lastname','$email','$phone')";
            $result = mysqli_query($con,$query);
            if($result){
                $create = true;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources\CSS\registration.css">
    <script src="backend/script.js"></script>
    <link rel="icon" type="image/png" href="resources/Images/favicon.png">
    <title>Reģistrācija</title>
</head>
<body>
    <div class="reg-card">
        <form>
            <div class='reg-form'>
                <h2> Reģistrācija</h2>
                <input name="username" type="text" placeholder="Lietotājvārds" required><br>           
                <input name="email" type="email" placeholder="E-pasts" required><br>
                <input name="password" type="password" placeholder="Parole" required><br>
                <input name="passwordx2" type="password" placeholder="Atkārtojiet paroli" required><br>
                <input name="name" type="text" placeholder="Vārds" required><br>
                <input name="lastname" type="text" placeholder="Uzvārds" required><br>
                <input name="phone" type="text" placeholder="Tālrunis" pattern="\d{8}" required><br>
                <?php
                    if ($check == true){
                        echo "<h1>Profils ar šo e-pastu jau ir izveidots</h1>";
                    }elseif($checkpw == true){
                        echo "<h1>Paroles nav vienādas</h1>";
                    }elseif($create == true){
                        echo "<script>alert('Profils ir veiksmīgi izveidots!'); window.location='index.php';</script>";
                    }
                ?>
            </div>
            <button type="submit" name="submit">Reģistrēties </button>
            <div class="notmember">
                <label>Vai jau reģistrējies?</label>
                <a href="login.php">Autorizācija</a>
            </div>
        </form>
    </div>
</body>
</html>
