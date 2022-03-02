<?php

// Conectare la baza de date MySQL
$pdo = new PDO('mysql:host=localhost; port=3306; dbname=hipermarket', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id_furnizor = $_GET['id_furnizor'] ?? null;

if (!$id_furnizor){
    header('Location: furnizor.php');
    exit;
}

$statement = $pdo->prepare('SELECT * FROM furnizor WHERE id_furnizor = :id_furnizor');
$statement->bindValue(':id_furnizor', $id_furnizor);
$statement->execute();
$furnizor = $statement->fetch(PDO::FETCH_ASSOC);

$erori = [];

// Initializarea valorilor pentru campuri din baza de date
$nume_companie = $furnizor['nume_companie'];
$nr_telefon = $furnizor['nr_telefon'];
$nume_reprezentant = $furnizor['nume_reprezentant'];
$prenume_reprezentant = $furnizor['prenume_reprezentant'];
$email = $furnizor['email'];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  
  require_once 'valori.php';

if (empty($erori))
{
  try
  {
  $statement = $pdo->prepare("UPDATE furnizor SET nume_companie = :nume_companie, 
                            nr_telefon = :nr_telefon, nume_reprezentant = :nume_reprezentant,
                            prenume_reprezentant = :prenume_reprezentant, email = :email WHERE id_furnizor = :id_furnizor");

  $statement->bindValue(':id_furnizor', $id_furnizor);
  $statement->bindValue(':nume_companie', $nume_companie);
  $statement->bindValue(':nr_telefon', $nr_telefon);
  $statement->bindValue(':nume_reprezentant', $nume_reprezentant);
  $statement->bindValue(':prenume_reprezentant', $prenume_reprezentant);
  $statement->bindValue(':email', $email);

  $statement->execute();
  header('Location: furnizor.php');
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
  <h1>Editarea Furnizorului: <b><?php echo $furnizor['nume_companie'] ?></b></h1>
  
<?php require_once 'form.php' ?>

      </div>
</div>
  </body>
</html>