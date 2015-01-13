<form role="form" id="TOPIC" method="post">
    <div class="row">
        <div class="col-lg-12"><h3>Bitte geben Sie Ihre Fahrzeugdaten ein?</h3>
            <div class="form-group row">
                <div class="col-md-6">
                    <input checked="checked" class="hidden" type="radio" name="aDat" value="done">
                    <div class="form-group">
                        <label class="control-label">Terminwunsch (Datum):</label>
                        <input value="<?php echo $_SESSION['appointment_date']; ?>" name="appointment_date" maxlength="10" type="text" required="required" class="form-control" placeholder="Ihr Terminwunsch (TT.MM.JJJJ)"  />
                        <?php echo $form_errors['appointment_date']; ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Terminwunsch (Uhrzeit):</label>
                        <input value="<?php echo $form_data['appointment_time']; ?>" name="appointment_time" maxlength="50" type="text" required="required" class="form-control" placeholder="Uhrzeit Terminwunsch"  />
                        <?php echo $form_errors['appointment_time']; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-offset-6 col-xs-6">
                    <button class="btn btn-danger btn-lg"  type="submit" name="submit">weiter</button>
                </div>
            </div>
        </div>
    </div>
</form>