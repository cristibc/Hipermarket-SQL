<?php


$pdo = new PDO('mysql:host=localhost; port=3306; dbname=hipermarket', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// Verificam daca a fost specificat id-ul ce trebuie editat
// In cazul in care cineva ajunge in link din greseala este trimis pe pagina anterioara
$cod_magazin = $_POST['cod_magazin'] ?? null;

if (!$cod_magazin){
    header('Location: magazin.php');
    exit;
}

$statement = $pdo->prepare('DELETE FROM magazin WHERE cod_magazin = :cod_magazin');
$statement->bindValue(':cod_magazin', $cod_magazin);
$statement->execute();
header("Location: magazin.php");