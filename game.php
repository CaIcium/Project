<?php
require("db.php");
require("session.php");
$is_admin = false;
if (isset($_SESSION['ID_uzytkownika'])) {
    if ($_SESSION['rola'] == 'admin') {
        $is_admin = true;
    }
}
$language = isset($_POST['language']) ? $_POST['language'] : 'jezyk_pl';
$time = isset($_POST['time']) ? $_POST['time'] : 120;
$language_value = ($language === 'jezyk_pl') ? 2 : 1;

$sql = "SELECT tekst FROM $language ORDER BY RAND() LIMIT 45";
$result = $conn->query($sql);
$tekstDoNapisania = '';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_object()) {
        $tekstDoNapisania .= $row->tekst . ' ';
    }
} else {
    $tekstDoNapisania = "Brak tekstu do wyświetlenia";
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nauka pisania na klawiaturze</title>
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
    <h1 id="goodluck">Kliknij dowolny przycisk aby zacząć.</h1>
    <h2 id="time"><?php echo $time; ?></h2>
    <div id="text"><?php echo $tekstDoNapisania; ?></div>
    <input type="text" id="input" autofocus />
    <div id="message"></div>
    <script src="script.js"></script>

    <script>
        const targetText = <?php echo json_encode($tekstDoNapisania); ?>;
        const initialTime = <?php echo json_encode($time); ?>;
    </script>

    <footer>
        <p> Autor strony: Tomasz Janiuk</p>
    </footer>
    <div id="square">
        <h3>WYNIK</h3>
        <p>Czas wybrany:</p>
        <h3><?php echo json_encode($time); ?></h3>
        <p>Wybrany jezyk:</p>
        <h3><?php echo json_encode($language); ?></h3>
        <p>Poprawwne znaki:</p>
        <h3 id="correct"></h3>
        <p>Nie poprawwne znaki:</p>
        <h3 id="incorrect"></h3>
        <p>Dokładność:</p>
        <h3 id="acc"></h3>
        <p>Słowa na minutę:</p>
        <h3 id="wpn"></h3>
        <p>Dodaj komentarz:</p>
        <form id="hiddenForm" action="record.php" method="POST">
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['ID_uzytkownika']; ?>">
            <input type="hidden" name="incorrect" id="incorrectInput">
            <input type="hidden" name="correct" id="correctInput">
            <input type="hidden" name="accuracy" id="accInput">
            <input type="hidden" name="wpn" id="wpnInput">
            <input type="hidden" name="time" value="<?php echo $time; ?>">
            <input type="hidden" name="language" value="<?php echo $language_value; ?>">
            <textarea id="gameRating" name="Rating" rows="4" cols="50" required></textarea><br>
            <div id="buttonRecord">
                <h2>Wynik zapisano w rankingu!</h2>
                <input type="submit" value="Sprawdź Rankig" name="submit" class="login-button" />
            </div>
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

</html>