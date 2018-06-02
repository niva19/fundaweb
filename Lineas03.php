<?php
//include 'BaseDatos.php';

$CantEquipos  = 20; //Se obtiene en la BD
$CantJornadas = 38; //Se obtiene en la BD
$c = 20; //Tamaño del cuadrito

if (isset($_GET['league'])) {
	$LeagueName = $_GET['league'];
}

if (isset($_GET['img'])) {
	$imagen = $_GET['img'];
}

?>
<html>
 <head>
  <meta charset="utf-8"/>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script type="application/javascript">
	function draw() {
	  var Equipos  = <?php echo $CantEquipos;?>;
	  var Jornadas = <?php echo $CantJornadas;?>;
	  var c = <?php echo $c;?>;
      var posJornada = [7,10,6,10,8,10,11,10,8,9,9,5,5,6,6,5,4,4,4,3,4,3,3,3,2,2,3,2,2,3];
	  //var posJornada = [20,19,18,17,16,15,14,13,12,11,10,9,8,7,6,5,4,3,2,1];
	  
	  var canvas = document.getElementById("canvas");
	  var ctx = canvas.getContext("2d");
	   
	  ctx.fillStyle = "#f1f2f4"; //Background gris muy claro
      ctx.fillRect(0, 0, canvas.width, canvas.height);
	  
	  // eje x
	  for (var x = 0, i = 0; i <= Equipos; x+=c, i++){
		  ctx.font = "14px Arial";
		  ctx.fillStyle = "black"; 
          ctx.fillText(i, 2, x-5);
	  }
	  
	  // eje y
	  for (var x = 20, i = 1; i <= Jornadas; x+=c, i++){
		  ctx.font = "14px Arial";
		  ctx.fillStyle = "red"; 
          ctx.fillText(i, x+2, 415);
	  }

       var cc = 19.5;
	   for (var x = 20, i = 1; i <= Jornadas; x+=c, i++) {
			ctx.beginPath();
			ctx.arc(x+11, cc*posJornada[i-1], 5, 0, 2*Math.PI);  //(x,y)
			//console.log(i + " " + cc*posJornada[i-1]);
			ctx.fillStyle = "green";
			ctx.fill();	
			if (i > 5)
				cc-=0.15;	
			ctx.closePath();			
		}

        // var uu = 20;
        // ctx.beginPath();
		// ctx.arc(uu+11, 17*posJornada[0], 5, 0, 2*Math.PI);
		// 	ctx.fillStyle = "green"; 
		// 	ctx.fill();
		// 	console.log(19*posJornada[0]);
		// 	uu+=20;
		// 	ctx.closePath();

		// 	ctx.beginPath();
		// ctx.arc(uu+11, 17*posJornada[1], 5, 0, 2*Math.PI);
		// 	ctx.fillStyle = "green";
		// 	ctx.fill(); 
		// 	console.log(19*posJornada[1]);
		// 	uu+=20;
		// 	ctx.closePath();
			
		// 	ctx.beginPath();
		// ctx.arc(uu+11, 19*posJornada[2], 5, 0, 2*Math.PI);
		// 	ctx.fillStyle = "green"; 
		// 	ctx.fill();
		// 	console.log(19*posJornada[2]);
		// 	uu+=20;
		// 	ctx.closePath();

		// 	      ctx.beginPath();
		// ctx.arc(uu+11, 19*posJornada[3], 5, 0, 2*Math.PI);
		// 	ctx.fillStyle = "green"; 
		// 	ctx.fill();
		// 	console.log(19*posJornada[3]);
		// 	uu+=20;
		// 	ctx.closePath();

		// 	ctx.beginPath();
		// ctx.arc(uu+11, 19*posJornada[4], 5, 0, 2*Math.PI);
		// 	ctx.fillStyle = "green";
		// 	ctx.fill(); 
		// 	console.log(19*posJornada[4]);
		// 	uu+=20;
		// 	ctx.closePath();
			
		// 	ctx.beginPath();
		// ctx.arc(uu+11, 19*posJornada[5], 5, 0, 2*Math.PI);
		// 	ctx.fillStyle = "green"; 
		// 	ctx.fill();
		// 	console.log(19*posJornada[5]);
		// 	uu+=20;
		// 	ctx.closePath();

		// 	      ctx.beginPath();
		// ctx.arc(uu+11, 19*posJornada[6], 5, 0, 2*Math.PI);
		// 	ctx.fillStyle = "green"; 
		// 	ctx.fill();
		// 	console.log(19*posJornada[6]);
		// 	uu+=20;
		// 	ctx.closePath();

		// 	ctx.beginPath();
		// ctx.arc(uu+11, 19*posJornada[7], 5, 0, 2*Math.PI);
		// 	ctx.fillStyle = "green";
		// 	ctx.fill(); 
		// 	console.log(19*posJornada[7]);
		// 	uu+=20;
		// 	ctx.closePath();
			
		// 	ctx.beginPath();
		// ctx.arc(uu+11, 19*posJornada[8], 5, 0, 2*Math.PI);
		// 	ctx.fillStyle = "green"; 
		// 	ctx.fill();
		// 	console.log(19*posJornada[8]);
		// 	uu+=20;
		// 	ctx.closePath();

		// 	      ctx.beginPath();
		// ctx.arc(uu+11, 19*posJornada[9], 5, 0, 2*Math.PI);
		// 	ctx.fillStyle = "green"; 
		// 	ctx.fill();
		// 	console.log(19*posJornada[9]);
		// 	uu+=20;
		// 	ctx.closePath();

		// 	ctx.beginPath();
		// ctx.arc(uu+11, 19*posJornada[10], 5, 0, 2*Math.PI);
		// 	ctx.fillStyle = "green";
		// 	ctx.fill(); 
		// 	console.log(19*posJornada[10]);
		// 	uu+=20;
		// 	ctx.closePath();
			
		// 	ctx.beginPath();
		// ctx.arc(uu+11, 19*posJornada[11], 5, 0, 2*Math.PI);
		// 	ctx.fillStyle = "green"; 
		// 	ctx.fill();
		// 	console.log(19*posJornada[11]);
		// 	uu+=20;
		// 	ctx.closePath();

		// 	      ctx.beginPath();
		// ctx.arc(uu+11, 19*posJornada[12], 5, 0, 2*Math.PI);
		// 	ctx.fillStyle = "green"; 
		// 	ctx.fill();
		// 	console.log(19*posJornada[12]);
		// 	uu+=20;
		// 	ctx.closePath();

		// 	ctx.beginPath();
		// ctx.arc(uu+11, 19*posJornada[13], 5, 0, 2*Math.PI);
		// 	ctx.fillStyle = "green";
		// 	ctx.fill(); 
		// 	console.log(19*posJornada[13]);
		// 	uu+=20;
		// 	ctx.closePath();
			
		// 	ctx.beginPath();
		// ctx.arc(uu+11, 19*posJornada[14], 5, 0, 2*Math.PI);
		// 	ctx.fillStyle = "green"; 
		// 	ctx.fill();
		// 	console.log(19*posJornada[14]);
		// 	uu+=20;
		// 	ctx.closePath();

		// 	      ctx.beginPath();
		// ctx.arc(uu+11, 19*posJornada[15], 5, 0, 2*Math.PI);
		// 	ctx.fillStyle = "green"; 
		// 	ctx.fill();
		// 	console.log(19*posJornada[15]);
		// 	uu+=20;
		// 	ctx.closePath();

		// 	ctx.beginPath();
		// ctx.arc(uu+11, 19*posJornada[16], 5, 0, 2*Math.PI);
		// 	ctx.fillStyle = "green";
		// 	ctx.fill(); 
		// 	console.log(19*posJornada[16]);
		// 	uu+=20;
		// 	ctx.closePath();
			
		// 	ctx.beginPath();
		// ctx.arc(uu+11, 19*posJornada[17], 5, 0, 2*Math.PI);
		// 	ctx.fillStyle = "green"; 
		// 	ctx.fill();
		// 	console.log(19*posJornada[17]);
		// 	uu+=20;
		// 	ctx.closePath();

		// 	      ctx.beginPath();
		// ctx.arc(uu+11, 17*posJornada[18], 5, 0, 2*Math.PI);
		// 	ctx.fillStyle = "green"; 
		// 	ctx.fill();
		// 	console.log(19*posJornada[18]);
		// 	uu+=20;
		// 	ctx.closePath();

		// 	ctx.beginPath();
		// ctx.arc(uu+11, 19*posJornada[19], 5, 0, 2*Math.PI);
		// 	ctx.fillStyle = "green";
		// 	ctx.fill(); 
		// 	console.log(19*posJornada[19]);
		// 	ctx.closePath();
			 

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
<div class="title">
	<img src=<?php echo $imagen ?> alt="shield" height="80" width="80">
	<?php echo "<h3>$LeagueName</h3>\n";?>
</div>
<canvas id="canvas" width="<?php echo $CantJornadas*$c+$c;?>" height="<?php echo $CantEquipos*$c+$c;?>"</canvas>

 </body>
</html>
