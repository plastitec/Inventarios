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
					<td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold">Movimientos de devoluciones  <?php echo "$sucu"; echo "<td><a href='indexexporta.php'><img src='Images/volver.jpg' border='0' title='Regresar a Menú Exportar'/></a></td>";?>
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
  if ($movi==51){
  echo "<td align='center' class='movs'>VENTAS</td>";
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

//error_reporting(0);

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
   if($sucu=='TIJ'){
   $conn=Connecttij(); 
   $almacen=12;
   }
   $nbd='03';
   if($sucu=='LUC'){
   $conn=Connectluc(); 
   $almacen=13;
   $nbd='04';
   }
    
	$conninv=Inventarios();  
	  
$nomTXT=0; 
   $sql ="SELECT MINVE".$nbd.".CVE_ART, MINVE".$nbd.".CVE_CPTO, MINVE".$nbd.".REFER, SUM(MINVE".$nbd.".CANT) AS CANT, MINVE".$nbd.".ALMACEN, MINVE".$nbd.".COSTO FROM MINVE".$nbd." WHERE MINVE".$nbd.".FECHA_DOCU>='$fDesde' and MINVE".$nbd.".FECHA_DOCU<='$fHasta' AND MINVE".$nbd.".CVE_CPTO = 2 GROUP BY MINVE".$nbd.".CVE_ART, MINVE".$nbd.".REFER, MINVE".$nbd.".CVE_CPTO, MINVE".$nbd.".ALMACEN, MINVE".$nbd.".COSTO ORDER BY MINVE".$nbd.".REFER ASC";
   $sqlcanc ="SELECT MINVE".$nbd.".CVE_ART, MINVE".$nbd.".CVE_CPTO, MINVE".$nbd.".REFER, SUM(MINVE".$nbd.".CANT) AS CANT, MINVE".$nbd.".ALMACEN, MINVE".$nbd.".COSTO FROM MINVE".$nbd." WHERE MINVE".$nbd.".FECHA_DOCU>='$fDesde' and MINVE".$nbd.".FECHA_DOCU<='$fHasta' AND MINVE".$nbd.".CVE_CPTO = 56 GROUP BY MINVE".$nbd.".CVE_ART, MINVE".$nbd.".REFER, MINVE".$nbd.".CVE_CPTO, MINVE".$nbd.".ALMACEN, MINVE".$nbd.".COSTO";
   $sqlF="SELECT MINVE".$nbd.".CVE_ART, MINVE".$nbd.".FECHA_DOCU,MINVE".$nbd.".REFER FROM MINVE".$nbd." WHERE MINVE".$nbd.".CVE_CPTO = 2 AND ((MINVE".$nbd.".FECHA_DOCU)>='$fDesde') and ((MINVE".$nbd.".FECHA_DOCU)<='$fHasta') GROUP BY MINVE".$nbd.".CVE_ART, MINVE".$nbd.".FECHA_DOCU,MINVE".$nbd.".REFER ORDER BY MINVE".$nbd.".REFER, MINVE".$nbd.".CVE_ART, MINVE".$nbd.".FECHA_DOCU ASC  ";
   $sqlDoctoE="SELECT MINVE".$nbd.".CVE_ART,MINVE".$nbd.".REFER, DOCTOSIGF".$nbd.".CVE_DOC_E FROM MINVE".$nbd." LEFT JOIN DOCTOSIGF".$nbd." ON MINVE".$nbd.".REFER=DOCTOSIGF".$nbd.".CVE_DOC WHERE MINVE".$nbd.".CVE_CPTO = 2 AND ((MINVE".$nbd.".FECHA_DOCU)>='$fDesde') and ((MINVE".$nbd.".FECHA_DOCU)<='$fHasta') GROUP BY MINVE".$nbd.".CVE_ART,MINVE".$nbd.".REFER, DOCTOSIGF".$nbd.".CVE_DOC_E ORDER BY MINVE".$nbd.".REFER, MINVE".$nbd.".CVE_ART ASC  ";
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
$enlazado=0;

$kardex = "D:/SAE50/MOVIMIENTOS/"."$nombreTXT".".txt"; 

  if (file_exists($kardex)) {
     ?>
	 <script language='JavaScript'> 
     alert('ERROR!!! NO SE GENERO EL ARCHIVO: Un archivo ya existe con ese nombre. Revisar carpeta de movimientos.'); 
	 $kardex = null;
	 window.location="index.php";
     </script>
	<?php		
	$kardex = null;	
								}			 
								
while($C=ibase_fetch_row($cedis)){

$cancela = ibase_query($conn,$sqlcanc);

	while($CANC=ibase_fetch_row($cancela)){

	if ($C[0]==$CANC[0] and $C[2]==$CANC[2]) {
	
	$counter = $count + 1;
	$count = $counter;

	$dif=$CANC[3];
    	}
	}
	
	$fechasale = ibase_query($conn,$sqlF);
			
				while($F=ibase_fetch_row($fechasale)) 
				{
				if($C[2]==$F[2] and $C[0]==$F[0]){
				$encontro = $F[1];
					}
				}
				
	$invcosto = ibase_query($conninv,$sqlCosto);
			
				while($COSTO=ibase_fetch_row($invcosto)) 
				{
				if($C[0]==$COSTO[0]){
				$ult_costo = $COSTO[1];
					}
				}
				
	$enlace = ibase_query($conn,$sqlDoctoE);
			
				while($ENC=ibase_fetch_row($enlace)) 
				{
				if($C[0]==$ENC[0] and $C[2]==$ENC[1]){
				$enlazado = $ENC[2];
					}
				}			
				
			$fechasal = $encontro;
			$maskSAL = $fechasal{8} . $fechasal{9} . $fechasal{7} . $fechasal{5} . $fechasal{6} . $fechasal{4} . $fechasal{0} . $fechasal{1} . $fechasal{2} . $fechasal{3};
			
	$counter = $count + 1;
	$count = $counter;

	$diferencia=$C[3]-$dif;
	
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
   $lineaTXT  .= "'"." 4"."'";
   $lineaTXT  .= "'"."$encontro"."'";
   if($enlazado != ''){
   $lineaTXT  .= "'"."$enlazado"."'";}
   if($enlazado == '') {
   $lineaTXT  .= "'"."$C[2]"."'";}
   $lineaTXT  .= "'"."$diferencia"."'";
   $lineaTXT  .= "'"."$ult_costo"."'";
   $lineaTXT  .= "".chr(13).chr(10);       
                              	
   @fwrite($kardex2,$lineaTXT);    	
   @fclose($kardex2);   
//Finaliza Conversion 

	echo"<tr><td align = 'center' >$counter</td>";
	echo"<td>$C[0]</td>";
	echo"<td>4</td>";
	//echo"<td>$fechaDocu</td>";
	echo"<td>$encontro</td>";
	if($enlazado != ''){
	echo"<td>$enlazado</td>";}
	if($enlazado == '') {
	echo"<td>$C[2]</td>";}
	$maskCantidad = sprintf("%01.2f", $C[3]);
	echo"<td align ='right'>$diferencia</td>";
	echo"<td align ='right'>$C[4]</td>";
	echo"<td align ='right'>$ult_costo</td>";

	$cant = $cant + $C[3];
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

   $lineaTXT  = "Generó Devoluciones: ".date("d/m/Y·H:i:s").".";  
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

