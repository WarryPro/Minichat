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
                    <?php 
                    // Récupération des 6 derniers messages 
                    // on a fait une requête imbriquée pour obtenir les données dans un 1er temps et qui seron affichés du dernier en haut et le premier en bas du chat
                    //après la requ^te imbriquée on organise les données en ASC pour afficher les messages le dernier en bas et les precedents en haut
                    $reponse = $bdd->query("SELECT 
                        id, 
                        pseudo, 
                        message, 
                        DATE_FORMAT(date_fr, '%d/%m/%Y %à %Hh%i') AS date_fr 
                        FROM 
                        (SELECT 
                            id, 
                            pseudo, 
                            message, 
                            date_fr 
                            FROM minichat ORDER BY ID DESC LIMIT 6) alias 
                        ORDER BY ID ASC");

                    // Affichage de chaque message (tous les données sont protégées par htmlspecialcharts)
                    while ($donnees = $reponse->fetch()) {
                        echo '<div class="container__pseudo"><p class="pseudo">' 
                        . htmlspecialchars($donnees['pseudo']) . ':'.'</p></div>';
                        
                        echo '<div class="container__date__heure"><p class="date__heure">' 
                        . htmlspecialchars($donnees['date_fr']) . '</p></div>';

                        echo '<div class="container__message"><p class="message">' 
                        . htmlspecialchars($donnees['message']) . '</p></div>';
                    }
                    
                    $reponse->closeCursor();
                ?>
                </div>
            </div>

            <div class="container__form">
                <form action="messages.php" method="POST" class="formulaire">
                    <div class="container__input--pseudo">
                        <label for="pseudo">Pseudo</label>
                        <!-- input pseudo avec la cookie -->
                        <input type="text" id="pseudo" class="input input--pseudo" name="pseudo" value="<?php if (isset($_COOKIE['pseudo'])){
                            echo htmlspecialchars($_COOKIE['pseudo']);
                        }?>">
                    </div>

                    <div class="container__input--message">
                        <label for="message">Message</label>
                        <input type="text" id="message" class="input input--message" name="message">

                        <button type="submit" class="btn__envoyer">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </body>

    </html>