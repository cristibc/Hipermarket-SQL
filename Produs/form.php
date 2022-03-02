<?php if (!empty($erori)): ?>
    <div class="alert alert-danger">
      <?php foreach ($erori as $eroare): ?>
        <div><?php echo $eroare ?></div>
      <?php endforeach; ?>
    </div>
<?php endif; ?>

    <form method="post" enctype="multipart/form-data" > 
  <div class="form-group">
    <label for="id_categorie" class="form-label">id_categorie</label>
    <input type="number" class="form-control" name="id_categorie" value="<?php echo $id_categorie ?>">
  </div>

  <div class="form-group">
    <label for="id_furnizor" class="form-label">id_furnizor</label>
    <input type="number" class="form-control" name="id_furnizor" value="<?php echo $id_furnizor ?>">
  </div>

  <div class="form-group">
    <label for="nume" class="form-label">nume</label>
    <input type="text" class="form-control" name="nume" value="<?php echo $nume ?>">
  </div>

  <div class="form-group">
    <label for="ean" class="form-label">ean</label>
    <input type="number" class="form-control" name="ean" value="<?php echo $ean ?>">
  </div>

  <div class="form-group">
    <label for="pret" class="form-label">pret</label>
    <input type="number" step=".01" class="form-control" name="pret" value="<?php echo $pret ?>">
  </div>

  <div class="form-group">
    <label for="descriere" class="form-label">descriere</label>
    <input type="text" class="form-control" name="descriere" value="<?php echo $descriere ?>">
  </div>

  <div class="form-group">
    <label for="tdv" class="form-label">tdv</label>
    <input type="date" class="form-control" name="tdv" value="<?php echo $tdv ?>">
  </div>
    <button type="submit" class="btn btn-success">Confirmare</button>
    <a href="produs.php" class="btn btn-primary">Înapoi</a>
        
</form>