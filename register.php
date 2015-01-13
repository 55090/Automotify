
<html>
<head>
    <title>Mein Bereich - Registrieren</title>
</head>
<body>
<h3>Registrieren</h3>
<?php
if(!isset($_GET["page"])) {
    ?>
    <form action="register.php?page=2" method="post">
        Username: <input type="text" name="user"/><br/>
        Passwort: <input type="password" name="password"/><br/>
        Passwort wiederholen: <input type="password" name="password2"/><br/>
        <input type="submit" value="Senden"/>
    </form>
<?php
}
?>
<?php
if(isset($_GET["page"])) {
    if ($_GET["page"] == "2") {
        $user = strtolower($_POST["user"]);
        $password = md5($_POST["password"]);
        $password2 = md5($_POST["password2"]);

        if ($password != $password2) {
            echo "Passwörter stimmen nicht überein. Bitte wiederhole deine Eingabe...<a href=\"register.php\">zurück</a>";
        } else {
            $verbindung = mysql_connect("localhost", "root", "")
            or die ("Fehler im System");

            mysql_select_db("php")
            or die ("Verbindung zur Datenbank war nicht möglich");

            $control = 0;
            $abfrage = "SELECT username FROM login WHERE username = '$user'";
            $ergebnis = mysql_query($abfrage);
            while ($row = mysql_fetch_object($ergebnis)) {
                $control++;
            }
        if($control != 0)   {
            echo "Username schon vergebn, bitte wähle einen anderen aus<a href=\"register.php\">zurück</a>";
        }   else {
        $eintrag = "INSERT INTO login (username, password) VALUES ('$user', '$password')";

        $eintragen = mysql_query($eintrag);

            if($eintragen == true)  {
                echo "Vielen Dank. Du hast dich nun registriert...<a href=\"index.php\">Jetzt anmelden</a>";
            }   else {
                    echo "Fehler im System. Bitte versuche es später noch einmal....";
            }
            mysql_close($verbindung);
        }


        }
    }
}
    ?>
</body>
</html>