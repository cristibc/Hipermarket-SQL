<?php
  $nume = $_POST['nume'];
  $oras = $_POST['oras'];
  $strada = $_POST['strada'];
  $nr_telefon = $_POST['nr_telefon'];


if (!$nume) {
  $erori[] = 'Introduceti un nume!';
}
