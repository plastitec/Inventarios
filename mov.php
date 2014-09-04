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
					echo "<td align='center' class='movs'>TODOS LOS MOVIMIENTOS</td>";
					echo "<td><a href='indexconsulta.php'><img src='Images/volver.jpg' border='0' title='Regresar a Menú Exportar'/></a></td>";
					 ?>
					</td>
				</tr>
			</table>

<?php
//error_reporting(0);

include("conex.php");
$conn=0;

if($sucu=='MEX'){
   $conn=Connectmex(); 
   }
if($sucu=='GTO'){
   $conn=Connectgto(); 
   }
if($sucu=='GDL'){
   $conn=Connectgdl(); 
   }
if($sucu=='MTY'){
   $conn=Connectmty(); 
   }
if($sucu=='PUE'){
   $conn=Connectpue(); 
   }
if($sucu=='VER'){
   $conn=Connectver(); 
   }
if($sucu=='CUN'){
   $conn=Connectcun(); 
   }
if($sucu=='MID'){
   $conn=Connectmid(); 
   }
if($sucu=='CUU'){
   $conn=Connectcuu(); 
   }
if($sucu=='QRO'){
   $conn=Connectqro(); 
   }
if($sucu=='TGZ'){
   $conn=Connecttgz(); 
   }
if($sucu=='LUC'){
   $conn=Connectluc(); 
   }
   
   $sql ="SELECT MINVE03.CVE_ART, MINVE03.CVE_CPTO, MINVE03.FECHA_DOCU, MINVE03.REFER, MINVE03.CANT,MINVE03.FECHA_DOCU FROM MINVE03 WHERE MINVE03.FECHA_DOCU>='$fDesde' and MINVE03.FECHA_DOCU<='$fHasta' order by MINVE03.FECHAELAB ASC";
   $sql2="SELECT MINVE03.CVE_CPTO, CONM03.DESCR FROM MINVE03 LEFT JOIN CONM03 ON MINVE03.CVE_CPTO = CONM03.CVE_CPTO WHERE MINVE03.FECHA_DOCU>='$fDesde' and MINVE03.FECHA_DOCU<='$fHasta' GROUP BY MINVE03.CVE_CPTO, CONM03.DESCR";
  

//modificado por igs para lucite

$sqlL ="SELECT MINVE04.CVE_ART, MINVE04.CVE_CPTO, MINVE04.FECHA_DOCU, MINVE04.REFER, MINVE04.CANT,MINVE04.FECHA_DOCU FROM MINVE04 WHERE MINVE04.FECHA_DOCU>='$fDesde' and MINVE04.FECHA_DOCU<='$fHasta' order by MINVE04.FECHAELAB ASC";
$sql2L="SELECT MINVE04.CVE_CPTO, CONM04.DESCR FROM MINVE04 LEFT JOIN CONM04 ON MINVE04.CVE_CPTO = CONM04.CVE_CPTO WHERE MINVE04.FECHA_DOCU>='$fDesde' and MINVE04.FECHA_DOCU<='$fHasta' GROUP BY MINVE04.CVE_CPTO, CONM04.DESCR";


if ($sucu=='LUC'){
$movs = ibase_query($conn,$sql2L);
}else{
$movs = ibase_query($conn,$sql2);
}
//Inicia Encabezado
echo "<table border = '0' style='border: medium #999999' cellpadding='0' cellspacing='2'><tr>";
echo "<td align='left' class=title >°Mov</td>";
echo "<td align='center' class=title >Descripci&oacute;n de Mov.</td></tr>";

//Respaldo
$sqlTop= "SELECT first(1) MINVE03.fechaelab, MINVE03.REFER FROM MINVE03 ORDER BY MINVE03.num_mov DESC";
$sqlTopL= "SELECT first(1) MINVE04.fechaelab, MINVE04.REFER FROM MINVE04 ORDER BY MINVE04.num_mov DESC";
if ($sucu=='LUC'){
$rs = ibase_query($conn,$sqlTopL);
}else{
$rs = ibase_query($conn,$sqlTop);
}
while($T=ibase_fetch_row($rs)) 
{
			$doctoresp = $T[1];
			$cadena = $T[0];
			$fechaTOP = $cadena{8} . $cadena{9} . $cadena{7} . $cadena{5} . $cadena{6} . $cadena{4} . $cadena{0} . $cadena{1} . $cadena{2} . $cadena{3} . $cadena{10} . $cadena{11} . $cadena{12} . $cadena{13} . $cadena{14} . $cadena{15} . $cadena{16} . $cadena{17} . $cadena{18};
}  
//----------			

while($M=ibase_fetch_row($movs))
  {
echo"<tr class=content><td align ='center'>$M[0]</td>";
echo"<td>$M[1]</td></tr>";
 } 
echo"<tr class=content><td align ='left' class=title>Respaldo:</td>";
echo"<td class=title>$doctoresp $fechaTOP</td></tr>";
echo "</table>";
//Finaliza Encabezado

echo "<table><tr><td align = center  style='font-family:Arial; font-size:12px; font-weight:bold'>Generar Reporte de Movimiento:</td>";  
echo "<td align = center  style='font-family:Arial; font-size:12px; font-weight:bold'>
<form action='mP.php'>
	<input type='text' maxlength='2' size='1px' name = 'movi' value = '0' style='color: #006699; font-weight:bold'/>
	  </td>
	  <td align = center  style='font-family:Arial; font-size:12px; font-weight:bold'>
	  De:
	  <input type='text' maxlength='10' size='6px' name = 'fDesde' value = '$fDesde' style='color: #990000' onfocus='this.blur()' class='editnull'/>
	  </td>
	  <td align = center  style='font-family:Arial; font-size:12px; font-weight:bold'>A:<input type='text' maxlength='10' size='6px' name = 'fHasta' value = '$fHasta' style='color: #990000' onfocus='this.blur()' class='editnull'/>
	  </td>
	  <td>
	  <input type='text' size='2px' name = 'sucu' value = '$sucu' onfocus='this.blur()' class='editnull' />
	  </td>
	  <td><INPUT TYPE='submit' value='Generar' > </form>
	  </td></tr>";   
echo "</table>";
if ($sucu=='LUC'){
$cedis = ibase_query($conn,$sqlL);
}else{
$cedis = ibase_query($conn,$sql);
}

echo "<table border = '1' style='font-family:Arial, Helvetica, sans-serif; font-size:12PX' cellpadding='1' cellspacing='0' align='center'>";

echo "<th align='center'>N°</th>";
echo "<th align='center'>CLAVE</th>";
echo "<th align='center'>MOV.</th>";
echo "<th align='center'>FECHA DOC.</th>";
echo "<th align='center'>FECHA ELAB.</th>";
echo "<th align='center'>DOCTO</th>";
echo "<th align='center'>CANT</th>";

$count = 0;
$cant=0;
$counter = 0;
while($C=ibase_fetch_row($cedis)){

$counter = $count + 1;
$count = $counter;
  
$fechaE = $C[2];
$fechaDocu = $fechaE{8} . $fechaE{9} . $fechaE{7} . $fechaE{5} . $fechaE{6} . $fechaE{4} . $fechaE{0} . $fechaE{1} . $fechaE{2} . $fechaE{3} . $fechaE{10};

$fechaEL = $C[5];
$fechaElab = $fechaEL{8} . $fechaEL{9} . $fechaEL{7} . $fechaEL{5} . $fechaEL{6} . $fechaEL{4} . $fechaEL{0} . $fechaEL{1} . $fechaEL{2} . $fechaEL{3} . $fechaEL{10} . $fechaEL{11} . $fechaEL{12} . $fechaEL{13} . $fechaEL{14} . $fechaEL{15} . $fechaEL{16} . $fechaEL{17} . $fechaEL{18};

echo"<tr><td align = 'center' >$counter</td>";
echo"<td>$C[0]</td>";
echo"<td>$C[1]</td>";
echo"<td>$fechaDocu</td>";
echo"<td>$fechaElab</td>";
echo"<td>$C[3]</td>";
$maskCantidad = sprintf("%01.2f", $C[4]);
echo"<td align ='right'>$maskCantidad</td></TR>";

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
