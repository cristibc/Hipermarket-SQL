<?php

// Conectare la baza de date MySQL
$pdo = new PDO('mysql:host=localhost; port=3306; dbname=hipermarket', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id_client = $_GET['id_client'] ?? null;

if (!$id_client){
    header('Location: client.php');
    exit;
}

$statement = $pdo->prepare('SELECT * FROM client WHERE id_client = :id_client');
$statement->bindValue(':id_client', $id_client);
$statement->execute();
$client = $statement->fetch(PDO::FETCH_ASSOC);

$erori = [];

// Initializarea valorilor pentru campuri din baza de date
$nume = $client['nume'];
$prenume = $client['prenume'];
$nr_telefon = $client['nr_telefon'];
$adresa = $client['adresa'];
$oras = $client['oras'];
$email = $client['email'];
$sex = $client['sex'];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  
  require_once 'valori.php';

if (empty($erori))
{
  try
  {
  $statement = $pdo->prepare("UPDATE client SET nume = :nume, prenume = :prenume,
                            nr_telefon = :nr_telefon, adresa = :adresa, oras = :oras, email = :email,
                             sex = :sex WHERE id_client = :id_client");

  $statement->bindValue(':id_client', $id_client);
  $statement->bindValue(':nume', $nume);
  $statement->bindValue(':prenume', $prenume);
  $statement->bindValue(':nr_telefon', $nr_telefon);
  $statement->bindValue(':adresa', $adresa);
  $statement->bindValue(':oras', $oras);
  $statement->bindValue(':email', $email);
  $statement->bindValue(':sex', $sex);

  $statement->execute();
  header('Location: client.php');
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
  <h1>Editarea clientului: <b><?php echo $client['nume']  ?> <?php echo $client['prenume']?></b></h1>
  
<?php require_once 'form.php' ?>
</div>
</div>
  </body>
</html>