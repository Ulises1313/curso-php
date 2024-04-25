<?php 
#Esto habilitara el tipado estricto
declare(strict_types=1); # <- A nivel del archivo y hasta arriba

#const API_URL = "https://whenisthenextmcufilm.com/api";
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
#Para acceder a la siguiente variable dentro de una funcion
$title = "Hola"; #Es necesario llamarla global
#Creación de funciones en php
function get_data(string $url) : array {
    #Aqui llamamos la variable $title / tambien se puede pasar por parametro
    #global $title;
    #echo $title;

    #En caso donde solo quieras hacer una peticion GET
    #Puedes usar
    $result = file_get_contents($url); 
    #Decodificamos el json
    $data = json_decode($result,true);
    return $data;
}

function get_until_message(int $days) : string{
    #Usaremos un match, que es como un swich en php, claro que puedes usar switch tambien
    return match (true) {
        $days === 0  => "Hoy se estrena",
        $days === 1  => "Mañana se estrena",
        $days < 7    => "Esta semana se estrena",
        $days < 30   => "Este mes se estrena",
        default      => "$days dias para el estreno",
      };
}

function render_template (string $template, array $data = []) {
    extract($data); #Usamos el extract para acceder al contenido que pasamos
    #Lo puedo entender como un tipo desestructuración, solo que aqui estas
    #pasando todo el arreglo y el valor lo usas en el template
    #con el nombre de la propiedad
    require "templates/$template.php";
}