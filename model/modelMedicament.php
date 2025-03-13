<?php

function insertPizza($nom,$prix,$taille,$avis)
{
    $url = 'http://127.0.0.1/ApiPhp/pizzas.php';
    $data = array('nom' => $nom, 'prix' => $prix, 'taille' => $taille, 'avis' => $avis);
    $options = array('http' => array('header'=> "Content-type: application/x-www-form-urlencoded\r\n", 'method'=> 'POST', 'content'=> http_build_query($data)));
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    if ($result === FALSE)
    {
        /* qqchose */
    }
    return $result;
}

function updatePizza($id,$nom,$prix,$taille,$avis)
{
    $url = "http://127.0.0.1/ApiPhp/pizzas.php?id=".$id;
    $data = array('nom' => $nom, 'prix' => $prix, 'taille' => $taille, 'avis' => $avis);
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    $reponse = curl_exec($ch);
    if (!$reponse)
    {
        return false;
    }
}

function deletePizza($id)
{
    $url = "http://127.0.0.1/ApiPhp/pizzas.php?id=".$id;
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

function getMedicament()
{
    $url = "http://127.0.0.1/projetMedocs/api/Medicament.php";
    $options = array('http' => array('header'=> "Content-type: application/x-www-form-urlencoded\r\n", 'method'=> 'GET'));
    $context = stream_context_create($options);
    $result = file_get_contents($url,false,$context);
    $string_decode = json_decode($result, true);
    return $string_decode;
}

?>