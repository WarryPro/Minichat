<?php
//Connex. à la BDD
try {
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '',
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e){
    di('Erreur : ' .$e->getMessage());
}
