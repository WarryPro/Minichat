<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minichat</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <div class="container__messages">
            <div class="container__pseudo_message">
                <p class="pseudo"></p>
                <p class="message"></p>
                <P class="date__heure"></P>
            </div>
        </div>
        <div class="container__form">
            <form action="messages.php" method="POST">
                <label for="pseudo">Pseudo</label>
                <input type="text" id="pseudo" name="pseudo">

                <label for="message">Message</label>
                <input type="text" id="message" name="message">

                <input type="submit" value="Envoyer">
            </form>
        </div>
    </div>
</body>

</html>