<form role="form" id="TOPIC" method="post">
    <div class="row">
        <div class="col-lg-12"><h3>Welche Scheibe muss getauscht werden?</h3>
            <div class="form-group row">
                <div class="col-md-6">
                    <input checked="checked" class="hidden" type="radio" name="gtDat" value="done">
                    <div class="radio">
                        <label><input <?php if ($_SESSION['glass_type'] == 'Windschutzscheibe') {echo ' checked="checked"';} ?> type="radio" name="glass_type" value="Windschutzscheibe">Windschutzscheibe</label>
                    </div>
                    <div class="radio">
                        <label><input <?php if ($_SESSION['glass_type'] == 'Heckscheibe')       {echo ' checked="checked"';} ?> type="radio" name="glass_type" value="Heckscheibe">Heckscheibe</label><br>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="radio">
                        <label><input <?php if ($_SESSION['glass_type'] == 'Seitenscheibe Fahrerseite vorne')     {echo ' checked="checked"';} ?> type="radio" name="glass_type" value="Seitenscheibe Fahrerseite vorne">Seitenscheibe Fahrerseite vorne</label><br>
                    </div>
                    <div class="radio">
                        <label><input <?php if ($_SESSION['glass_type'] == 'Seitenscheibe Beifahrerseite vorne')  {echo ' checked="checked"';} ?> type="radio" name="glass_type" value="Seitenscheibe Beifahrerseite vorne">Seitenscheibe Beifahrerseite vorne</label>
                    </div>
                    <div class="radio">
                        <label><input <?php if ($_SESSION['glass_type'] == 'Seitenscheibe Fahrerseite hinten')    {echo ' checked="checked"';} ?> type="radio" name="glass_type" value="Seitenscheibe Fahrerseite hinten">Seitenscheibe Fahrerseite hinten</label>
                    </div>
                    <div class="radio">
                        <label><input <?php if ($_SESSION['glass_type'] == 'Seitenscheibe Beifahrerseite hinten') {echo ' checked="checked"';} ?> type="radio" name="glass_type" value="Seitenscheibe Beifahrerseite hinten">Seitenscheibe Beifahrerseite hinten</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <?php echo $form_errors['glass_type']; ?>
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