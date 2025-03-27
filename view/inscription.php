<?php 


$popup = false;
$message = "";

if (isset($_SESSION["inscription_success"])) {
    if ($_SESSION["inscription_success"]) {
        $popup = true;
        $message = "Inscription réussie ! 🎉";
    } else {
        $popup = true;
        $message = "Nom d'utilisateur déjà utlisé";
    }
    unset($_SESSION["inscription_success"]);
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'inscription</title>
    <link rel="stylesheet" href="/projetMedocs/view/css/css.css">
</head>
<?php include "header.php" ?>
<body>
    <div class="container">
        <div class="formulaire">
        <h2>Inscription</h2>
        <form action="index.php" method="post">
            <div>
                <label for="nom">Nom :</label><br/>
                <input type="text" id="nom" name="nom" required>
            </div>
            <div>
                <label for="prenom">Prénom :</label><br/>
                <input type="text" id="prenom" name="prenom" required>
            </div>
            <div>
                <label for="username">Nom d'utilisateur :</label><br/>
                <input type="text" id="username" name="username" required>
            </div>
            <div>
                <label for="password">Mot de passe :</label><br/>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" name="action" class="btnContainer" value="inscription">S'inscrire</button>
        </form>
        <div id="popup" class="popup">
    <div class="popup-content">
        <span class="close" onclick="closePopup()">&times;</span>
        <p id="popup-message"></p>
    </div>
</div>

    <script>
    function closePopup() {
        document.getElementById("popup").style.display = "none";
    }

    // Vérifie si une popup doit s'afficher
    let inscriptionResult = <?php echo json_encode($popup); ?>;
    let inscriptionMessage = <?php echo json_encode($message); ?>;

    if (inscriptionResult) {
        document.getElementById("popup-message").textContent = inscriptionMessage;
        document.getElementById("popup").style.display = "block";
    }
    </script>
        </div>
    </div>
    <?php include "footer.php" ?>
</body>
</html>