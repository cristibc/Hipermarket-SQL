<?php

// Conectare la baza de date MySQL
$pdo = new PDO('mysql:host=localhost; port=3306; dbname=hipermarket', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$erori = [];


// Initializarea unor valori default goale pentru campuri - fara primary key
$id_comanda = '';
$cod_produs = '';
$cantitate = '';
$pret = '';

// Aici setam valorile introduse prin metoda POST din campurile completate (in cazul in care au mai fost introduse)
// Useful daca avem o eroare, pentru a nu pierde toate datele introduse in campuri

if($_SERVER['REQUEST_METHOD'] === 'POST'){

  require_once 'valori.php';

//!!! O implementare a functiei auto-increment direct in interfata
// $lastvalue = $pdo->query("SELECT MAX(id_comanda) AS max FROM detalii_comanda;");
// $rezultat = $lastvalue->fetch(PDO::FETCH_ASSOC);
// $id_comanda_max = $rezultat['max'];
// $id_comanda = $id_comanda_max + 1;

// Verificam daca nu exista erori si apoi lansam un query ce insereaza datele completate
// Statement-ul try/catch este pentru a verifica daca a fost incalcat un foreign key constraint

if (empty($erori))
{
  try
  {
  $statement = $pdo->prepare("INSERT INTO detalii_comanda (id_comanda, cod_produs, cantitate, pret)
                  VALUE (:id_comanda, :cod_produs, :cantitate, :pret)");

  $statement->bindValue(':id_comanda', $id_comanda);
  $statement->bindValue(':cod_produs', $cod_produs);
  $statement->bindValue(':cantitate', $cantitate);
  $statement->bindValue(':pret', $pret);

// Dupa executare revenim la pagina principala
  $statement->execute();
  header('Location: detalii_comanda.php');
  
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

<!-- Afisarea erorilor intr-un camp separat -->

<?php if (!empty($erori)): ?>
    <div class="alert alert-danger">
      <?php foreach ($erori as $eroare): ?>
        <div><?php echo $eroare ?></div>
      <?php endforeach; ?>
    </div>
<?php endif; ?>

<!-- Formularul / Campurile in care userul introduce datele cerute -->
    <form method="post" enctype="multipart/form-data"> 
  <div class="form-group">
    <label for="id_comanda" class="form-label">ID Comanda</label>
    <input type="number" class="form-control" name="id_comanda" value="<?php echo $id_comanda ?>">
  </div>
  <div class="form-group">
    <label for="cod_produs" class="form-label">Cod Produs</label>
    <input type="number" class="form-control" name="cod_produs" value="<?php echo $cod_produs ?>">
  </div>

  <div class="form-group">
    <label for="cantitate" class="form-label">Cantitate</label>
    <input type="number" class="form-control" name="cantitate" value="<?php echo $cantitate ?>">
  </div>

  <div class="form-group">  
    <label for="pret" class="form-label">Preț</label>
    <input type="number" step=".01" class="form-control" name="pret" value="<?php echo $pret ?>">
  </div>

    <button type="submit" class="btn btn-success">Confirmare</button>
    <a href="detalii_comanda.php" class="btn btn-primary">Înapoi</a>

</form>
      </div>
      </div>
  </body>
</html>