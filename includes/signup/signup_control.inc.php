<?php

declare(strict_types=1);

function is_input_empty(string $username, string $pwd, string $email)
{
  if (empty($username) || empty($pwd) || empty($email)) {
    return true;
  } else {
    return false;
  }
}

function is_email_invalid(string $email)
{
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return true;
  } else {
    return false;
  }
}

function is_username_taken(object $dbconn, string $username)
{
  if (get_username($dbconn, $username)) {
    return true;
  } else {
    false;
  }
}

function is_email_registered(object $dbconn, string $email)
{
  if (get_email($dbconn, $email)) {
    return true;
  } else {
    false;
  }
}

function signup_new_user(object $dbconn, string $username, string $pwd, string $email) {
  create_user($dbconn, $username, $pwd, $email);
}

  // function test_input($data)
  // {
  //   $data = trim($data);
  //   $data = stripslashes($data);
  //   $data = htmlspecialchars($data);
  //   return $data;
  // }
