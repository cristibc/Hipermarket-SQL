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
    <label for="id_comanda" class="form-label">ID Comanda</label>
    <input type="number" class="form-control" name="id_comanda" value="<?php echo $id_comanda ?>"readonly>
  </div>
  <div class="form-group">
    <label for="cod_produs" class="form-label">Cod Produs</label>
    <input type="number" class="form-control" name="cod_produs" value="<?php echo $cod_produs ?>"readonly>
  </div>

  <div class="form-group">
    <label for="cantitate" class="form-label">Cantitate</label>
    <input type="number" class="form-control" name="cantitate" value="<?php echo $cantitate ?>">
  </div>

  <div class="form-group">  
    <label for="pret" class="form-label">Preț</label>
    <input type="number" step=".01" class="form-control" name="pret" value="<?php echo $pret ?>">
  </div>

    <button type="submit" class="btn btn-success">Confirmare</button>
    <a href="detalii_comanda.php" class="btn btn-primary">Înapoi</a>

</form>
