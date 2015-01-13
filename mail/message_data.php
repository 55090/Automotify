<form role="form" id="TOPIC" method="post">
    <div class="row">
        <div class="col-lg-12"><h3>Ihre Nachricht an uns?</h3>
            <div class="row">
                <div class="col-md-6">
                    <input checked="checked" class="hidden" type="radio" name="aDat" value="done">
                    <div class="form-group">
                        <label class="control-label">Nachricht:</label>
                        <textarea name="message" class="form-control" required cols="50" rows="15" maxlength="10000" wrap="hard" placeholder="Ihre Nachricht"><?php echo $_SESSION['message']; ?></textarea>
                        <?php echo $form_errors['message']; ?>
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