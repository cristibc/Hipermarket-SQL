<?php


$pdo = new PDO('mysql:host=localhost; port=3306; dbname=hipermarket', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// Verificam daca a fost specificat id-ul ce trebuie editat
// In cazul in care cineva ajunge in link din greseala este trimis pe pagina anterioara
$cod_produs = $_POST['cod_produs'] ?? null;

if (!$cod_produs){
    header('Location: produs.php');
    exit;
}

$statement = $pdo->prepare('DELETE FROM produs WHERE cod_produs = :cod_produs');
$statement->bindValue(':cod_produs', $cod_produs);
$statement->execute();

header("Location: produs.php");