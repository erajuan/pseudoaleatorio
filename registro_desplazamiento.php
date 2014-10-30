<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Generador de Registo de Desplazamiento | Registo de Desplazamiento</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="jquery-1.9.1.min.js"></script>
	<script type="text/javascript">
	$(document).on('ready',function(){
		$('.boton').click(function(){
			$('#datos').show();
			$('#datos').animate({"height":"180px"}, "slow");
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
				<p><label>h: </label><input type="text" name="h" class="h" value="6" size="5"></p>
				<p><label>q: </label><input type="text" name="q" class="q" value="0" size="5"></p>
				<p><label>l: </label><input type="text" name="l" class="l" value="13" size="5"></p>
				<p><label>Cantidad: </label><input type="text" name="cant" class="cant" value="5" size="5"></p>
				<p><input type="submit" value="Generar"></p>
				</form>
			</div>
		</div>
		<h1>Generador de Registo de Desplazamiento</h1>
		<p>Los generadores de registros desplazamiento realizan la adición módulo 2 la cual equivale al XOR (ó exclusivo) </p>
		<p>0 XOR 0 = 0 0 XOR 1 = 1 <br>	1 XOR 1 = 0 1 XOR 0 = 1</p>
		<p>Esto permite implementar registros de desplazamiento Un generador propuesto por Tausworthe (1985)</p>
	</div>
</div>
<div id="wrapper-content" class="wrapper">
	<div class="zone zone-content">
<p>En este caso los primeros q bits deben ser especificados, esto es análogo a la semilla de los generadores congruenciales. Este tipo de generador depende del largo de la palabra </p>
<p><b>RESULTADOS:</b></p>
<?php 
// Variables
$cantidad = 5;
if(isset($_POST['cant']))
	if($_POST['cant']<50)
		$cantidad = (int)$_POST['cant'];
$h = 3;
if(isset($_POST['h']))
	$h = $_POST['h'];
$q = 5;
if(isset($_POST['q']))
	$q = $_POST['q'];
$b = $q; // Calcular el siguiente bit
$l = 6;
if(isset($_POST['l']))
	$l = $_POST['l'];
$digitos = $l*$cantidad;
$j =0;
$cadena = str_pad("",$q,"1",STR_PAD_LEFT);

for ($i=0; $i <$digitos ; $i++) { 
	$cadena .= (string)(((int)substr($cadena,$b-$q,1)+(int)substr($cadena,$b-$h,1))%2);
	$b++;
}
print "<p><b>Secuencia de Bits : </b>".$cadena."</p>";

$decimal = 1;
for($i=0 ; $i<$l ; $i++)
	$decimal = 2*$decimal;
print "<div class='resultados'>";
for($i=0; $i<$digitos ; $i+=$l)
{
	print "<div class='item'>";
	//print bindec(substr($cadena, $i,$l));
	print bindec(substr($cadena, $i,$l))/$decimal; // Imprimir decimales
	print "</div>";
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
