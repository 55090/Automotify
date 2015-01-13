<form role="form" id="TOPIC" method="post">
    <div class="row">
        <div class="col-lg-12"><h3>An welcher Stelle befindet sich der Steinschlag?</h3>
            <div class="form-group row">
                <div class="col-xs-4">
                    <input checked="checked" class="hidden" type="radio" name="pDat" value="done">
                    <div class="radio">
                        <label><input <?php if ($_SESSION['chip_position'] == 'Beifahrerseite') {echo ' checked="checked"';} ?> type="radio" name="chip_position" value="Beifahrerseite">Beifahrerseite</label>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="radio">
                        <label><input <?php if ($_SESSION['chip_position'] == 'Fahrerseite') {echo ' checked="checked"';} ?> type="radio" name="chip_position" value="Fahrerseite">Fahrerseite</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <?php echo $form_errors['chip_position']; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-offset-6 col-xs-6">
                    <button class="btn btn-danger btn-lg" type="submit" name="submit">weiter</button>
                </div>
            </div>
        </div>
    </div>
</form>