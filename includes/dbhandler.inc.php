<?php

$dbusername = "root";
$dbpassword = "";
$dbname = "myfirstdatabase";
$host = "localhost";

try {
  $dbconn = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
  $dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
  die("Connection Failed: " . $e->getMessage());
}