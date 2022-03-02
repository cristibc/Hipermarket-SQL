<?php
$id_categorie = $_POST['id_categorie'];
$id_furnizor = $_POST['id_furnizor'];
$nume = $_POST['nume'];
$ean = $_POST['ean'];
$pret = $_POST['pret'];
$descriere = $_POST['descriere'];
$tdv = date('Y-m-d', strtotime($_POST['tdv']));


if (!$id_categorie) {
$erori[] = 'Introduceti un id_categorie!';
}

if (!$id_furnizor) {
$erori[] = 'Introduceti un id_furnizor!';
}

if (!$nume) {
$erori[] = 'Introduceti un nume!';
}

if (!$ean) {
$erori[] = 'Introduceti un ean!';
}

// 1970-01-01 este data default atunci cand utilizatorul nu introduce nimic
if ($tdv == '1970-01-01') { 
$erori[] = 'Introduceti un termen de valabilitate';
}

