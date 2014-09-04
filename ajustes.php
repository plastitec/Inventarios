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
					<td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold">Movimientos de Ajustes  <?php echo "$sucu"; ?>
					</td>
					</tr>
					<tr>
					<td class="title" align="right">Rango de fechas del reporte generado:</td>
					<td class="content" align="right">
					<?php
					$maskfD = $fDesde;
					$maskfH = $fHasta;
$maskFD = $fDesde{8} . $fDesde{9} . $fDesde{7} . $fDesde{5} . $fDesde{6} . $fDesde{4} . $fDesde{0} . $fDesde{1} . $fDesde{2} . $fDesde{3};
$maskFH = $maskfH{8} . $maskfH{9} . $maskfH{7} . $maskfH{5} . $maskfH{6} . $maskfH{4} . $maskfH{0} . $maskfH{1} . $maskfH{2} . $maskfH{3};
 					echo "$maskFD"; ?>  al  <?php echo "$maskFH"; ?>
	 				</td>
					</tr>
				<tr>
					<td><?php
  if ($movi==6){
  echo "<td align='center' class='movs'>AJUSTES</td>";
  echo "<td><a href='indexexporta.php'><img src='Images/volver.jpg' border='0' title='Regresar a Menú Exportar'/></a></td>";}
  ?>
					</td>
				</tr>
				<tr>
					<td class="content">
					Nombre del archivo generado: <?php echo "$nombreTXT"; ?>
					</td>				
				</tr>
			</table>

<?php

error_reporting(0);

include("conex.php"); 

$conn=0;
 
if($sucu=='MEX'){
   $conn=Connectmex(); 
   $almacen=1;
   }
if($sucu=='GTO'){
   $conn=Connectgto(); 
   $almacen=2;
   }
if($sucu=='GDL'){
   $conn=Connectgdl(); 
   $almacen=3;
   }
if($sucu=='MTY'){
   $conn=Connectmty(); 
   $almacen=4;
   }
if($sucu=='PUE'){
   $conn=Connectpue(); 
   $almacen=5;
   }
if($sucu=='VER'){
   $conn=Connectver(); 
   $almacen=6;
   }
if($sucu=='CUN'){
   $conn=Connectcun(); 
   $almacen=7;
   }
if($sucu=='MID'){
   $conn=Connectmid(); 
   $almacen=8;
   }
if($sucu=='CUU'){
   $conn=Connectcuu();
   $almacen=9; 
   }
if($sucu=='QRO'){
   $conn=Connectqro(); 
   $almacen=10;
   }
if($sucu=='TGZ'){
   $conn=Connecttgz(); 
   $almacen=11;
   }
    
	$conninv=Inventarios();  
	  
   $counter=0;
   $nomTXT=0; 
   $sql ="SELECT MINVE03.CVE_ART, MINVE03.CVE_CPTO, MINVE03.FECHA_DOCU, MINVE03.REFER, MINVE03.CANT, MINVE03.ALMACEN, MINVE03.COSTO FROM MINVE03 WHERE MINVE03.FECHA_DOCU>='$fDesde' and MINVE03.FECHA_DOCU<='$fHasta' and MINVE03.CVE_CPTO = $movi order by MINVE03.FECHAELAB ASC";
   $sqlCosto="SELECT INVE01.CVE_ART, INVE01.ULT_COSTO FROM INVE01 ORDER BY INVE01.CVE_ART ASC";


$cedis = ibase_query($conn,$sql);

echo "<table border = '1' style='font-family:Arial, Helvetica, sans-serif; font-size:12PX' cellpadding='1' cellspacing='0' align='center'>";

echo "<th align='center'>N°</th>";
echo "<th align='center'>CLAVE</th>";
echo "<th align='center'>MOV.</th>";
echo "<th align='center'>FECHA</th>";
echo "<th align='center'>DOCTO</th>";
echo "<th align='center'>CANT</th>";
echo "<th align='center'>ALMACEN</th>";
echo "<th align='center'>COSTO</th>";

$count = 0;
$cant=0;
$dif=0;
$ult_costo=0;

$kardex = "D:/SAE50/MOVIMIENTOS/"."$nombreTXT".".txt"; 

  if (file_exists($kardex)) {
     ?>
	 <script language='JavaScript'> 
     alert('ERROR!!! NO SE GENERO EL ARCHIVO: Un archivo ya existe con ese nombre. Revisar carpeta de movimientos.'); 
	 window.location="indexexporta.php";
     </script>
	<?php		
	$kardex = null;	
								} 
								
while($C=ibase_fetch_row($cedis)){

		$invcosto = ibase_query($conninv,$sqlCosto);
			
				while($COSTO=ibase_fetch_row($invcosto)) 
				{
					if($C[0]==$COSTO[0]){
					$ult_costo = $COSTO[1];
					}
				}
	$fechaE = $C[2];
$fechaDocu = $fechaE{8} . $fechaE{9} . $fechaE{7} . $fechaE{5} . $fechaE{6} . $fechaE{4} . $fechaE{0} . $fechaE{1} . $fechaE{2} . $fechaE{3} . $fechaE{10} /*. $fechaE{11} . $fechaE{12} . $fechaE{13} . $fechaE{14} . $fechaE{15} . $fechaE{16} . $fechaE{17} . $fechaE{18}*/;

if(!$conninv){
?>
 	 <script language='JavaScript'> 
     alert('ERROR DE CONEXION: VUELVE A GENERAR TU REPORTE'); 
	 window.location="indexexporta.php";
     </script>
<?php
}
else {		
	//Convierte
$kardex2 = $kardex; 

@touch($kardex2);

	 if (filesize($kardex2) > 1024000) 
	 {
     rename($kardex2,$kardex2.'_'.date(Ymdhis)); 
     }
   
   $kardex2 = @fopen($kardex2,"a+");    	

   $lineaTXT  = "Fecha de Creacion: ".date("d/m/Y·h:i:s")."  "; 
   $lineaTXT  .= "'"."$C[0]"."'"; 
   $lineaTXT  .= "'"."$almacen"."'"; 
   $lineaTXT  .= "'"." 6"."'";
   $lineaTXT  .= "'"."$C[2]"."'";
   $lineaTXT  .= "'"."$C[3]"."'";
   $lineaTXT  .= "'"."$C[4]"."'";
   $lineaTXT  .= "'"."$ult_costo"."'";
   $lineaTXT  .= "".chr(13).chr(10);       
                              	
   @fwrite($kardex2,$lineaTXT);    	
   @fclose($kardex2);   
//Finaliza Conversion 
}
	$counter = $count + 1;
	$count = $counter;

echo"<tr><td align = 'center' >$counter</td>";
echo"<td>$C[0]</td>";
echo"<td>$C[1]</td>";
echo"<td>$fechaDocu</td>";
echo"<td>$C[3]</td>";
$maskCantidad = sprintf("%01.2f", $C[4]);
echo"<td align ='right'>$maskCantidad</td>";
echo"<td align ='right'>$C[5]</td>";
echo"<td align ='right'>$ult_costo</td>";


	$cant = $cant + $C[4];
	$dif=0;
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
<?php

$logAcceso = "D:/Logs/Inventarios/Exporta/LogsExportaciones.txt"; 

@touch($logAcceso);

	 if (filesize($logAcceso) > 1024000) 
	 {
     rename($logAcceso,$logAcceso.'_'.date(Ymdhis)); 
     }
   
   $logAcceso = @fopen($logAcceso,"a+");    	

   $lineaTXT  = "Generó Movimientos Ajustes: ".date("d/m/Y·H:i:s").".";  
// $lineaTXT .= "·".$_SESSION["k_username"]."·";
   $lineaTXT .= $_SERVER["REMOTE_ADDR"]."·";         
   $lineaTXT .= $_SERVER["REMOTE_PORT"]."·";         
   $lineaTXT .= $_SERVER["REQUEST_URI"]."·";         
   $lineaTXT .= gethostbyaddr($_SERVER['REMOTE_ADDR'])."."; 
   $lineaTXT .= "·".chr(13).chr(10);         
                              	
   @fwrite($logAcceso,$lineaTXT);    	
   @fclose($logAcceso);  
?>  
</html>

