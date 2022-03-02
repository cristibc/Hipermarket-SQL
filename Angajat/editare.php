<?php

// Conectare la baza de date MySQL
$pdo = new PDO('mysql:host=localhost; port=3306; dbname=hipermarket', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id_angajat = $_GET['id_angajat'] ?? null;

if (!$id_angajat){
    header('Location: angajat.php');
    exit;
}

$statement = $pdo->prepare('SELECT * FROM angajat WHERE id_angajat = :id_angajat');
$statement->bindValue(':id_angajat', $id_angajat);
$statement->execute();
$angajat = $statement->fetch(PDO::FETCH_ASSOC);

$erori = [];

// Initializarea valorilor pentru campuri din baza de date
$cod_magazin = $angajat['cod_magazin'];
$nume = $angajat['nume'];
$prenume = $angajat['prenume'];
$sex = $angajat['sex'];
$salariu = $angajat['salariu'];
$nr_telefon = $angajat['nr_telefon'];
$email = $angajat['email'];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  
  require_once 'valori.php';

if (empty($erori))
{
  try
  {
  $statement = $pdo->prepare("UPDATE angajat SET cod_magazin = :cod_magazin, nume = :nume, prenume = :prenume,
                            sex = :sex, salariu = :salariu, nr_telefon = :nr_telefon,
                            email = :email WHERE id_angajat = :id_angajat");

  $statement->bindValue(':id_angajat', $id_angajat);
  $statement->bindValue(':cod_magazin', $cod_magazin);
  $statement->bindValue(':nume', $nume);
  $statement->bindValue(':prenume', $prenume);
  $statement->bindValue(':sex', $sex);
  $statement->bindValue(':salariu', $salariu);
  $statement->bindValue(':nr_telefon', $nr_telefon);
  $statement->bindValue(':email', $email);

  $statement->execute();
  header('Location: angajat.php');
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
  <h1>Editarea angajatului: <b><?php echo $angajat['nume']  ?> <?php echo $angajat['prenume']?></b></h1>
  
<?php require_once 'form.php' ?>
</div>
</div>
  </body>
</html>