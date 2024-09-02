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
    <title>Konto</title>
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
    <?php
    $sql = "SELECT r.id_rekordu, u.ID_uzytkownika, r.poprawne_znaki, r.niepoprawne_znaki, CAST(REPLACE(r.dokladnosc, '%', '') AS DECIMAL(5,2)) AS dokladnoscliczbowa, r.wpm, r.czas, j.nazwa, j.ID_jezyka, r.ocena
FROM ranking r 
JOIN uzytkownicy u ON r.ID_uzytkownika = u.ID_uzytkownika 
JOIN jezyki j ON r.ID_jezyka = j.ID_jezyka 
WHERE u.ID_uzytkownika = " . $_SESSION['ID_uzytkownika'];

    if (isset($_GET["sort"])) {
        if ($_GET["sort"] == 1) {
            echo "hello";
            $sql .= " ORDER BY dokladnoscliczbowa DESC";
        } elseif ($_GET["sort"] == 2) {
            $sql .= " ORDER BY r.wpm DESC";
        }
    } else {
        $sql .= " ORDER BY r.dokladnosc DESC";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $Lp = 1;
        echo "<table>";
        echo "<tr><th>L.p</th><th>Poprawne znaki</th><th>Niepoprawne znaki</th><th><a href='myAccount.php?sort=1' style='color: white;'>Dokładność</a></th><th><a href='myAccount.php?sort=2' style='color: white;'>WPM</a></th><th>Czas</th><th>Język</th><th>Ocena</th><th>EDYTUJ KOMENTARZ</th><th>USUŃ</th></tr>";
        while ($row = $result->fetch_object()) {
            echo "<tr>";
            echo "<td>$Lp</td>";
            echo "<td>$row->poprawne_znaki</td>";
            echo "<td>$row->niepoprawne_znaki</td>";
            echo "<td>$row->dokladnoscliczbowa</td>";
            echo "<td>$row->wpm</td>";
            echo "<td>$row->czas</td>";
            echo "<td>$row->nazwa</td>";
            echo "<td>$row->ocena</td>";
            echo "<td><a href='edit.php?id=$row->id_rekordu'><img src='obrazy/edit.PNG'></a></td>";
            echo "<td><a href='delete.php?id=$row->id_rekordu'><img src='obrazy/X.PNG'></a></td>";
            echo "</tr>";
            $Lp++;
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