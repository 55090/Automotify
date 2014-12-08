<?php

  $mail_address = 'andras@bucsi.com';


  if (array_key_exists('submit', $_POST)) {

    $form_keys = array(
      'grund',
	  'anrede',
      /*'vorname',
      'nachname',*/
	  'name',
      'plz',
      'ort',
      'telefonnummer',
      //'mobilnummer',
      'email',
	  'modell',
	  'type',
	  'hsn',
	  'tsn',
	  //'ezl',
      'nachricht',
	  //'termin'
    );

    $form_data = array();
	$geehrt = '';

    foreach ($form_keys as $form_key) {
		if (array_key_exists($form_key, $_POST)) {
			$form_data[$form_key] = trim(strip_tags($_POST[$form_key]));
		} else {
			$form_data[$form_key] = null;
		}
    }

    $form_errors = array();

	$grund = array(	'Steinschlag auf der Fahrerseite (Frontscheibe)',
						'Steinschlag auf der Beifahrerseite (Frontscheibe)',
						'Riss (Frontscheibe)',
						'Totalschaden (Frontscheibe)',
						'starke Kratzer (Frontscheibe)',
						'Totalschaden (Seitenscheibe)',
						'starke Kratzer (Seitenscheibe)',
						'Totalschaden (Heckscheibe)',
						'starke Kratzer (Heckscheibe)',
						'Riss (Heckscheibe)',
						'Scheibentoenung',
						'Fahrzeugaufbereitung',
						'Nano-Scheibenversiegelung',
						'Scheinwerfer-Restauration',
						'sonstiges'
						);
    if (is_null($form_data['grund']) or !in_array($form_data['grund'], $grund)) {
		$form_errors['grund'] = '<div class="error">Bitte w&auml;hlen Sie eine Option.</div>';
}


$type = array(	'Bus',
'Cabrio',
'Coupe',
'Fliessheck',
'Gelaendewagen',
'Kombi',
'Kompakt',
'Limousine',
'LKW',
'Pick-Up',
'Steilheck',
'SUV',
'Transporter',
'Van',
'sonstiges'
);
if (is_null($form_data['type']) or !in_array($form_data['type'], $type)) {
$form_errors['type'] = '<div class="error">Bitte w&auml;hlen Sie eine Option.</div>';
}

if ($form_data['anrede'] != 'Herr' and $form_data['anrede'] != 'Frau') {
$form_errors['anrede'] = '<div class="error">Bitte w&auml;hlen Sie eine Anrede.</div>';
}
if ($form_data['anrede'] == 'Herr') {
$geehrt ='geehrter';
} else if ($form_data['anrede'] == 'Frau') {
$geehrt ='geehrte';
}
/*
if ($form_data['vorname'] == '') {
$form_errors['vorname'] = '<div class="error">Bitte geben Sie Ihren Vornamen ein.</div>';
}

if ($form_data['nachname'] == '') {
$form_errors['nachname'] = '<div class="error">Bitte geben Sie Ihren Nachnamen ein.</div>';
}*/
if ($form_data['name'] == '') {
$form_errors['name'] = '<div class="error">Bitte geben Sie Ihren Namen ein.</div>';
}

if (!preg_match("/^[0-9]{5}$/", $form_data['plz'])) {
$form_errors['plz'] = '<div class="error">Bitte geben Sie eine g&uuml;ltige Postleitzahl ein.</div>';
}

if ($form_data['ort'] == '') {
$form_errors['ort'] = '<div class="error">Bitte geben Sie Ihren Ort ein.</div>';
}

if (!preg_match("/^[\-\+0-9]+$/", $form_data['telefonnummer'])) {
$form_errors['telefonnummer'] = '<div class="error">Die Telefonnummer darf nur aus den Zeichen +,- und 0 bis 9 bestehen.</div>';
}

/* if (!preg_match("/^[\-\+0-9]+$/", $form_data['mobilnummer']) and $form_data['mobilnummer'] != '') {
$form_errors['mobilnummer'] = '<div class="error">Die Mobilnummer darf nur aus den Zeichen <b>+</b>, <b>-</b> und <b>0 bis 9</b> bestehen.</div>';
}*/

if (!filter_var($form_data['email'], FILTER_VALIDATE_EMAIL)) {
$form_errors['email'] = '<div class="error">Bitte geben Sie eine g&uuml;ltige E-Mail Adresse ein.</div>';
} else {
$form_data['email'] = filter_var($form_data['email'], FILTER_VALIDATE_EMAIL);
}
if ($form_data['modell'] == '') {
$form_errors['modell'] = '<div class="error">Bitte geben Sie ein Fahrzeug an.</div>';
}

if (!preg_match("/^[0-9]{4}$/", $form_data['hsn']) /*and $form_data['hsn'] != ''*/) {
$form_errors['hsn'] = '<div class="error">Die HSN darf nur aus Zahlen bestehen.</div>';
}
if (!preg_match("/^[a-zA-Z]{3}|[0-9]{3}$/", $form_data['tsn']) /*and $form_data['tsn'] != ''*/) {
$form_errors['tsn'] = '<div class="error">Die TSN darf entweder nur aus Zahlen oder nur aus Buchstaben bestehen.</div>';
}
//if (!preg_match("/^\d{2}\.\d{2}\.(\d{2}|\d{4})$/", $form_data['ezl'])/* and $form_data['ezl'] != ''*/) {
//	$form_errors['ezl'] = '<div class="error">Das Baujahr muss wiefolgt aussehen TT.MM.JJJJ</div>';
//}

if ($form_data['nachricht'] == '') {
$form_errors['nachricht'] = '<div class="error">Bitte geben Sie eine Nachricht ein.</div>';
}


if(empty($form_errors)) {
$subject = 'Formular von ' . $form_data['name'];
$message .= 'Anrede: ' . $form_data['anrede'] . "\n";
//$message .= 'Vorname: ' . $form_data['vorname'] . "\n";
//$message .= 'Nachname: ' . $form_data['nachname'] . "\n";
$message .= 'Name: ' . $form_data['name'] . "\n";
$message .= 'PLZ: ' . $form_data['plz'] . "\n";
$message .= 'Ort: ' . $form_data['ort'] . "\n";
$message .= 'Telefonnummer: ' . $form_data['telefonnummer'] . "\n";
//$message .= 'Mobilnummer: ' . $form_data['mobilnummer'] . "\n";
$message .= 'E-Mail: ' . $form_data['email'] . "\n";
$message .= 'Fahrzeug: ' . $form_data['modell'] . "\n";
$message .= 'Aufbau: ' . $form_data['type'] . "\n";
$message .= 'HSN: ' . $form_data['hsn'] . "\n";
$message .= 'TSN: ' . $form_data['tsn'] . "\n";
//$message .= 'Baujahr: ' . $form_data['ezl'] . "\n";
$message .= 'Betreff: ' . $form_data['grund'] . "\n";
$message .= 'Nachricht: ' . $form_data['nachricht'] . "\n";
//$message .= 'Terminwunsch: ' . $form_data['termin'] . "\n";
mail($mail_address, $subject, $message, "From: " . $form_data['email'] . "\r\nReply-To: " . $form_data['email']);
mail($form_data['email'], "Ihre Anfrage bei Automotify Autoglas", "Sehr ".$geehrt." ".$form_data['anrede']." ".$form_data['name']."\n\nvielen Dank für Ihre Nachricht. Wir haben soeben Ihre Anfrage erhalten.\n\nWir werden umgehend Ihr Anliegen bearbeiten!\n\nMit freundlichen Grüßen\n\nAutomotify Autoglas \nwww.meineScheibe.de\nTelefon: (0172) 1980175", "From: " . $mail_address . "\r\nReply-To: " . $mail_address);
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
	<meta name="Author"                     content="youandme">
	<meta name="Title"                      content="">
	<meta name="Description"                content="">
	<meta name="Keywords"       lang="de"   content="">
	<meta name="Keywords"       lang="en"   content="">
	<meta name="Robots"                     content="index,follow">
	<link rel="stylesheet"                              									href="css/basic_styles.css">
	<link rel="stylesheet" 	media="screen and (max-width: 480px)" 							href="css/smartphone.css">
	<link rel="stylesheet" 	media="screen and (min-width: 481px) and (max-width: 767px)" 	href="css/tablet.css">
	<link rel="stylesheet" 	media="screen and (min-width: 768px)" 							href="css/desktop.css">
	<link rel="Stylesheet" 	media="screen"													href="css/form1.css">
	<link rel="Shortcut Icon" 	                        href="favicon.ico">
	<link rel="Icon"            type="image/ico" 		href="favicon.ico">
	<link rel="image_src"                               href="img/automotify-autoglas-logo.png">
	<link rel="canonical"                               href="#">
</head>

<body>

<header>
	<div id="LOGO" title="Automotify Autoglas" onclick="location='http://www.bucsi.com'"></div>
	<nav id="sitenav">
		<ul>
			<li onclick="location='service.html'"><a href="service.html">Service</a></li><li onclick="location='termin.php'"><a href="termin.php">Termin vereinbaren!</a></li><li onclick="location='kontakt.html'"><a href="kontakt.html">Kontakt</a></li>
		</ul>
	</nav>
</header>
<main>
	<article>
	<h1 style="margin-top:50px;">Ihre Anfrage</h1>

	<form method="post" id="Form">
	<div style="float:right;margin-right:40px;"><span>*</span> Pflichtfelder</div>

	<fieldset style="clear:both;">
		<legend><b>Kontaktdetails:</b></legend>
		<div class="caption top">
			<label for="anrede">Anrede:<span>*</span></label>
		</div>
		<div class="input_normal top">
			<select name="anrede" id="anrede" size="1">
				<option disabled="disabled"	<?php if ($form_data['anrede'] != 'Herr' and $form_data['anrede'] != 'Frau') {echo ' selected="selected"';} ?>>bitte ausw&auml;hlen...</option>
				<option value="Herr"		<?php if ($form_data['anrede'] == 'Herr') {echo ' selected="selected"';} ?>>Herr</option>
				<option value="Frau"		<?php if ($form_data['anrede'] == 'Frau') {echo ' selected="selected"';} ?>>Frau</option>
			</select>
		</div>
		<?php echo $form_errors['anrede']; ?>

		<div class="caption">
			<label for="name">Name:<span>*</span></label>
		</div>
		<div class="input_normal">
			<input type="text" name="name" id="name" value="<?php echo $form_data['name']; ?>" maxlength="100">
		</div>
		<?php echo $form_errors['name']; ?>

		<div class="caption">
			<label for="plz">PLZ:<span>*</span></label>
		</div>
		<div class="input_plz">
			<input type="text" name="plz" id="plz" value="<?php echo $form_data['plz']; ?>" maxlength="5">
		</div>
		<div class="caption_ort">
			<label for="ort">Ort:<span>*</span></label>
		</div>
		<div class="input_ort">
			<input type="text" name="ort" id="ort" value="<?php echo $form_data['ort']; ?>" maxlength="100">
		</div>
		<?php echo $form_errors['plz']; ?>
		<?php echo $form_errors['ort']; ?>

		<div class="caption">
			<label for="telefonnummer">Telefon-Nr.:<span>*</span></label>
		</div>
		<div class="input_normal">
			<input type="text" name="telefonnummer" id="telefonnummer" value="<?php echo $form_data['telefonnummer']; ?>" maxlength="100">
		</div>
		<div class="help">
			<a class="tooltip">?
				<span class="wrapper trans rad">
						<span class="inner_head"><b>Telefonnummer</b></span>
						<span class="inner_body">Bitte geben Sie eine Kontaktnummer ein (inkl. Vorwahl). <br>Alternativ Mobilnummer.</span>
				</span>
			</a>
		</div>
		<?php echo $form_errors['telefonnummer']; ?>

		<div class="caption">
			<label for="email">E-Mail:<span>*</span></label>
		</div>
		<div class="input_normal">
			<input type="text" name="email" id="email" value="<?php echo $form_data['email']; ?>" maxlength="100">
		</div>
		<div class="help">
			<a class="tooltip">?
				<span class="wrapper trans rad">
						<span class="inner_head"><b>E-Mail</b></span>
						<span class="inner_body">Bitte geben Sie Ihre E-Mail-Adresse ein. (ohne www.)</span>
				</span>
			</a>
		</div>
		<?php echo $form_errors['email']; ?>
	</fieldset>

	<!-- Fahrzeugdaten -->
	<fieldset>
		<legend><b>Fahrzeugdaten:</b></legend>
		<div class="caption"><label for="modell">Fahrzeughersteller &amp; -modell:<span>*</span></label></div>
		<div class="input_normal"><input type="text" name="modell" id="modell" value="<?php echo $form_data['modell']; ?>" maxlength="100"></div>
		<div class="help">
			<a class="tooltip">?
				<span class="wrapper trans rad">
						<span class="inner_head"><b>Fahrzeughersteller &amp; -modell</b></span>
						<span class="inner_body">Zum Beispiel: <b>VW Golf VI</b></span>
				</span>
			</a>
		</div>
		<?php echo $form_errors['modell']; ?>

		<div class="caption"><label for="type">Fahrzeugaufbau:<span>*</span></label></div>
		<div class="input_normal">
			<select name="type" id="type" size="1">
				<option disabled="disabled" 	<?php if (is_null($form_data['type']) or !in_array($form_data['type'], $type)) {echo ' selected="selected"';} ?>>bitte ausw&auml;hlen...</option>
				<option value="Bus"				<?php if ($form_data['type'] == 'Bus') 			{echo ' selected="selected"';} ?>>Bus</option>
				<option value="Cabrio"			<?php if ($form_data['type'] == 'Cabrio') 		{echo ' selected="selected"';} ?>>Cabrio</option>
				<option value="Coupe"			<?php if ($form_data['type'] == 'Coupe') 		{echo ' selected="selected"';} ?>>Coup&eacute;</option>
				<option value="Fliessheck"		<?php if ($form_data['type'] == 'Fliessheck') 	{echo ' selected="selected"';} ?>>Flie&szlig;heck</option>
				<option value="Gelaendewagen"	<?php if ($form_data['type'] == 'Gelaendewagen'){echo ' selected="selected"';} ?>>Gel&auml;ndewagen</option>
				<option value="Kleinwagen"		<?php if ($form_data['type'] == 'Kleinwagen') 	{echo ' selected="selected"';} ?>>Kleinwagen</option>
				<option value="Kombi"			<?php if ($form_data['type'] == 'Kombi') 		{echo ' selected="selected"';} ?>>Kombi</option>
				<option value="Kompakt"			<?php if ($form_data['type'] == 'Kompakt') 		{echo ' selected="selected"';} ?>>Kompakt</option>
				<option value="Limousine"		<?php if ($form_data['type'] == 'Limousine') 	{echo ' selected="selected"';} ?>>Limousine</option>
				<option value="LKW"				<?php if ($form_data['type'] == 'LKW') 			{echo ' selected="selected"';} ?>>LKW</option>
				<option value="Pick-Up"			<?php if ($form_data['type'] == 'Pick-Up') 		{echo ' selected="selected"';} ?>>Pick-Up</option>
				<option value="Steilheck"		<?php if ($form_data['type'] == 'Steilheck') 	{echo ' selected="selected"';} ?>>Steilheck / Schr&auml;gheck</option>
				<option value="SUV"				<?php if ($form_data['type'] == 'SUV') 			{echo ' selected="selected"';} ?>>SUV</option>
				<option value="Transporter"		<?php if ($form_data['type'] == 'Transporter') 	{echo ' selected="selected"';} ?>>Transporter</option>
				<option value="Van"				<?php if ($form_data['type'] == 'Van') 			{echo ' selected="selected"';} ?>>Van</option>
				<option value="sonstiges"<?php if ($form_data['type'] == 'sonstiges') 			{echo ' selected="selected"';} ?>>sonstiges</option>
			</select>
		</div>
		<div class="help">
			<a class="tooltip">?
				<span class="wrapper trans rad">
						<span class="inner_head"><b>Fahrzeugaufbau</b></span>
						<span class="inner_body">z.B. <b>Limousine</b>, <b>Kombi</b>, <b>Flie&szlig;heck</b>, o.&Auml;.</span>
				</span>
			</a>
		</div>
		<?php echo $form_errors['type']; ?>

		<div class="caption"><label for="hsn">Schl&uuml;ssel-Nr. 2.1 (HSN):<span>*</span></label></div>
		<div class="input_hsn-tsn"><input type="text" name="hsn" id="hsn" value="<?php echo $form_data['hsn']; ?>" maxlength="4"></div>
		<div class="help" style="margin-left:320px;">
			<a class="tooltip">?
				<span class="wrapper trans rad">
						<span class="inner_head"><b>Schl&uuml;ssel-Nr. 2.1 (HSN)</b></span>
						<span class="inner_body">Fahrzeugschein alt:<span class="whitespace">&#9;&#9;</span><b>zu 2)</b><br>Fahrzeugschein neu:<span class="whitespace">&#9;&#9;</span><b>2.1</b></span>
				</span>
			</a>
		</div>
		<?php echo $form_errors['hsn']; ?>

		<div class="caption"><label for="tsn">Schl&uuml;ssel-Nr. 2.2 (TSN):<span>*</span></label></div>
		<div class="input_hsn-tsn"><input type="text" name="tsn" id="tsn" value="<?php echo $form_data['tsn']; ?>" maxlength="3"></div>
		<div class="help" style="margin-left:320px;">
			<a class="tooltip">?
				<span class="wrapper trans rad">
						<span class="inner_head"><b>Schl&uuml;ssel-Nr. 2.2 (TSN)</b></span>
						<span class="inner_body">Fahrzeugschein alt:<span class="whitespace">&#9;&#9;</span><b>zu 3)</b><br>Fahrzeugschein neu:<span class="whitespace">&#9;&#9;</span><b>2.2</b></span>
				</span>
			</a>
		</div>
		<?php echo $form_errors['tsn']; ?>

	</fieldset>


	<fieldset>
		<legend><b>Ihre Nachricht:</b></legend>

		<div class="caption top">
			<label for="grund">Grund der Anfrage:<span>*</span></label>
		</div>
		<div class="input_normal top">
			<select name="grund" id="grund" size="1">
				<option disabled="disabled"	<?php if (is_null($form_data['grund']) or !in_array($form_data['grund'], $grund)) {echo ' selected="selected"';} ?>>bitte ausw&auml;hlen...</option>
				<optgroup label="Schaden an FRONTSCHEIBE">
					<option value="Steinschlag auf der Fahrerseite (Frontscheibe)"		<?php if ($form_data['grund'] == 'Steinschlag auf der Fahrerseite (Frontscheibe)') 		{echo ' selected="selected"';} ?>>Steinschlag auf der Fahrerseite</option>
					<option value="Steinschlag auf der Beifahrerseite (Frontscheibe)"	<?php if ($form_data['grund'] == 'Steinschlag auf der Beifahrerseite (Frontscheibe)') 	{echo ' selected="selected"';} ?>>Steinschlag auf der Beifahrerseite</option>
					<option value="Riss (Frontscheibe)"									<?php if ($form_data['grund'] == 'Riss (Frontscheibe)') 								{echo ' selected="selected"';} ?>>Riss der Windschutzscheibe</option>
					<option value="Totalschaden (Frontscheibe)"							<?php if ($form_data['grund'] == 'Totalschaden (Frontscheibe)') 						{echo ' selected="selected"';} ?>>Totalschaden der Windschutzscheibe</option>
					<option value="starke Kratzer (Frontscheibe)"						<?php if ($form_data['grund'] == 'starke Kratzer (Frontscheibe)') 						{echo ' selected="selected"';} ?>>starke Kratzer auf der Windschutzscheibe</option>
				</optgroup>

				<optgroup label="Schaden an SEITENSCHEIBE">
					<option value="Totalschaden (Seitenscheibe)"	<?php if ($form_data['grund'] == 'Totalschaden (Seitenscheibe)') 	{echo ' selected="selected"';} ?>>Totalschaden (Seitenscheibe)</option>
					<option value="starke Kratzer (Seitenscheibe)"	<?php if ($form_data['grund'] == 'starke Kratzer (Seitenscheibe)') 	{echo ' selected="selected"';} ?>>starke Kratzer (Seitenscheibe)</option>
				</optgroup>

				<optgroup label="Schaden an HECKSCHEIBE">
					<option value="Totalschaden (Heckscheibe)"		<?php if ($form_data['grund'] == 'Totalschaden (Heckscheibe)') 		{echo ' selected="selected"';} ?>>Totalschaden (Heckscheibe)</option>
					<option value="starke Kratzer (Heckscheibe)"	<?php if ($form_data['grund'] == 'starke Kratzer (Heckscheibe)')	{echo ' selected="selected"';} ?>>starke Kratzer (Heckscheibe)</option>
				</optgroup>

				<optgroup label="weitere Dienstleistungen">
					<option value="Scheibentoenung"					<?php if ($form_data['grund'] == 'Scheibentoenung') 				{echo ' selected="selected"';} ?>>Scheibent&ouml;nung</option>
					<option value="Fahrzeugaufbereitung"			<?php if ($form_data['grund'] == 'Fahrzeugaufbereitung') 			{echo ' selected="selected"';} ?>>Fahrzeugaufbereitung</option>
					<option value="Nano-Scheibenversiegelung"		<?php if ($form_data['grund'] == 'Nano-Scheibenversiegelung') 		{echo ' selected="selected"';} ?>>Nano-Scheibenversiegelung</option>
					<option value="Scheinwerfer-Restauration"		<?php if ($form_data['grund'] == 'Scheinwerfer-Restauration') 		{echo ' selected="selected"';} ?>>Scheinwerfer-Restauration</option>
					<option value="sonstiges"						<?php if ($form_data['grund'] == 'sonstiges') 						{echo ' selected="selected"';} ?>>sonstiger Wunsch</option>
				</optgroup>
			</select>
		</div>
		<div class="help top">
			<a class="tooltip">?
				<span class="wrapper trans rad">
						<span class="inner_head"><b>Grund der Anfrage</b></span>
						<span class="inner_body">Bitte wählen Sie aus.</span>
				</span>
			</a>
		</div>
		<?php echo $form_errors['grund']; ?>

		<div class="caption top bottom">
			<label for="nachricht">Nachricht:<span>*</span></label>
		</div>
		<div class="input_normal top bottom">
			<textarea name="nachricht" id="nachricht" value="<?php echo $form_data['nachricht']; ?>" rows="30" cols="30"></textarea>
		</div>
		<div class="help top">
			<a class="tooltip">?
				<span class="wrapper trans rad">
						<span class="inner_head"><b>Ihre Nachricht</b></span>
						<span class="inner_body">Erl&auml;utern Sie kurz Ihr Anliegen.<br>ggf. weitere W&uuml;nsche</span>
				</span>
			</a>
		</div>
		<?php echo $form_errors['nachricht']; ?>

	</fieldset>

	<div class="input_send top bottom"><input class="submit rad3" type="submit" name="submit" value=" Absenden "></div>
	<div class="input_discard top bottom"><input class="reset rad3" type="reset" name="reset" value=" Verwerfen "></div><br>


	</form>
	</article>
</main>
<footer>
	<h1>Hotline: 0800 - 80 00 00 6</h1>
</footer>

</body>

</html>
