<?php
//include 'BaseDatos.php';

$CantEquipos  = 20; //Se obtiene en la BD
$CantJornadas = 34; //Se obtiene en la BD
$c = 20; //Tamaño del cuadrito

if (isset($_GET['league'])) {
	$LeagueName = $_GET['league'];
}

?>
<html>
 <head>
  <meta charset="utf-8"/>
  <script type="application/javascript">
	function draw() {
	  var Equipos  = <?php echo $CantEquipos;?>;
	  var Jornadas = <?php echo $CantJornadas;?>;
	  var c = <?php echo $c;?>;
	  var posJornada = [7,10,6,10,8,10,11,10,8,9,9,5,5,6,6,5,4,4,4,3,4,3,3,3,2,2,3,2,2,3];
	  
	  var canvas = document.getElementById("canvas");
	  var ctx = canvas.getContext("2d");
	   
	  ctx.fillStyle = "#f1f2f4"; //Background gris muy claro
      ctx.fillRect(0, 0, canvas.width, canvas.height);
	  
	  for (var x = 0, i = 0; i <= Equipos; x+=c, i++){
		  ctx.font = "14px Arial";
		  ctx.fillStyle = "black"; 
          ctx.fillText(i, 2, x-5);
	  }
	  
	  for (var x = 20, i = 1; i <= Jornadas; x+=c, i++){
		  ctx.font = "14px Arial";
		  ctx.fillStyle = "red"; 
          ctx.fillText(i, x+2, 415);
	  }
	  
	  //Dibuja la cuadrícula	  
	  ctx.beginPath();	  
	  ctx.strokeStyle = 'MidNightBlue';
	  //Dibuja las líneas horizontales
	  for (var x=0; x<=Jornadas*c; x=x+c){
           ctx.moveTo(x, 0);
           ctx.lineTo(x, Equipos*c+c);
	  }
	  
	  //Dibuja las líneas verticales
	   for (var x=0; x<=Jornadas*c; x=x+c){
           ctx.moveTo(0, x);
           ctx.lineTo(Jornadas*c+c, x);
	   }
	  
	  ctx.closePath();
	  ctx.stroke();
	}
  </script>
 </head>
 
 <body onload="draw();">
 <style>
  h3 {
    color: black;
    text-shadow: 2px 2px 4px #101010;
	text-align: center;
  }
  
  #canvas {
    display: block;
    margin: 0 auto;	  
	border: 3px solid #000000;
    box-shadow: 5px 10px 18px #888888;
}  
 </style>
<?php echo "<h3>$LeagueName</h3>\n";?>
<!-- <?php echo "<h3>$imagen</h3>\n";?> -->
<canvas id="canvas" width="<?php echo $CantJornadas*$c+$c;?>" height="<?php echo $CantEquipos*$c+$c;?>"</canvas>

 </body>
</html>
