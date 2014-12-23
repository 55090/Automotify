<!DOCTYPE html>
<html>
    <head>
        <title>Verabreitung Login</title>
        <meta charset="UTF-8" />
    </head>

<body>
<?php
echo "Ihre EIngaben<br /n>\n";
echo "Username:" .htmlspecialchars($_GET["username"]) . "<br /n";
echo "Password:" .htmlspecialchars($_GET["password"]) . "<br /n";
?>
</body>
</html>