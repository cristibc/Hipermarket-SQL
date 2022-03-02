<?php
  $id_client = $_POST['id_client'];
  $cod_magazin = $_POST['cod_magazin'];
  $id_angajat = $_POST['id_angajat'];
  $data_timp = date('Y-m-d\TH:i:s', strtotime($_POST['data_timp']));
  $status = $_POST['status'];


if (!$id_client) {
  $erori[] = 'Introduceti un cod de client!';
}
if (!$cod_magazin) {
  $erori[] = 'Introduceti un cod de magazin!';
}
if (!$id_angajat) {
  $erori[] = 'Introduceti un ID de angajat!';
}
