<?php
require('session.php');
require('db.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $IDuzytkownika = $_POST['ID_uzytkownika'];
    $tresc = $_POST['feedback'];
    $sql = "INSERT INTO zgloszenia (ID_uzytkownika, tresc) VALUES ('$IDuzytkownika', '$tresc')";
    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "error";
    }
}

$conn->close();
?>
