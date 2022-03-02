<?php
$pdo = new PDO('mysql:host=localhost; port=3306; dbname=hipermarket', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$cautare = $_GET['cautare'] ?? '';
if ($cautare) { 
  $afisare = $pdo->prepare('SELECT cod_magazin, MIN(salariu) FROM angajat GROUP BY cod_magazin HAVING MIN(salariu) > :query;');
  $afisare->bindValue(':query', $cautare);
} else {
  $afisare = $pdo->prepare('SELECT cod_magazin, MIN(salariu) FROM angajat GROUP BY cod_magazin HAVING MIN(salariu) > 0;');
}

// $afisare = $pdo->prepare('SELECT sex, SUM(salariu), COUNT(*) FROM angajat GROUP BY sex HAVING SUM(salariu) > 3000;');
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

   

    <title>Hipermarket - Proiect BD</title>
  </head>
  <body>

  <?php require_once '../nav.php' ?>
  
  <div class="outside">
  <div class="style">
    <p>Cel mai mic salariu al oricărui angajat din fiecare magazin, mai mare decât suma introdusă mai jos:</p>


 <!-- Campul de cautare, implementare clasica -->
<form>
  <div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Cautare" name="cautare" value="<?php echo $cautare ?>">
    <div class="input-group-append">
      <button class="btn btn-outline-secondary" type="submit">OK!</button>
    </div>
  </div>
</form>

<div id="table">
    <table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">Cod Magazin</th>
      <th scope="col">salariul cel mai mic</th>
    </tr>
  </thead>
  <tbody>
<?php foreach ($entry as $i => $entry): ?>
    <tr>
      <th><?php echo $entry['cod_magazin'] ?></th>
      <td><?php echo $entry['MIN(salariu)'] ?></td>
     
    </tr>

    <?php endforeach; ?>

  </tbody>
</table>
</div>
</div>
  </body>
</html>