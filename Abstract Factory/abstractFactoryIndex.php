<?php

/*
Producto abstracto
Automovil
*/

abstract class Automovil {

    protected string $modelo;
    protected string $color;
    protected int $potencia;
    protected float $espacio;

    public function __construct(string $modelo, string $color, int $potencia, float $espacio) {
        $this->modelo = $modelo;
        $this->color = $color;
        $this->potencia = $potencia;
        $this->espacio = $espacio;
    }

    abstract public function mostrarCaracteristicas(): void;

}

/*
Producto concreto 
Automovil Electrico
*/

class AutomovilElectrico extends Automovil {

    public function mostrarCaracteristicas(): void{
        echo "Automovil electrico\n";
        echo "Modelo: $this->modelo\n";
        echo "Color: $this->color\n";
        echo "Potencia: $this->potencia\n";
        echo "Espacio: $this->espacio\n";
    }

}

/*
Producto concreto
Automovil Gasolina
*/

class AutomovilGasolina extends Automovil {

    public function mostrarCaracteristicas(): void {
        echo "Automovil de gasolina\n";
        echo "Modelo: $this->modelo\n";
        echo "Color: $this->color\n";
        echo "Potencia: $this->potencia\n";
        echo "Espacio: $this->espacio\n";
    }

}

/*
Producto abstracto 
Motocicleta
*/

abstract class Motocicleta {

    protected string $modelo;
    protected string $color;
    protected int $potencia;

    public function __construct(string $modelo, string $color, int $potencia) {
        $this->modelo = $modelo;
        $this->color = $color;
        $this->potencia = $potencia;
    }

    abstract public function mostrarCaracteristicas(): void;

}

/*
Producto concreto
Motocicleta Electrica
*/

class MotocicletaElectrica extends Motocicleta {

    public function mostrarCaracteristicas(): void {
        echo "Motocicleta electrica\n";
        echo "Modelo: $this->modelo\n";
        echo "Color: $this->color\n";
        echo "Potencia: $this->potencia\n";
    }

}

/*
Producto concreto
Motocicleta Gasolina
*/

class MotocicletaGasolina extends Motocicleta {

    public function mostrarCaracteristicas(): void {
        echo "Motocicleta de gasolina\n";
        echo "Modelo: $this->modelo\n";
        echo "Color: $this->color\n";
        echo "Potencia: $this->potencia\n";
    }

}

/*
Interfaz Fabrica abstracta
FabricaVehiculo
*/

interface FabricaVehiculo {

    public function crearAutomovil(string $modelo, string $color, int $potencia, float $espacio): Automovil;
    public function crearMotocicleta(string $modelo, string $color, int $potencia): Motocicleta;

}

/*
Fabrica concreta
Fabrica Vehiculo Electrico
*/

class FabricaVehiculoElectrico implements FabricaVehiculo {

    public function crearAutomovil(string $modelo, string $color, int $potencia, float $espacio): Automovil {

        return new AutomovilElectrico(
            $modelo,
            $color,
            $potencia,
            $espacio
        );

    }

    public function crearMotocicleta(string $modelo, string $color, int $potencia): Motocicleta {

        return new MotocicletaElectrica(
            $modelo,
            $color,
            $potencia
        );

    }
}

/*
Fabrica concreta
Fabrica Gasolina
*/
class FabricaVehiculoGasolina implements FabricaVehiculo{
    public function crearAutomovil(string $modelo, string $color, int $potencia, float $espacio): Automovil {

        return new AutomovilGasolina(
            $modelo,
            $color,
            $potencia,
            $espacio
        );

    }

    public function crearMotocicleta(string $modelo, string $color, int $potencia): Motocicleta {

        return new MotocicletaGasolina(
            $modelo,
            $color,
            $potencia
        );

    }
}

/*
Cliente
*/

echo "Seleccione una fabrica:\n";
echo "1. Vehiculos electricos\n";
echo "2. Vehiculos de gasolina\n";

$opcion = trim(fgets(STDIN));

if ($opcion == "1") {
    $fabrica = new FabricaVehiculoElectrico();
} else {
    $fabrica = new FabricaVehiculoGasolina();
}

// Crear automovil
$automovil = $fabrica->crearAutomovil(
    "Tesla Model X",
    "Rojo",
    500,
    5.5
);

// Crear motocicleta
$motocicleta = $fabrica->crearMotocicleta(
    "Yamaha MT-07",
    "Negro",
    300
);

echo "\n";
echo "Automovil: \n";

$automovil->mostrarCaracteristicas();

echo "\n";
echo "Motocicleta:\n";

$motocicleta->mostrarCaracteristicas();

?>
