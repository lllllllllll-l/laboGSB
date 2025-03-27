<?php

function insertUtilisateur($nom,$prenom,$username,$password)
{
    $url = 'http://127.0.0.1/projetMedocs/api/Medicament.php?ajoutU=true';
    $data = array('nom' => $nom, 'prenom' => $prenom, 'username' => $username, 'password' => $password);
    $options = array('http' => array('header'=> "Content-type: application/x-www-form-urlencoded\r\n", 'method'=> 'POST', 'content'=> http_build_query($data)));
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    if ($result === FALSE)
    {
        /* qqchose */
    }
    return $result;
}

function insertActivite($idUtilisateur,$idActivite)
{
    $url = 'http://127.0.0.1/projetMedocs/api/Medicament.php';
    $data = array('idActivite' => $idActivite, 'idUtilisateurs' => $idUtilisateur);
    $options = array('http' => array('header'=> "Content-type: application/x-www-form-urlencoded\r\n", 'method'=> 'POST', 'content'=> http_build_query($data)));
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    if ($result === FALSE)
    {
        /* qqchose */
    }
    return $result;
}

function getMedicament($id)
{
    $url = "http://127.0.0.1/projetMedocs/api/Medicament.php?id=".$id;
    $options = array('http' => array('header'=> "Content-type: application/x-www-form-urlencoded\r\n", 'method'=> 'GET'));
    $context = stream_context_create($options);
    $result = file_get_contents($url,false,$context);
    $string_decode = json_decode($result, true);
    return $string_decode;
}

function getActivites($id)
{
    $url = "http://127.0.0.1/projetMedocs/api/Medicament.php?activite=true&idActivite=".$id;
    $options = array('http' => array('header'=> "Content-type: application/x-www-form-urlencoded\r\n", 'method'=> 'GET'));
    $context = stream_context_create($options);
    $result = file_get_contents($url,false,$context);
    $string_decode = json_decode($result, true);
    return $string_decode;
}

function getActivitesInscrit($id)
{
    $url = "http://127.0.0.1/projetMedocs/api/Medicament.php?idUtilisateur=".$id;
    $options = array('http' => array('header'=> "Content-type: application/x-www-form-urlencoded\r\n", 'method'=> 'GET'));
    $context = stream_context_create($options);
    $result = file_get_contents($url,false,$context);
    $string_decode = json_decode($result, true);
    return $string_decode;
}

function getInteractionModel($id, $id2)
{
    $url = "http://127.0.0.1/projetMedocs/api/Medicament.php?id=".$id."&id2=".$id2;
    $options = array('http' => array('header'=> "Content-type: application/x-www-form-urlencoded\r\n", 'method'=> 'GET'));
    $context = stream_context_create($options);
    $result = file_get_contents($url,false,$context);
    $string_decode = json_decode($result, true);
    return $string_decode;
}

function trouveUtilisateur($nom, $mdp)
{
    $url = "http://127.0.0.1/projetMedocs/api/Medicament.php?nom=".$nom."&mdp=".$mdp;
    $options = array('http' => array('header'=> "Content-type: application/x-www-form-urlencoded\r\n", 'method'=> 'GET'));
    $context = stream_context_create($options);
    $result = file_get_contents($url,false,$context);
    $string_decode = json_decode($result, true);
    return $string_decode;
}

function delInscription($id,$idU)
{
    $url = "http://127.0.0.1/projetMedocs/api/Medicament.php?id=".$id."&idU=".$idU;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    $reponse = curl_exec($ch);
    if (!$reponse)
    {
        return false;
    }
    curl_close($ch);
}

function delCompte($idU)
{
    $url = "http://127.0.0.1/projetMedocs/api/Medicament.php?idU=".$idU;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    $reponse = curl_exec($ch);
    if (!$reponse)
    {
        return false;
    }
    curl_close($ch);
}

?>