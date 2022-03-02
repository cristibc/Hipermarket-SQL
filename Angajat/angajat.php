<?php
$pdo = new PDO('mysql:host=localhost; port=3306; dbname=hipermarket', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Implementare clasica a functiei de cautare, optionala
// $cautare = $_GET['cautare'] ?? '';
// if ($cautare) { 
//   $afisare = $pdo->prepare('SELECT * FROM angajat WHERE nume LIKE :nume ORDER BY id_angajat ASC');
//   $afisare->bindValue(':nume', "%$cautare%");
// } else {
//   $afisare = $pdo->prepare('SELECT * FROM angajat ORDER BY id_angajat ASC');
// }

$afisare = $pdo->prepare('SELECT * FROM angajat ORDER BY id_angajat ASC');
$afisare->execute();
$entry = $afisare->fetchAll(PDO::FETCH_ASSOC);
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
    <h1>Angajați</h1>

    <p>
        <a href="adaugare.php" class="btn btn-success">Adaugă Angajat</a>
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
      <th scope="col">ID_Angajat</th>
      <th scope="col">Cod_Magazin</th>
      <th scope="col">Nume</th>
      <th scope="col">Prenume</th>
      <th scope="col">Sex</th>
      <th scope="col">Salariu</th>
      <th scope="col">Nr_Telefon</th>
      <th scope="col">Email</th>
      <th scope="col">Acțiune</th>
    </tr>
  </thead>
  <tbody>
<?php foreach ($entry as $i => $entry): ?>
    <tr>
      <th><?php echo $entry['id_angajat'] ?></th>
      <td><?php echo $entry['cod_magazin'] ?></td>
      <td><?php echo $entry['nume'] ?></td>
      <td><?php echo $entry['prenume'] ?></td>
      <td><?php echo $entry['sex'] ?></td>
      <td><?php echo $entry['salariu'] ?></td>
      <td><?php echo $entry['nr_telefon'] ?></td>
      <td><?php echo $entry['email'] ?></td>
      <td>
      <a href="editare.php?id_angajat=<?php echo $entry['id_angajat'] ?>" type="button" class="btn btn-sm btn-outline-secondary">Editare</a>
      <form style="display:inline-block" method="post" action="sterge.php">
        <input type="hidden" name="id_angajat" value="<?php echo $entry['id_angajat'] ?>">
        <button type="submit" class="btn btn-sm btn-outline-danger">Sterge</button>
      </form>
      </td>
    </tr>

    <?php endforeach; ?>

  </tbody>
</table>
<a href="extrasearch.php" type="button" class="btn btn-secondary btn-sm">Group By / Having </a>
</div>
</div>
  </body>
</html>