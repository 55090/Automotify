<?php
session_start();
$verhalten = 0;

$name1 ='bla';


if(!isset($_SESSION["username"]) and !isset($_GET["page"])) {
    $verhalten=0;
}
if(isset($_GET["page"]) == "log") {

    $user = strtolower($_POST["user"]);
    $password = md5($_POST["password"]);



    $verbindung = mysql_connect("localhost", "root", "bujaka")
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
if($control != 0) {
$_SESSION["username"] = $user;  //Adminnamen festlegen!
$verhalten = 1;
} else{
$verhalten = 2;
}
    mysql_close($verbindung);
}


    $vorname = htmlspecialchars($_POST["vorname"]);
    $nachname = htmlspecialchars($_POST["nachname"]);
    $strasse = htmlspecialchars($_POST["strasse"]);
    $ort = htmlspecialchars($_POST["ort"]);
    $telnr = htmlspecialchars($_POST["telnr"]);
    $email = htmlspecialchars($_POST["email"]);
    $fahrzeug = htmlspecialchars($_POST["fahrzeug"]);
    $baujahr = htmlspecialchars($_POST["baujahr"]);
    $nachricht = htmlspecialchars($_POST["nachricht"]);

    echo "Tschakaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
    $verbindung1 = mysql_connect("localhost", "root", "") or die ("Fehler im System");
    mysql_select_db("php")                                     or die ("Verbindung zur Datenbank war nicht möglich");
    $terminEintragen = "INSERT INTO termine(v_name, n_name, strasse, ort , telnr, email, fahrzeug, baujahr, nachricht) VALUES ('$vorname', '$nachname', '$strasse', '$ort', '$telnr', '$email', '$fahrzeug' , '$baujahr', '$nachricht')";
    $eintragen = mysql_query($terminEintragen);
    mysql_close($verbindung1);

?>
<!DOCTYPE html>
<html lang="de">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Automotify Autoglas :: Ihr Partner i</title>

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
    <?php
    if($verhalten == 1) {
        ?>
        <meta http-equiv="refresh" content="3; URL=seite2.php" />
    <?php
    }
    ?>
</head>

<body id="page-top" class="index">

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
                <a class="navbar-brand page-scroll" href="#page-top">Automotify Autoglas</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Service</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">Über</a>
                    </li>
					<li>
						<a class="page-scroll" href="#team">Das Team</a>
					</li>
                    <li>
                        <a class="page-scroll" href="#contact">Kontakt</a>
                    </li>
					<li>
						<a  href="#LogInPopUp" data-toggle="modal">Login</a></li
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Willkommen bei Automotify Autoglas!</div>
                <div class="intro-heading">Schön, dass Sie da sind!</div>
                <a href="#services" class="page-scroll btn btn-xl">Und hier geht's los!</a>
            </div>
        </div>
    </header>

    <!-- Services Section -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Service</h2>
                    <h3 class="section-subheading text-muted">Was können wir für Sie tun?.</h3>
                </div>
            </div>
			<div class="row text-center">
				<div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-wrench fa-stack-1x fa-inverse"></i>
                    </span>
					<h4 class="service-heading">kostenlose<sup>*</sup> Steinschlagrepratur</h4>
					<p class="text-muted"><sup>*</sup> bei entsprechender Teilkaskoversicherung ist die Reparatur von Steinschlägen kostenfrei und dauert nur 30 Minuten.</p>
				</div>
				<div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa  fa-car fa-stack-1x fa-inverse"></i>
                    </span>
					<h4 class="service-heading">Autoglas-Neueinbau</h4>
					<p class="text-muted">Scheibenaustausch für Frontscheiben, Seitenscheiben, und Heckscheiben.<br>Service in 2 Stunden.</p>
				</div>
				<div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-hand-o-right fa-stack-1x fa-inverse"></i>
                    </span>
					<h4 class="service-heading">Direkte Versicherungsabwicklung</h4>
					<p class="text-muted">Im Schadenfall übernehmen wir gern die komplette Abwicklung mit Ihrer Versicherung.</p>
				</div>
			</div>

			<div class="row text-center">
				<div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-truck fa-stack-1x fa-inverse"></i>
                    </span>
					<h4 class="service-heading">mobiler Autoglas-Service</h4>
					<p class="text-muted">Im Ballungsraum Berlin sind der mobile Autoglas-Service und der Hol-Bring-Dienst für Sie kostenfrei. (nur bei Autoglas-Neueinbau)</p>
				</div>
				<div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa   fa-circle fa-stack-1x fa-inverse"></i>
                    </span>
					<h4 class="service-heading">Scheinwerfer Restauration</h4>
					<p class="text-muted">Matte und verschlissene Scheinwerfer erstrahlen wieder im neuen Glanz.<br>Service in 1 bis 2 Stunden.</br></p>
				</div>
				<div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa  fa-euro fa-stack-1x fa-inverse"></i>
                    </span>
					<h4 class="service-heading">Autoglashandel</h4>
					<p class="text-muted">Ob Seitenscheibe, Heckscheibe oder Windschutzscheibe, wir haben kurzfristigen Zugriff auf fast jede Scheibe.</p>
				</div>
			</div>
        </div>
    </section>


    <!-- About Section -->
    <section id="about" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Über Automotify Autoglas</h2>
                    <h3 class="section-subheading text-muted">Wie es begann...</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/1.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>2003-2006</h4>
                                    <h4 class="subheading">Start in das Autoglasgeschäft.</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">2003 haben wir mit Steinschlagreparatur-Systemen den Einstieg in die Branche gewagt.</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/2.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>2006</h4>
                                    <h4 class="subheading">Weiterbildungen zum Autoglas-Monteur</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Nach erfolgreichen Jahren im Autoglas-Reparatur-Geschäft wollten wir unseren Kunden auch den Neueinbau aus eigener Hand anbieten.</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/3.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>Juni 2007</h4>
                                    <h4 class="subheading">Angebotserweiterung</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Nach erfolgreicher Weiterbildung und genügend Praxis haben wir unseren Kunden den Autoglas-Neueinbau anbieten können.</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/4.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>2007 - heute</h4>
                                    <h4 class="subheading">Erfolgreiche Etablierung im Autoglas-Geschäft.</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Der Service bla bla bla</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <h4>Werden Sie
                                    <br>Teil der
                                    <br>Geschichte!</h4>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section id="team">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Das Team</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="img/team/1.jpg" class="img-responsive img-circle" alt="">
                        <h4>Der Monteur</h4>
                        <p class="text-muted">Kompetenzen:<br>Autoglas-Neueinbau, Autoglas-Reparatur, Scheinwerfer-Restaurierung</p>
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="img/team/2.jpg" class="img-responsive img-circle" alt="">
                        <h4>Der Werbetreibende</h4>
                        <p class="text-muted">Kompetenzen:<br>
						Social Media, Web Development, SEO, Testing</p>
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="img/team/3.jpg" class="img-responsive img-circle" alt="">
                        <h4>Die Tipse</h4>
                        <p class="text-muted">Kompetenzen:<br>
							Buchhaltung, Terminierung, Lagerverwaltung</p>
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <p class="large text-muted">Was Sie auch wünschen, wir sind stets bestrebt Ihnen den bestmöglichen Service zu bieten.</p>
                </div>
            </div>
        </div>
    </section>

	<section id="contact">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2 class="section-heading"><a  href="#contactForm" data-toggle="modal" id="contactActivation">Vereinbaren Sie jetzt Ihren Termin</a></h2>
				</div>
			</div>
		</div>
	</section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; Your Website 2014</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="mailto:info@glashub.de?subject=Feedback"><i class="fa fa-envelope"></i></a>
                        </li>
                        <li><a href="https://www.facebook.com/automotify.autoglas/" target="_blank"><i class="fa fa-facebook"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Privacy Policy</a>
                        </li>
                        <li><a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

	<!--[Login Start]-->
	<div class="portfolio-modal modal fade" id="LogInPopUp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Login</h2>
							<form role="form" action="index.php?page=log" method="post">
								<div class="form-group">
									<label class="control-label">Username:</label>
									<input maxlength="50" type="text"  class="form-control" name="user" placeholder="Username" />
								</div>
								<div class="form-group">
									<label class="control-label">Password:</label>
									<input maxlength="50" type="text"  class="form-control" name="password" placeholder="Password" />
								</div>
								
								 
								<button class="btn btn-danger btn-lg pull-right" type="submit" value="Einloggen">Login</button>
							</form>
							<p><a href="register.php">Noch nicht dabei? Jetzt registrieren...</a></p>
                            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Abbrechen</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!--[Login Ende]-->


	<!--[Contact Form Start]-->
	<div class="portfolio-modal modal fade" id="contactForm" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="modal-body">
								<div class="row">
									<div class="col-lg-12 text-center">
										<h2 class="section-heading">Vereinbaren Sie jetzt Ihren Termin</h2>
									</div>
								</div>

								<div class="container">
									<div class="stepwizard">
										<div class="stepwizard-row setup-panel">
											<div class="stepwizard-step">
												<a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
												<p>Kontaktdetails</p>
											</div>
											<div class="stepwizard-step">
												<a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
												<p>Fahrzeugdetails</p>
											</div>
											<div class="stepwizard-step">
												<a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
												<p>Service</p>
											</div>
											<div class="stepwizard-step">
												<a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
												<p>Nachricht</p>
											</div>
										</div>
									</div>
									<form role="form" method="post">
										<div class="row setup-content" id="step-1">
											<div class="col-xs-12"><h3> Ihre persönlichen Daten</h3>
												<div class="col-md-6">

													<div class="form-group">
														<label class="control-label">Vorname</label>
														<input name="vorname" id="vorname" maxlength="50" type="text"  class="form-control" placeholder="Vorname"  />
													</div>
													<div class="form-group">
														<label class="control-label">Nachname</label>
														<input name="nachname" id="nachname" maxlength="50" type="text"  class="form-control" placeholder="Nachname" />
													</div>
													<div class="form-group">
														<label class="control-label">Straße / Nr :</label>
														<input name="strasse" id="strasse" maxlength="50" type="text" class="form-control" placeholder="Straße und Hausnummer"  />
													</div>
													<div class="form-group">
														<label class="control-label">Postleitzahl</label>
														<input name="plz" id="plz" maxlength="50" type="text" class="form-control" placeholder="Postleitzahl"  />
													</div>
													<div class="form-group">
														<label class="control-label">Ort</label>
														<input name="ort" id="ort" maxlength="50" type="text"  class="form-control" placeholder="Ort"  />
													</div>
												</div>
												<div class="col-md-6">

													<div class="form-group">
														<label class="control-label">Telefonnummer</label>
														<input name="telefon" id="telefon" maxlength="50" type="tel" class="form-control" placeholder="Telefonnummer"  />
													</div>
													<div class="form-group">
														<label class="control-label">E-Mail-Adresse </label>
														<input name="email" id="email" maxlength="50" type="email" class="form-control" placeholder="E-Mail-Adresse" />
													</div>
													<button class="btn btn-danger nextBtn btn-lg pull-right" type="button" >Weiter</button>
												</div>
											</div></div>

										<div class="row setup-content" id="step-2">
											<div class="col-xs-12"> <h3>technische Informationen zu Ihrem Auto</h3>
												<div class="col-md-6">

													<div class="form-group">
														<label class="control-label">Fahrzeug:</label>
														<input name="fahrzeug" id="fahrzeug" maxlength="50" type="text"  class="form-control" placeholder="z.B.: VW Passat Variant" />
													</div>
													<div class="form-group">
														<label class="control-label">HSN (2.1):</label>
														<input name="hsn" id="hsn" maxlength="50" type="number" class="form-control" placeholder="4-Stellig (nur Zahlen)"  />
													</div></div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">TSN (2.2)</label>
														<input name="tsn" id="tsn" maxlength="50" type="text" class="form-control" placeholder="erste 3 Stellen (entw. nur Zahlen oder nur Buchstaben)" />
													</div>
													<div class="form-group">
														<label class="control-label">Tag der Erstzulassung:</label>
														<input name="baujahr" id="baujahr" maxlength="50" type="date" class="form-control" placeholder="Tag der Erstzulassung / Baujahr (TT.MM.JJJJ)"  />
													</div>
													<button class="btn btn-danger nextBtn btn-lg pull-right" type="button" >Weiter</button>
												</div>
											</div>
										</div>

										<div class="row setup-content" id="step-3">
											<div class="col-xs-12"> <h3>Servicewunsch</h3>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Service:</label>
														<div class="radio">
															<label><input type="radio" name="service" id="service_scheibenwechsel" value="Scheibenwechsel">Scheibenwechsel</label>
														</div>
														<div class="radio">
															<label><input type="radio" name="service" id="service_steinschlagreparatur" value="Steinschlagreparatur">Steinschlagreparatur</label><br>
														</div>
														<div class="radio">
															<label><input type="radio" name="service" id="service_scheinwerfer" value="Scheinwerfer">Scheinwerfer-Restauration</label>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Versicherungsumfang:</label>
														<div class="radio">
															<label><input type="radio" name="versicherung" id="versicherung_teilkasko" value="Teilkasko">Teilkasko</label>
														</div>
														<div class="radio">
															<label><input type="radio" name="versicherung" id="versicherung_haftpflicht" value="Haftpflicht">Haftpflicht</label>
														</div>
													</div>
													<button class="btn btn-danger nextBtn btn-lg pull-right" type="button" >Weiter</button>
												</div>
											</div>
										</div>

										<div class="row setup-content" id="step-4">
											<div class="col-xs-12"> <h3>Ihre Nachricht an uns</h3>
												<div class="form-group">
													<label class="control-label">Nachricht:</label>
													<textarea name="nachricht" id="Nachricht" class="form-control" required cols="50" rows="15" maxlength="10000" wrap="hard" placeholder="Ihre Nachricht"></textarea>
												</div>

												<button class="btn btn-danger btn-lg pull-right" type="submit">Anfrage absenden</button>
											</div>
										</div>
									</form>
								</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!--[Contact Form Ende]-->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/validateForm.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/agency.js"></script>

</body>

</html>
