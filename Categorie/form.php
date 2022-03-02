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
    <label for="descriere" class="form-label">Descriere</label>
    <input type="text" class="form-control" name="descriere" value="<?php echo $descriere ?>">
  </div>

    <button type="submit" class="btn btn-success">Confirmare</button>
    <a href="magazin.php" class="btn btn-primary">Înapoi</a>

</form>

