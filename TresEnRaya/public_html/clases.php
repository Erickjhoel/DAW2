<?php

class Ficha {

    public $nombre;
    public $imagen;

    public function __construct($nombre, $imagen) {
        $this->nombre = $nombre;
        $this->imagen = $imagen;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function etiquetaImg() {//devuelve la imagen con las dimensiones por defecto
        $etiqueta = '<img src="' . $this->imagen . '" border="1" alt="" width="400" height="300">';
        return $etiqueta;
    }

}

class Jugador extends Ficha {

    public $nombre;
    public $ficha;
    public $puntos;

    public function __construct($nombre, Ficha $ficha) { //inicio el turno
        $this->nombre = $nombre;
        $this->ficha = $ficha;
    }

    public function getFicha() {
        return $this->ficha;
    }

    public function getPuntos() {
        return $this->puntos;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function sumaPuntos($puntos) {
        return $this->nombre;
    }

}

class Tablero extends Ficha {

    public  $ficha1;
    public $ficha2;
    public $turno = 1; //es uno o 2 
    public $array= array();
    
    public function __construct(Ficha $ficha1, Ficha $ficha2) { //inicio el turno
        $this->ficha1 = $ficha1;
        $this->ficha2 = $ficha2;
    }

    public function getFicha() {//optiene la ficha que tiene el turno que le toca jugar 
        if ($this->turno == 1) {
            return $this->ficha1;
        } elseif ($this->turno == 2) {
            return $this->ficha2;
        }
    }

    public function cambioTurno() {//cambia a la otra ficha
        if ($this->turno == 1) {
            $this->turno == 2;
        } elseif ($this->turno == 2) {
            $this->turno == 1;
        }
    }

    public function iniciar() {//pone el tablero a cero 
       for ($i = 0; $i < 3; $i++) {
            for ($e = 0; $e < 3; $e++) {
                $this->array[$i][$e]="0";
            }
        }
    }

    public function mostrar() {// hay que recorrer el array bidimensional, con foreach si el valor == null
        //colocar el link si no la ficha
        //muestra el tablero con las fichas puestas hasta ahora o vacío si no hay ninguna
        echo '<table border="2">';
        for ($i = 0; $i <3; $i++) {
            echo '<tr>';
            for ($e = 0; $e <3; $e++) {
                echo '<td>';
                echo '<a href="usabilidad.php?op=1&fila=' . $i . '&columna=' . $e . '">'. $this->array[$i][$e].'</a>';
                echo '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    }

    public function ponerFicha(Ficha $ficha,$fila, $columna) {
        if ($this->array[$fila][$columna] == 0) {
            $this->array[$fila][$columna] = $ficha;
        } else {
            echo "La celda ya estaba ocupada";
        }
    }

    public function verificar($puntos1, $puntos2) {//comprueba si ha ganado alguien -> devolverá true o false
        if ($puntos1 == 3) {
            header("http://localhost/php/TresEnRaya/ganador.php");
        } elseif ($puntos2 == 3) {
            header("http://localhost/php/TresEnRaya/ganador.php");
        }
    }

}

?>