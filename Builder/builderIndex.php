<?php
/*
Producto abstracto
*/

abstract class Casa {

    protected array $partes = [];

    abstract public function agregarParte(string $parte): void;

    abstract public function mostrarCasa(): void;

}

/*
Producto concreto
Casa Moderna
*/

class CasaModerna extends Casa {

    public function agregarParte(string $parte): void {
        $this->partes[] = $parte;
    }

    public function mostrarCasa(): void {
        
        echo "Casa moderna\n";

        foreach ($this->partes as $p) {
            echo $p . "\n";
        }

    }

}

/*
Producto concreto
Casa Clasica
*/

class CasaClasica extends Casa {

    public function agregarParte(string $parte): void {
        $this->partes[] = $parte;
    }

    public function mostrarCasa(): void { 

        echo "Casa clásica\n";

        foreach ($this->partes as $p) {
            echo $p . "\n";
        }

    }
}

/*
Constructor abstracto
*/

abstract class ConstructorCasa {

    protected Casa $casa;

    abstract public function construirParedes(string $material): void;

    abstract public function construirTecho(string $material): void;

    abstract public function construirPuertas(string $material): void;

    public function resultado(): Casa {
        return $this->casa;
   }

}

/*
Constructor Concreto
Casa Moderna
*/

class ConstructorCasaModerna extends ConstructorCasa {
    
    public function __construct() {
        $this->casa = new CasaModerna();
    }

    public function construirParedes(string $material): void   {
        $parte = "Paredes modernas de $material";

        $this->casa->agregarParte($parte);
    }

    public function construirTecho(string $material): void {
        $parte = "Techo moderno de $material";

        $this->casa->agregarParte($parte);
    }

    public function construirPuertas(string $material): void {
        $parte = "Puertas minimalistas de $material";

        $this->casa->agregarParte($parte);
    }

}

/*
Constructor concreto
Casa Clasica
*/

class ConstructorCasaClasica extends ConstructorCasa {

    public function __construct() {
        $this->casa = new CasaClasica();
    }

    public function construirParedes(string $material): void {
        $parte = "Paredes clasicas de $material";

        $this->casa->agregarParte($parte);
    }

    public function construirTecho(string $material): void {
        $parte = "Techo clasico de $material";

        $this->casa->agregarParte($parte);
    }

    public function construirPuertas(string $material): void {
        $parte = "Puertas de madera de $material";

        $this->casa->agregarParte($parte);
    }

}

/*
Director
*/

class Arquitecto {

    protected ConstructorCasa $constructor;

    public function __construct(ConstructorCasa $constructor){
        $this->constructor = $constructor;
    }

    public function construir(string $material): Casa {
        $this->constructor->construirParedes($material);

        $this->constructor->construirTecho($material);

        $this->constructor->construirPuertas($material);

        return $this->constructor->resultado();
    }
    
}

/*
Cliente
*/

echo "Desea construir una Casa Moderna (1) o Clasica (2)?: ";

$seleccion = trim(fgets(STDIN));

if ($seleccion == "1") {
    $constructor = new ConstructorCasaModerna();
} else {
    $constructor = new ConstructorCasaClasica();
}

$arquitecto = new Arquitecto($constructor);

$casa = $arquitecto->construir("Concreto");

echo "\n";

$casa->mostrarCasa();

?>

