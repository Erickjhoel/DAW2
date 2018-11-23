<link href="cssTresEnRaya.css" rel="stylesheet" type="text/css"/>
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
        $etiqueta = '<img src="' . $this->imagen . '" border="1" alt="" width="100" height="100">';
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

    public $ficha1;
    public $ficha2;
    public $turno = 1; //es uno o 2 
    public $array = array();

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
            $this->turno = 2;
        } elseif ($this->turno == 2) {
            $this->turno = 1;
        }
    }

    public function iniciar() {//pone el tablero a cero 
        for ($i = 0; $i < 3; $i++) {
            for ($e = 0; $e < 3; $e++) {
                $this->array[$i][$e] = "0";
            }
        }
    }

    public function mostrar() {// hay que recorrer el array bidimensional, con foreach si el valor == null
        //colocar el link si no la ficha
        //muestra el tablero con las fichas puestas hasta ahora o vacío si no hay ninguna
        echo '<table class="tabla">';
        for ($i = 0; $i < 3; $i++) {
            echo '<tr>';
            for ($e = 0; $e < 3; $e++) {
                if ($this->array[$i][$e] == "0") {
                    echo '<td>' . '<a href="usabilidad.php?op=1&fila=' . $i . '&columna=' . $e . '">' . $this->array[$i][$e] . '</a>' . '</td>';
                } else {
                    echo '<td>' . $this->array[$i][$e] . '</td>';
                }
            }
            echo '</tr>';
        }
        
    }

    public function ponerFicha(Ficha $ficha, $fila, $columna) {
        //aunque se cambie en el array hay que modificarlo comprobarlo en la tabla
        if ($this->array[$fila][$columna] == "0") {
            $this->array[$fila][$columna] = $ficha->etiquetaImg();
        } else {
            echo "La celda ya estaba ocupada";
        }
    }

    public function verificar(Ficha $ficha, Jugador $jug1, Jugador $jug2) {
        $resultado = null;
        $ficha1 = $jug1->getFicha();
        $ficha2 = $jug2->getFicha();
        $etiqueta = $ficha->etiquetaImg();
//comprueba si ha ganado alguien -> devolverá true o false
        //comprueba fila 1
        if ($this->array[0][0] == $etiqueta) {
            if ($this->array[0][1] == $etiqueta) {
                if ($this->array[0][2] == $etiqueta) {
                    if ($ficha1->etiquetaImg() == $etiqueta) {
                        $resultado = $jug1->getNombre();
                    } else {
                        $resultado = $jug2->getNombre();
                    }
                }
            }
        }
        //COMPRUEBA FILA 2
        if ($this->array[1][0] == $etiqueta) {
            if ($this->array[1][1] == $etiqueta) {
                if ($this->array[1][2] == $etiqueta) {
                    if ($ficha1->etiquetaImg() == $etiqueta) {
                        $resultado = $jug1->getNombre();
                    } else {
                        $resultado = $jug2->getNombre();
                    }
                }
            }
        }
        //COMPRUEBA FILA 3
        if ($this->array[2][0] == $etiqueta) {
            if ($this->array[2][1] == $etiqueta) {
                if ($this->array[2][2] == $etiqueta) {
                    if ($ficha1->etiquetaImg() == $etiqueta) {
                        $resultado = $jug1->getNombre();
                    } else {
                        $resultado = $jug2->getNombre();
                    }
                }
            }
        }

        //COMPRUEBA columna 1
        if ($this->array[0][0] == $etiqueta) {
            if ($this->array[1][0] == $etiqueta) {
                if ($this->array[2][0] == $etiqueta) {
                    if ($ficha1->etiquetaImg() == $etiqueta) {
                        $resultado = $jug1->getNombre();
                    } else {
                        $resultado = $jug2->getNombre();
                    }
                }
            }
        }
        //COMPRUEBA columna 2
        if ($this->array[0][1] == $etiqueta) {
            if ($this->array[1][1] == $etiqueta) {
                if ($this->array[2][1] == $etiqueta) {
                    if ($ficha1->etiquetaImg() == $etiqueta) {
                        $resultado = $jug1->getNombre();
                    } else {
                        $resultado = $jug2->getNombre();
                    }
                }
            }
        }
        //COMPRUEBA columna 3
        if ($this->array[0][2] == $etiqueta) {
            if ($this->array[1][2] == $etiqueta) {
                if ($this->array[2][2] == $etiqueta) {
                    if ($ficha1->etiquetaImg() == $etiqueta) {
                        $resultado = $jug1->getNombre();
                    } else {
                        $resultado = $jug2->getNombre();
                    }
                }
            }
        }
        //COMPRUEBA diagonal 1
        if ($this->array[0][0] == $etiqueta) {
            if ($this->array[1][1] == $etiqueta) {
                if ($this->array[2][2] == $etiqueta) {
                    if ($ficha1->etiquetaImg() == $etiqueta) {
                        $resultado = $jug1->getNombre();
                    } else {
                        $resultado = $jug2->getNombre();
                    }
                }
            }
        }
        //COMPRUEBA diagonal 2
        if ($this->array[2][0] == $etiqueta) {
            if ($this->array[1][1] == $etiqueta) {
                if ($this->array[0][2] == $etiqueta) {
                    if ($ficha1->etiquetaImg() == $etiqueta) {
                        $resultado = $jug1->getNombre();
                    } else {
                        $resultado = $jug2->getNombre();
                    }
                }
            }
        }
        
        //comprueba si hay empate
        $contador=0;
        for ($i = 0; $i < 3; $i++) {
            for ($e = 0; $e < 3; $e++) {
                if ($this->array[$i][$e] != "0") {
                    $contador++;
                } 
            }
        }
        if($contador==9&&$resultado!=$jug1->getNombre()&&$resultado!=$jug2->getNombre()){
            $resultado="empate";
        }
        return $resultado;
    }

}

?>