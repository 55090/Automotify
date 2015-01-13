<form role="form" id="TOPIC" method="post">
    <div class="row">
        <div class="col-lg-12"><h3>Worum geht es?</h3>
            <div class="form-group">
                <input checked="checked" class="hidden" type="radio" name="tDat" value="done">
                <div class="radio">
                    <label><input <?php if ($_SESSION['topic'] == 'Scheibenaustausch') {echo ' checked="checked"';} ?> type="radio" name="topic" value="Scheibenaustausch">Scheibenwechsel</label>
                </div>
                <div class="radio">
                    <label><input <?php if ($_SESSION['topic'] == 'Steinschlagreparatur') {echo ' checked="checked"';} ?> type="radio" name="topic" value="Steinschlagreparatur">Steinschlagreparatur</label><br>
                </div>

                <div class="radio">
                    <label><input <?php if ($_SESSION['topic'] == 'Scheinwerferrestauration') {echo ' checked="checked"';} ?> type="radio" name="topic" value="Scheinwerferrestauration">Scheinwerfer-Restauration</label>
                </div>
                <div class="radio">
                    <label><input <?php if ($_SESSION['topic'] == 'Kurzanfrage') {echo ' checked="checked"';} ?> type="radio" name="topic" value="Kurzanfrage">Kurzanfrage</label>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <?php echo $form_errors['topic']; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-offset-6">
            <button class="btn btn-danger btn-lg"  type="submit" name="submit">weiter</button>
        </div>
    </div>
</form>