<!-- Afisarea erorilor intr-un camp separat -->

<?php if (!empty($erori)): ?>
    <div class="alert alert-danger">
      <?php foreach ($erori as $eroare): ?>
        <div><?php echo $eroare ?></div>
      <?php endforeach; ?>
    </div>
<?php endif; ?>

<!-- Formularul / Campurile in care userul introduce datele cerute -->
<form method="post" enctype="multipart/form-data"> 
  <div class="form-group">
    <label for="nume" class="form-label">Nume</label>
    <input type="text" class="form-control" name="nume" value="<?php echo $nume ?>">
  </div>

  <div class="form-group">
    <label for="prenume" class="form-label">Prenume</label>
    <input type="text" class="form-control" name="prenume" value="<?php echo $prenume ?>">
  </div>

  <div class="form-group">
    <label for="nr_telefon" class="form-label">Nr_Telefon</label>
    <input type="text" class="form-control" name="nr_telefon" value="<?php echo $nr_telefon ?>">
  </div>

  <div class="form-group">
    <label for="adresa" class="form-label">Adresa</label>
    <input type="text" class="form-control" name="adresa" value="<?php echo $adresa ?>">
  </div>

  <div class="form-group">
    <label for="oras" class="form-label">Oras</label>
    <input type="text" class="form-control" name="oras" value="<?php echo $oras ?>">
  </div>

  <div class="form-group">
    <label for="email" class="form-label">Email</label>
    <input type="text" class="form-control" name="email" value="<?php echo $email ?>">
  </div>

  <div class="form-group">
  <label for="sex" class="form-label">Sex</label>
  <br>
  <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="sex" value="m">
  <label class="form-check-label" for="masculin">M</label>
  </div>

<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="sex" value="f">
  <label class="form-check-label" for="feminin">F</label>
</div>
</div>

    <button type="submit" class="btn btn-success">Confirmare</button>
    <a href="client.php" class="btn btn-primary">Înapoi</a>

</form>
