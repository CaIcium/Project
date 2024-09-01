<?php
require("db.php");
session_start();
if (isset($_POST["submit"])) {
    $Email = $_POST["Email"];
    $Haslo = $_POST["Haslo"];
    
    $sql = "SELECT * FROM uzytkownicy WHERE Email='$Email' AND Haslo='$Haslo'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_object();
        $_SESSION["ID_uzytkownika"] = $user->ID_uzytkownika;
        $_SESSION["Email"] = $Email;
        $_SESSION["Login"] = $user->Nazwa_uzytkownika;
        $_SESSION["rola"] = $user->rola;
        $_SESSION["profilowe"] =$user->profilowe;

        header("Location: menu.php");
        exit();
    } else {
        echo "<div class='form'>
              <h3>Nieprawidłowy login lub hasło.</h3><br/>
              <p class='link'>Ponów próbę <a href='login.php'>logowania</a>.</p>
              </div>";
    }
} else {
?>
    <!DOCTYPE html>
    <html lang="pl">

    <head>
        <meta charset="UTF-8">
        <title>Moje recenzje</title>
        <link rel="stylesheet" href="stylesmenu.css">
    </head>

    <body id="forms">
        <form class="form" method="post" name="login">
            <h1 class="login-title">Logowanie</h1>
            <input type="text" class="login-input" name="Email" placeholder="Email" autofocus="true" required />
            <input type="password" class="login-input" name="Haslo" placeholder="Hasło" required />
            <input type="submit" value="Zaloguj" name="submit" class="login-button" />
            <p class="link"><a href="registration.php">Zarejestruj się</a></p>
        </form>
    </body>

    </html>
<?php
}
?>
