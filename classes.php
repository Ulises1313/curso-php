<?php
declare(strict_types=1);
#Clases
class SuperHero{
    #Pripiedades y los métodos
    #Manera tradicional de declarar
    /*public $name;
    public $powers;
    public $planet;
    public $level;*/

    #Constructor tradicional
    /*public function __construct($name, $powers, $planet){
        $this -> name = $name;
        $this -> powers = $powers;
        $this -> planet = $planet;
        $this -> level = 0;
    }*/

    #Properties Promotion (Para evitar repetir código) -> PHP 8
    public function __construct(
        readonly public string $name, #se convierte en solo lectura para evitar actualizaciones
        public array $powers,
        public string $planet){
   
    }

    public function attack(){
        return "¡$this -> name ataca con sus poderes";
    }

    public function description() {
        $powers = implode(", ", $this -> powers);
        return "$this -> name es un superhéroe que viene de 
        $this -> planet y tiene los siguientes poderes:
        $this -> $powers";
    }
}

#Creación del objeto sin constructor
/*$hero = new SuperHero();
$hero -> name = "Batman";
$hero -> powers = "Inteligencia, fuerza y tecnologia";
$hero -> planet = "Gotham";*/

#Creación del objeto con constructor
$hero = new SuperHero("SuperMan",["Super fuerza", "rayos laser"],"Krypton");

echo $hero -> description();