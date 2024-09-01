<?php
require("db.php");
require("session.php");
$is_admin = false;
if (isset($_SESSION['ID_uzytkownika'])) {
    if ($_SESSION['rola'] == 'admin') {
        $is_admin = true;
    }
}
$sql = "SELECT * FROM zgloszenia";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona admina</title>
    <link rel="stylesheet" href="stylesmenu.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="ajax.js"></script>
</head>
<body>
    <header>
    <h1>Witaj <?= $_SESSION["Login"]?>!</h1>
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
    <?php
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID_zgloszenia</th><th>ID_uzytkownika</th><th>Tresc</th></tr>";
        while ($row = $result->fetch_object()) {
            echo "<tr>";
            echo "<td>$row->id_zgłoszenia</td>";
            echo "<td>$row->id_uzytkownika</td>";
            echo "<td>$row->tresc</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Brak wyników.</p>";
    }

    $conn->close();
    ?>


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