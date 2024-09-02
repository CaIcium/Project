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
        <h1>Nauka pisania</h1>
        <p>Witaj <?= $_SESSION["Login"] ?>!</p>
    </header>
    <nav>
        <a href="menu.php">Menu</a>
        <a href="settings.php">Graj</a>
        <a href="record.php">Ranking</a>
        <a href="myAccount.php">Moje wyniki</a>
        <?php if ($is_admin) : ?>
            <a href="admintable.php">Zgłoszenia</a>
        <?php endif; ?>
        <a href="logout.php">Wyloguj</a>
    </nav>
    <div class="container">
        <p>Witaj! Strona powstała w celu nauki pisania na klawiaturze. Zasady są proste, po kliknięciu przycisku graj pokazuje się strona na której musisz ustawiasz jaki chcesz mieć czas i język, nasepnie wyświetla się tekst który musisz przepisać. Jeżeli napisałeś odpowiednią literkę, to litera zaznacza się na zielono, a jak złą, to literka zaświeci się na czerwono. Po końcu czasu, albo napisaniu całego tekstu, strona przetwarza wynik, który umiescza się w rankingu. Powodzenia!</p>
        <img id="klawa" src="obrazy/klawa.jpeg">
    </div>
    <footer>
        <p> Autor strony: Tomasz Janiuk</p>
        <form id="feedbackForm" method="post">
            <input type="hidden" name="ID_uzytkownika" value="<?= $_SESSION["ID_uzytkownika"] ?>">
            <input type="text" name="feedback" placeholder="Wpisz wiadomość do administratora">
            <input type="submit" value="Wyślij">
        </form>
        <div id="feedbackMessage"></div>
    </footer>
</body>

</html>