<?php
require("db.php");
require("session.php");
$is_admin = false;
if (isset($_SESSION['ID_uzytkownika'])) {
    if ($_SESSION['rola'] == 'admin') {
        $is_admin = true;
    }
}
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona Główna</title>
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
    <div class="container">
        <form action="game.php" method="post" enctype="multipart/form-data">
            <label for="language">Wybierz język:</label>
            <select name="language" id="language">
                <option value="jezyk_pl">Polski</option>
                <option value="jezyk_ang">Angielski</option>
            </select>
            <label for="time">Wybierz czas:</label>
            <select name="time" id="time">
                <option value="150">150</option>
                <option value="120">120</option>
                <option value="80">80</option>
                <option value="60">60</option>
                <option value="30">30</option>
                <option value="20">20</option>
            </select>
            <button type="submit">Zatwierdź</button>
        </form>
    </div>
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