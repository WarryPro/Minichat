<?php 
// création d'un cookie pour le pseudo
htmlspecialchars(setcookie('pseudo', $_POST['pseudo'], time()+ 30*24*3600, null, null, false, true));

include('dbb-connexion.php');
//insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO minichat (pseudo, message) VALUES(?, ?)');
$req->execute(array($_POST['pseudo'], $_POST['message']));

//Puis rediriger vers minichat.php comme ceci:
header('Location: index.php');
?>