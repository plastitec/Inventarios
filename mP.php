<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="./master.css" rel="stylesheet" type="text/css">
<title>Movimientos Generados en Sucursal</title>
</head>

<body class="body">
<table cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
	<tr>
		<td class="corntopleft"></td>
		<td class="middletop"></td>
		<td class="corntopright"></td>
	</tr>
	<tr>
		<td class="left"></td>
			<td>
			<!--Contenido -->
			<table>
				<tr>
					<td><img src="images/logo.jpg" />
					</td>
					<td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold">Movimientos Sucursal <?php echo "$sucu"; ?>
					</td>
					</tr>
					<tr>
					<td class="title" align="right">Rango de fechas del reporte:</td>
					<td class="content" align="left">
					<?php
					$maskfD = $fDesde;
					$maskfH = $fHasta;
$maskFD = $fDesde{8} . $fDesde{9} . $fDesde{7} . $fDesde{5} . $fDesde{6} . $fDesde{4} . $fDesde{0} . $fDesde{1} . $fDesde{2} . $fDesde{3};
$maskFH = $maskfH{8} . $maskfH{9} . $maskfH{7} . $maskfH{5} . $maskfH{6} . $maskfH{4} . $maskfH{0} . $maskfH{1} . $maskfH{2} . $maskfH{3};
 					echo "$maskFD"; ?>  al  <?php echo "$maskFH"; ?>
	 				</td>
					</tr>
					<tr>
					<td class="title" align="right">Fecha de Generaci&oacute;n:</td>
					<td class="content" align="left"><?php
						echo date("d/m/Y·h:i:s");
						?>
					</td>
					</tr>
				<tr>
					<td><?php
  if ($movi==51){
  echo "<td align='center' class='movs'>VENTAS</td>";}
  if ($movi==0){
  echo "<td align='center' class='movs'>TODOS LOS MOVIMIENTOS</td>";}
   if ($movi==2){
  echo "<td align='center' class='movs'>DEVOLUCIONES</td>";}
  if ($movi==4){
  echo "<td align='center' class='movs'>CANCELACIONES</td>";}
   if ($movi==58){
  echo "<td align='center' class='movs'>SALIDAS POR TRASPASO</td>";}
  if ($movi==7){
  echo "<td align='center' class='movs'>ENTRADAS POR TRASPASO</td>";}
   if ($movi==1){
  echo "<td align='center' class='movs'>COMPRAS</td>";}
  if ($movi==3){
  echo "<td align='center' class='movs'>ENTRADA DE FABRICA</td>";}
   if ($movi==5){
  echo "<td align='center' class='movs'>CANC. DEV. DE COMPRA</td>";}
  if ($movi==6){
  echo "<td align='center' class='movs'>AJUSTES</td>";}
   if ($movi==8){
  echo "<td align='center' class='movs'>CANC. MUES/INTE</td>";}
  if ($movi==9){
  echo "<td align='center' class='movs'>ENTRADA LOTE ESTD.</td>";}
   if($movi==10){
  echo "<td align='center' class='movs'>CORRECCION ENTRADA</td>";}
  if ($movi==11){
  echo "<td align='center' class='movs'>ERROR DE + SAE</td>";}
  if ($movi==12){
  echo "<td align='center' class='movs'>ENTRADA MARCA x DEFECTO</td>";}
  if ($movi==13){
  echo "<td align='center' class='movs'>MATERIAL C/DEFECTO</td>";}
  if ($movi==52){
  echo "<td align='center' class='movs'>DEVOLUCION DE COMPRA</td>";}
  if ($movi==53){
  echo "<td align='center' class='movs'>SALIDA A FABRICA</td>";}
  if ($movi==54){
  echo "<td align='center' class='movs'>PERDIDAS</td>";}
  if ($movi==55){
  echo "<td align='center' class='movs'>MERMAS</td>";}
  if ($movi==56){
  echo "<td align='center' class='movs'>CANC. DEV. VENT.</td>";}
  if ($movi==57){
  echo "<td align='center' class='movs'>CANC. DE COMPRA</td>";}
  if ($movi==59){
  echo "<td align='center' class='movs'>MUESTRAS</td>";}
  if ($movi==60){
  echo "<td align='center' class='movs'>CORRECCION SALIDA</td>";}
  if ($movi==61){
  echo "<td align='center' class='movs'>USO INTERNO</td>";}
  if ($movi==62){
  echo "<td align='center' class='movs'>ERROR DE SAE -</td>";}
  if ($movi==63){
  echo "<td align='center' class='movs'>COMPRA EMPLEADOS</td>";}
  if ($movi==64){
  echo "<td align='center' class='movs'>SALIDA POR ANTICIPO</td>";}
  if ($movi==65){
  echo "<td align='center' class='movs'>SALIDA MATERIAL DEFECTUOSO</td>";}
  if ($movi==66){
  echo "<td align='center' class='movs'>SALIDA x MARCA DES.</td>";}
  if ($movi==67){
  echo "<td align='center' class='movs'>LOTE ESTANDAR</td>";}

  //echo "<td><a href='indexconsulta.php'><img src='Images/volver.jpg' border='0' title='Regresar a Menú Exportar'/></a></td>";	
								 ?>
					</td>
				</tr>
			</table>

<?php

error_reporting(0);

if($sucu=='MEX'){
   include("conex.php"); 
   $conn=Connectmex(); 
   }
if($sucu=='GTO'){
   include("conex.php"); 
   $conn=Connectgto(); 
   }
if($sucu=='GDL'){
   include("conex.php"); 
   $conn=Connectgdl(); 
   }
if($sucu=='MTY'){
   include("conex.php"); 
   $conn=Connectmty(); 
   }
if($sucu=='PUE'){
   include("conex.php"); 
   $conn=Connectpue(); 
   }
if($sucu=='VER'){
   include("conex.php"); 
   $conn=Connectver(); 
   }
if($sucu=='CUN'){
   include("conex.php"); 
   $conn=Connectcun(); 
   }
if($sucu=='MID'){
   include("conex.php"); 
   $conn=Connectmid(); 
   }
if($sucu=='CUU'){
   include("conex.php"); 
   $conn=Connectcuu(); 
   }
if($sucu=='QRO'){
   include("conex.php"); 
   $conn=Connectqro(); 
   }
if($sucu=='TGZ'){
   include("conex.php"); 
   $conn=Connecttgz(); 
   }
      
   $sql ="SELECT MINVE03.CVE_ART, MINVE03.CVE_CPTO, MINVE03.FECHA_DOCU, MINVE03.REFER, MINVE03.CANT FROM MINVE03 WHERE MINVE03.FECHA_DOCU>='$fDesde' and MINVE03.FECHA_DOCU<='$fHasta' and MINVE03.CVE_CPTO = $movi order by MINVE03.FECHAELAB ASC";


$cedis = ibase_query($conn,$sql);

echo "<table border = '1' style='font-family:Arial, Helvetica, sans-serif; font-size:11PX' cellpadding='1' cellspacing='0' align='center'>";

echo "<th align='center'>N°</th>";
echo "<th align='center'>CLAVE</th>";
echo "<th align='center'>MOV.</th>";
echo "<th align='center'>FECHA</th>";
echo "<th align='center'>DOCTO</th>";
echo "<th align='center'>CANT</th>";

$count = 0;
$counter = 0;
$cant=0;

while($C=ibase_fetch_row($cedis)){

$counter = $count + 1;
$count = $counter;

$fechaE = $C[2];
$fechaDocu = $fechaE{8} . $fechaE{9} . $fechaE{7} . $fechaE{5} . $fechaE{6} . $fechaE{4} . $fechaE{0} . $fechaE{1} . $fechaE{2} . $fechaE{3} . $fechaE{10} . $fechaE{11} . $fechaE{12} . $fechaE{13} . $fechaE{14} . $fechaE{15} . $fechaE{16} . $fechaE{17} . $fechaE{18};

echo"<tr><td>$count</td>";
echo"<td>$C[0]</td>";
echo"<td>$C[1]</td>";
echo"<td>$fechaDocu</td>";
echo"<td>$C[3]</td>";
$maskCantidad = sprintf("%01.2f", $C[4]);
echo"<td >$maskCantidad</td></TR>";

$cant = $cant + $C[4];
}
echo "</table>";

?>
<table class="content">
<tr>
	<td>
	Total de Registros : <?php echo "$counter";?>
	</td>
	<td>
	Cantidad Total: <?php 
	$maskCant = sprintf("%01.2f", $cant);
	echo "$maskCant"; ?>
	</td>
</tr>
</table>
<!--Ing. Evelyn Dory Nuñez Limas. -->
			<!--Finaliza Contenido -->
			</td>
			<td class="right"></td>
		</tr>
		<tr>
			<td class="cornbotleft"></td>
			<td class="middlebot"></td>
			<td class="cornbotright"></td>
		</tr>
	</table>
</body>
</html>
