<?php

$mail_address = 'info@glashub.de';


if (array_key_exists('submit', $_POST)) {

    $form_keys = array(
        'Vorname',
        'Nachname',
        'Strasse',
        'PLZ',
        'Ort',
        'Telefonnummer',
        'Email',
        'Fahrzeug',
        'Baujahr',
        'HSN',
        'TSN',
        'Service',
        'Versicherung',
        'Terminwunsch',
        'UhrzeitTerminwunsch',
        'Nachricht'
    );

    $form_data = array();
    $form_errors = array();

    foreach ($form_keys as $form_key) {
        if (array_key_exists($form_key, $_POST)) {
            $form_data[$form_key] = trim(strip_tags($_POST[$form_key]));
        } else {
            $form_data[$form_key] = null;
        }
    }

    if (!preg_match("/^[A-Za-zÄÁÀÂäáàâÖÓÒÔöóòôÜÚÙÛüúùûéèêíìîß]{3,25}$/", $form_data['Vorname'])) {
        $form_errors['Vorname'] = '<div class="error">Bitte geben Sie Ihren Vornamen ein.</div>';
    }

    if (!preg_match("/^[A-Za-zÄÁÀÂäáàâÖÓÒÔöóòôÜÚÙÛüúùûéèêíìîß]{3,25}$/", $form_data['Nachname'])) {
        $form_errors['Nachname'] = '<div class="error">Bitte geben Sie Ihren Nachnamen ein.</div>';
    }

    if (!preg_match("/^([A-Za-zÄÁÀÂäáàâÖÓÒÔöóòôÜÚÙÛüúùûéèêíìîß\s\-]{3,50})+([\s])+([0-9]{1,10})+([A-Za-zÄÁÀÂäáàâÖÓÒÔöóòôÜÚÙÛüúùûéèêíìîß\s\-0-9]{0,20})$/", $form_data['Strasse'])) {
        $form_errors['Strasse'] = '<div class="error">Bitte geben eine Stra&szlig;e mit Hausnummer ein.</div>';
    }

    if (!preg_match("/^([0]{1}[1-9]{1}|[1-9]{1}[0-9]{1})[0-9]{3}$/", $form_data['PLZ'])) {
        $form_errors['PLZ'] = '<div class="error">Bitte geben Sie eine g&uuml;ltige Postleitzahl ein.</div>';
    }

    if (!preg_match("/^[A-Za-zÄÁÀÂäáàâÖÓÒÔöóòôÜÚÙÛüúùûéèêíìîß]{3,25}$/", $form_data['Ort'])) {
        $form_errors['Ort'] = '<div class="error">Bitte geben Sie Ihren Ort ein.</div>';
    }

    if (!preg_match("/^((\+|00)[1-9]\d{0,3}|0 ?[1-9]|\(00? ?[1-9][\d ]*\))[\d\-\/\s]*$/", $form_data['Telefonnummer'])) {
        $form_errors['Telefonnummer'] = '<div class="error">Die Telefonnummer darf nur aus den Zeichen +,-,/ &quot;Leerzeichen&quot; und 0 bis 9 bestehen.</div>';
    }

    if (!preg_match("/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,7}|[0-9]{1,3})(\]?)$/", $form_data['Email']) && !filter_var($form_data['Email'], FILTER_VALIDATE_EMAIL)) {
        $form_errors['Email'] = '<div class="error">Bitte geben Sie eine g&uuml;ltige E-Mail Adresse ein.</div>';
    } else {
        $form_data['Email'] = filter_var($form_data['Email'], FILTER_VALIDATE_EMAIL);
    }

    if ($form_data['Fahrzeug'] == '') {
        $form_errors['Fahrzeug'] = '<div class="error">Bitte geben Sie ein Fahrzeug an.</div>';
    }

    if (!preg_match("/^[0-9]{4}$/", $form_data['HSN']) /*and $form_data['hsn'] != ''*/) {
        $form_errors['HSN'] = '<div class="error">Die HSN darf nur aus Zahlen bestehen.</div>';
    }
    if (!preg_match("/^[A-Z]{3}$|[0-9]{3}$/", $form_data['TSN']) /*and $form_data['tsn'] != ''*/) {
        $form_errors['TSN'] = '<div class="error">Die TSN darf entweder nur aus Zahlen oder nur aus Buchstaben bestehen.</div>';
    }
    if (!preg_match("/(^(((0[1-9]|[12][0-8])([\/]|[\.]|[\-])(0[1-9]|1[012]))|((29|30|31)([\/]|[\.]|[\-])(0[13578]|1[02]))|((29|30)([\/]|[\.]|[\-])(0[4,6,9]|11)))([\/]|[\.]|[\-])(19|[2-9][0-9])\d\d$)|(^29([\/]|[\.]|[\-])02([\/]|[\.]|[\-])(19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)/", $form_data['Baujahr'])/* and $form_data['ezl'] != ''*/) {
        $form_errors['Baujahr'] = '<div class="error">Das Datum des Baujahrs ist falsch, es muss wiefolgt aussehen TT.MM.JJJJ</div>';
    } elseif($_SERVER['REQUEST_TIME']<strtotime($form_data['Baujahr'])) {
        $form_errors['Baujahr'] = '<div class="error">Das Auto gibts noch gar nicht, bitte ändern.</div>';
    }

    if (!isset($form_data['Service']) and empty($form_data['Service'])){
        $form_errors['Service'] = '<div class="error">Bitte w&auml;hlen Sie eine Option.</div>';
    }

    if (!isset($form_data['Versicherung']) and empty($form_data['Versicherung'])){
        $form_errors['Versicherung'] = '<div class="error">Bitte w&auml;hlen Sie eine Option.</div>';
    }

    if (!preg_match("/(^(((0[1-9]|[12][0-8])([\/]|[\.]|[\-])(0[1-9]|1[012]))|((29|30|31)([\/]|[\.]|[\-])(0[13578]|1[02]))|((29|30)([\/]|[\.]|[\-])(0[4,6,9]|11)))([\/]|[\.]|[\-])(19|[2-9][0-9])\d\d$)|(^29([\/]|[\.]|[\-])02([\/]|[\.]|[\-])(19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)/", $form_data['Terminwunsch'])/* and $form_data['ezl'] != ''*/) {
        $form_errors['Terminwunsch'] = '<div class="error">Das Datum des Terminwunsches ist falsch, es muss wiefolgt aussehen TT.MM.JJJJ</div>';
    } elseif($_SERVER['REQUEST_TIME']>strtotime($form_data['Terminwunsch'])) {
        $form_errors['Terminwunsch'] = '<div class="error">Das Datum liegt in der Vergangenheit,  so schnell gehts leider nicht.</div>';
    }
    if($form_data['UhrzeitTerminwunsch'] == ''){
        $form_errors['UhrzeitTerminwunsch'] = '<div class="error">Bitte geben Sie eine Uhrzeit zu Ihrem Terminwunsch ein..</div>';
    }

    if ($form_data['Nachricht'] == '') {
        $form_errors['Nachricht'] = '<div class="error">Bitte geben Sie eine Nachricht ein.</div>';
    }


    if(empty($form_errors)) {
        $subject = 'Formular von '      . $form_data['Vorname']       . " " . $form_data['Nachname'];
        $message .= 'Vorname: '         . $form_data['Vorname']       . "\n";
        $message .= 'Nachname: '        . $form_data['Nachname']      . "\n";
        $message .= 'Straße: '          . $form_data['Strasse']       . "\n";
        $message .= 'PLZ: '             . $form_data['PLZ']           . "\n";
        $message .= 'Ort: '             . $form_data['Ort']           . "\n";
        $message .= 'Telefonnummer: '   . $form_data['Telefonnummer'] . "\n";
        $message .= 'E-Mail: '          . $form_data['Email']         . "\n";
        $message .= 'Fahrzeug: '        . $form_data['Fahrzeug']      . "\n";
        $message .= 'HSN: '             . $form_data['HSN']           . "\n";
        $message .= 'TSN: '             . $form_data['TSN']           . "\n";
        $message .= 'Baujahr: '         . $form_data['Baujahr']       . "\n";
        $message .= 'Service: '         . $form_data['Service']       . "\n";
        $message .= 'Versicherung: '    . $form_data['Versicherung']  . "\n";
        $message .= 'Terminwunsch: '    . $form_data['Terminwunsch']  . "\n";
        $message .= 'Uhrzeit: '    . $form_data['UhrzeitTerminwunsch']. "\n";
        $message .= 'Nachricht: '       . $form_data['Nachricht']     . "\n";
        mail($mail_address, $subject, $message, "From: " . $form_data['Email'] . "\r\nReply-To: " . $form_data['Email']);
        mail($form_data['Email'], "Ihre Anfrage bei Automotify Autoglas", "Hallo " . $form_data['Vorname'] . " " . $form_data['Nachname'] . ",\n\nvielen Dank für Ihre Nachricht.\nWir haben Ihre Anfrage erhalten und werden Ihr Anliegen umgehend bearbeiten!\n\nMit freundlichen Grüßen\n\nIhr Kundenservice\nAutomotify Autoglas \nwww.automotify.de\nTelefon: (030) 89998-217\nMobil: (0172) 1980175", "From: " . $mail_address . "\r\nReply-To: " . $mail_address);
        $form_data = array();
    }
}
?>
<!doctype html>
<html lang="de">

<head>

	<title>Termin vereinbaren :: Automotify Autoglas</title>

	<meta charset="utf-8">
	<meta name="viewport"                   content="width=device-width, initial-scale=1">
    <meta name="Author"                     content="Automotify Autoglas">
    <meta name="Title"                      content="Termine :: Automotify Autoglas">
    <meta name="Description"                content="Automotify Autoglas ist Ihr Partner im Glasschadenfall. Autoglas-Neueinbau für Frontscheiben, Seitenscheiben und Heckscheiben. Ob Sie teilkaskoversichert sind oder nur ein Haftpflichtschutz besteht, wir haben immer einen fairen Preis für Sie.">
    <meta name="Keywords"       lang="de"   content="Autoglas, Autoscheibe, Windschutzscheibe, kaputt, neu, Frontscheibe, Seitenscheibe, Türscheibe, Heckscheibe, Splitter, Glasbruch, geplatz, Steinschlag, Reparatur, Reperatur, Einbau, Austausch, Wechsel, Schaden, Totalschaden, Riss, Abplatzer, Punkt, Sichtfeld, Werkstatt, Autoglaser">
    <meta name="Keywords"       lang="en"   content="Autoglass, Lite, Repair, Rear, Side, Door, window, windshield, windscreen, crack, chip, resin, installation, mobile, contact, carglass, car, front, window, glass, service">
	<meta name="Robots"                     content="index,follow">
	<link rel="stylesheet"  media="screen" href="css/basic_styles.css">
	<link rel="stylesheet" 	media="screen" href="css/desktop.css">
	<link rel="stylesheet" 	media="screen" href="css/login.css">
	<!--//
	<link rel="stylesheet" 	media="screen and (max-width: 480px)" 							href="css/smartphone.css">
	<link rel="stylesheet" 	media="screen and (min-width: 481px) and (max-width: 767px)" 	href="css/tablet.css">
	<link rel="stylesheet" 	media="screen and (min-width: 768px)" 							href="css/desktop.css">
	<link rel="stylesheet" 	media="screen and (min-width: 768px)" 							href="css/login.css">
	//-->
	<link rel="Shortcut Icon" 	                        href="favicon.ico">
	<link rel="Icon"            type="image/ico" 		href="favicon.ico">
	<link rel="image_src"                               href="img/automotify-autoglas-logo.png">
	<link rel="canonical"                               href="#">
	<script type="text/javascript" src="js/script.js"></script>
</head>

<body>

<header>
	<div id="LOGO" title="Automotify Autoglas" onclick="location='http://www.glashub.de'"></div>

	<nav id="sitenav">
		<ul>
			<li onclick="location='service.html'"><a href="service.html">Service</a></li><li onclick="location='termin.php'"><a href="termin.php">Termin vereinbaren!</a></li><li onclick="location='kontakt.html'"><a href="kontakt.html">Kontakt</a></li>
		</ul>
	</nav>
</header>
<main>
	<article>
        <h1>Vereinbaren Sie jetzt einen Termin mit uns:</h1>
        <form id="TERMIN" method="post">

            <fieldset class="kunde"><legend>Kundendetails:</legend>

				<label for="Vorname" class="left">Vorname:</label>
				<input type="text" name="Vorname" placeholder="Vorname" required="required" id="Vorname" class="textfields" maxlength="25" value="<?php echo $form_data['Vorname']; ?>">
                <?php echo $form_errors['Vorname']; ?>
                <br style="clear:left;">

				<label for="Nachname" class="left">Nachname:</label>
				<input type="text" name="Nachname" placeholder="Nachname"  required="required" id="Nachname" class="textfields" maxlength="25" value="<?php echo $form_data['Nachname']; ?>">
                <?php echo $form_errors['Nachname']; ?>
                <br style="clear:left;">

				<label for="Strasse" class="left">Stra&szlig;e / Nr:</label>
				<input type="text" name="Strasse" placeholder="Stra&szlig;e und Hausnummer" required="required" id="Strasse" class="textfields" maxlength="25" value="<?php echo $form_data['Strasse']; ?>">
                <?php echo $form_errors['Strasse']; ?>
                <br style="clear:left;">

				<label for="PLZ" class="left">Postleitzahl:</label>
				<input type="text" name="PLZ" placeholder="Postleitzahl" required="required" id="PLZ" class="textfields" maxlength="5" value="<?php echo $form_data['PLZ']; ?>">
                <?php echo $form_errors['PLZ']; ?>
                <br style="clear:left;">

				<label for="Ort" class="left">Ort:</label>
				<input type="text" name="Ort" placeholder="Ort" required="required" id="Ort" class="textfields" maxlength="25" value="<?php echo $form_data['Ort']; ?>">
                <?php echo $form_errors['Ort']; ?>
                <br style="clear:left;">

				<label for="Telefonnummer" class="left">Telefon:</label>
				<input type="tel" name="Telefonnummer" placeholder="Telefonnummer" required="required" id="Telefonnummer" class="textfields" maxlength="50" value="<?php echo $form_data['Telefonnummer']; ?>">
                <?php echo $form_errors['Telefonnummer']; ?>
                <br style="clear:left;">

				<label for="Email" class="left">E-Mail:</label>
				<input type="email" name="Email" placeholder="E-Mail-Adresse" required="required" id="Email" class="textfields" maxlength="100" value="<?php echo $form_data['Email']; ?>">
                <?php echo $form_errors['Email']; ?>
			</fieldset>

			<fieldset class="auto"><legend>Autodetails:</legend>

				<label for="Fahrzeug" class="left">Fahrzeug:</label>
				<input type="text" name="Fahrzeug" placeholder="z.B.: VW Passat Variant" required="required" id="Fahrzeug" class="textfields"  maxlength="100" value="<?php echo $form_data['Fahrzeug']; ?>">
                <?php echo $form_errors['Fahrzeug']; ?>
                <br style="clear:left;">

				<label for="HSN" class="left">HSN (2.1):</label>
				<input type="text" name="HSN" placeholder="4-Stellig (nur Zahlen)" required="required" id="HSN" class="textfields" maxlength="4" value="<?php echo $form_data['HSN']; ?>">
                <?php echo $form_errors['HSN']; ?>
                <br style="clear:left;">

				<label for="TSN" class="left">TSN (2.2):</label>
				<input type="text" name="TSN" placeholder="erste 3 Stellen (entw. nur Zahlen oder nur Buchstaben)" required="required" id="TSN" class="textfields" maxlength="3" value="<?php echo $form_data['TSN']; ?>">
                <?php echo $form_errors['TSN']; ?>
                <br style="clear:left;">

				<label for="Baujahr" class="left">Baujahr:</label>
				<input type="date" name="Baujahr" id="Baujahr" required="required" class="textfields"  maxlength="10" value="<?php echo $form_data['Baujahr']; ?>">
                <?php echo $form_errors['Baujahr']; ?>
                <br style="clear:left;">

				<label for="Service" class="left">Service:</label>
			    <div style="display: table-cell;" id="Service">
                    <input type="radio" name="Service" value="Scheibenwechsel"      id="Scheibenwechsel"     <?php if ($form_data['Service'] == 'Scheibenwechsel')       {echo ' checked="checked"';} ?>><label for="Scheibenwechsel"    >Scheibenwechsel</label><br>
                    <input type="radio" name="Service" value="Steinschlagreparatur" id="Steinshlagreparatur" <?php if ($form_data['Service'] == 'Steinschlagreparatur')  {echo ' checked="checked"';} ?>><label for="Steinshlagreparatur">Steinschlagreparatur</label>
                </div>
                <?php echo $form_errors['Service']; ?>
                <br style="clear:left;">

				<label for="Versicherung" class="left">Versicherungsumfang:</label>
                <div style="display: table-cell;" id="Versicherung">
                    <input type="radio" name="Versicherung" value="Teilkasko"   id="Teilkasko"   <?php if ($form_data['Versicherung'] == 'Teilkasko')            {echo ' checked="checked"';} ?>><label for="Teilkasko">Teilkasko</label</lable><br>
                    <input type="radio" name="Versicherung" value="Haftpflicht" id="Haftpflicht" <?php if ($form_data['Versicherung'] == 'Haftpflicht')          {echo ' checked="checked"';} ?>><label for="Haftpflicht">Haftpflicht</label>
                </div>
                <?php echo $form_errors['Versicherung']; ?>
                <br style="clear:left;">

                <label for="Terminwunsch" class="left">Terminwunsch:</label>
                <input type="date" name="Terminwunsch" id="Terminwunsch" required="required" class="textfields"  maxlength="10" value="<?php echo $form_data['Terminwunsch']; ?>">
                <?php echo $form_errors['Terminwunsch']; ?>
                <br style="clear:left;">

                <label for="UhrzeitTerminwunsch" class="left">Uhrzeit (Terminwunsch):</label>
                <input type="text" name="UhrzeitTerminwunsch" id="UhrzeitTerminwunsch" required="required" class="textfields"  maxlength="10" value="<?php echo $form_data['UhrzeitTerminwunsch']; ?>">
                <?php echo $form_errors['UhrzeitTerminwunsch']; ?>
                <br style="clear:left;">

				<label for="Nachricht" class="left">Ihre Nachricht:</label>
				<textarea name="Nachricht" id="Nachricht" required="required" cols="50" rows="15" maxlength="10000" wrap="hard" placeholder="Ihre Nachricht"><?php echo $form_data['Nachricht']; ?></textarea>
                <?php echo $form_errors['Nachricht']; ?>
			</fieldset>


				<input  type="submit" value=" Los! " name="submit">

        </form>

	</article>
</main>
<footer>
	<h1>Hotline: (030) 89998-217</h1>
</footer>

</body>

</html>
