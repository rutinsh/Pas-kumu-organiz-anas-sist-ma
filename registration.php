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
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO lietotaji (Lietotajvards, Parole, Vards, Uzvards, Epasts, Talr_nr) VALUES ('$username','$hashedPassword','$name','$lastname','$email','$phone')";
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
    <link rel="stylesheet" href="../resources/CSS/registration.css">
    <title>Reģistrācija</title>
</head>
<body>
    <div class="form-container">
        <form>
            <div class='input-container'>
                <input name="username" type="text" placeholder="Username" required><br>           
                <input name="email" type="email" placeholder="Email" required><br>
                <input name="password" type="password" placeholder="Password" required><br>
                <input name="passwordx2" type="password" placeholder="Password X2" required><br>
                <input name="name" type="text" placeholder="Name" required><br>
                <input name="lastname" type="text" placeholder="Lastname" required><br>
                <input name="phone" type="text" placeholder="Phone" required><br>
                <?php
                    if ($check == true){
                        echo "<h1>Profile with this email already exists!</h1>";
                    }elseif($checkpw == true){
                        echo "<h1>Passwords doesn't match!</h1>";
                    }elseif($create == true){
                        echo "<h1>Profile created sucesfully!</h1>";
                    }
                ?>
            </div>
            <input type="submit" value="Signup">
            <div class="notmember">
                <label>Already registered?</label>
                <a href="login.php">Login here!</a>
            </div>
        </form>
    </div>
</body>
</html>
