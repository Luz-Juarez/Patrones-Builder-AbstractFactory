<?php

// ======================================
// Clase abstracta Automovil
// ======================================

abstract class Automovil
{
    protected string $modelo;
    protected string $color;
    protected int $potencia;
    protected float $espacio;

    public function __construct(
        string $modelo,
        string $color,
        int $potencia,
        float $espacio
    ) {
        $this->modelo = $modelo;
        $this->color = $color;
        $this->potencia = $potencia;
        $this->espacio = $espacio;
    }

    abstract public function mostrarCaracteristicas(): void;
}

// ======================================
// Automovil Electrico
// ======================================

class AutomovilElectrico extends Automovil
{
    public function mostrarCaracteristicas(): void
    {
        echo "Automovil electrico\n";
        echo "Modelo: $this->modelo\n";
        echo "Color: $this->color\n";
        echo "Potencia: $this->potencia\n";
        echo "Espacio: $this->espacio\n";
    }
}

// ======================================
// Automovil Gasolina
// ======================================

class AutomovilGasolina extends Automovil
{
    public function mostrarCaracteristicas(): void
    {
        echo "Automovil de gasolina\n";
        echo "Modelo: $this->modelo\n";
        echo "Color: $this->color\n";
        echo "Potencia: $this->potencia\n";
        echo "Espacio: $this->espacio\n";
    }
}

// ======================================
// Clase abstracta Motocicleta
// ======================================

abstract class Motocicleta
{
    protected string $modelo;
    protected string $color;
    protected int $potencia;

    public function __construct(
        string $modelo,
        string $color,
        int $potencia
    ) {
        $this->modelo = $modelo;
        $this->color = $color;
        $this->potencia = $potencia;
    }

    abstract public function mostrarCaracteristicas(): void;
}

// ======================================
// Motocicleta Electrica
// ======================================

class MotocicletaElectrica extends Motocicleta
{
    public function mostrarCaracteristicas(): void
    {
        echo "Motocicleta electrica\n";
        echo "Modelo: $this->modelo\n";
        echo "Color: $this->color\n";
        echo "Potencia: $this->potencia\n";
    }
}

// ======================================
// Motocicleta Gasolina
// ======================================

class MotocicletaGasolina extends Motocicleta
{
    public function mostrarCaracteristicas(): void
    {
        echo "Motocicleta de gasolina\n";
        echo "Modelo: $this->modelo\n";
        echo "Color: $this->color\n";
        echo "Potencia: $this->potencia\n";
    }
}

// ======================================
// Interface FabricaVehiculo
// ======================================

interface FabricaVehiculo
{
    public function crearAutomovil(
        string $modelo,
        string $color,
        int $potencia,
        float $espacio
    ): Automovil;

    public function crearMotocicleta(
        string $modelo,
        string $color,
        int $potencia
    ): Motocicleta;
}

// ======================================
// Fabrica Electrica
// ======================================

class FabricaVehiculoElectrico implements FabricaVehiculo
{
    public function crearAutomovil(
        string $modelo,
        string $color,
        int $potencia,
        float $espacio
    ): Automovil {
        return new AutomovilElectrico(
            $modelo,
            $color,
            $potencia,
            $espacio
        );
    }

    public function crearMotocicleta(
        string $modelo,
        string $color,
        int $potencia
    ): Motocicleta {
        return new MotocicletaElectrica(
            $modelo,
            $color,
            $potencia
        );
    }
}

// ======================================
// Fabrica Gasolina
// ======================================

class FabricaVehiculoGasolina implements FabricaVehiculo
{
    public function crearAutomovil(
        string $modelo,
        string $color,
        int $potencia,
        float $espacio
    ): Automovil {
        return new AutomovilGasolina(
            $modelo,
            $color,
            $potencia,
            $espacio
        );
    }

    public function crearMotocicleta(
        string $modelo,
        string $color,
        int $potencia
    ): Motocicleta {
        return new MotocicletaGasolina(
            $modelo,
            $color,
            $potencia
        );
    }
}

// ======================================
// Cliente
// ======================================

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
echo "=== AUTOMOVIL ===\n";

$automovil->mostrarCaracteristicas();

echo "\n";
echo "=== MOTOCICLETA ===\n";

$motocicleta->mostrarCaracteristicas();

?>
