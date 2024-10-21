<?php

ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $pwd = $_POST["pwd"];
  $email = $_POST["email"];

  try {
    require_once '../dbhandler.inc.php';
    require_once 'signup_model.inc.php';
    require_once 'signup_control.inc.php';
    

    # Error Handling
    $errors = [];
    if (is_input_empty($username, $pwd, $email)) {
      $errors["input_missing"] = "Please complete all fields!";
    } else {

      if (is_username_taken($dbconn, $username)) {
        $errors["username_taken"] = "Username taken";
      }
  
      if (is_email_invalid($email)) {
        $errors["email_invalid"] = "Please enter a valid email";
      }
  
      if (is_email_registered($dbconn, $email)) {
        $errors["email_used"] = "Email already registered";
      }
    }


    require_once "../config_session.inc.php";

    if ($errors) {
      $_SESSION["errors_signup"] = $errors;

      $_SESSION["signup_username"] = $username;
      $_SESSION["signup_email"] = $email;

      header("Location: ../../index.php");
      die();
    }

    # If no errors, create new user
    signup_new_user($dbconn, $username, $pwd, $email);
    header("Location: ../../index.php?signup=success");

    $dbconn = null;
    $stmt = null;
    
  } catch (PDOException $e) {
    die("Signup failed: " . $e->getMessage());
  }

} else {
  header("Location: ../../index.php");
  die();
}

