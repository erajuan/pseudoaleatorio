<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Generador de cuadrado medio</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="jquery-1.9.1.min.js"></script>
	<script type="text/javascript">
	$(document).on('ready',function(){
		$('.boton').click(function(){
			$('#datos').show();
			$('#datos').animate({"height":"150px"}, "slow");
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
				<p><label>n: </label><input type="text" name="n" class="n" value="1" size="5"></p>
				<p><label>Xo: </label><input type="text" name="x" class="x" value="51" size="5"></p>
				<p><label>Cantidad: </label><input type="text" name="cant" class="cant" value="5" size="5"></p>
				<p><input type="submit" value="Generar"></p>
				</form>
			</div>
		</div>
		<h1>Generador de cuadrado medio</h1>
		<p><b>Algoritmo:</b></p>
		<ol>
			<li>Elegir un número al azar (Xo) de 2n cifras (los autores propusieron 4 cifras).</li>
			<li>Elevar al cuadrado Xo, resultando un número de 4n cifras, si es necesario añadir ceros a la izquierda, para que el número resultante tenga 4n cifras.</li>
			<li>Seleccionar 2n cifras centrales (X1).</li>
			<li>Obtener el número pseudoaleatorio (U1) poniendo el punto decimal delante de la 2n cifras.</li>
			<li>A continuación generar el siguiente número pseudoaleatorio a partir de X1 y regresando al paso 2.</li>
		</ol>
	</div>
</div>
<div id="wrapper-content" class="wrapper">
	<div class="zone zone-content">
		<p><b>RESULTADOS:</b></p>
<?php
	// Variables a capturar por POST
	$cantidad = 5;
	if(isset($_POST['cant']))
		if($_POST['cant']<50)
			$cantidad = (int)$_POST['cant'];
	$n = 2;
	if(isset($_POST['n']))
		$n = (int)$_POST['n'];
	$x = 4455; // Representa $X0 2n=4
	if(isset($_POST['x']))
		$x = (int)$_POST['x'];

	$cuadrado = "";
	$cerosIzquierda = "";
	$centrales = "";
	$xs = "";
?>
<table border="1" cellspacing="0" cellpadding="10">
	<tr>
		<td><b>i</b></td>
		<td><b>x</b></td>
		<td><b>x2</b></td>
		<td><b>Agregar ceros a la izquierda</b></td>
		<td><b>Cifras centrales</b></td>
		<td><b>Números pseudoaleatorios</b></td>
	</tr>
	<?php for ($i=1; $i < $cantidad ; $i++) { ?>
	<tr>
		<td><?php print $i; ?></td>
		<td><?php print $x; ?></td>
		<td><?php $cuadrado = (string) $x*$x; print $cuadrado; ?></td>
		<td><?php $cerosIzquierda = str_pad($cuadrado,4*$n,"0",STR_PAD_LEFT); print $cerosIzquierda; ?></td>
		<td><?php $xs = substr($cerosIzquierda, $n,2*$n); print $x; ?></td>
		<td>0.<?php print $xs; $x = (int)$xs; ?></td>
	</tr>
	<?php } ?>
</table>
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
