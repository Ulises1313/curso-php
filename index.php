<?php
#Esto habilitara el tipado estricto
declare(strict_types=1);
const API_URL = "https://whenisthenextmcufilm.com/api";
/*
#Esta manera es la manera más cruda  de hacer una peticion 
#Inicializar una nueva sesion de cURL; ch = cURL handle
$ch = curl_init(API_URL); 
//Indicar que queremos recibir el resultado de la peticion y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

/* Ejecutar la peticion
    y guardamos el resultado

$result = curl_exec($ch);
$data = json_decode($result, true);
curl_close($ch);
*/

#Creación de funciones en php
function get_data(string $url) : array {
    #En caso donde solo quieras hacer una peticion GET
    #Puedes usar
    $result = file_get_contents($url); 
    #Decodificamos el json
    $data = json_decode($result,true);
    return $data;
}

$data = get_data(API_URL);

?>

<head>
    <title>La proxima pelicula de Marvel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css" />
</head>

<main>
    <section>
        <img src="<?=$data["poster_url"]; ?>" alt="Poster de <?= $data["title"]; ?>" width="200" style="border-radius: 16px;">
    </section>
    <hgroup>
        <h3><?= $data["title"];?> se estrena en <?= $data["days_until"]; ?> dias</h3>
        <p>Fecha de estreno: <?= $data["release_date"]; ?></p>
        <p>La siguiente es: <?= $data["following_production"]["title"]; ?></p>
        
    </hgroup>
</main>

<style>
    :root {
        color-scheme: light dark;
    }

    body {
        display: grid;
        place-content: center;
    }

    section{
        display: flex;
        justify-content: center;
        text-align: center;
    }

    hgroup{
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }

    img{
        margin: 0 auto;
    }
</style>