<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="/projetMedocs/view/css/css.css">
        <title> GSB Group </title>
        <script>
            function submitForm() {
                document.getElementById("medicamentForm").submit();
            }
        </script>
    </head>
<body>
    <?php include "header.php" ?>
    <div class="containers">
    <?php
        $singleMedicament = (count($string_decode) == 1);
        if (!$singleMedicament)
        echo "<h1> Bienvenue ".$_SESSION["prenomUtilisateur"]." ".$_SESSION["nomUtilisateur"]. "</h1>"
    ?>
    <div class="content">
    <h2> Nos Medicaments </h2>
<?php 
if (!empty($string_decode)) {
    
    echo '<table class="table table-info table-bordered table-striped">';
    echo '<thead><tr>';
    echo '<th>Nom</th>';
    
    if ($singleMedicament) {
        echo '<th>Effets Secondaires</th>';
        echo '<th>Effets Thérapeutiques</th>';
    }
    else
    {
    echo '<th>Action</th>';
    }
    echo '</tr></thead>';
    echo '<tbody>';
    
    for ($i = 0; $i < count($string_decode); $i++) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($string_decode[$i]["nom"]) . '</td>';
        
        if ($singleMedicament) {
            echo '<td>' . htmlspecialchars($string_decode[$i]["effetsSecondaires"]) . '</td>';
            echo '<td>' . htmlspecialchars($string_decode[$i]["effetsTherapeutiques"]) . '</td>';
        }
        
        if (!$singleMedicament){
        echo '<td>';
        }
        echo '<form action="index.php" method="post" class="d-inline">';
        echo '<input type="hidden" name="id" value="' . htmlspecialchars($string_decode[$i]["idMedicament"]) . '">';
        if (!$singleMedicament)
        {
        echo '<button type="submit" name="action" value="afficher" class="btn btn-primary btn-sm">Afficher</button>';
        }
        echo '</form>';
        if (!$singleMedicament){
        echo '</td>';
        }
        echo '</tr>';
    }
    
    echo '</tbody>';
    echo '</table>';

    
    if ($singleMedicament) {
        echo '<form id="medicamentForm" action="index.php" method="post">';
        echo '<label for="medicamentSelect">Choisir un médicament :  </label>';
        echo '<select name="id" id="medicamentSelect" onchange="submitForm()">';
        echo '<option value="">-- Sélectionnez un médicament --</option>';
        
        foreach ($selectAll as $medicament) {
            $selected = ($idSelectionne == $medicament["idMedicament"]) ? ' selected' : '';
            echo '<option value="' . htmlspecialchars($medicament["idMedicament"]) . '" ' . $selected . '>' . htmlspecialchars($medicament["nom"]) . '</option>';
        }
        
        echo "</select>";
        echo '<input type="hidden" name="current_id" value="' . htmlspecialchars($string_decode[0]["idMedicament"]) . '">';
        echo '<input type="hidden" name="action" value="interaction">';
        echo '</form>';
        echo "</br>";

        if (isset($interactionText[0]["idMedicament_1"]))
        {
            echo '<p class="pInteraction"> Interaction : '.$interactionText[0]["description"].'</p>';
        }
        
        echo '</select>';
        echo '<form action="index.php" method="post" class="mt-2">';
        echo '<button type="submit" name="action" value="retour" class="btn btn-secondary">Retour</button>';
        echo '</form>';
    }
}
?>
</div>
</div>
<?php include "footer.php" ?>
</body>
</html>