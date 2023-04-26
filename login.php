<?php

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources\CSS\login.css" />
    <link rel="icon" type="image/png" href="resources/Images/favicon.png">
    <title>Pieslēgties</title>
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