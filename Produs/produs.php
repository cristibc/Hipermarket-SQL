<?php
$pdo = new PDO('mysql:host=localhost; port=3306; dbname=hipermarket', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Implementare clasica a functiei de cautare, optionala
// $cautare = $_GET['cautare'] ?? '';
// if ($cautare) { 
//   $statement = $pdo->prepare('SELECT * FROM produs WHERE nume LIKE :nume ORDER BY cod_produs ASC');
//   $statement->bindValue(':nume', "%$cautare%");
// } else {
//   $statement = $pdo->prepare('SELECT * FROM produs ORDER BY cod_produs ASC');
// }

$statement = $pdo->prepare('SELECT * FROM produs ORDER BY cod_produs ASC');
$statement->execute();
$produs = $statement->fetchAll(PDO::FETCH_ASSOC);
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
    <h1>Produse</h1>

    <p>
        <a href="adaugare.php" class="btn btn-success">Adaugare Produs</a>
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

<div id="table" style="width:100%">
    <table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">Cod_Produs</th>
      <th scope="col">ID_Categorie</th>
      <th scope="col">ID_Furnizor</th>
      <th scope="col">Nume</th>
      <th scope="col">EAN</th>
      <th scope="col">Pret</th>
      <th scope="col">Descriere</th>
      <th scope="col">TDV</th>
      <th scope="col">Actiune</th>
    </tr>
  </thead>
  <tbody>
<?php foreach ($produs as $i => $produs): ?>
    <tr>
      <th><?php echo $produs['cod_produs'] ?></th>
      <td><?php echo $produs['id_categorie'] ?></td>
      <td><?php echo $produs['id_furnizor'] ?></td>
      <td><?php echo $produs['nume'] ?></td>
      <td><?php echo $produs['ean'] ?></td>
      <td><?php echo $produs['pret'] ?></td>
      <td><?php echo $produs['descriere'] ?></td>
      <td><?php echo $produs['tdv'] ?></td>
      <td>
      <a href="editare.php?cod_produs=<?php echo $produs['cod_produs'] ?>" type="button" class="btn btn-sm btn-outline-secondary">Editare</a>
      <form style="display:inline-block" method="post" action="sterge.php">
        <input type="hidden" name="cod_produs" value="<?php echo $produs['cod_produs'] ?>">
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