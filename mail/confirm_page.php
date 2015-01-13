<form role="form" id="TOPIC" method="post">
    <div class="row">
        <div class="col-lg-12"><h3>Übersicht?</h3>
            <div class="row">
                <div class="col-lg-12">
                    <?php
                    if($_SESSION['cDat']!=null){
                        echo "<div class=\"row\"><div class=\"col-lg-6\"><h3>Kontaktdaten:</h3></div></div>"
                            . "<div class=\"row\"><div class=\"col-lg-6\"><h4>Vorname, Name:</h4></div><div class=\"col-lg-6\"><p>".$_SESSION['first_name']." ".$_SESSION['last_name']."</p></div></div>"
                            . "<div class=\"row\"><div class=\"col-lg-6\"><h4>Stra&szlig;e, Nr.:</h4></div><div class=\"col-lg-6\"><p>".$_SESSION['street']."</p></div></div>"
                            . "<div class=\"row\"><div class=\"col-lg-6\"><h4>PLZ, Ort:</h4></div><div class=\"col-lg-6\"><p>".$_SESSION['zip']." ".$_SESSION['city']."</p></div></div>"
                            . "<div class=\"row\"><div class=\"col-lg-6\"><h4>Telefonnummer:</h4></div><div class=\"col-lg-6\"><p>".$_SESSION['phone']."</p></div></div>"
                            . "<div class=\"row\"><div class=\"col-lg-6\"><h4>E-Mail-Adresse:</h4></div><div class=\"col-lg-6\"><p>".$_SESSION['email']."</p></div></div>";
                    }
                    if($_SESSION['tDat']!=null){
                        echo "<div class=\"row\"><div class=\"col-lg-6\"><h4>Anfrage-Typ:</h4></div><div class=\"col-lg-6\"><p>".$_SESSION['topic']."</p></div></div>";
                    }
                    if($_SESSION['gtDat']!=null){
                        echo "<div class=\"row\"><div class=\"col-lg-6\"><h4>Austausch:</h4></div><div class=\"col-lg-6\"><p>".$_SESSION['glass_type']."</p></div></div>";
                    }

                    if($_SESSION['pDat']!=null){
                        echo "<div class=\"row\"><div class=\"col-lg-6\"><h4>Schadensposition:</h4></div><div class=\"col-lg-6\"><p>".$_SESSION['chip_position']."</p></div></div>";
                    }

                    if($_SESSION['itDat']!=null){
                        echo "<div class=\"row\"><div class=\"col-lg-6\"><h4>Versicherungstyp:</h4></div><div class=\"col-lg-6\"><p>".$_SESSION['insurance_type']."</p></div></div>";
                    }
                    if($_SESSION['iDat']!=null){
                        echo "<div class=\"row\"><div class=\"col-lg-6\"><h3>Versicherungsdaten:</h3></div></div>"
                            . "<div class=\"row\"><div class=\"col-lg-6\"><h4>Gesellschaft:</h4></div><div class=\"col-lg-6\"><p>".$_SESSION['insurance_company']."</p></div></div>"
                            . "<div class=\"row\"><div class=\"col-lg-6\"><h4>Nummer:</h4></div><div class=\"col-lg-6\"><p>".$_SESSION['insurance_number']."</p></div></div>"
                            . "<div class=\"row\"><div class=\"col-lg-6\"><h4>Selbstbeteiligung:</h4></div><div class=\"col-lg-6\"><p>".$_SESSION['insurance_deductible']."</p></div></div>";
                    }
                    if($_SESSION['vDat']!=null){
                        echo "<div class=\"row\"><div class=\"col-lg-6\"><h3>Fahrzeugdaten:</h3></div></div>"
                            . "<div class=\"row\"><div class=\"col-lg-6\"><h4>Typ:</h4></div><div class=\"col-lg-6\"><p>".$_SESSION['vehicle']."</p></div></div>"
                            . "<div class=\"row\"><div class=\"col-lg-6\"><h4>HSN (2.1):</h4></div><div class=\"col-lg-6\"><p>".$_SESSION['hsn']."</p></div></div>"
                            . "<div class=\"row\"><div class=\"col-lg-6\"><h4>TSN (2.1):</h4></div><div class=\"col-lg-6\"><p>".$_SESSION['tsn']."</p></div></div>"
                            . "<div class=\"row\"><div class=\"col-lg-6\"><h4>Tag der Erstzulassung:</h4></div><div class=\"col-lg-6\"><p>".$_SESSION['registry_date']."</p></div></div>";
                    }
                    if($_SESSION['vDat']!=null){
                        echo "<div class=\"row\"><div class=\"col-lg-6\"><h3>Termindaten:</h3></div></div>"
                            . "<div class=\"row\"><div class=\"col-lg-6\"><h4>Datum:</h4></div><div class=\"col-lg-6\"><p>".$_SESSION['appointment_date']."</p></div></div>"
                            . "<div class=\"row\"><div class=\"col-lg-6\"><h4>Uhrzeit:</h4></div><div class=\"col-lg-6\"><p>".$_SESSION['appointment_time']."</p></div></div>";
                    }
                    if($_SESSION['vDat']!=null){
                        echo "<div class=\"row\"><div class=\"col-lg-6\"><h3>Ihre Nachricht an uns:</h3></div></div>"
                            . "<div class=\"row\"><div class=\"col-lg-6\"><h4>Nachricht:</h4></div><div class=\"col-lg-6\"><p>".$_SESSION['message']."</p></div></div>";
                    }

                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-offset-6 col-xs-6">
                    <button class="btn btn-danger btn-lg"  type="submit" name="submit">Daten jetzt absenden!</button>
                </div>
            </div>
        </div>
    </div>
</form>