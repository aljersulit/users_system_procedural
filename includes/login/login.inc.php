<?php 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $username = $_POST["username"];
  $pwd = $_POST["pwd"];

  try {
    require_once "../dbhandler.inc.php";
    require_once "login_model.inc.php";
    require_once "login_control.inc.php";

    # Error Handling
    $errors = [];

    # get user info in Database
    $user = get_user($dbconn, $username);

    #Check if all input fields has values
    if(is_login_input_empty($username, $pwd)) {
      $errors['login_input_missing'] = "Please complete all the fields!";
    }

    if (!$user) {
      if (!$errors['login_input_missing']) {
        $errors['user_exist'] = "User does not exist";
      }
    }
    # Compare if password comparison matches
    if ($user && is_password_wrong($pwd, $user['pwd'])) {
      $errors['wrong_password'] = "Wrong password";
    }

    # If theres an Error, show error message on the form
    require_once "../config_session.inc.php";

    if ($errors) {
      $_SESSION['errors_login'] = $errors;
      header("Location: ../../index.php");
      die();
    }
    # If no error login the user
    $_SESSION['user_id'] = $user['id'];
    $newSessionID = session_create_id() . '_' . $user['id'];
    session_id($newSessionID);

    #Redirect to homepage and show message on the form
    header("Location: ../../index.php?login=success");

    $dbconn = null;
    $stmt = null;
    die();
  } catch (PDOException $e) {
    die("Login Failed.." . $e->getMessage());
  }

} else {
  header("Location: ../../index.php");
  die();
}