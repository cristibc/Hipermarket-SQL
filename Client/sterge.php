<?php


$pdo = new PDO('mysql:host=localhost; port=3306; dbname=hipermarket', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// Verificam daca a fost specificat id-ul ce trebuie editat
// In cazul in care cineva ajunge in link din greseala este trimis pe pagina anterioara
$id_client = $_POST['id_client'] ?? null;

if (!$id_client){
    header('Location: client.php');
    exit;
}

$statement = $pdo->prepare('DELETE FROM client WHERE id_client = :id_client');
$statement->bindValue(':id_client', $id_client);
$statement->execute();
header("Location: client.php");