<?php
#require 'functions.php';  # <- Esto trae el codigo del archivo y lo pega en donde se importo
require_once 'const.php';
require_once 'functions.php'; # <- Este es para asegurarse que se importe una sola vez y no se duplice
#Si se pone un archivo que no existe se rompe el programa
#Para evitar eso se usa:
#include 'functions.php';
#Tener cuidado en usar uno u otro, se recomienda el require porque muestra un precioso FATAL ERROR
#$data = get_data(API_URL);
#$untilMessage = get_until_message($data["days_until"]);

#--------- Aqui empezaremos a usar la clase ------------
require 'clases/NextMovie.php';
#Creamos una variable, le asignamos lo que devuelve el método stactic
# y pasamos la constante de API que viene de const.php
$next_movie = NextMovie::fetch_and_create_movie(API_URL); 
#Obtenemos los datos
$next_movie_data = $next_movie -> get_data();

?>

<?php
    #Recuerda que puedes pasar solo la propiedad que necesitas
    render_template('head', ["title" => $next_movie_data["title"]]) ?>
<?php render_template('styles') ?>

<?php
    #Podemos fusionar arreglos para pasar un valor, es como agregarle un nuevo valor
    #en php se llama mergear o merge 
    render_template('main',array_merge($next_movie_data,
    ["until_message" => $next_movie -> get_until_message()])) 
?>


