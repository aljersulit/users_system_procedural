<?php

function login_errors() {
  if (isset($_SESSION["errors_login"])) {
    $errors = $_SESSION["errors_login"];

    echo "<ul class='errors'>";
    foreach($errors as $error) {
      echo "<li>$error</li>";
    }
    echo "</ul>";

    unset($_SESSION["errors_login"]);
  } else if (isset($_GET["login"]) && $_GET["login"] === "success") {

      echo "<ul class='success'>";
      echo "<li>Login Success!</li>";
      echo "</ul>";

  }
}