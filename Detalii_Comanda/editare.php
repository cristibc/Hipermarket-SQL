<?php

// Conectare la baza de date MySQL
$pdo = new PDO('mysql:host=localhost; port=3306; dbname=hipermarket', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id_comanda = $_GET['id_comanda'] ?? null;
$cod_produs = $_GET['cod_produs'] ?? null;

if (!$id_comanda || !$cod_produs){
    header('Location: comanda.php');
    exit;
}

$statement = $pdo->prepare('SELECT * FROM detalii_comanda WHERE (id_comanda, cod_produs) = (:id_comanda, :cod_produs)');
$statement->bindValue(':id_comanda', $id_comanda);
$statement->bindValue(':cod_produs', $cod_produs);
$statement->execute();
$comanda = $statement->fetch(PDO::FETCH_ASSOC);

$erori = [];

// Initializarea valorilor pentru campuri din baza de date
$cantitate = $comanda['cantitate'];
$pret = $comanda['pret'];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  
  require_once 'valori.php';

if (empty($erori))
{
  try
  {
  $statement = $pdo->prepare("UPDATE detalii_comanda SET cantitate = :cantitate, 
                            pret = :pret WHERE (id_comanda, cod_produs) = (:id_comanda, :cod_produs)");

  $statement->bindValue(':id_comanda', $id_comanda);
  $statement->bindValue(':cod_produs', $cod_produs);
  $statement->bindValue(':cantitate', $cantitate);
  $statement->bindValue(':pret', $pret);

  $statement->execute();
  header('Location: detalii_comanda.php');
  } catch (PDOException $e) { // Eroare in caz ca e incalcat foreign key check-ul
    if ($e->getCode() == '23000') 
        $erori[] = 'Ati incalcat un foreign key check! (unul din campuri nu are valoarea corecta din tabelul parent)'; 
       // echo "Eroare: ".$e->getMessage(); // Afisarea intregii erori
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
  <h1>Editarea detaliilor comenzii: <b><?php echo $id_comanda ?> - <?php echo $cod_produs?></b></h1>
  
<?php require_once 'form.php' ?>

      </div>
      </div>
  </body>
</html>