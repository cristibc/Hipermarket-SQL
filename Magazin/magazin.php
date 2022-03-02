<?php
$pdo = new PDO('mysql:host=localhost; port=3306; dbname=hipermarket', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Implementare clasica a functiei de cautare, optionala
// $cautare = $_GET['cautare'] ?? '';
// if ($cautare) { 
//   $statement = $pdo->prepare('SELECT * FROM magazin WHERE nume LIKE :nume ORDER BY cod_magazin ASC');
//   $statement->bindValue(':nume', "%$cautare%");
// } else {
//   $statement = $pdo->prepare('SELECT * FROM magazin ORDER BY cod_magazin ASC');
// }

$statement = $pdo->prepare('SELECT * FROM magazin ORDER BY cod_magazin ASC');
$statement->execute();
$entry = $statement->fetchAll(PDO::FETCH_ASSOC);
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.4/datatables.min.css"/>

 
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="../app.css">

    <!-- JQuery 3.6.0 CDN Hosted on google -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.4/datatables.min.js"></script>

    <script src="../tables.js"></script>

    <title>Hipermarket - Proiect BD</title>
  </head>
  <body>

  <?php require_once '../nav.php' ?>

  <div class="outside">
  <div class="style">
    <h1>Magazine</h1>

    <p>
        <a href="adaugare.php" class="btn btn-success">Adaugă Magazin</a>
    </p>

 <!-- Campul de cautare, implementare clasica -->
<!-- <form>
  <div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Cautare" name="cautare" value="<?php echo $cautare ?>">
    <div class="input-group-append">
      <button class="btn btn-outline-secondary" type="submit">OK!</button>
    </div>
  </div>
</form> -->

<div id="table">
    <table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">Cod_Magazin</th>
      <th scope="col">Nume</th>
      <th scope="col">Oraș</th>
      <th scope="col">Strada</th>
      <th scope="col">Nr_telefon</th>
      <th scope="col">Acțiune</th>
    </tr>
  </thead>
  <tbody>
<?php foreach ($entry as $i => $entry): ?>
    <tr>
      <th><?php echo $entry['cod_magazin'] ?></th>
      <td><?php echo $entry['nume'] ?></td>
      <td><?php echo $entry['oras'] ?></td>
      <td><?php echo $entry['strada'] ?></td>
      <td><?php echo $entry['nr_telefon'] ?></td>
      <td>
      <a href="editare.php?cod_magazin=<?php echo $entry['cod_magazin'] ?>" type="button" class="btn btn-sm btn-outline-secondary">Editare</a>
      <form style="display:inline-block" method="post" action="sterge.php">
        <input type="hidden" name="cod_magazin" value="<?php echo $entry['cod_magazin'] ?>">
        <button type="submit" class="btn btn-sm btn-outline-danger">Sterge</button>
      </form>
      </td>
    </tr>

    <?php endforeach; ?>

  </tbody>
</table>
</div>
</div>
  </body>
</html>