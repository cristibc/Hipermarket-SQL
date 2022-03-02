<?php
  $nume_companie = $_POST['nume_companie'];
  $nr_telefon = $_POST['nr_telefon'];
  $nume_reprezentant = $_POST['nume_reprezentant'];
  $prenume_reprezentant = $_POST['prenume_reprezentant'];
  $email = $_POST['email'];


if (!$nume_companie) {
  $erori[] = 'Introduceti un nume pentru companie!';
}

if (!$nume_reprezentant) {
  $erori[] = 'Introduceti un nume pentru reprezentantul companiei!';
}

if (!$prenume_reprezentant) {
  $erori[] = 'Introduceti un prenume pentru reprezentantul companiei!';
}

if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $erori[] = "Introduceti o adresa de email si asigurati-va ca respecta formatul corect!";
}
