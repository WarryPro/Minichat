<?php 
// Effectuer ici la requête qui insère le message
try {
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '',
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e) {
    die('Erreur : ' .$e->getMessage());
}
//insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO minichat (pseudo, message) VALUES(?, ?)');
$req->execute(array($_POST['pseudo'], $_POST['message']));
//Puis rediriger vers minichat.php comme ceci:
header('Location: index.php');
?>