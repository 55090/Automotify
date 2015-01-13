<form role="form" id="TOPIC" method="post">
    <div class="row">
        <div class="col-lg-12"><h3>Bitte geben Sie Ihre Fahrzeugdaten ein?</h3>
            <div class="row">
                <div class="col-md-6">
                    <input checked="checked" class="hidden" type="radio" name="vDat" value="done">
                    <div class="form-group">
                        <label class="control-label">Fahrzeug:</label>
                        <input value="<?php echo $_SESSION['vehicle']; ?>" name="vehicle" maxlength="50" type="text"  class="form-control" placeholder="z.B.: VW Passat Variant" required />
                        <?php echo $form_errors['vehicle']; ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label">HSN (2.1):</label>
                        <input value="<?php echo $_SESSION['hsn']; ?>" name="hsn" maxlength="4" type="text" class="form-control" placeholder="4-Stellig (nur Zahlen)"  />
                        <?php echo $form_errors['hsn']; ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">TSN (2.2)</label>
                        <input value="<?php echo $_SESSION['tsn']; ?>" name="tsn" maxlength="3" type="text" class="form-control" placeholder="erste 3 Stellen (entw. nur Zahlen oder nur Buchstaben)" />
                        <?php echo $form_errors['tsn']; ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Tag der Erstzulassung:</label>
                        <input value="<?php echo $_SESSION['registry_date']; ?>" name="registry_date" maxlength="10" type="text" required="required" class="form-control" placeholder="Tag der Erstzulassung / Baujahr (TT.MM.JJJJ)"  />
                        <?php echo $form_errors['registry_date']; ?>
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