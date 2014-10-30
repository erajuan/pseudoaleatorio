<!DOCTYPE -.-html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Generador Congruencial</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="jquery-1.9.1.min.js"></script>
	<script type="text/javascript">
	$(document).on('ready',function(){
		$('.boton').click(function(){
			$('#datos').show();
			$('#datos').animate({"height":"210px"}, "slow");
		});
	});
	</script>
</head>
<body>
<div id="wrapper-head" class="wrapper">
<a href="index.html" id="volver">Volver</a>
	<div class="zone zone-head">
		<div id="generar">
			<div class="boton"><b>GENERAR</b> PSEUDOALEATORIOS</div>
			<div id="datos">
				<form method="post">
				<p><b>Ingrese los datos</b></p>
				<p><label>a: </label><input type="text" name="a" class="a" value="6" size="5"></p>
				<p><label>b: </label><input type="text" name="b" class="b" value="0" size="5"></p>
				<p><label>m: </label><input type="text" name="m" class="m" value="13" size="5"></p>
				<p><label>Xo: </label><input type="text" name="x" class="x" value="5" size="5"></p>
				<p><label>Cantidad: </label><input type="text" name="cant" class="cant" value="5" size="5"></p>
				<p><input type="submit" value="Generar"></p>
				</form>
			</div>
		</div>
		<h1>Generador Congruencial</h1>
		<p>Propuesto por Lehmer en 1951, es el principal generador de números pseudoaleatorios de la actualidad</p>
		<p><b>Xn+1 = (a Xn + b) mod m   </b><br>Un = Xn/m</p>
	</div>
</div>
<div id="wrapper-content" class="wrapper">
	<div class="zone zone-content">
<p>Los parámetros del algoritmo se llaman</p>
<ul>
	<li>a : multiplicador</li>
	<li>b : sesgo</li>
	<li>m : módulo</li>
	<li>Xo : semilla (valor inicial)</li>
</ul>
<p>Donde: a, b < m</p>
<p><b>RESULTADOS:</b></p>
<?php 
	// Las variables para generar
	$a = 6;
	if(isset($_POST['a']))
		$a = $_POST['a'];
	$b = 0;
	if(isset($_POST['b']))
		$b = $_POST['b'];
	$m = 13;
	if(isset($_POST['m']))
		$m = $_POST['m'];
	$x = 1; // Xo
	if(isset($_POST['x']))
		$x = $_POST['x'];
	$cantidad = 5; // Cantidad de de numeros a generar
	if(isset($_POST['cant']))
		if($_POST['cant']<50)
			$cantidad = $_POST['cant'];
	print "<div class='resultados'>";

	for($i=1 ; $i<=$cantidad ; $i++)
	{
		print "<div class='item'>";
		print $x / $m;
		print "</div>";
		$x = ($a*$x + $b) % $m;
	}
	print "</div>";
	?>
	</div>
</div>
<div id="wrapper-footer" class="wrapper">
	<div class="zone zone-footer">
		<table>
			<tr>
				<td>
				<h4>Desarrollado por : </h4>
					<h3>Juan E. Huamani Mendoza</h3>
					<p><b>Código :</b>114143</p>
				</td>
				<td width="500">
					<h2>Modelos y Simulación</h2>
				</td>
			</tr>
		</table>
		<p align="center"><b>Universidad Nacional de San Antonio Abad del Cusco</b></p>
		<p align="center"><b>INGENERIA INFORMATICA Y DE SISTEMAS</b></p>
		<p class="volver"><a href="index.html" alt="Volver">Volver</a></p>
	</div>
</div>
</body>
</html>
