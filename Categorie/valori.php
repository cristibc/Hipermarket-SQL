<?php
  $nume = $_POST['nume'];
  $descriere = $_POST['descriere'];


if (!$nume) {
  $erori[] = 'Introduceti un nume!';
}
