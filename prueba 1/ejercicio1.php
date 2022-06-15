<?php
    echo "Ejercicio 1";
    echo "<br>";

    $ctr = $_GET["caracteres"];
    $caracteres = explode(" ", $ctr);
    $instrucciones = $_GET["instrucciones"];
    $entradas = explode(" ", $instrucciones);
    $trasmisor = $_GET["trasmisor"];
    $buscado = $trasmisor;

    /* Obtenemos los datos del archivo */
    /*
    $fp = fopen("miarchivo.txt", "r");
    $band = 0;
    $caracteres = [];
    $entradas = [];
    $buscado = "";
    while (!feof($fp)){
        $linea = fgets($fp);
        if($band == 0) {
           $caracteres = explode(" ", $linea);
        } else if($band == 3) {
            $buscado = $linea;
        }
        else {
            $entradas[] = $linea;
        }
        $band++;
    }
    fclose($fp);
    */

    /* Fin de lectura de los datos del archivo */

    /*Limpiar cadena*/
    $buscado_sin = "";
    for ($i = 0; $i < strlen($buscado); $i++) {
        if($buscado_sin[strlen($buscado_sin) - 1] == $buscado[$i]) {
        } else {
            $buscado_sin .= $buscado[$i];
        }
    }
    
    /*Fin Limpiar cadena*/

    /* Buscar mensaje encriptado */
    $enc1 = 0;
    $enc2 = 0;
    for ($i = 0; $i < strlen($buscado_sin); $i++) {
        if($entradas[0][0] == $buscado_sin[$i]) {
            $resultado = substr($buscado_sin, $i, strlen($entradas[0]) - 1);
            $comparacion = substr($entradas[0], 0, strlen($entradas[0]) - 1);
            if($resultado == $comparacion) {
                echo "SI" . "<br>";
                $enc1 = 1;
            }
        }

    }

    for ($i = 0; $i < strlen($buscado_sin); $i++) {
        if($entradas[1][0] == $buscado_sin[$i]) {
            $resultado = substr($buscado_sin, $i, strlen($entradas[1]) - 1);
            $comparacion = substr($entradas[1], 0, strlen($entradas[1]) - 1);            
            if($resultado == $comparacion) {
                echo "SI" . "<br>";
                $enc2 = 1;
            }
        }

    }
    
    $final = "";

    if($enc1 == 0) {
        echo "NO" . "<br>";
        $final .= "NO \n";
    } else {
        $final .= "SI \n";
    }
    if($enc2 == 0) {
        echo "NO" . "<br>";
        $final .= "NO";
    } else {
        $final .= "SI";
    }

    $file = fopen("resultado.txt", "w");
        fputs($file,$final);
        fclose($file);

    //example: https://mail.alejandrowaldo.com/ejercicio1.php?caracteres=11%2015%2038&instrucciones=CeseAlFuego%20CorranACubierto&trasmisor=XXcaaamakkCCessseAAllFueeegooDLLKmmNNN
    //result: https://mail.alejandrowaldo.com/resultado.txt