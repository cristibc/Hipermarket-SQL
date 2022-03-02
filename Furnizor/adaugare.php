<?php

// Conectare la baza de date MySQL
$pdo = new PDO('mysql:host=localhost; port=3306; dbname=hipermarket', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$erori = [];


// Initializarea unor valori default goale pentru campuri - fara primary key
$id_furnizor = '';
$nume_companie = '';
$nr_telefon ='';
$nume_reprezentant ='';
$prenume_reprezentant ='';
$email ='';

// Aici setam valorile introduse prin metoda POST din campurile completate (in cazul in care au mai fost introduse)
// Useful daca avem o eroare, pentru a nu pierde toate datele introduse in campuri

if($_SERVER['REQUEST_METHOD'] === 'POST'){

  require_once 'valori.php';

// O implementare a functiei auto-increment direct in interfata
$lastvalue = $pdo->query("SELECT MAX(id_furnizor) AS max FROM furnizor;");
$rezultat = $lastvalue->fetch(PDO::FETCH_ASSOC);
$id_furnizor_max = $rezultat['max'];
$id_furnizor = $id_furnizor_max + 1;

// Verificam daca nu exista erori si apoi lansam un query ce insereaza datele completate
// Statement-ul try/catch este pentru a verifica daca a fost incalcat un foreign key constraint

if (empty($erori))
{
  try
  {
  $statement = $pdo->prepare("INSERT INTO furnizor (id_furnizor, nume_companie, 
                              nr_telefon, nume_reprezentant, prenume_reprezentant, email)
                              VALUE (:id_furnizor, :nume_companie, :nr_telefon, :nume_reprezentant,
                              :prenume_reprezentant, :email)");

  $statement->bindValue(':id_furnizor', $id_furnizor);
  $statement->bindValue(':nume_companie', $nume_companie);
  $statement->bindValue(':nr_telefon', $nr_telefon);
  $statement->bindValue(':nume_reprezentant', $nume_reprezentant);
  $statement->bindValue(':prenume_reprezentant', $prenume_reprezentant);
  $statement->bindValue(':email', $email);

// Dupa executare revenim la pagina principala
  $statement->execute();
  header('Location: furnizor.php');
  
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
  
    <div class=outside>
  <div class=style>
    <h1>Adăugarea unui furnizor</h1>

    <?php require_once 'form.php' ?>
</div>
      </div>
  </body>
</html>