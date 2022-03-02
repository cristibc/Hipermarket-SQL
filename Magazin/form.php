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
    <label for="nume" class="form-label">nume</label>
    <input type="text" class="form-control" name="nume" value="<?php echo $nume ?>">
  </div>

  <div class="form-group">
    <label for="oras" class="form-label">oras</label>
    <input type="text" class="form-control" name="oras" value="<?php echo $oras ?>">
  </div>

  <div class="form-group">
    <label for="strada" class="form-label">strada</label>
    <input type="text" class="form-control" name="strada" value="<?php echo $strada ?>">
  </div>

  <div class="form-group">
    <label for="nr_telefon" class="form-label">nr_telefon</label>
    <input type="text" class="form-control" name="nr_telefon" value="<?php echo $nr_telefon ?>">
  </div>

    <button type="submit" class="btn btn-success">Confirmare</button>
    <a href="magazin.php" class="btn btn-primary">Înapoi</a>

</form>

