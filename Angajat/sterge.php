<?php


$pdo = new PDO('mysql:host=localhost; port=3306; dbname=hipermarket', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// Verificam daca a fost specificat id-ul ce trebuie editat
// In cazul in care cineva ajunge in link din greseala este trimis pe pagina anterioara
$id_angajat = $_POST['id_angajat'] ?? null;

if (!$id_angajat){
    header('Location: angajat.php');
    exit;
}

$statement = $pdo->prepare('DELETE FROM angajat WHERE id_angajat = :id_angajat');
$statement->bindValue(':id_angajat', $id_angajat);
$statement->execute();
header("Location: angajat.php");