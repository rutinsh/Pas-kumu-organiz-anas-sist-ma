<?php
require('backend/db_con.php');

if(isset($_POST['submit'])){
  $Lietotajvards = $_POST['username'];
  $Parole = $_POST['password'];

  $query = "SELECT * FROM lietotaji WHERE Lietotajvards = '$Lietotajvards' AND Parole = '$Parole' ";
  $result = mysqli_query($connection, $query);
  
  if(mysqli_num_rows($result) == 1){
    session_start();
    $_SESSION['username'] = $Lietotajvards;
    header('Location: index.php');
    exit();
  } 
} 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login</title>
    <link rel="stylesheet" href="resources\CSS\login.css" />
  </head>
  <body>
    <div class="login-card">
      <h2>Pieslēgties</h2>
      <h3>Ievadiet lietotājvārdu un paroli</h3>
      <form class="login-form" method="post">
        <input type="text" name="username" placeholder="Lietotājvārds" required />
        <input type="password" name="password" placeholder="Parole"required />
		<div class="form-links">
			<a href="aizmirsi.php">Aizmirsi paroli?</a>
  			<a href="registration.php">Reģistrēties</a>
   		</div>
        <button type="submit" name="submit">Pieslēgties</button>
      </form>
    </div>
  </body>
</html>