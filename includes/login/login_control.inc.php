<?php 

declare(strict_types=1);

function is_login_input_empty(string $username, string $pwd) {
  if (empty($username) || empty($pwd)) {
    return true;
  } else {
    return false;
  }
}

function is_password_wrong(string $pwd, string $hashed_pwd):bool {
  if (!password_verify($pwd, $hashed_pwd)) {
    return true;
  } else {
    return false;
  }
}