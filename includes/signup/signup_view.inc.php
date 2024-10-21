<?php

declare(strict_types=1);

function keep_username() {
  if (isset($_SESSION["signup_username"]) && !isset($_SESSION["errors_signup"]["username_taken"])) {
    $username = $_SESSION["signup_username"];
    unset($_SESSION['signup_username']);

    echo $username;

  }
}

function keep_email() {
  if (isset($_SESSION["signup_email"]) && !isset($_SESSION["errors_signup"]["email_invalid"]) && !isset($_SESSION["errors_signup"]["email_used"])) {
    $email = $_SESSION["signup_email"];
    unset($_SESSION['signup_email']);
    
    echo $email;

  }
}

function status_message() {
  if (isset($_SESSION["errors_signup"])) {
    $errors = $_SESSION["errors_signup"];

    echo "<ul class='errors'>";
    foreach($errors as $error) {
      echo "<li>$error</li>";
    }
    echo "</ul>";

    unset($_SESSION["errors_signup"]);
  } else if (isset($_GET["signup"]) && $_GET["signup"] === "success") {

      echo "<ul class='success'>";
      echo "<li>Signup Success!</li>";
      echo "</ul>";

  }
}
