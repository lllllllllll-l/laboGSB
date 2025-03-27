<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="/projetMedocs/view/css/css.css">
        <title> GSB Group </title>
    </head>
<body>
    <?php include "header.php" ?>
    <div class="containers">
    <?php
        $singleActivite = (count($string_decode_activite) == 1);
        $activiteInscritTrouve = false;
        if (!$singleActivite)
        echo "<h1> Bienvenue ".$_SESSION["prenomUtilisateur"]." ".$_SESSION["nomUtilisateur"]. "</h1>"
    ?>
    <div class="content">
    <h2> Nos Activités </h2>
<?php 

if (!empty($string_decode_activite)) {

    echo '<table class="table table-info table-bordered table-striped">';
    echo '<thead><tr>';
    echo '<th>Nom</th>';
    if ($singleActivite) {
        echo '<th>Description</th>';
    }
    echo '<th>Action</th>';
    echo '</tr></thead>';
    echo '<tbody>';
    
    for ($i = 0; $i < count($string_decode_activite); $i++) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($string_decode_activite[$i]["nom"]) . '</td>';
        
        if ($singleActivite) {
            echo '<td>' . htmlspecialchars($string_decode_activite[$i]["description"]) . '</td>';
        }
        
        if (!$singleActivite){
        echo '<td>';
        }
        echo '<form action="index.php" method="post" class="d-inline">';
        echo '<input type="hidden" name="id" value="' . htmlspecialchars($string_decode_activite[$i]["idActivite"]) . '">';
        if (!$singleActivite)
        {
        echo '<button type="submit" name="action" value="afficherActivite" class="btn btn-primary btn-sm">Afficher</button>';
        }
        if ($singleActivite) {
            echo '<td>';

            if (!empty($activiteInscrit)) {
                foreach ($activiteInscrit as $inscrit) {
                    if ($inscrit["idActivite"] == $string_decode_activite[0]["idActivite"]) {
                        $activiteInscritTrouve = true;                        
                        break;
                    }
                }
            }

            echo '<form action="index.php" method="post" class="d-inline">';
            echo '<input type="hidden" name="id" value="' . htmlspecialchars($string_decode_activite[0]["idActivite"]) . '">';
            if (!$activiteInscritTrouve)
            {
                echo '<button type="submit" name="action" value="inscriptionActivite" class="btn btn-primary btn-sm" id="inscriptionButton"> S\'inscrire </button>';
            }
            else 
            {
                echo '<button type="submit" name="action" value="desinscriptionActivite" class="btn btn-primary btn-sm" id="desinscriptionButton"> Se désinscrire </button>';
            }
            echo '</form>';
            echo '</td>';
        }
        echo '</form>';
        if (!$singleActivite){
        echo '</td>';
        }
        echo '</tr>';
    }
    
    echo '</tbody>';
    echo '</table>';

    if ($singleActivite)
    {
        echo '<form action="index.php" method="post" class="mt-2">';
        echo '<button type="submit" name="action" value="chargementFormActivites" class="btn btn-secondary">Retour</button>';
        echo '</form>';
    }

}
    
?>
</div>
</div>
<?php include "footer.php" ?>
</body>
</html>