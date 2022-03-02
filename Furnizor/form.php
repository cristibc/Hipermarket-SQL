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
    <label for="nume_companie" class="form-label">Numele Companiei</label>
    <input type="text" class="form-control" name="nume_companie" value="<?php echo $nume_companie ?>">
  </div>

  <div class="form-group">
    <label for="nr_telefon" class="form-label">Numarul de telefon</label>
    <input type="text" class="form-control" name="nr_telefon" value="<?php echo $nr_telefon ?>">
  </div>

  <div class="form-group">
    <label for="nume_reprezentant" class="form-label">Nume Reprezentant</label>
    <input type="text" class="form-control" name="nume_reprezentant" value="<?php echo $nume_reprezentant ?>">
  </div>

  <div class="form-group">
    <label for="prenume_reprezentant" class="form-label">Prenume Reprezentant</label>
    <input type="text" class="form-control" name="prenume_reprezentant" value="<?php echo $prenume_reprezentant ?>">
  </div>

  <div class="form-group">
    <label for="email" class="form-label">Email</label>
    <input type="text" class="form-control" name="email" value="<?php echo $email ?>">
  </div>

    <button type="submit" class="btn btn-success">Confirmare</button>
    <a href="furnizor.php" class="btn btn-primary">Înapoi</a>

</form>