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
    <label for="cod_magazin" class="form-label">cod_magazin</label>
    <input type="text" class="form-control" name="cod_magazin" value="<?php echo $cod_magazin ?>">
  </div>

  <div class="form-group">
    <label for="nume" class="form-label">nume</label>
    <input type="text" class="form-control" name="nume" value="<?php echo $nume ?>">
  </div>

  <div class="form-group">
    <label for="prenume" class="form-label">prenume</label>
    <input type="text" class="form-control" name="prenume" value="<?php echo $prenume ?>">
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

  <div class="form-group">
    <label for="salariu" class="form-label">salariu</label>
    <input type="number" class="form-control" name="salariu" value="<?php echo $salariu ?>">
  </div>

  <div class="form-group">
    <label for="nr_telefon" class="form-label">nr_telefon</label>
    <input type="text" class="form-control" name="nr_telefon" value="<?php echo $nr_telefon ?>">
  </div>

  <div class="form-group">
    <label for="email" class="form-label">email</label>
    <input type="text" class="form-control" name="email" value="<?php echo $email ?>">
  </div>

    <button type="submit" class="btn btn-success">Confirmare</button>
    <a href="angajat.php" class="btn btn-primary">Înapoi</a>

</form>