<form role="form" id="TOPIC" method="post">
    <div class="row">
        <div class="col-lg-12"><h3>Bitte geben Sie Ihre Kontaktdaten ein?</h3>
            <div class="row">
                <div class="col-md-6">
                    <input checked="checked" class="hidden" type="radio" name="cDat" value="done">
                    <div class="form-group">
                        <label class="control-label">Vorname</label>
                        <input value="<?php echo $_SESSION['first_name']; ?>" name="first_name" maxlength="50" type="text" class="form-control" placeholder="Vorname" />
                        <?php echo $form_errors['first_name']; ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Nachname</label>
                        <input value="<?php echo $_SESSION['last_name']; ?>" name="last_name" maxlength="50" type="text"  class="form-control" placeholder="Nachname" required />
                        <?php echo $form_errors['last_name']; ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Straße / Nr :</label>
                        <input value="<?php echo $_SESSION['street']; ?>" name="street" maxlength="50" type="text" class="form-control" placeholder="Straße und Hausnummer"  />
                        <?php echo $form_errors['street']; ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Postleitzahl</label>
                        <input value="<?php echo $_SESSION['zip']; ?>" name="zip" maxlength="5" type="text" class="form-control" placeholder="Postleitzahl" required />
                        <?php echo $form_errors['zip']; ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Ort</label>
                        <input value="<?php echo $_SESSION['city']; ?>" name="city" maxlength="50" type="text"  class="form-control" placeholder="Ort" required />
                        <?php echo $form_errors['city']; ?>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="form-group">
                        <label class="control-label">Telefonnummer</label>
                        <input value="<?php echo $_SESSION['phone']; ?>" name="phone" maxlength="20" type="text" required class="form-control" placeholder="Telefonnummer"  />
                        <?php echo $form_errors['phone']; ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label">E-Mail-Adresse </label>
                        <input value="<?php echo $_SESSION['email']; ?>" name="email" maxlength="50" type="email" class="form-control" placeholder="E-Mail-Adresse" required />
                        <?php echo $form_errors['email']; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-offset-6 col-lg-6">
                    <button class="btn btn-danger btn-lg"  type="submit" name="submit">weiter</button>
                </div>
            </div>
        </div>
    </div>
</form>