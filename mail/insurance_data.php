<form role="form" id="TOPIC" method="post">
    <div class="row">
        <div class="col-lg-12"><h3>Bitte geben Sie Ihre Versicherungsdaten ein?</h3>
            <div class="form-group row">
                <div class="col-md-6">
                    <input checked="checked" class="hidden" type="radio" name="iDat" value="done">
                    <div class="form-group">
                        <label class="control-label">Versicherungsgesellschaft:</label>
                        <input value="<?php echo $form_data['insurance_company']; ?>" name="insurance_company" maxlength="50" type="text" required="required" class="form-control" placeholder="Ihre Teilkaskoversicherung z.B. Allianz Versicherung"  />
                        <?php echo $form_errors['insurance_company']; ?>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Versicherungsnummer:</label>
                        <input value="<?php echo $form_data['insurance_number']; ?>" name="insurance_number" maxlength="50" type="text" required="required" class="form-control" placeholder="Versicherungsnummer hier eingeben"  />
                        <?php echo $form_errors['insurance_number']; ?>
                    </div>

                    <div class="form-group">
                        <label class="control-label">H&ouml;he der Selbstbeteiligung (Teilkasko):</label>
                        <select name="insurance_deductible" size="1">
                            <option disabled="disabled"<?php if (is_null($_SESSION['insurance_deductible']) or !in_array($_SESSION['insurance_deductible'], $deductible)) {echo ' selected="selected"';} ?>>bitte ausw&auml;hlen...</option>
                            <option value="0"           <?php if ($_SESSION['insurance_deductible'] ==    '0') {echo ' selected="selected"';} ?>>0,00 &euro;</option>
                            <option value="75"          <?php if ($_SESSION['insurance_deductible'] ==   '75') {echo ' selected="selected"';} ?>>75,00 &euro;</option>
                            <option value="150"         <?php if ($_SESSION['insurance_deductible'] ==  '150') {echo ' selected="selected"';} ?>>150,00 &euro;</option>
                            <option value="250"         <?php if ($_SESSION['insurance_deductible'] ==  '250') {echo ' selected="selected"';} ?>>250,00 &euro;</option>
                            <option value="300"         <?php if ($_SESSION['insurance_deductible'] ==  '300') {echo ' selected="selected"';} ?>>300,00 &euro;</option>
                            <option value="500"         <?php if ($_SESSION['insurance_deductible'] ==  '500') {echo ' selected="selected"';} ?>>500,00 &euro;</option>
                            <option value="1000"        <?php if ($_SESSION['insurance_deductible'] == '1000') {echo ' selected="selected"';} ?>>1000,00 &euro;</option>
                            <option value="weiss nicht" <?php if ($_SESSION['insurance_deductible'] == 'weiss nicht') {echo ' selected="selected"';} ?>>wei&szlig; nicht</option>
                        </select>
                        <?php echo $form_errors['insurance_deductible']; ?>
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