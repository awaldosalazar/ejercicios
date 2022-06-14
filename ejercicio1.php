<?php
    echo "Ejercicio 1";
    echo "<br>";

    /* Obtenemos los datos del archivo */
    $fp = fopen("miarchivo.txt", "r");
    $band = 0;
    $caracteres = [];
    $entradas = [];
    while (!feof($fp)){
        $linea = fgets($fp);
        if($band == 0) {
           $caracteres = explode(" ", $linea);
           $band = 1;
           
        } else {
            $entradas[] = $linea;
        }
    }
    fclose($fp);

    /* Fin de lectura de los datos del archivo */
    
    $busqueda1 = $entradas[0];
    $busqueda2 = $entradas[1];
    $buscado = $entradas[2];
    
    
    $coincidencias1 = 0;
    $coincidencias2 = 0;
    for($i = 0; $i < (int)$caracteres[0]; $i++){
        for($j = 0; $j < $caracteres[2]; $j++) {
            if($busqueda1[$i] == $buscado[$j]) {
                $coincidencias1++;
                break;
            }
        }
    }

    for($i = 0; $i < (int)$caracteres[1]; $i++){
        for($j = 0; $j < $caracteres[2]; $j++) {
            if($busqueda2[$i] == $buscado[$j]) {
                $coincidencias2++;
                break;
            }
        }
    }

    if($coincidencias1 == (int)$caracteres[0]){
        echo "SI";
    } else {
        echo "NO";
    }
    echo "<br>";
    if($coincidencias2 == (int)$caracteres[1]){
        echo "SI";
    } else {
        echo "NO";
    }
?>