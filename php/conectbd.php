<?php

function connect() {
  $servername = "localhost";
  $username = "root";
  $password = "";
  $db = "consulat";
  
  return mysqli_connect($servername, $username, $password, $db);
}
?>