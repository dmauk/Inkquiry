<?php
$db_hostname = 'localhost';
  $db_database = 'sperezar';
  $db_username = 'sperezar';
  $db_password = '7Xs6kBQ94mKb7';
 
$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

  if ($connection->connect_error) die($connection->connect_error);
?>