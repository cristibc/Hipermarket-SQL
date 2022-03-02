<?php

// Conectare la baza de date MySQL
$pdo = new PDO('mysql:host=localhost; port=3306; dbname=hipermarket', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$erori = [];


// Initializarea unor valori default goale pentru campuri - fara primary key
$id_client = '';
$cod_magazin = '';
$id_angajat = '';
$data_timp = '';
$status ='';

// Aici setam valorile introduse prin metoda POST din campurile completate (in cazul in care au mai fost introduse)
// Useful daca avem o eroare, pentru a nu pierde toate datele introduse in campuri

if($_SERVER['REQUEST_METHOD'] === 'POST'){

  require_once 'valori.php';

// O implementare a functiei auto-increment direct in interfata
$lastvalue = $pdo->query("SELECT MAX(id_comanda) AS max FROM comanda;");
$rezultat = $lastvalue->fetch(PDO::FETCH_ASSOC);
$id_comanda_max = $rezultat['max'];
$id_comanda = $id_comanda_max + 1;

// Verificam daca nu exista erori si apoi lansam un query ce insereaza datele completate
// Statement-ul try/catch este pentru a verifica daca a fost incalcat un foreign key constraint

if (empty($erori))
{
  try
  {
  $statement = $pdo->prepare("INSERT INTO comanda (id_comanda, id_client, cod_magazin, id_angajat, data_timp, status)
                  VALUE (:id_comanda, :id_client, :cod_magazin, :id_angajat, :data_timp, :status)");

  $statement->bindValue(':id_comanda', $id_comanda);
  $statement->bindValue(':id_client', $id_client);
  $statement->bindValue(':cod_magazin', $cod_magazin);
  $statement->bindValue(':id_angajat', $id_angajat);
  $statement->bindValue(':data_timp', $data_timp);
  $statement->bindValue(':status', $status);

// Dupa executare revenim la pagina principala
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
    <h1>Adăugarea unei comenzi</h1>

    <?php require_once 'form.php' ?>

      </div>
      </div>
  </body>
</html>