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
    <label for="id_client" class="form-label">ID Client</label>
    <input type="number" class="form-control" name="id_client" value="<?php echo $id_client ?>">
  </div>
  <div class="form-group">
    <label for="cod_magazin" class="form-label">Cod Magazin</label>
    <input type="number" class="form-control" name="cod_magazin" value="<?php echo $cod_magazin ?>">
  </div>

  <div class="form-group">
    <label for="id_angajat" class="form-label">ID_Angajat</label>
    <input type="number" class="form-control" name="id_angajat" value="<?php echo $id_angajat ?>">
  </div>

  <div class="form-group">  
    <label for="data_timp" class="form-label">Data si Ora</label>
    <input type="datetime-local" class="form-control" name="data_timp" value="<?php echo $data_timp ?>">
  </div>

  <div class="form-group">
    <label for="status" class="form-label">Status</label>
    <input type="text" class="form-control" name="status" value="<?php echo $status ?>">
  </div>

    <button type="submit" class="btn btn-success">Confirmare</button>
    <a href="comanda.php" class="btn btn-primary">Înapoi</a>

</form>