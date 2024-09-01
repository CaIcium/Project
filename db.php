<?php
 $conn = new mysqli("localhost:4306", "root", "", "projekt");
 if ($conn->connect_error) {
 exit("Connection failed: " . $conn->connect_error);
 }
?>