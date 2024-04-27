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

    #Método parecido al toString()
    public function show_all(){
        return get_object_vars($this); #Le pasamos this por que
        #Sabemos que hace referencia a la clase
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

    #Métodos estaticos
    public static function random() {
        $names = ["Thor", "Spiderman", "Wolverine", "Ironman", "Hulk"];
        $powers = [
        ["Superfuerza", "Volar", "Rayos láser"],
        ["Superfuerza", "Super agilidad", "Telarañas"],
        ["Regeneración", "Superfuerza", "Garras de adamantium"],
        ["Superfuerza", "Volar", "Rayos láser"],
        ["Superfuerza", "Super agilidad", "Cambio de tamaño"],
        ];
        $planets = ["Asgard", "HulkWorld", "Krypton", "Tierra"];

        $name = $names[array_rand($names)];#Devuelve una llave aleatoria
        $power = $powers[array_rand($powers)];
        $planet = $planets[array_rand($planets)];

        #Crear el objeto desde el método
        return new self($name, $power, $planet);
        #self se refiere a la propia clase
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

#Uso del show_all
var_dump($hero -> show_all());

#Llamada de un método static
$heroStatic = SuperHero::random();
echo $heroStatic -> description();