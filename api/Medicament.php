<?php
include ("db.php");
$http_method = $_SERVER["REQUEST_METHOD"];

switch($http_method)
{
    case 'GET':
        if(!empty($_GET["id"]))
        {
            $id = intval($_GET["id"]);
            getMedicament($id);
        }
        else
        {
            getMedicament();
        }
        break;
    case 'POST':
        addPizza();
        break;
    case 'PUT':
        $id = intval($_GET["id"]);
        updPizza($id);
        break;
    case 'DELETE':
        $id = intval($_GET["id"]);
        delPizza($id);
        break;
    default:
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}

function getMedicament($id=0)
{
    global $conn;
    $query = "SELECT * FROM medicament";
    if($id != 0)
    {
        $query .= " WHERE id=".$id." LIMIT 1";
    }
    $result = $conn->query($query);
    while ($row = $result->fetch())
    {
        $reponse[] = $row;
    }
    $result->closeCursor();
    header('Content-Type: application/json');
    echo json_encode($reponse, JSON_PRETTY_PRINT);
}

function addPizza()
{
    global $conn;
    print_r($_POST);
    $nom = $_POST["nom"];
    $prix = $_POST["prix"];
    $taille = $_POST["taille"];
    $avis = $_POST["avis"];
    echo $query="INSERT INTO pizza(nom,prix,taille,avis) VALUES('".$nom."', '".$prix."', '".$taille."', '".$avis."')";
    $conn->query("SET NAMES utf8");
    if($conn->query($query))
    {
        $reponse=array('status'=> 1, 'status_msg'=>'Pizza ajouté');
    }
    else 
    {
        $reponse=array('status'=> 0, 'status_msg'=>'Erreur ajout');
    }
    header('Content-Type: application/json');
    echo json_encode($reponse, JSON_PRETTY_PRINT);
}

function updPizza($id)
{
    global $conn;
    $_PUT = array();
    parse_str(file_get_contents('php://input'), $_PUT);
    $nom = $_PUT["nom"];
    $prix = $_PUT["prix"];
    $taille = $_PUT["taille"];
    $avis = $_PUT["avis"];
    $query="UPDATE pizza SET nom='".$nom."', prix='".$prix."', taille='".$taille."', avis='".$avis."' WHERE id=".$id;
    $conn->query("SET NAMES utf8");
    if($conn->query($query))
    {
        $reponse=array('status'=> 1, 'status_msg'=>'Pizza mis a jour');
    }
    else 
    {
        $reponse=array('status'=> 0, 'status_msg'=>'Erreur mis a jour');
    }
    header('Content-Type: application/json');
    echo json_encode($reponse, JSON_PRETTY_PRINT);
}

function delPizza($id)
{
    global $conn;
    $query = "DELETE FROM pizza WHERE id=".$id;
    $conn->query("SET NAMES utf8");
    if($conn->query($query))
    {
        $reponse=array('status'=> 1, 'status_msg'=>'Pizza supprimé');
    }
    else 
    {
        $reponse=array('status'=> 0, 'status_msg'=>'Erreur suppression');
    }
    header('Content-Type: application/json');
    echo json_encode($reponse, JSON_PRETTY_PRINT);
}
?>

