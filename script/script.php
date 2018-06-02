<?php

    /*
    Estructura de la tabla
    Id (INT A_I), Fecha (VARCHAR), Jornada (VARCHAR), Local (VARCHAR), Visita(VARCHAR), GolesLocal (VARCHAR), GolesVisita (VARCHAR)
    */

    insert();

    function insert() {
        $servername = "localhost";
        $username = "slon";
        $password = "1234";
        $dbname = "futbol";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        $file = "posiciones.txt";  //cambiar el nombre del archivo para la tabla de partidos
        $handle = fopen($file, "r");
        if ($handle) {
            while (($line = fgets($handle))) {
                if ($conn->query($line)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $line . "<br>" . $conn->error;
                }   
            }
            fclose($handle);
        } else {
            printf("%s", "Error opening the file");
        }

        $conn->close(); 
    }

?>