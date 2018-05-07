<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "futbol";
            

    $conn = new mysqli($servername, $username, $password, $dbname);
    
    $action = $_POST['action'];

    if($action == 'Inc_Dec'){
        echo json_encode(Inc_Dec($conn));
    }
    else if ($action =='Lat_Long'){
        echo json_encode(Lat_Long($conn, $_POST['local'], $_POST['visita']));
    }

?>

<?php 
    function Inc_Dec($conn){
        $result = $conn->query("SELECT Nombre FROM equipos");

        $array = [];
        
        while ($fila = $result->fetch_assoc()) {
            array_push($array, $fila);
        }

        $final_arr = [];

        for ($i = 0; $i < sizeof($array); $i++) {
            $equipo = $array[$i]['Nombre']; 
            $result = $conn->query("SELECT Ujuegos FROM posiciones WHERE Equipo = '$equipo'");
            while ($fila = $result->fetch_assoc()) {
                array_push($final_arr, get_string_array($fila['Ujuegos']));
            }
        }

        return $final_arr;
    }

    function get_string_array($str){
        $arr = array();
        $str = str_replace(',', '', $str);
        for($i = strlen($str)-1; $i > -1; $i--){
            array_push($arr, $str[$i]);
        }
        return $arr;
    }
?>
<?php
    function Lat_Long($conn, $local, $visita) {
        $arr = [];
        array_push($arr, get_lat_long($conn, $local));
        array_push($arr, get_lat_long($conn, $visita));
        return $arr;
    }

    function get_lat_long($conn, $nombre) {
        $result = $conn->query("SELECT Latitud, Longitud FROM equipos WHERE Nombre = '". $nombre ."'");
    
        $array = [];
        
        while ($fila = $result->fetch_assoc()) {
              array_push($array, $fila);
        }
    
        return $array;
    }
?>