

<!--

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
/*if (!isset($_GET["name"])){
    */?>


    <form action="<?php /*echo htmlspecialchars($_SERVER["PHP_SELF"]);*/?>" method="get">
        <p>User: <input type="text" name="username" /></p>
        <p>Passwort: <input type="text" name="password" /></p>
        <p><input type="submit" /></p>
    </form>
<?php
/*}else {
    echo "Ihre Eingaben <br />\n"
        . "Ihr Name : " . htmlspecialchars($_GET["username"]) ." <br />\n"
        . "Ihr Alter : " . htmlspecialchars($_GET["alter"])
        ." <br />\n";

}
*/?>
</body>
</html>-->
<?php
session_start();
$verhalten = 0;

if(!isset($_SESSION["username"]) and !isset($_GET["page"])) {
    $verhalten=0;
}
if($_GET["page"] == "log")  {
    /*
        $user = $_POST["user"];
        $password = $_POST["password"];
    */
    $user = strtolower($_POST["user"]);
    $password = md5($_POST["password"]);

    $verbindung = mysql_connect("localhost", "root", "")
    or die ("Fehler im System");

    mysql_select_db("php")
    or die ("Verbindung zur Datenbank war nicht möglich");

    $control = 0;
    $abfrage = "SELECT * FROM login WHERE username = '$user' AND password = '$password'";
    $ergebnis = mysql_query($abfrage);
    while ($row = mysql_fetch_object($ergebnis))
    {
        $control++;
    }

    if($control != 0)  {
        $_SESSION["username"] = $user;
        $verhalten = 1;
    } else{
        $verhalten = 2;
    }
}
?>
<html>
<head>
    <title>Login</title>
    <?php
    if($verhalten == 1) {
        ?>
        <meta http-equiv="refresh" content="3; URL=seite2.php" />
    <?php
    }
    ?>
</head>
<body>
<?php
if($verhalten == 0) {

    ?>
    Bitte logge dich ein: <br/>
    <form action="index.php?page=log" method="post">
        Username: <input type="text" name="user"/><br />
        Passwort: <input type="password" name="password"/><br />
        <input type="submit" value="Einloggen"/>
    </form>
    <p><a href="register.php">Noch nicht dabei? Jetzt registrieren...</a></p>
<?php
}
if($verhalten == 1)     {
    ?>
    Du hast dich richtig eingeloggt und wirst nun weitergeleitet....
<?php
}
if($verhalten == 2)     {
    ?>
    Du hast dich nicht richtig eingeloggt, <a href="index.php">zurueck</a>.
<?php
}
?>

