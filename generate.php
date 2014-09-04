<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="./master.css" rel="stylesheet" type="text/css">
<title>Cartas de Traspasos</title>
 <script type='text/javascript' src="jquery.min.js"></script>
   <script type="text/javascript">
         function  efecto(){
                             $('#fotocargando').hide();
                             $('#contenidoWeb').fadeIn(500);
        }
   </script>
</head>

<body class="body" onload="efecto();">

  	<div id="fotocargando" style="width:100%;text-align: center;">
                <img src="http://www.lacosox.org/sites/default/files/cargando.gif">
     </div>

<div id="contenidoWeb" style="display:none;"><!---EFECTO!--->
	 
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
					<td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold">Movimientos Sucursal Salida <?php echo "$suc1"; ?> - Entrada <?php echo "$suc2"; ?>
					</td>
				</tr>
				<tr>
					<td class="title" align="right"><div align="left">Este reporte se genero del periodo:</div></td>
					<td class="title" align="right">
					<?php
					$maskfD = $fecha;
					$maskfH = $fechaf;
$maskFD = $maskfD{8} . $maskfD{9} . $maskfD{7} . $maskfD{5} . $maskfD{6} . $maskfD{4} . $maskfD{0} . $maskfD{1} . $maskfD{2} . $maskfD{3};
$maskFH = $maskfH{8} . $maskfH{9} . $maskfH{7} . $maskfH{5} . $maskfH{6} . $maskfH{4} . $maskfH{0} . $maskfH{1} . $maskfH{2} . $maskfH{3};
 					echo "$maskFD"; ?>  al  <?php echo "$maskFH";?>
	 				</td>
				</tr>
				
				<tr>
					<td class="contentfac" align="right">Ult. Mov. de respaldo : <?php echo "$suc1"; ?></td>
					<td class="contentfac" align="left">
						<?php 
 							include("conex.php");
									
									 if($suc1=='MEXICO'){
  									 	$conn=Connectmex();
										$ABR='MEX'; 
										$almacen = 1;
   										$mov=58;
 									 }				
 									 if($suc1=='LEON'){
   										$conn=Connectgto(); 
										$ABR='GTO';
										$almacen = 2;
   										$mov=58;
   									 }
									 if($suc1=='GUADALAJARA'){
  										$conn=Connectgdl(); 
										$ABR='GDL';
										$almacen = 3;
   										$mov=58;
 									 }
									 if($suc1=='MONTERREY'){
 										$conn=Connectmty(); 
										$ABR='MTY';
										$almacen = 4;
   										$mov=58;
 									 }
									 if($suc1=='PUEBLA'){
 										$conn=Connectpue();
										$ABR='PUE'; 
										$almacen = 5;
   										$mov=58;
									 }
									 if($suc1=='VERACRUZ'){
   										$conn=Connectver(); 
										$ABR='VER';
										$almacen = 6;
   										$mov=58;
  									 }
									 if($suc1=='CANCUN'){
  										$conn=Connectcun();
										$ABR='CUN'; 
										$almacen = 7;
   										$mov=58;
 									 }
									 if($suc1=='MERIDA'){
									    $conn=Connectmid(); 
										$ABR='MID';
										$almacen = 8;
   										$mov=58;
  									 }
									 if($suc1=='CHIHUAHUA'){
 										$conn=Connectcuu();
										$ABR='CUU';
										$almacen = 9;
   										$mov=58; 
									 }
									 if($suc1=='QUERETARO'){
  										$conn=Connectqro(); 
										$ABR='QRO';
										$almacen = 10;
   										$mov=58;
								     }
									 if($suc1=='TUXTLA'){
 										$conn=Connecttgz();
										$ABR='TGZ'; 
										$almacen = 11;
   										$mov=58;
									 }
									
									 $sqlTop= "SELECT first(1) MINVE03.fechaelab, MINVE03.REFER FROM MINVE03 ORDER BY MINVE03.num_mov DESC";
								     $sqlTop= "SELECT first(1) MINVE03.fechaelab, MINVE03.REFER FROM MINVE03 ORDER BY MINVE03.num_mov DESC";
								     $rs = ibase_query($conn,$sqlTop);
									 $T=ibase_fetch_row($rs);
								
									 $cadena = $T[0];
			 						 $fechaTOP = $cadena{8} . $cadena{9} . $cadena{7} . $cadena{5} . $cadena{6} . $cadena{4} . $cadena{0} . $cadena{1} . $cadena{2} . $cadena{3} . $cadena{10} . $cadena{11} . $cadena{12} . $cadena{13} . $cadena{14} . $cadena{15} . $cadena{16} . $cadena{17} . $cadena{18};

									  echo "$T[1] $fechaTOP";
				
				
				 ?> 
					 </td>
				 </tr>
				 
				 <tr>
					<td class="contentfac" align="right">Ult. Mov. de respaldo : <?php echo "$suc2"; ?></td>
					<td class="contentfac" align="left">
					<?php 
 									  if($suc2=='MEXICO'){
  										 $conn2=Connectmex(); 
										 $ABR2='MEX';
										 $almacen2 = 1;
   										 $mov2=7;
								      }				
									  if($suc2=='LEON'){
  										 $conn2=Connectgto();
										 $ABR2='GTO';
										 $almacen2 = 2;
   										 $mov2=7;
 								      }
									  if($suc2=='GUADALAJARA'){
   										 $conn2=Connectgdl();
										 $ABR2='GDL';
										 $almacen2 = 3;
   										 $mov2=7;
  									  }
                                      if($suc2=='MONTERREY'){
  										 $conn2=Connectmty();
										 $ABR2='MTY'; 
										 $almacen2 = 4;
   										 $mov2=7;
                                      }
                                      if($suc2=='PUEBLA'){
                                         $conn2=Connectpue(); 
										 $ABR2='PUE';
										 $almacen2 = 5;
   										 $mov2=7;
                                      }
                                      if($suc2=='VERACRUZ'){
                                         $conn2=Connectver();
										 $ABR2='VER';
										 $almacen2 = 6;
   										 $mov2=7;
                                      }
                                      if($suc2=='CANCUN'){
                                         $conn2=Connectcun();
										 $ABR2='CUN';
										 $almacen2 = 7;
   										 $mov2=7;
                                      }
                                      if($suc2=='MERIDA'){
                                         $conn2=Connectmid();
										 $ABR2='MID';
										 $almacen2 = 8;
   										 $mov2=7;
                                      }
                                      if($suc2=='CHIHUAHUA'){
                                         $conn2=Connectcuu();
										 $ABR2='CUU';
										 $almacen2 = 9;
   										 $mov2=7;
                                      }
                                      if($suc2=='QUERETARO'){
                                         $conn2=Connectqro(); 
										 $ABR2='QRO';
										 $almacen2 = 10;
   										 $mov2=7;
                                      }
                                      if($suc2=='TUXTLA'){
                                         $conn2=Connecttgz(); 
										 $ABR2='TGZ';
										 $almacen2 = 11;
   										 $mov2=7;
                                      }
				                
								$sqlTop2= "SELECT first(1) MINVE03.fechaelab, MINVE03.REFER FROM MINVE03 ORDER BY MINVE03.num_mov DESC";
				
			                    $rs2 = ibase_query($conn2,$sqlTop2);
								$T2=ibase_fetch_row($rs2);
			
								$cadena2 = $T2[0];
								$fechaTOP2 = $cadena2{8} . $cadena2{9} . $cadena2{7} . $cadena2{5} . $cadena2{6} . $cadena2{4} . $cadena2{0} . $cadena2{1} . $cadena2{2} . $cadena2{3} . $cadena2{10} . $cadena2{11} . $cadena2{12} . $cadena2{13} . $cadena2{14} . $cadena2{15} . $cadena2{16} . $cadena2{17} . $cadena2{18};

								echo "$T2[1] $fechaTOP2";
				
				
				 ?> 
					 </td>
				</tr>
				
				<tr>
					<td>
					<?php
					echo "<td align='left' class='movs'>CARTAS DE TRASPASOS";
					echo "<a href='indexexporta.php'><img src='Images/volver.jpg' border='0' title='Regresar a Menú Exportar'/></a></td>";
					?>
					</td>
				</tr>
			</table>

<?php
error_reporting(0);

$conninv=Inventarios(); 
 
   $sql="SELECT MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.REFER, SUM(MINVE03.CANT) AS CANTIDAD FROM MINVE03 WHERE MINVE03.CVE_CPTO = 58 AND ((MINVE03.FECHA_DOCU)>='$fecha') and ((MINVE03.FECHA_DOCU)<='$fechaf') GROUP BY MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.REFER ORDER BY MINVE03.REFER, MINVE03.CVE_ART ASC  ";
   $sql3="SELECT MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.REFER, SUM(MINVE03.CANT) AS CANTIDAD FROM MINVE03 WHERE MINVE03.CVE_CPTO = 7 AND ((MINVE03.FECHA_DOCU)>='$fecha') and ((MINVE03.FECHA_DOCU)<='$fechaf') GROUP BY MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.REFER ORDER BY MINVE03.REFER, MINVE03.CVE_ART ASC  ";
    $sqlF="SELECT MINVE03.CVE_ART, MINVE03.FECHA_DOCU,MINVE03.REFER FROM MINVE03 WHERE MINVE03.CVE_CPTO = 58 AND ((MINVE03.FECHA_DOCU)>='$fecha') and ((MINVE03.FECHA_DOCU)<='$fechaf') GROUP BY MINVE03.CVE_ART, MINVE03.FECHA_DOCU,MINVE03.REFER ORDER BY MINVE03.REFER, MINVE03.CVE_ART, MINVE03.FECHA_DOCU ASC  ";
 
//ENTRADAS   

   $sql2="SELECT MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.REFER, SUM(MINVE03.CANT) AS CANTIDAD FROM MINVE03 WHERE MINVE03.CVE_CPTO = 7 AND ((MINVE03.FECHA_DOCU)>='$fecha') and ((MINVE03.FECHA_DOCU)<='$fechaf') GROUP BY MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.REFER ORDER BY MINVE03.REFER, MINVE03.CVE_ART ASC  ";
   $sql4="SELECT MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.REFER, SUM(MINVE03.CANT) AS CANTIDAD FROM MINVE03 WHERE MINVE03.CVE_CPTO = 58 AND ((MINVE03.FECHA_DOCU)>='$fecha') and ((MINVE03.FECHA_DOCU)<='$fechaf') GROUP BY MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.REFER ORDER BY MINVE03.REFER, MINVE03.CVE_ART ASC  ";
  
$sqlCosto="SELECT INVE01.CVE_ART, INVE01.COSTO_PROM FROM INVE01 ORDER BY INVE01.CVE_ART ASC";

$sal = ibase_query($conn,$sql);


$salidas = "D:/SAE50/MOVIMIENTOS/"."sal".$suc1."ent".$suc2."_".date('dmyhi').$_SESSION["k_username"].".txt"; 

  if (file_exists($salidas)) {
     ?>
	 <script language='JavaScript'> 
     alert('ERROR!!! NO SE GENERARON MOVIMIENTOS: El archivo ya existe con ese nombre. Revisar carpeta de movimientos.'); 
	 window.location="index.php";
     </script>
	<?php		
	$salidas = null;	
								} 
								
$entradas = "D:/SAE50/MOVIMIENTOS/"."sal".$suc1."ent".$suc2."_".date('dmyhi').$_SESSION["k_username"].".txt"; 

  if (file_exists($entradas)) {
     ?>
	 <script language='JavaScript'> 
     alert('ERROR!!! NO SE GENERARON MOVIMIENTOS: El archivo ya existe con ese nombre. Revisar carpeta de movimientos.'); 
	 window.location="indexexporta.php";
     </script>
	<?php		
	$entradas = null;	
								} 								
//Inicia Encabezado
echo "<table border = '1' style='font-family:Arial, Helvetica, sans-serif; font-size:12PX' cellpadding='1' cellspacing='0' align='center'><tr>";
echo "<th align='center' >CLAVE</th>";
echo "<th align='center'>DOCTO.</th>";
echo "<th align='center'>N°. MOV.</th>";
echo "<th align='center'>ALMACEN</th>";
echo "<th align='center'>CANT.</th>";
echo "<th align='center'>FECHA</th>";
echo "<th align='center'>COSTO</th></tr>";

$x = 0;
$count = 0;
$dif = 0;

while($S=ibase_fetch_row($sal))
  {
  	$ent = ibase_query($conn2,$sql2);
		while($E=ibase_fetch_row($ent)) 
			{
			
			$folioe = $S[2];
			$folioE = $folioe{0} . $folioe{1} . $folioe{2} . $folioe{3};
			$folioE_C=trim($folioE);
			
			if($S[2]==$E[2] and $S[0]==$E[0]){
			
			$fechasale = ibase_query($conn,$sqlF);
			
				while($F=ibase_fetch_row($fechasale)) 
				{
				if($S[2]==$F[2] and $S[0]==$F[0]){
				$encontro = $F[1];
					}
				}
				
            $cantDifsal = ibase_query($conn,$sql3);   
			
				while($SD=ibase_fetch_row($cantDifsal)) 
				{
				if($S[2]==$SD[2] and $S[0]==$SD[0]){
				$difSal = $SD[3];
					}
				}
			
			 $cantDifent = ibase_query($conn2,$sql4);   
			
				while($SE=ibase_fetch_row($cantDifent)) 
				{
				if($E[2]==$SE[2] and $E[0]==$SE[0]){
				$difEnt = $SE[3];
					}
				} 	 			
			
//Calculo diferencias en montos de Salidas
$maskCantS = $S[3]*-1;
$totalDifsal = $maskCantS + $difSal;
$totalDifent = $E[3] - $difEnt;			
$totalDifsal2 = $totalDifsal * -1;				
				$dif = $totalDifsal + $totalDifent;
			if($dif == 0){	
				
				$invcosto = ibase_query($conninv,$sqlCosto);
			
				while($COSTO=ibase_fetch_row($invcosto)) 
				{
				if($S[0]==$COSTO[0]){
				$costo_prom = $COSTO[1];
					}
				}	
		/*	$fechasal = $encontro;
			$maskSAL = $fechasal{8} . $fechasal{9} . $fechasal{7} . $fechasal{5} . $fechasal{6} . $fechasal{4} . $fechasal{0} . $fechasal{1} . $fechasal{2} . $fechasal{3};*/
			
			echo "<tr class='contentD'><td>$S[0]</td><td>$S[2]</td><td align='center'>$mov</td><td align='center'>$almacen</td><td align='center'>$totalDifsal</td><td align='center'>$encontro</td><td>$costo_prom</td></tr><tr class='contentD'><td>$E[0]</td><td>$E[2]</td><td align='center'>$mov2</td><td align='center'>$almacen2</td><td align='center'>$totalDifent</td><td>$encontro</td><td>$costo_prom</td></tr>";

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
$salidas2=$salidas;			
			
//$salidas2 = "D:/SAE50/MOVIMIENTOS/"."sal".$suc1."ent".$suc2.".txt"; 

@touch($salidas2);

	 if (filesize($salidas2) > 1024000) 
	 {
     rename($salidas2,$salidas2.'_'.date(Ymdhis)); 
     }
   
    $salidas2 = @fopen($salidas2,"a+");    	

   $lineaTXT  = "Fecha de Creacion: ".date("d/m/Y·h:i:s")."  "; 
   $lineaTXT  .= "'"."$S[0]"."'"; 
   $lineaTXT  .= "'"."$almacen"."'"; 
   $lineaTXT  .= "'"."$mov"."'"; 
   $lineaTXT  .= "'"."$S[2]"."'"; 
   $lineaTXT  .= "'"."$totalDifsal2"."'";
   $lineaTXT  .= "'"."$encontro"."'";
   $lineaTXT  .= "'"."$costo_prom"."'";
   $lineaTXT  .= "".chr(13).chr(10);       

   @fwrite($salidas2,$lineaTXT);    	
   @fclose($salidas2);   
//Finaliza Conversion 
//Convierte

$entradas2=$entradas;

//$entradas = "D:/SAE50/MOVIMIENTOS/"."sal".$suc1."ent".$suc2.".txt"; 

@touch($entradas2);

	 if (filesize($entradas2) > 1024000) 
	 {
     rename($entradas2,$entradas2.'_'.date(Ymdhis)); 
     }
   
   $entradas2 = @fopen($entradas2,"a+");    
   $lineaTXT  = "Fecha de Creacion: ".date("d/m/Y·h:i:s")."  "; 
   $lineaTXT  .= "'"."$E[0]"."'"; 
   $lineaTXT  .= "'"."$almacen2"."'"; 
   $lineaTXT  .= "'"."$mov2"."'"; 
   $lineaTXT  .= "'"."$E[2]"."'"; 
   $lineaTXT  .= "'"."$totalDifent"."'";
   $lineaTXT  .= "'"."$encontro"."'";
   $lineaTXT  .= "'"."$costo_prom"."'";
   $lineaTXT  .= "".chr(13).chr(10); 
                              	
   @fwrite($entradas2,$lineaTXT);    	
   @fclose($entradas2);   
//Finaliza Conversion 
}
			$count = $count + 2; 
			}
$difSal=0;			
$difEnt=0;							}
			}
  }
 ibase_close($conn); 
echo "</table>";

?>

<table class="content">
<tr><td class="title">Se exportar&aacute;n <?php echo "$count"; ?> registros</td></tr>
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

</div><!--EFECTO!--->
</body>
<?php

$logAcceso = "D:/Logs/Inventarios/Exporta/LogsExportaciones.txt"; 

@touch($logAcceso);

	 if (filesize($logAcceso) > 1024000) 
	 {
     rename($logAcceso,$logAcceso.'_'.date(Ymdhis)); 
     }
   
   $logAcceso = @fopen($logAcceso,"a+");    	

   $lineaTXT  = "Generó Movimientos de Cartas Traspaso: ".date("d/m/Y·H:i:s").".";  
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