<!DOCTYPE html>
<html>
<head>
<title>Liga Italiana</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>

<?php

$conn = connection(); //establece la conexion a la base de datos

$nomEquipo = "";

if (isset($_GET['equipo'])) {
    $nomEquipo = $_GET['equipo'];
}

$partidos = get_partidos($conn, $nomEquipo);
// var_dump($partidos);

muestra_tabla();


function muestra_tabla() {

	global $nomEquipo;
	global $partidos;
	global $conn;
    $i = 0;
    
    extract($_POST);
	extract($_GET);
?>

<div class="center">
	<div class="title">
        <h2>Partidos</h2>
		<table class="table table-bordered">
			<thead class="thead-dark">
				<tr>
					<th>Jornada</th>	
					<th>Fecha</th>
					<th>Local</th>
					<th>Visita</th>	
					<th>Marcador</th>
					<th>Ruta</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($partidos as $row => $partido): ?>
					<tr>
						<td style="width: 3%"><?= $partidos[$row]['Jornada'] ?></td>
						<td style="width: 3%"><?= $partidos[$row]['Fecha'] ?></td>
						<td style="width: 20%"><?= $partidos[$row]['ELocal'] ?></td>
						<td style="width: 20%"><?= $partidos[$row]['EVisita'] ?></td>
						<td style="width: 3%"><?= $marcador = $partidos[$row]['GolesLocal'].":".$partidos[$row]['GolesVisita'] ?></td>
						<td style="width: 3%">
						<?php
						echo('<img src="img/GoogleMaps.png" alt="maps" height="20" width="20"onclick="Lat_Long(\''.$partidos[$row]['ELocal'].'\', \''.$partidos[$row]['EVisita'].'\')">')
						?>
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

function get_partidos($conn, $equipo) {
    $result = $conn->query("SELECT * FROM partidos WHERE (ELocal = '$equipo') OR (EVisita = '$equipo')");

    $array = [];
    
    while ($fila = $result->fetch_assoc()) {
          array_push($array, $fila);
    }

    return $array;
}

?>

<script>
	function Lat_Long(local, visita){
		$.ajax({
			data: {'action': 'Lat_Long', 'local': local, 'visita': visita},
			url:   'ajax.php',
			type:  'post',
			success: function (res) {
				localStorage.setItem("coordenadas", res)
				window.location.href = 'http://localhost/web/partidos/mapa.php';
			}
	});
	}
</script>
</body>
</html>
