<?php 
require_once "includes/config_session.inc.php";
require_once "includes/signup/signup_view.inc.php";
require_once "includes/login/login_view.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/main.css">
</head>
<body>
  <div>
    <h2>Login</h2>
    <form action="includes/login/login.inc.php" method="POST">
      <input type="text" name="username" placeholder="Username...">
      <input type="password" name="pwd" placeholder="Password...">
      <button type="submit">Login</button>
      <?php
      login_errors();
      ?>
    </form>
  </div>
  <div>
    <h2>Signup</h2>
    <form action="includes/signup/signup.inc.php" method="POST">
      <input type="text" name="username" placeholder="Username..." value="<?php keep_username(); ?>">
      <input type="password" name="pwd" placeholder="Password...">
      <input type="text" name="email" placeholder="E-mail..." value="<?php keep_email(); ?>">
      <button type="submit">Signup</button>
      <?php 
      status_message();
      ?>
    </form>
  </div>
</body>
</html>