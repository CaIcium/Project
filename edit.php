<?php
require("db.php");
require("session.php");
$is_admin = false;
if (isset($_SESSION['ID_uzytkownika'])) {
    if ($_SESSION['rola'] == 'admin') {
        $is_admin = true;
    }
}

$id_rekordu = (int)$_GET['id'];
$sql = "SELECT ocena FROM ranking WHERE id_rekordu = $id_rekordu";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_object();
} else {
    echo "No record found.";
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_comment = $_POST['ocena'];
    $sql = "UPDATE ranking SET ocena ='$new_comment' WHERE id_rekordu = $id_rekordu";

    if ($conn->query($sql) === TRUE) {
        header("Location: myAccout.php");
    }

    $stmt->close();
}
$conn->close();

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj Komentarz</title>
    <link rel="stylesheet" href="stylesmenu.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="ajax.js"></script>
</head>

<body>
    <header>
        <h1>Witaj <?= $_SESSION["Login"] ?>!</h1>
    </header>
    <nav>
        <a href="settings.php">Graj</a>
        <a href="record.php">Ranking</a>
        <a href="myAccout.php">Moje konto</a>
        <?php if ($is_admin) : ?>
            <a href="admintable.php">Zgłoszenia</a>
        <?php endif; ?>
        <a href="menu.php">Powrót do menu</a>
        <a href="logout.php">Wyloguj</a>
    </nav>
    <form method="post" action="">
        <label for="ocena">Komentarz:</label><br>
        <textarea id="ocena" name="ocena" rows="4" cols="50"><?= $row->ocena ?></textarea><br>
        <input type="submit" value="Zapisz">
    </form>
    <footer>
        <p> Autor strony: Tomasz Janiuk</p>
        <form id="feedbackForm" method="post">
        <input type="hidden" name="ID_uzytkownika" value="<?= $_SESSION["ID_uzytkownika"] ?>">
        <input type="text" name="feedback" placeholder="Wpisz wiadomość do administratora">
        <input type="submit" value="Wyślij">
    </form>
    <div id="feedbackMessage"></div>
</body>

</html>