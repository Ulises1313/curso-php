<?php
#Tipado
declare(strict_types = 1);

#Creacion de la clase
class NextMovie{
    #Properties Promotion y constructor
    public function __construct(
        private string $title,
        private int $days_until,
        private string $following_production,
        private string $release_date,
        private string $poster_url,
        private string $overview){
        
    }

    public function get_until_message() : string{
        $days = $this -> days_until; #Recuerda que aqui no se pone el $

        return match (true) {
            $days === 0  => "Hoy se estrena",
            $days === 1  => "Mañana se estrena",
            $days < 7    => "Esta semana se estrena",
            $days < 30   => "Este mes se estrena",
            default      => "$days dias para el estreno",
          };
    }

    public static function fetch_and_create_movie(string $api_url): NextMovie {
        #Obtenemos los datos de la API
        $result = file_get_contents($api_url);
        $data = json_decode($result,true);
        return new self(
            $data["title"],
            $data["days_until"],
            $data["following_production"]["title"] ?? "Desconocido",
            $data["release_date"],
            $data["poster_url"],
            $data["overview"]
        );
    }

    public function get_data(){
        return get_object_vars($this);
    }
}