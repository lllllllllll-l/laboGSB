<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de connexion</title>
    <link rel="stylesheet" href="/projetMedocs/view/css/css.css">
</head>
<?php include "header.php" ?>
<body>
    <div class="container">
        <div class="formulaire">
        <h2>Connexion</h2>
        <form action="index.php" method="post">
            <div>
                <label for="username">Nom d'utilisateur :</label><br/>
                <input type="text" id="username" name="username" required>
            </div>
            <div>
                <label for="password">Mot de passe :</label><br/>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" name="action" class="btnContainer" value="connexion">Se connecter</button>
        </form>
        </div>
    </div>
    <?php include "footer.php" ?>
</body>
</html>