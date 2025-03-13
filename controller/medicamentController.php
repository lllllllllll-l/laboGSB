<?php 

function addPizza()
{
    $nom = $_POST["nom"];
    $prix = $_POST["prix"];
    $taille = $_POST["taille"];
    $avis = $_POST["avis"];
    insertPizza($nom,$prix,$taille,$avis);
}

function updPizza()
{
    $id = $_POST["id"];
    $nom = $_POST["nom"];
    $prix = $_POST["prix"];
    $taille = $_POST["taille"];
    $avis = $_POST["avis"]; 
    updatePizza($id,$nom,$prix,$taille,$avis);
}

function delPizza()
{
    $id = $_POST["id"];
    deletePizza($id);
}

function getAllMedicaments()
{
    $string_decode = getMedicament();
    include ("view/listMedocs.php");
}

?>