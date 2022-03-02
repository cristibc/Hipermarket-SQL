<?php

// Conectare la baza de date MySQL
$pdo = new PDO('mysql:host=localhost; port=3306; dbname=hipermarket', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$cod_produs = $_GET['cod_produs'] ?? null;

if (!$cod_produs){
    header('Location: produs.php');
    exit;
}

$statement = $pdo->prepare('SELECT * FROM produs WHERE cod_produs = :cod_produs');
$statement->bindValue(':cod_produs', $cod_produs);
$statement->execute();
$produs = $statement->fetch(PDO::FETCH_ASSOC);

$erori = [];

// Initializarea valorilor pentru campuri din baza de date
$cod_produs = $produs['cod_produs'];
$id_categorie = $produs['id_categorie'];
$id_furnizor = $produs['id_furnizor'];
$nume = $produs['nume'];
$ean = $produs['ean'];
$pret = $produs['pret'];
$descriere = $produs['descriere'];
$tdv = $produs['tdv'];

if($_SERVER['REQUEST_METHOD'] === 'POST'){

  require_once 'valori.php';

if (empty($erori))
{
  try
  {
  $statement = $pdo->prepare("UPDATE produs SET id_categorie = :id_categorie, 
                            id_furnizor = :id_furnizor, nume = :nume, ean = :ean, 
                            pret = :pret, descriere = :descriere, tdv = :tdv WHERE cod_produs = :cod_produs");

  $statement->bindValue(':cod_produs', $cod_produs);
  $statement->bindValue(':id_categorie', $id_categorie);
  $statement->bindValue(':id_furnizor', $id_furnizor);
  $statement->bindValue(':nume', $nume);
  $statement->bindValue(':ean', $ean);
  $statement->bindValue(':pret', $pret);
  $statement->bindValue(':descriere', $descriere);
  $statement->bindValue(':tdv', $tdv);

  $statement->execute();
  header('Location: produs.php');
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
    <h1>Editarea produsului: <b><?php echo $produs['nume'] ?></b></h1>

    <?php require_once 'form.php' ?>
    
      </div>
</div>
  </body>
</html>