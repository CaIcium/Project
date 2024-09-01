<?php
require("db.php");

if (isset($_POST["submit"])) {
    $Login = $_POST["Nazwa_uzytkownika"];
    $Haslo = $_POST["Haslo"];
    $Email = $_POST["Email"];
    $target_dir = "obrazy/";
    $profilowe_name = basename($_FILES["Profilowe"]["name"]);
    $target_file = $target_dir . $profilowe_name;
    if (!move_uploaded_file($_FILES["Profilowe"]["tmp_name"], $target_file)) {
        $profilowe_name = "blank.png";
    }
    $sql = "INSERT INTO uzytkownicy (Nazwa_uzytkownika, Haslo, Email, profilowe) VALUES ('$Login', '$Haslo', '$Email', '$profilowe_name')";
    $result = $conn->query($sql);
    if ($result) {
        header("Location: login.php");
    } else {
        echo "<div class='form'>
                        <h3>Rejestracja nie powiodła się.</h3><br/>
                        <p class='link'>Kliknij tutaj, aby ponowić próbę <a href='registration.php'>rejestracji</a>.</p>
                      </div>";
    }
} else {
?>
    <!DOCTYPE html>
    <html lang="pl">

    <head>
        <meta charset="UTF-8">
        <title>Rejestracja</title>
        <link rel="stylesheet" href="stylesmenu.css">
    </head>

    <body id="forms">
        <form class="form" action="" method="post" enctype="multipart/form-data">
            <h1 class="login-title">Rejestracja</h1>
            <input type="text" class="login-input" name="Nazwa_uzytkownika" placeholder="Login" required />
            <input type="password" class="login-input" name="Haslo" placeholder="Hasło" required />
            <input type="email" class="login-input" name="Email" placeholder="Adres email" required />
            <p>Dodaj profilowe, nie jest to obowiązkowe:</p>
            <input type="file" class="login-input" name="Profilowe" accept="image/*" />
            <input type="submit" name="submit" value="Zarejestruj się" class="login-button">
            <p class="link"><a href="login.php">Zaloguj się</a></p>
        </form>
    </body>

    </html>

<?php
}
?>