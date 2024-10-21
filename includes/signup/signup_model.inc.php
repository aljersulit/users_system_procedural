<?php

declare(strict_types=1);

function get_username(object $dbconn, string $username) {

  $sql = "SELECT username FROM users WHERE username = :username;";
  $stmt = $dbconn->prepare($sql);
  $stmt->bindParam(":username", $username);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  return $result;
}

function get_email(object $dbconn, string $email) {

  $sql = "SELECT email FROM users WHERE email = :email;";
  $stmt = $dbconn->prepare($sql);
  $stmt->bindParam(":email", $email);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  return $result;
}

function create_user(object $dbconn, string $username, string $pwd, string $email) {
  $sql = "INSERT INTO users (username, pwd, email) VALUES (:username, :pwd, :email);";
  $stmt = $dbconn->prepare($sql);

  $options = [
    'cost' => 12
  ];

  $hashedPWD = password_hash($pwd, PASSWORD_BCRYPT, $options);

  $stmt->bindParam(":username", $username);
  $stmt->bindParam(":pwd", $hashedPWD);
  $stmt->bindParam(":email", $email);
  $stmt->execute();

}