<?php
require("db.php");
require("session.php");
$id_rekordu = (int)$_GET['id'];
$sql="DELETE FROM ranking WHERE id_rekordu = $id_rekordu";
$conn->query($sql);
$conn->close();
header("Location: myAccout.php");
?>