<?php
$servername = "localhost";
$username = "slon";
$password = "1234";
$dbname = "futbol";

$conn = new mysqli($servername, $username, $password, $dbname);

// var_dump (posicion_por_jornada($conn));

function posicion_por_jornada($conn) {
    $result = $conn->query("SELECT Jornada, ELocal, EVisita, GolesLocal, GolesVisita FROM partidos");

    $array = [];
    
    while ($fila = $result->fetch_assoc()) {
          array_push($array, $fila);
    }
    return $array;
}

function jornada_puntos_gd($jornada, $array) {
    foreach ($array as $key => $value) {
        var_dump($array[$jornada]);
    }
}

jornada_puntos_gd('1', posicion_por_jornada($conn));

?>