<?php

// Conectare la baza de date MySQL
$pdo = new PDO('mysql:host=localhost; port=3306; dbname=hipermarket', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id_comanda = $_GET['id_comanda'] ?? null;

if (!$id_comanda){
    header('Location: comanda.php');
    exit;
}

$statement = $pdo->prepare('SELECT * FROM comanda WHERE id_comanda = :id_comanda');
$statement->bindValue(':id_comanda', $id_comanda);
$statement->execute();
$comanda = $statement->fetch(PDO::FETCH_ASSOC);

$erori = [];

// Initializarea valorilor pentru campuri din baza de date
$id_client = $comanda['id_client'];
$cod_magazin = $comanda['cod_magazin'];
$id_angajat = $comanda['id_angajat'];
$data_timp = date('Y-m-d\TH:i:s', strtotime($comanda['data_timp']));
$status = $comanda['status'];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  
  require_once 'valori.php';

if (empty($erori))
{
  try
  {
  $statement = $pdo->prepare("UPDATE comanda SET id_client = :id_client, 
                            cod_magazin = :cod_magazin, id_angajat = :id_angajat, 
                            data_timp = :data_timp, status = :status WHERE id_comanda = :id_comanda");

  $statement->bindValue(':id_comanda', $id_comanda);
  $statement->bindValue(':id_client', $id_client);
  $statement->bindValue(':cod_magazin', $cod_magazin);
  $statement->bindValue(':id_angajat', $id_angajat);
  $statement->bindValue(':data_timp', $data_timp);
  $statement->bindValue(':status', $status);

  $statement->execute();
  header('Location: comanda.php');
  } catch (PDOException $e) { // Eroare in caz ca e incalcat foreign key check-ul
    if ($e->getCode() == '23000') 
        $erori[] = 'Ati incalcat un foreign key check! (unul din campuri nu are valoarea corecta din tabelul parent)'; 
       echo "Eroare: ".$e->getMessage(); // Afisarea intregii erori
  }
}

}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="../app.css">

    <!-- JQuery 3.6.0 CDN Hosted on google -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>Hipermarket - Proiect BD</title>
  </head>
  <body>
  <?php require_once '../nav.php' ?>

<div class="outside">
<div class="style">
  <h1>Editarea comenzii: <b><?php echo $comanda['id_comanda'] ?></b></h1>
  
<?php require_once 'form.php' ?>

      </div>
      </div>
  </body>
</html>