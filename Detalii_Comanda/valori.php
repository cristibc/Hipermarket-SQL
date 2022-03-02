<?php
  $id_comanda = $_POST['id_comanda'];
  $cod_produs = $_POST['cod_produs'];
  $cantitate = $_POST['cantitate'];
  $pret = $_POST['pret'];


if (!$id_comanda) {
  $erori[] = 'Introduceti un ID de comanda!';
}
if (!$cod_produs) {
  $erori[] = 'Introduceti un cod de produs!';
}
if (!$cantitate) {
  $erori[] = 'Introduceti o cantitate';
}
if (!$pret) {
  $pret[] = 'Introduceti un preț!';
}