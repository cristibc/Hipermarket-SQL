<!-- Aici setam valorile introduse prin metoda POST din campurile completate (in cazul in care au mai fost introduse)
Useful daca avem o eroare, pentru a nu pierde toate datele introduse in campuri
Fara Primary Key -->
<?php
  $nume = $_POST['nume'];
  $prenume = $_POST['prenume'];
  $nr_telefon = $_POST['nr_telefon'];
  $adresa = $_POST['adresa'];
  $oras = $_POST['oras'];
  $email = $_POST['email'];
  // $sex = $_POST['sex'];

if (!$nume) {
  $erori[] = 'Introduceti un nume!';
}

if (!$prenume) {
  $erori[] = 'Introduceti un prenume!';
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $erori[] = "Format invalid pentru email";
}

if (ISSET($_POST['sex'])==0){
  $erori[] = 'Selectați sexul!';
}
