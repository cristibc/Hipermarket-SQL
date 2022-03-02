<?php


$pdo = new PDO('mysql:host=localhost; port=3306; dbname=hipermarket', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// Verificam daca a fost specificat id-ul ce trebuie editat
// In cazul in care cineva ajunge in link din greseala este trimis pe pagina anterioara
$id_furnizor = $_POST['id_furnizor'] ?? null;

if (!$id_furnizor){
    header('Location: furnizor.php');
    exit;
}

$statement = $pdo->prepare('DELETE FROM furnizor WHERE id_furnizor = :id_furnizor');
$statement->bindValue(':id_furnizor', $id_furnizor);
$statement->execute();
header("Location: furnizor.php");