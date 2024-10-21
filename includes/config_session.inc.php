<?php

ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

session_set_cookie_params([
  'lifetime' => 1800,
  'domain' => 'localhost',
  'path' => '/',
  'secure' => true,
  'httponly' => true
]);

session_start();

# If user is logged in create session ID concatenated with user ID
if ($_SESSION['user_id']) {
  $interval = 60 * 30;
  if (time() - $_SESSION["last_regeneration"] <= $interval) {
    new_session_id_logged_in();
  }
} else {

  if (!isset($_SESSION["last_regeneration"])) {
    $_SESSION["last_regeneration"] = time();
  } else {
    $interval = 60 * 30;
    if (time() - $_SESSION["last_regeneration"] <= $interval) {
      new_session_id();
    }
  }
}

function new_session_id_logged_in() {
  $newSessionID = session_create_id() . '_' . $_SESSION['user_id'];
  session_id($newSessionID);
  $_SESSION["last_regeneration"] = time();
}

function new_session_id() {
  session_regenerate_id(true);
  $_SESSION["last_regeneration"] = time();
}