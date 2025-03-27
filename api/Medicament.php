<?php
include ("db_connect.php");
$http_method = $_SERVER["REQUEST_METHOD"];

switch($http_method)
{
    case 'GET':
        if(!empty($_GET["id"]))
        {
            if (!empty($_GET["id2"]))
            {
                $id = intval($_GET["id"]);
                $id2 = intval($_GET["id2"]);
                getInteraction($id,$id2);
            }
            else
            {
                $id = intval($_GET["id"]);
                getMedicament($id);
            }
        }
        else
        {
            if(!empty($_GET["nom"]))
            {
                $nom = $_GET["nom"];
                $mdp = $_GET["mdp"];
                getUtilisateur($nom,$mdp);
            }
            else 
            {
                if(!empty($_GET["activite"]))
                {
                    $id = intval($_GET["idActivite"]);
                    getActivite($id);
                }
                else 
                {
                    if(!empty($_GET["idUtilisateur"]))
                    {
                        $id = intval($_GET["idUtilisateur"]);
                        getActiviteInscrit($id);
                    }
                    else 
                    {
                    getMedicament();
                    }
                }
            }
        }
        break;
    case 'POST':
        if (isset($_GET["ajoutU"]))
        {
            addUtilisateur();
        }
        else 
        {
            addActivite();
        }
        break;
    case 'DELETE':
        $idU = intval($_GET["idU"]);
        if (!empty($_GET["id"]))
        {
            $id = intval($_GET["id"]);
            deleteInscription($id,$idU);
        }
        else 
        {
            deleteCompte($idU);
        }
        break;
    default:
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}

function getMedicament($id=0)
{
    global $conn;
    if ($id != 0)
    {
        $query = $conn->prepare("SELECT * FROM medicament WHERE idMedicament = ? LIMIT 1");
        $query->execute([$id]);
    }
    else
    {
        $query = $conn->query("SELECT * FROM medicament");
    }
    echo json_encode($query->fetchAll(PDO::FETCH_ASSOC), JSON_PRETTY_PRINT);
}

function getActivite($id=0)
{
    global $conn;
    if ($id != 0)
    {
        $query = $conn->prepare("SELECT * FROM activite WHERE idActivite = ? LIMIT 1");
        $query->execute([$id]);
    }
    else
    {
        $query = $conn->query("SELECT * FROM activite");
    }
    echo json_encode($query->fetchAll(PDO::FETCH_ASSOC), JSON_PRETTY_PRINT);
}

function getActiviteInscrit($id)
{
    global $conn;
    $query = $conn->prepare("SELECT * FROM inscription WHERE idUtilisateurs = ?");
    $query->execute([$id]);
    echo json_encode($query->fetchAll(PDO::FETCH_ASSOC), JSON_PRETTY_PRINT);
}

function getInteraction($id, $id2)
{
    global $conn;
    $query = $conn->prepare("SELECT * FROM interaction WHERE (idMedicament = ? AND idMedicament_1 = ?) OR (idMedicament = ? AND idMedicament_1 = ?) LIMIT 1");
    $query->execute([$id, $id2, $id2, $id]);
    echo json_encode($query->fetchAll(PDO::FETCH_ASSOC), JSON_PRETTY_PRINT);
}

function addUtilisateur()
{
    global $conn;
    try {
        $query = $conn->prepare("INSERT INTO utilisateurs (nom, prenom, nomUtilisateur, mdpUtilisateur) VALUES (?, ?, ?, ?)");
        $success = $query->execute([$_POST["nom"], $_POST["prenom"], $_POST["username"], $_POST["password"]]);
        echo json_encode(['status' => 1, 'status_msg' => 'Utilisateur ajouté'], JSON_PRETTY_PRINT);
    } catch (PDOException $e) {
        echo json_encode(['status' => 0, 'status_msg' => 'Erreur ajout: ' . $e->getMessage()], JSON_PRETTY_PRINT);
    }
}

function addActivite()
{
    global $conn;
    $query = $conn->prepare("INSERT INTO inscription (idActivite, idUtilisateurs) VALUES (?, ?)");
    $success = $query->execute([$_POST["idActivite"], $_POST["idUtilisateurs"]]);
    echo json_encode(['status' => $success ? 1 : 0, 'status_msg' => $success ? 'Inscription ajoutée' : 'Erreur ajout'], JSON_PRETTY_PRINT);
}

function getUtilisateur($nomU, $motDePasseU)
{
    global $conn;
    $query = $conn->prepare("SELECT * FROM utilisateurs WHERE nomUtilisateur = ?");
    $query->execute([$nomU]);
    $util = $query->fetch(PDO::FETCH_ASSOC);
    
    if ($util && password_verify($motDePasseU, $util["mdpUtilisateur"]))
    {
        echo json_encode($util, JSON_PRETTY_PRINT);
    }
    else
    {
        echo json_encode(false, JSON_PRETTY_PRINT);
    }
}

function deleteInscription($id, $idU)
{
    global $conn;
    $query = $conn->prepare("DELETE FROM inscription WHERE idActivite = ? AND idUtilisateurs = ?");
    $success = $query->execute([$id, $idU]);
    echo json_encode(['status' => $success ? 1 : 0, 'status_msg' => $success ? 'Inscription supprimée' : 'Erreur suppression'], JSON_PRETTY_PRINT);
}

function deleteCompte($idU)
{
    global $conn;
    $query = $conn->prepare("DELETE FROM utilisateurs WHERE idUtilisateurs = ?");
    $success = $query->execute([$idU]);
    echo json_encode(['status' => $success ? 1 : 0, 'status_msg' => $success ? 'Compte supprimé' : 'Erreur suppression'], JSON_PRETTY_PRINT);
}
?>


