<?php


$pdo = new PDO('mysql:host=localhost; port=3306; dbname=hipermarket', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// Verificam daca a fost specificat id-ul ce trebuie editat
// In cazul in care cineva ajunge in link din greseala este trimis pe pagina anterioara
$id_categorie = $_POST['id_categorie'] ?? null;

if (!$id_categorie){
    header('Location: categorie.php');
    exit;
}

$statement = $pdo->prepare('DELETE FROM categorie WHERE id_categorie = :id_categorie');
$statement->bindValue(':id_categorie', $id_categorie);
$statement->execute();
header("Location: categorie.php");