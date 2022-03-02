<?php


$pdo = new PDO('mysql:host=localhost; port=3306; dbname=hipermarket', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// Verificam daca a fost specificat id-ul ce trebuie editat
// In cazul in care cineva ajunge in link din greseala este trimis pe pagina anterioara
$id_comanda = $_POST['id_comanda'] ?? null;
$cod_produs = $_POST['cod_produs'] ?? null;

echo $id_comanda;
echo " ";
echo $cod_proodus;

if (!$id_comanda || !$cod_produs){
    header('Location: detalii_comanda.php');
    exit;
}

$statement = $pdo->prepare('DELETE FROM detalii_comanda WHERE (id_comanda, cod_produs) = (:id_comanda, :cod_produs)');
$statement->bindValue(':id_comanda', $id_comanda);
$statement->bindValue(':cod_produs', $cod_produs);
$statement->execute();
header("Location: detalii_comanda.php");