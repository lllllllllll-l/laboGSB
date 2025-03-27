<?php 

session_start();

function addUtilisateur()
{
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password = password_hash($password, PASSWORD_DEFAULT);
    $reponseInscription = insertUtilisateur($nom,$prenom,$username,$password);
    $decodeReponse = json_decode($reponseInscription,true);
    if ($decodeReponse["status"]==1)
    {
        $_SESSION['inscription_success'] = true;
    }
    else 
    {
        $_SESSION['inscription_success'] = false;
    }
    require_once("view/inscription.php");
}

function incriptionActivite()
{
    $idActivite = $_POST["id"];
    $idUtilisateur = $_SESSION["idUtilisateur"];
    insertActivite($idUtilisateur,$idActivite);
    getAllActivites();
}


function getAllMedicaments()
{
    if (isset($_POST["id"]))
    {
    $id = $_POST["id"];
    }
    else 
    {
        $id = 0;
    }
    $string_decode = getMedicament($id);
    $selectAll = getMedicament(0);
    require_once ("view/listMedocs.php");
}

function getAllActivites()
{
    if (isset($_POST["id"]))
    {
    $id = $_POST["id"];
    }
    else 
    {
        $id = 0;
    }
    $string_decode_activite = getActivites($id);
    $activiteInscrit = getActivitesInscrit($_SESSION["idUtilisateur"]);
    require_once ("view/listActivites.php");
}

function getInteractionController()
{
    if (isset($_POST["id"]))
    {
    $id = $_POST["id"];
    }
    if (isset($_POST["current_id"]))
    {
    $id2 = $_POST["current_id"];
    }
    $interactionText = getInteractionModel($id, $id2);
    $string_decode = getMedicament($id2);
    $selectAll = getMedicament(0);
    $idSelectionne = $id;
    require_once ("view/listMedocs.php");
}

function desinscriptionActivite()
{
    $id = $_POST["id"];
    $idU = $_SESSION["idUtilisateur"];
    delInscription($id, $idU);
    $string_decode_activite = getActivites($id);
    $activiteInscrit = getActivitesInscrit($_SESSION["idUtilisateur"]);
    require_once ("view/listActivites.php"); 
}

function chargementFormConnexion()
{
   require_once "view/connexion.php";
}

function chargementMentionLegales()
{
    require_once "view/mentionLegal.php";
}

function chargementFormInscription()
{
   require_once "view/inscription.php";
}

function rechercheUtilisateur()
{

   $nomU = htmlspecialchars($_REQUEST["username"]);
   $motDePasseU = htmlspecialchars($_REQUEST["password"]);

   $util = trouveUtilisateur($nomU,$motDePasseU);
  if ($util == false)
   {
      require_once "view/connexion.php";
   }
   else
   {
      $_SESSION["nomUtilisateur"] = $util["nom"];
      $_SESSION["prenomUtilisateur"] = $util["prenom"];
      $_SESSION["idUtilisateur"] = $util["idUtilisateurs"];
      getAllMedicaments();
   }
}

function deconnexion()
{
    $_SESSION = array();
    session_destroy();
    require_once "view/connexion.php";
}

function suppressionCompte()
{
    $idU = $_SESSION["idUtilisateur"];
    delCompte($idU);
    deconnexion();
}

?>