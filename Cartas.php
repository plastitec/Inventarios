<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="./master.css" rel="stylesheet" type="text/css">
<title>Kárdex</title>
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
					<td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold">Movimientos Sucursal 
					</td>
				</tr>
					<td><?php
					echo "<td align='center' class='movs'>Movimiento con FOLIO: $folio";
					echo "<td><a href='indexconsulta.php'><img src='Images/volver.jpg' border='0' title='Regresar a Menú Exportar'/></a></td>";
					 ?>
					</td>
				</tr>
			</table>

<?php
//error_reporting(0);

function cmp($a, $b)
{
    return strcmp($a["clave"], $b["clave"]);
	
}

//Inicia Encabezado
echo "<table border = '1' style='font-family:Arial, Helvetica, sans-serif; font-size:12PX' cellpadding='1' cellspacing='0' align='center'><tr>";
echo "<th align='center' >CLAVE </th>";
echo "<th align='center'>DOCTO. </th>";
echo "<th align='center'>CANT.  </th>";
echo "<th align='center'>FECHA  </th>";
echo "<th align='center'>MOV.  </th>";
echo "<th align='center'>SUCURSAL</th>";


$x = 0;
$count = 0;
$dif = 0;
$num_suc=0;
$sumacant=0;
$restacant=0;
$numId=0;
$idArray=0;
$num=0;

include("conex.php");

while ($num_suc<=10)
{

	if($num_suc==0){
	$conn=Connectmex();
	$ABR='MEX';
	}
	
	if($num_suc==1){
	$conn=Connectgto();
	$ABR='GTO';
	}
	
	if($num_suc==2){
	$conn=Connectgdl();
	$ABR='GDL';
	}
	
	if($num_suc==3){
	$conn=Connectmty();
	$ABR='MTY';
	}
	
	if($num_suc==4){
	$conn=Connectpue();
	$ABR='PUE';
	}
	
	if($num_suc==5){
	$conn=Connectver();
	$ABR='VER';
	}
	
	if($num_suc==6){
	$conn=Connectcun();
	$ABR='CUN';
	}
	
	if($num_suc==7){
	$conn=Connectmid();
	$ABR='MID';
	}
	
	if($num_suc==8){
	$conn=Connectcuu();
	$ABR='CUU';
	}
	
	if($num_suc==9){
	$conn=Connectqro();
	$ABR='QRO';
	}
	
	if($num_suc==10){
	$conn=Connecttgz();
	$ABR='TGZ';
	}

if($clave==''){
$sql="SELECT MINVE03.CVE_ART, MINVE03.CVE_CPTO, MINVE03.FECHA_DOCU,MINVE03.REFER, MINVE03.CANT AS CANTIDAD, MINVE03.EXISTENCIA FROM MINVE03 WHERE MINVE03.REFER ='$folio' ORDER BY MINVE03.CVE_ART DESC  ";
}
else {
$sql="SELECT MINVE03.CVE_ART, MINVE03.CVE_CPTO, MINVE03.FECHA_DOCU,MINVE03.REFER, MINVE03.CANT AS CANTIDAD, MINVE03.EXISTENCIA FROM MINVE03 WHERE MINVE03.REFER ='$folio' and MINVE03.CVE_ART='$clave' ORDER BY MINVE03.CVE_ART DESC  ";
}
   
$conexsuc = ibase_query($conn,$sql);

while($CS=ibase_fetch_row($conexsuc))
  	{
			$fechasal = $CS[2];
			
			$maskSAL = $fechasal{8} . $fechasal{9} . $fechasal{7} . $fechasal{5} . $fechasal{6} . $fechasal{4} . $fechasal{0} . $fechasal{1} . $fechasal{2} . $fechasal{3};

			if($CS[1] > '50'){
				$cant = $CS[4] * -1;
				$restacant=$restacant+$cant;
			}
			else {
				$cant = $CS[4];
				$sumacant=$sumacant+$cant;
			}
			/*
			echo "<tr class='content'><td>$CS[0]</td><td>$CS[3]</td><td align='center'>$cant</td><td>$maskSAL</td><td>$CS[1]</td><td>$ABR</td></tr>";
			$count = $count + 1; 
			*/
			
			$registros[$num]["clave"] = $CS[0];
			$registros[$num]["docto"] = $CS[3];
			$registros[$num]["cantidad"] = $cant;
			$registros[$num]["fecha"] = $maskSAL;
			$registros[$num]["cpto"] = $CS[1];
			$registros[$num]["sucursal"] = $ABR;
			
			$num=$num+1;
	}

$num_suc = $num_suc + 1;

}

usort($registros, "cmp");

$claveant=0;
$arraytot=0;

while (list($id, $valor) = each($registros)) {

	if($valor["clave"]!=$claveant){
		echo "<tr class='content' align='center'><td><strong>Subtotal Movimiento:</strong></td><td><strong>$arraytot</strong></td><td></td><td></td><td></td><td></td></tr>";
		$arraytot=0;
	}
	
    echo "<tr class='content' align='center'><td>" . $valor["clave"] . "</td><td>" . $valor["docto"] . "</td><td>" . $valor["cantidad"] . "</td><td>" . $valor["fecha"] . "</td><td>" . $valor["cpto"] . "</td><td>" . $valor["sucursal"] . "</td>" . "</tr>";
	
	$arraytot=$arraytot + $valor["cantidad"];
	
	$count = $count + 1; 
		
	$claveant=$valor["clave"];

}
if($valor["clave"]!=$claveant){
		echo "<tr class='content' align='center'><td><strong>Subtotal Movimiento:</strong></td><td><strong>$arraytot</strong></td><td></td><td></td><td></td><td></td></tr>";
		$arraytot=0;
	}

$totalcant=$restacant + $sumacant;

$masktotalcant = sprintf("%01.2f", $totalcant);

echo "</table>";

?>

<table class="content">
<tr><td class="title">Totale de Movimiento: <?php echo "$masktotalcant"; ?></td></tr>
<tr><td class="title">Se encontraron <?php echo "$count"; ?> registros</td></tr>
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