<?php 
    include('dbb-connexion.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minichat</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
        crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <div class="container__messages">
            <div class="container__pseudo_message">
                <div class="container__pseudo">
                    <p class="pseudo"></p>
                </div>
                <div class="container__message">
                    <p class="pseudo">
                        <?php 

                            // Récupération des 10 derniers messages 
                            $reponse = $bdd->query('SELECT pseudo, message FROM minichat ORDER BY ID ASC LIMIT 0, 10');

                            // Affichage de chaque message (tous les données sont protégées par htmlspecialcharts)
                            while ($donnees = $reponse->fetch()) {
                                echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : '
                                . htmlspecialchars($donnees['message']) . '</p>';
                            }
                            $reponse->closeCursor();
                        ?>                    
                    </p>
                </div>
                <div class="container__date__heure">
                    <p class="date__heure"></p>
                </div>
            </div>
        </div>
        <div class="container__form">
            <form action="messages.php" method="POST">
                <label for="pseudo">Pseudo</label>
                <input type="text" id="pseudo" name="pseudo">

                <label for="message">Message</label>
                <input type="text" id="message" name="message">

                <button type="submit" class="btn__envoyer">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </form>
        </div>
    </div>
</body>

</html>