<?php
require('db.php');
require('session.php');
$is_admin = false;
if (isset($_SESSION['ID_uzytkownika'])) {
    if ($_SESSION['rola'] == 'admin') {
        $is_admin = true;
    }
}

if (isset($_POST['correct'])) {
    $user_id = $_POST['user_id'];
    $correct = $_POST['correct'];
    $incorrect = $_POST['incorrect'];
    $accuracy = $_POST['accuracy'];
    $wpn = $_POST['wpn'];
    $time = $_POST['time'];
    $language = $_POST['language'];
    $Rating = $_POST['Rating'];

    $sql = "INSERT INTO ranking (ID_uzytkownika, poprawne_znaki, niepoprawne_znaki, dokladnosc, wpm, czas, id_jezyka, OCENA) 
            VALUES ('$user_id', '$correct', '$incorrect', '$accuracy', '$wpn', '$time', '$language', '$Rating')";
    $conn->query($sql);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Ranking</title>
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
    <form>
        <p>
            <input type="text" name="fraza">
            <input type="submit" value="Wyszukaj">
        </p>
    </form>

    <?php
    echo "<a style='color: white;' href='record.php'>Wszystkie</a>";
    $sqlKat = "SELECT * FROM jezyki";
    $resultKat = $conn->query($sqlKat);
    while ($rowKat = $resultKat->fetch_object()) {
        echo " <a href='record.php?idKat={$rowKat->id_jezyka}' style='color: white;'>{$rowKat->nazwa}</a>";
    }

    $sql = "SELECT r.id_rekordu, u.ID_uzytkownika, u.profilowe, u.Nazwa_uzytkownika, r.poprawne_znaki, 
    r.niepoprawne_znaki, r.dokladnosc, r.wpm, r.czas, j.nazwa, j.ID_jezyka, r.ocena
FROM ranking r 
JOIN uzytkownicy u ON r.ID_uzytkownika = u.ID_uzytkownika 
JOIN jezyki j ON r.ID_jezyka = j.ID_jezyka";
    if (isset($_GET["idKat"])) {
        $idKat = $_GET["idKat"];
        $sql .= " WHERE j.ID_jezyka = $idKat";
    } elseif (isset($_GET["fraza"])) {
        $fraza = $_GET["fraza"];
        $sql .= " WHERE u.Nazwa_uzytkownika LIKE '%$fraza%'";
    }

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID_rekordu</th><th>Nazwa_uzytkownika</th><th>Profilowe</th><th>Poprawne znaki</th><th>Niepoprawne znaki</th><th>Dokładność</th><th>WPM (Słowa na minutę)</th><th>Czas</th><th>Język</th><th>Ocena</th></tr>";
        while ($row = $result->fetch_object()) {
            echo "<tr>";
            echo "<td>$row->id_rekordu</td>";
            echo "<td>$row->Nazwa_uzytkownika</td>";
            echo "<td><img src='obrazy/{$row->profilowe}' style='width:100px; height: 100px;'></td>";
            echo "<td>$row->poprawne_znaki</td>";
            echo "<td>$row->niepoprawne_znaki</td>";
            echo "<td>$row->dokladnosc</td>";
            echo "<td>$row->wpm</td>";
            echo "<td>$row->czas</td>";
            echo "<td>$row->nazwa</td>";
            echo "<td>$row->ocena</td>";
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