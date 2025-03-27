
<?php
require_once "model/modelMedicament.php";
require_once "controller/medicamentController.php";



if (isset($_POST["action"]))
{
    if ($_POST["action"]=="inscription")
    {
        addUtilisateur();
    }
    if ($_POST["action"]=="connexion")
    {
        rechercheUtilisateur();
    }
    if ($_POST["action"]=="afficher")
    {
        getAllMedicaments();
    }
    if ($_POST["action"]=="afficherActivite")
    {
        getAllActivites();
    }
    if ($_POST["action"]=="retour")
    {
        getAllMedicaments();
    }
    if ($_POST["action"]=="interaction")
    {
        getInteractionController();
    }
    if ($_POST["action"]=="chargementFormInscription")
    {
        chargementFormInscription();
    }
    if ($_POST["action"]=="chargementFormConnexion")
    {
        chargementFormConnexion();
    }
    if ($_POST["action"]=="chargementFormMedicaments")
    {
        getAllMedicaments();
    }
    if ($_POST["action"]=="chargementFormActivites")
    {
        getAllActivites();
    }
    if ($_POST["action"]=="inscriptionActivite")
    {
        incriptionActivite();
    }
    if ($_POST["action"]=="desinscriptionActivite")
    {
        desinscriptionActivite();
    }
    if ($_POST["action"]=="chargementMentionLegales")
    {
        chargementMentionLegales();
    }
    if ($_POST["action"]=="deconnexion")
    {
        deconnexion();
    }
    if ($_POST["action"]=="suppressionCompte")
    {
        suppressionCompte();
    }
}
else 
{
    chargementFormInscription();
}

?>