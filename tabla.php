<!DOCTYPE html>
<html>
<head>
<title>Liga Italiana</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="code.js"></script>

</head>
<body>

<?php

$nombres = get_equipos();
//  var_dump($nombres);

$posiciones = get_posiciones();
$lat_long = json_encode(get_lat_long_array());

muestra_tabla();

function muestra_tabla() {
	global $posiciones;
	global $nombres;
	global $lat_long;
	$p = 0;

	extract($_POST);
	extract($_GET);
?>

<div class="center">
	<div class="title">
	<?php echo('<img src="img/liga_logo.png" alt="shield" height="80" width="80" onclick="Lat_Long_Array()">') ?>
        <h2>Equipos</h2>
		<table class="table table-bordered">
			<thead class="thead-dark">
				<tr>
					<th>#</th>	
					<th></th>
					<th>Nombre</th>
					<th>PJ</th>	
					<th>PG</th>
					<th>PE</th>	
					<th>PP</th>
					<th>GF</th>	
					<th>GC</th>
					<th>Dif</th>
					<th>Puntos</th>	
					<th><i id="decrement" class="fa fa-arrow-left" style="color: white;"></i> <span id="titulo">Ultimos 8 Juegos</span> <i class="fa fa-arrow-right" style="color: white;" id="increment"></i></th>
				</tr>
			</thead>
			<tbody id="table_body">
				
                <?php foreach ($nombres as $row => $nombre): ?>
					<tr>
					<td style="width: 3%">
					<a href="Lineas03.php?league=Serie A TIM">
					<?= ++$p ?></td>
					<td style="width: 3%"><img src=<?= $posiciones[$row]['Ruta_Imagen']?> alt="shield" height="20" width="20"></td>
					<td style="width: 20%"><a href="tablaEquipo.php?equipo=<?php echo ($posiciones[$row]['Equipo']); ?>"><?= $posiciones[$row]['Equipo']?></td>
					<td style="width: 3%"><?= $posiciones[$row]['PJ'] ?></td>
					<td style="width: 3%"><?= $posiciones[$row]['PG'] ?></td>
					<td style="width: 3%"><?= $posiciones[$row]['PE'] ?></td>
					<td style="width: 3%"><?= $posiciones[$row]['PP'] ?></td>
					<td style="width: 3%"><?= $posiciones[$row]['GF'] ?></td>
					<td style="width: 3%"><?= $posiciones[$row]['GC'] ?></td>
					<td style="width: 3%"><?= $posiciones[$row]['Dif'] ?></td>
					<td style="width: 3%"><?= $posiciones[$row]['Puntos'] ?></td>
					<td class="Ujuegos">
						<table>
							<tr>
								<?php
									$string_arr = get_string_array($posiciones[$row]['Ujuegos']);
									for ($i=0; $i < 8; $i++) {
										if($string_arr[$i] == "P") 
											echo "<td style='background: red'>".$string_arr[$i]."</td>";
										else if($string_arr[$i] == "G")
											echo "<td style='background: green'>".$string_arr[$i]."</td>";
										else {
											echo "<td style='background: yellow'>".$string_arr[$i]."</td>";
										}
									}
								?>			
							</tr>	
						</table>
					</td>
                    </tr>	
                <?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
			
<?php

}

function connection() {
	$servername = "localhost";
	$username = "slon";
	$password = "1234";
	$dbname = "futbol";
	
	return new mysqli($servername, $username, $password, $dbname);
}

function get_equipos() {
	$conn = connection();
    $result = $conn->query("SELECT Nombre, Ruta_Imagen FROM equipos");

    $array = [];
    
    while ($fila = $result->fetch_assoc()) {
          array_push($array, $fila);
    }

    return $array;
}

function get_imagen($nom) {
	$conn = connection();
    $result = $conn->query("SELECT Ruta_Imagen FROM equipos WHERE Nombre = $nom");

    $array = [];
    
    while ($fila = $result->fetch_assoc()) {
          array_push($array, $fila);
    }

    return $array;
}

function get_posiciones() {
	$conn = connection();
	$result = $conn->query("SELECT * FROM posiciones JOIN equipos ON 
	posiciones.Equipo = equipos.Nombre ORDER BY Puntos DESC");

	$array = [];
    
    while ($fila = $result->fetch_assoc()) {
          array_push($array, $fila);
    }

    return $array;
}

function get_string_array($str){
	$arr = array();
	$str = str_replace(',', '', $str);
	for($i = strlen($str)-1; $i > -1; $i--){
		array_push($arr, $str[$i]);
	}
	return $arr;
}

function get_lat_long_array() {
	$conn = connection();
	$result = $conn->query("SELECT Latitud, Longitud FROM equipos");

	$array = [];

	while ($fila = $result->fetch_assoc()) {
		array_push($array, $fila);
	}
	
	return $array;
}

// function get_tabla_posiciones($equipo) {
// 	$conn = connection();
// 	conn->query("SELECT * FROM partidos join ")
// 	$result = $conn->query("SELECT Jornada FROM partidos WHERE ELocal = $equipo OR EVisita = $equipo");

// }

?>

<script>
	function Lat_Long_Array(){
		$.ajax({
			data: {'action': 'Lat_Long_Array'},
			url:   'ajax.php',
			type:  'post',
			success:  function (res) {
				localStorage.setItem("coordenadasAfterlife", res)
				window.location.href = 'http://localhost/web/partidos/mapaItalia.php';
			}
	});
	}
</script>

</body>
</html>