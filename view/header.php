<head>
<link rel="stylesheet" href="/projetMedocs/view/css/css.css">
</head>
<header>
    <div class="header-container">
        <div class="logo">
            <img src="view/img/logo.png">
        </div>
        <?php 
        if (isset($_SESSION["idUtilisateur"]))
        {
        echo '
        <nav>
            <ul class="nav-links">
                <form action="index.php" method="POST">
                    <button type="submit" name="action" value="chargementFormMedicaments" class="btnNavBar">
                        Liste Médicaments
                    </button>
                </form>
                <form action="index.php" method="POST">
                    <button type="submit" name="action" value="chargementFormActivites" class="btnNavBar">
                        Liste Activités
                    </button>
                </form>
                <form action="index.php" method="POST">
                    <button type="submit" name="action" value="deconnexion" class="btnNavBar" id="headerBtnDeconnexion">
                        Se Déconnecter
                    </button>
                </form>
                <button type="button" class="btnNavBar text-danger" id="headerBtnSupprimerCompte">
                    Supprimer le compte
                </button>
            </ul>
        </nav>';
        }
        else 
        {
            echo '
            <nav>
            <ul class="nav-links">
                <form action="index.php" method="POST">
                    <button type="submit" name="action" value="chargementFormInscription" class="btnNavBar">
                        Inscription
                    </button>
                </form>
                <form action="index.php" method="POST">
                    <button type="submit" name="action" value="chargementFormConnexion" class="btnNavBar">
                        Connexion
                    </button>
                </form>
            </nav>
            ';
        }
        ?>
    </div>
</header>

<div id="headerPopupConfirmation" class="header-popup">
    <div class="header-popup-content">
        <h2>Confirmer la suppression</h2>
        <p>Êtes-vous sûr de vouloir supprimer votre compte ? Cette action est irréversible.</p>
        <div class="header-popup-buttons">
            <button id="headerConfirmDelete" class="header-btn-confirm">Oui, supprimer</button>
            <button id="headerCancelDelete" class="header-btn-cancel">Annuler</button>
        </div>
    </div>
</div>

<script>
    document.getElementById("headerBtnSupprimerCompte").addEventListener("click", function () {
        document.getElementById("headerPopupConfirmation").style.display = "flex";
    });

    document.getElementById("headerCancelDelete").addEventListener("click", function () {
        document.getElementById("headerPopupConfirmation").style.display = "none";
    });

    document.getElementById("headerConfirmDelete").addEventListener("click", function () {
        let form = document.createElement("form");
        form.method = "POST";
        form.action = "index.php";

        let input = document.createElement("input");
        input.type = "hidden";
        input.name = "action";
        input.value = "suppressionCompte";

        form.appendChild(input);
        document.body.appendChild(form);
        form.submit();
    });
</script>