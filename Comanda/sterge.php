<?php


$pdo = new PDO('mysql:host=localhost; port=3306; dbname=hipermarket', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// Verificam daca a fost specificat id-ul ce trebuie editat
// In cazul in care cineva ajunge in link din greseala este trimis pe pagina anterioara
$id_comanda = $_POST['id_comanda'] ?? null;

if (!$id_comanda){
    header('Location: comanda.php');
    exit;
}

$statement = $pdo->prepare('DELETE FROM comanda WHERE id_comanda = :id_comanda');
$statement->bindValue(':id_comanda', $id_comanda);
$statement->execute();
header("Location: comanda.php");