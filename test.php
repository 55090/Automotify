<!DOCTYPE html>
<html lang="de">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Automotify Autoglas :: Ihr Partner für Autoglas</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/agency.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body id="page-top">
<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">Automotify Autoglas</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<section id="contactForm">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">Vereinbaren Sie jetzt Ihren Termin</h2>
                    </div>
                </div>

<?php
session_start();
$admin_email = 'info@glashub.de';
if (array_key_exists('submit', $_POST)) {

    $form_keys = array(
        'tDat',  //topic
        'gtDat', //glass_type
        'pDat',  //position SSR
        'itDat', //insurance_type
        'iDat',  //insurance
        'vDat',  //vehicle
        'aDat',  //appointment
        'cDat',  //kunde
        'mDat',  //message
        'topic',
        'chip_position',
        'glass_type',
        'first_name',
        'last_name',
        'street',
        'zip',
        'city',
        'phone',
        'email',
        'vehicle',
        'registry_date',
        'hsn',
        'tsn',
        'insurance_type',
        'insurance_company',
        'insurance_number',
        'insurance_deductible',
        'appointment_date',
        'appointment_time',
        'message'
    );

    $form_errors = array();

    foreach ($form_keys as $form_key) {
        if (array_key_exists($form_key, $_POST)) {
            $_SESSION[$form_key] = trim(strip_tags($_POST[$form_key]));
        } elseif (!isset($_SESSION[$form_key])) {
            $_SESSION[$form_key] = null;
        }
    }

    if (($_SESSION['first_name'] != null) and ($_SESSION['first_name'] != '') and (!preg_match("/^[A-Za-zÄÁÀÂäáàâÖÓÒÔöóòôÜÚÙÛüúùûéèêíìîß]{3,25}$/", $_SESSION['first_name']))) {
        $form_errors['first_name'] = '<div class="formerror">Bitte geben Sie Ihren Vornamen ein.</div>';
    }

    if (($_SESSION['last_name'] != null) and (!preg_match("/^[A-Za-zÄÁÀÂäáàâÖÓÒÔöóòôÜÚÙÛüúùûéèêíìîß]{3,25}$/", $_SESSION['last_name']))) {
        $form_errors['last_name'] = '<div class="formerror">Bitte geben Sie Ihren Nachnamen ein.</div>';
    }

    if (($_SESSION['street'] != null) and ($_SESSION['street'] != '') and (!preg_match("/^([A-Za-zÄÁÀÂäáàâÖÓÒÔöóòôÜÚÙÛüúùûéèêíìîß\s\-]{3,50})+([\s])+([0-9]{1,10})+([A-Za-zÄÁÀÂäáàâÖÓÒÔöóòôÜÚÙÛüúùûéèêíìîß\s\-0-9]{0,20})$/", $_SESSION['street']))) {
        $form_errors['street'] = '<div class="formerror">Bitte geben eine Stra&szlig;e mit Hausnummer ein.</div>';
    }

    if (($_SESSION['zip'] != null) and (!preg_match("/^([0]{1}[1-9]{1}|[1-9]{1}[0-9]{1})[0-9]{3}$/", $_SESSION['zip']))) {
        $form_errors['zip'] = '<div class="formerror">Bitte geben Sie eine g&uuml;ltige Postleitzahl ein.</div>';
    }

    if (($_SESSION['city'] != null) and (!preg_match("/^[A-Za-zÄÁÀÂäáàâÖÓÒÔöóòôÜÚÙÛüúùûéèêíìîß]{3,25}$/", $_SESSION['city']))) {
        $form_errors['city'] = '<div class="formerror">Bitte geben Sie Ihren Ort ein.</div>';
    }

    if (($_SESSION['phone'] != null) and ($_SESSION['phone'] != '') and (!preg_match("/^((\+|00)[1-9]\d{0,3}|0 ?[1-9]|\(00? ?[1-9][\d ]*\))[\d\-\/\s]*$/", $_SESSION['phone']))) {
        $form_errors['phone'] = '<div class="formerror">Die Telefonnummer darf nur aus den Zeichen +,-,/ &quot;Leerzeichen&quot; und 0 bis 9 bestehen.</div>';
    }

    if ($_SESSION['email'] != null) {
        if ((!preg_match("/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,7}|[0-9]{1,3})(\]?)$/", $_SESSION['email'])) && (!filter_var($_SESSION['email'], FILTER_VALIDATE_EMAIL))) {
            $form_errors['email'] = '<div class="formerror">Bitte geben Sie eine g&uuml;ltige E-Mail Adresse ein.</div>';
        } else {
            $_SESSION['email'] = filter_var($_SESSION['email'], FILTER_VALIDATE_EMAIL);
        }
    }

    if (($_SESSION['vehicle'] != null) and ($_SESSION['vehicle'] == '')) {
        $form_errors['vehicle'] = '<div class="formerror">Bitte geben Sie ein Fahrzeug an.</div>';
    }

    if (($_SESSION['hsn'] != null) and (!preg_match("/^[0-9]{4}$/", $_SESSION['hsn']))) {
        $form_errors['hsn'] = '<div class="formerror">Die HSN darf nur aus Zahlen bestehen.</div>';
    }
    if (($_SESSION['tsn'] != null) and (!preg_match("/^[A-Z]{3}$|[0-9]{3}$/", $_SESSION['tsn']))) {
        $form_errors['tsn'] = '<div class="error">Die TSN darf entweder nur aus Zahlen oder nur aus Buchstaben bestehen.</div>';
    }
    if ($_SESSION['registry_date'] != null) {
        if (!preg_match("/^\d{1,2}[\.|\-|\/]{1}\d{1,2}[\.|\-|\/]{1}(\d{2}|\d{4})$/", $_SESSION['registry_date'])) {
            $form_errors['registry_date'] = '<div class="formerror">Das Datum des Baujahrs ist falsch, es muss wiefolgt aussehen TT.MM.JJJJ</div>';
        } elseif ($_SERVER['REQUEST_TIME'] < strtotime($_SESSION['registry_date'])) {
            $form_errors['registry_date'] = '<div class="formerror">Das Auto gibt\'s noch gar nicht, bitte ändern.</div>';
        }
    }

    if (($_SESSION['topic'] != null) and (!isset($_SESSION['topic'])) and (empty($_SESSION['topic']))) {
        $form_errors['topic'] = '<div class="formerror">Bitte w&auml;hlen Sie eine Option.</div>';
    }

    if (($_SESSION['glass_type'] != null) and (!isset($_SESSION['glass_type'])) and (empty($_SESSION['glass_type']))) {
        $form_errors['glass_type'] = '<div class="formerror">Bitte w&auml;hlen Sie die besch&auml;digte Scheibe aus.</div>';
    }

    if (($_SESSION['chip_position'] != null) and (!isset($_SESSION['chip_position'])) and (empty($_SESSION['chip_position']))) {
        $form_errors['chip_position'] = '<div class="formerror">Bitte w&auml;hlen Sie die Schadensposition aus.</div>';
    }

    if (($_SESSION['insurance_type'] != null) and (!isset($_SESSION['insurance_type'])) and (empty($_SESSION['insurance_type']))) {
        $form_errors['insurance_type'] = '<div class="formerror">Bitte w&auml;hlen Sie eine Option.</div>';
    }

    if (($_SESSION['insurance_company'] != null) and ($_SESSION['insurance_company'] == '')) {
        $form_errors['insurance_company'] = '<div class="formerror">Bitte geben Sie Ihre Versicherungsgesellschaft an.</div>';
    }

    if (($_SESSION['insurance_number'] != null) and ($_SESSION['insurance_number'] == '')) {
        $form_errors['insurance_number'] = '<div class="formerror">Bitte geben Sie Ihre Versicherungsnummer an.</div>';
    }
    $deductibles = array('0',
        '75',
        '150',
        '250',
        '300',
        '500',
        '1000',
        'weiss nicht'
    );
    if (($_SESSION['insurance_deductible'] != null) and ((is_null($_SESSION['insurance_deductible'])) or (!in_array($_SESSION['insurance_deductible'], $deductibles)))) {
        $form_errors['insurance_deductible'] = '<div class="error">Bitte w&auml;hlen Sie die H&ouml;he Ihrer Selbstbeteiligung aus.</div>';
    }

    if ($_SESSION['appointment_date'] != null) {
        if (!preg_match("/^\d{1,2}[\.|\-|\/]{1}\d{1,2}[\.|\-|\/]{1}(\d{2}|\d{4})$/", $_SESSION['appointment_date'])) {
            $form_errors['appointment_date'] = '<div class="formerror">Das Datum des Terminwunsches ist falsch, es muss wiefolgt aussehen TT.MM.JJJJ</div>';
        } elseif ($_SERVER['REQUEST_TIME'] > strtotime($_SESSION['appointment_date'])) {
            $form_errors['appointment_date'] = '<div class="formerror">Das Datum liegt in der Vergangenheit, so schnell gehts leider nicht.</div>';
        }
    }

    if (($_SESSION['appointment_time'] != null) and ($_SESSION['appointment_time'] == '')) {
        $form_errors['appointment_time'] = '<div class="formerror">Bitte geben Sie eine Uhrzeit zu Ihrem Terminwunsch ein..</div>';
    }

    if (($_SESSION['message'] != null) and ($_SESSION['message'] == '')) {
        $form_errors['message'] = '<div class="formerror">Bitte geben Sie eine Nachricht ein.</div>';
    }

    if (empty($form_errors) and ($_SESSION['message'] != '') and ($_SESSION['message'] != null)) {
        $subject = 'Formular von ' . $_SESSION['first_name'] . " " . $_SESSION['last_name'];
        $message .= 'Vorname: ' . $_SESSION['first_name'] . "\n";
        $message .= 'Nachname: ' . $_SESSION['last_name'] . "\n";
        $message .= 'Straße: ' . $_SESSION['street'] . "\n";
        $message .= 'PLZ: ' . $_SESSION['zip'] . "\n";
        $message .= 'Ort: ' . $_SESSION['city'] . "\n";
        $message .= 'Telefonnummer: ' . $_SESSION['phone'] . "\n";
        $message .= 'E-Mail: ' . $_SESSION['email'] . "\n";
        $message .= 'Fahrzeug: ' . $_SESSION['vehicle'] . "\n";
        $message .= 'HSN: ' . $_SESSION['hsn'] . "\n";
        $message .= 'TSN: ' . $_SESSION['tsn'] . "\n";
        $message .= 'Baujahr: ' . $_SESSION['registry_date'] . "\n";
        $message .= 'Anfrage-Typ: ' . $_SESSION['topic'] . "\n";
        $message .= 'Fahrzeugscheibe (Tausch): ' . $_SESSION['glass_type'] . "\n";
        $message .= 'Schadensposition (Reparatur): ' . $_SESSION['chip_position'] . "\n";
        $message .= 'Versicherung-Typ: ' . $_SESSION['insurance_type'] . "\n";
        $message .= 'Versicherung-Gesellschaft: ' . $_SESSION['insurance_company'] . "\n";
        $message .= 'Versicherungsnummer: ' . $_SESSION['insurance_number'] . "\n";
        $message .= 'Selbstbeteiligung: ' . $_SESSION['insurance_deductible'] . "\n";
        $message .= 'Terminwunsch: ' . $_SESSION['appointment_date'] . "\n";
        $message .= 'Uhrzeit: ' . $_SESSION['appointment_time'] . "\n";
        $message .= 'Nachricht: ' . $_SESSION['message'] . "\n";
        mail($admin_email, $subject, $message, "From: " . $_SESSION['email'] . "\r\nReply-To: " . $_SESSION['email']);
        mail($_SESSION['email'], "Ihre Anfrage bei Automotify Autoglas",
            "Hallo " . $_SESSION['first_name'] . " " . $_SESSION['last_name'] . ",\n"
            . "\n"
            . "vielen Dank f&uuml;r Ihre Nachricht.\n"
            . "Wir haben Ihre Anfrage erhalten und werden Ihr Anliegen umgehend bearbeiten!\n"
            . "\n"
            . "Mit freundlichen Gr&uuml;&szlig;en\n"
            . "\n"
            . "Ihr Kundenservice\n"
            . "Automotify Autoglas\n"
            . "www.automotify.de\n"
            . "Telefon: (030) 89998-217\n"
            . "Mobil: (0172) 1980175\n"
            . "https://www.facebook.com/automotify.autoglas\n"
            . "\n"
            . "\n"
            . "------------------------------------"
            . "Ihre, zur Bearbeitung Ihrer Anfrage, &uuml;bermittelten Daten:"
            . $message
            . "------------------------------------",
            "From: " . $admin_email . "\r\nReply-To: " . $admin_email);
        $_SESSION = array();
        session_destroy();
        echo "Vielen Dank, Ihre Nachricht wurde erfolgreich versendet!";
    }
}

        if(     $_SESSION['tDat'] ==null
            and $_SESSION['gtDat']==null
            and $_SESSION['pDat'] ==null
            and $_SESSION['itDat']==null
            and $_SESSION['iDat'] ==null
            and $_SESSION['vDat'] ==null
            and $_SESSION['aDat'] ==null
            and $_SESSION['cDat'] ==null
            and $_SESSION['mDat'] ==null){
            echo include 'mail/topic.php';
            //echo include 'mail/varTest.php';
        }

        if(     $_SESSION['tDat'] !=null
            and $_SESSION['gtDat']==null
            and $_SESSION['pDat'] ==null
            and $_SESSION['itDat']==null
            and $_SESSION['iDat'] ==null
            and $_SESSION['vDat'] ==null
            and $_SESSION['aDat'] ==null
            and $_SESSION['cDat'] ==null
            and $_SESSION['mDat'] ==null) {

            if ($_SESSION['topic'] == "Scheibenaustausch") {
                echo include 'mail/glass_type.php';
                //echo include 'mail/varTest.php';
            }
            if ($_SESSION['topic'] == "Steinschlagreparatur") {
                echo include 'mail/chip_position.php';
                //echo include 'mail/varTest.php';
            }
            if ($_SESSION['topic'] == "Kurzanfrage") {
                echo include 'mail/customer_data.php';
                //echo include 'mail/varTest.php';
            }
            if ($_SESSION['topic'] == "Scheinwerferrestauration") {
                echo include 'mail/vehicle_data.php';
                //echo include 'mail/varTest.php';
            }
        }
        if(     $_SESSION['tDat'] !=null and ($_SESSION['gtDat']!=null or $_SESSION['pDat'] !=null)
            and $_SESSION['itDat']==null
            and $_SESSION['iDat'] ==null
            and $_SESSION['vDat'] ==null
            and $_SESSION['aDat'] ==null
            and $_SESSION['cDat'] ==null
            and $_SESSION['mDat'] ==null) {
            echo include 'mail/insurance_type.php';
            // echo include 'mail/varTest.php';
        }
        if(     $_SESSION['tDat'] !=null and ($_SESSION['gtDat']!=null or $_SESSION['pDat'] !=null) and $_SESSION['itDat']!=null and $_SESSION['insurance_type']=="Teilkasko"
            and $_SESSION['iDat'] ==null
            and $_SESSION['vDat'] ==null
            and $_SESSION['aDat'] ==null
            and $_SESSION['cDat'] ==null
            and $_SESSION['mDat'] ==null) {
            echo include 'mail/insurance_data.php';
            //echo include 'mail/varTest.php';
        }

        if(     $_SESSION['tDat'] !=null and ($_SESSION['gtDat']!=null or $_SESSION['pDat'] !=null)
            and $_SESSION['itDat']!=null
            and (($_SESSION['insurance_type']=="Haftpflicht" and $_SESSION['iDat']==null) or ($_SESSION['insurance_type']=="Teilkasko" and $_SESSION['iDat']!=null))
            and $_SESSION['vDat'] ==null
            and $_SESSION['aDat'] ==null
            and $_SESSION['cDat'] ==null
            and $_SESSION['mDat'] ==null) {
            echo include 'mail/vehicle_data.php';
            //echo include 'mail/varTest.php';
        }
        if(($_SESSION['tDat']!=null and $_SESSION['vDat']!=null and $_SESSION['topic']=="Scheinwerferrestauration")
        or ($_SESSION['tDat'] !=null
       and ($_SESSION['gtDat']!=null or $_SESSION['pDat'] !=null)
        and $_SESSION['itDat']!=null
        and $_SESSION['iDat'] !=null
        and $_SESSION['vDat'] !=null
        and $_SESSION['aDat'] ==null
        and $_SESSION['cDat'] ==null
        and $_SESSION['mDat'] ==null)){
            echo include 'mail/appointment_data.php';
            //echo include 'mail/varTest.php';
        }
        if((($_SESSION['tDat']!=null and   $_SESSION['vDat']!=null and $_SESSION['topic']=="Scheinwerferrestauration")
         or ($_SESSION['tDat'] !=null and ($_SESSION['gtDat']!=null or $_SESSION['pDat'] !=null) and $_SESSION['itDat']!=null and $_SESSION['iDat'] !=null)
         and $_SESSION['vDat'] !=null
         and $_SESSION['aDat'] !=null
         and $_SESSION['cDat'] ==null
         and $_SESSION['mDat'] ==null)){
            echo include 'mail/customer_data.php';
            //echo include 'mail/varTest.php';
        }
        if($_SESSION['cDat']!=null ){
            echo include 'mail/message_data.php';
            //echo include 'mail/varTest.php';
        }
        /*if($_SESSION['mDat']!=null){
            echo include 'mail/confirm_page.php';
           // echo include 'mail/varTest.php';
        }*/
?>
            </div>
        </div>
    </div>
</section>
<!--[ENDE CONTACT-SECTION]-->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>


<!-- Plugin JavaScript -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="js/classie.js"></script>
<script src="js/cbpAnimatedHeader.js"></script>

<!-- Contact Form JavaScript -->
<script src="js/validateFormSep.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/agency.js"></script>
</body>
</html>