<!-- Aici setam valorile introduse prin metoda POST din campurile completate (in cazul in care au mai fost introduse)
Useful daca avem o eroare, pentru a nu pierde toate datele introduse in campuri
Fara Primary Key -->
<?php
  $cod_magazin = $_POST['cod_magazin'];
  $nume = $_POST['nume'];
  $prenume = $_POST['prenume'];
  $sex = $_POST['sex'];
  $salariu = $_POST['salariu'];
  $nr_telefon = $_POST['nr_telefon'];
  $email = $_POST['email'];

if (!$nume) {
  $erori[] = 'Introduceti un nume!';
}

if (!$prenume) {
  $erori[] = 'Introduceti un prenume!';
}

if (ISSET($_POST['sex'])==0){
  $erori[] = 'Selectati sexul!';
}

if (!$salariu){
  $erori[] = 'Introduceti un număr de telefon!';
}