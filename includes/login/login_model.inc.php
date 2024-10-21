<?php

declare(strict_types=1);

function get_user(object $dbconn, string $username):array|bool {

  $sql = 'SELECT username, pwd, id FROM users WHERE username = :username';
  $stmt = $dbconn->prepare($sql);
  $stmt->bindParam(':username', $username);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  return $result;
}
