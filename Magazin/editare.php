<?php

// Conectare la baza de date MySQL
$pdo = new PDO('mysql:host=localhost; port=3306; dbname=hipermarket', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$cod_magazin = $_GET['cod_magazin'] ?? null;

if (!$cod_magazin){
    header('Location: magazin.php');
    exit;
}

$statement = $pdo->prepare('SELECT * FROM magazin WHERE cod_magazin = :cod_magazin');
$statement->bindValue(':cod_magazin', $cod_magazin);
$statement->execute();
$magazin = $statement->fetch(PDO::FETCH_ASSOC);

$erori = [];

// Initializarea valorilor pentru campuri din baza de date
$nume = $magazin['nume'];
$oras = $magazin['oras'];
$strada = $magazin['strada'];
$nr_telefon = $magazin['nr_telefon'];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  
  require_once 'valori.php';

if (empty($erori))
{
  try
  {
  $statement = $pdo->prepare("UPDATE magazin SET nume = :nume, 
                            oras = :oras, strada = :strada, 
                            nr_telefon = :nr_telefon WHERE cod_magazin = :cod_magazin");

  $statement->bindValue(':cod_magazin', $cod_magazin);
  $statement->bindValue(':nume', $nume);
  $statement->bindValue(':oras', $oras);
  $statement->bindValue(':strada', $strada);
  $statement->bindValue(':nr_telefon', $nr_telefon);

  $statement->execute();
  header('Location: magazin.php');
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
  <h1>Editarea magazinului: <b><?php echo $magazin['nume'] ?></b></h1>
  
<?php require_once 'form.php' ?>
</div>
      </div>
  </body>
</html>