<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="./master.css" rel="stylesheet" type="text/css">
<title>DIFERENCIAS</title>
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
			<!--Encabezado-->
			<hr />
			<table height="50px" width="405" cellpadding="0" cellspacing="0">
					<tr>
						<td width="186"><img src="images/logo.jpg" /></td>
					  <td width="217" align="center"><p class="content">Acrilicos Plastitec S.A. de C.V.</p><p class="title">Diferencias Almacen <?php echo "$almacen"; echo "<a href='indexconsulta.php'><img src='Images/volver.jpg' border='0' title='Regresar a Menú Exportar'/></a></td>";?></p></td>
					</tr>
					<tr>
						<TD class="content" valign="top" align="right"><?php
echo "<strong>Fecha de Generacion:</strong> ";
error_reporting(0);
include("conex.php"); 
$conninv=Inventarios(); 						
$sqlTop= "SELECT first(1) MINVE03.fechaelab, MINVE03.REFER FROM MINVE03 ORDER BY MINVE03.num_mov DESC";

$x = 0;
$count = 0;
$dif = 0;
$CC= 0;

if($almacen=='MEXICO'){
   $conn=Connectmex(); 
   $sqlmulti="SELECT MULT01.CVE_ART, MULT01.CVE_ALM, MULT01.EXIST, INVE01.LIN_PROD, INVE01.DESCR FROM MULT01 LEFT JOIN INVE01 ON INVE01.CVE_ART=MULT01.CVE_ART WHERE MULT01.CVE_ALM ='1' AND MULT01.CVE_ART NOT LIKE 'ITR%' AND MULT01.CVE_ART NOT LIKE 'IIR%'";
   $sqlalmacen="SELECT INVE03.CVE_ART, INVE03.DESCR, INVE03.EXIST FROM INVE03";
   $ABR2=$almacen;
   $sqlmulti2="SELECT MULT01.CVE_ART, MULT01.CVE_ALM FROM MULT01 WHERE MULT01.CVE_ALM ='1' AND MULT01.CVE_ART NOT LIKE 'ITR%' AND MULT01.CVE_ART NOT LIKE 'IIR%' ";
   $sqlalmacen2="SELECT INVE03.CVE_ART, INVE03.DESCR, INVE03.EXIST, INVE03.STATUS FROM INVE03 where INVE03.CVE_ART NOT LIKE 'ITR%' AND INVE03.CVE_ART NOT LIKE 'IIR%' AND INVE03.TIPO_ELE<>'S'";
   }
if($almacen=='LEON'){
   $conn=Connectgto(); 
   $sqlmulti="SELECT MULT01.CVE_ART, MULT01.CVE_ALM, MULT01.EXIST, INVE01.LIN_PROD, INVE01.DESCR FROM MULT01 LEFT JOIN INVE01 ON INVE01.CVE_ART=MULT01.CVE_ART WHERE MULT01.CVE_ALM ='2' AND MULT01.CVE_ART NOT LIKE 'ITR%' AND MULT01.CVE_ART NOT LIKE 'IIR%'";
   $sqlalmacen="SELECT INVE03.CVE_ART, INVE03.DESCR, INVE03.EXIST FROM INVE03";
   $ABR2=$almacen;
   $sqlmulti2="SELECT MULT01.CVE_ART, MULT01.CVE_ALM FROM MULT01 WHERE MULT01.CVE_ALM ='2' AND MULT01.CVE_ART NOT LIKE 'ITR%' AND MULT01.CVE_ART NOT LIKE 'IIR%' ";
   $sqlalmacen2="SELECT INVE03.CVE_ART, INVE03.DESCR, INVE03.EXIST, INVE03.STATUS FROM INVE03 where INVE03.CVE_ART NOT LIKE 'ITR%' AND INVE03.CVE_ART NOT LIKE 'IIR%' AND INVE03.TIPO_ELE<>'S'";
   }   
if($almacen=='GUADALAJARA'){
   $conn=Connectgdl(); 
   $sqlmulti="SELECT MULT01.CVE_ART, MULT01.CVE_ALM, MULT01.EXIST, INVE01.LIN_PROD, INVE01.DESCR FROM MULT01 LEFT JOIN INVE01 ON INVE01.CVE_ART=MULT01.CVE_ART WHERE MULT01.CVE_ALM ='3' AND MULT01.CVE_ART NOT LIKE 'ITR%' AND MULT01.CVE_ART NOT LIKE 'IIR%'";
   $sqlalmacen="SELECT INVE03.CVE_ART, INVE03.DESCR, INVE03.EXIST FROM INVE03";
   $ABR2=$almacen;
   $sqlmulti2="SELECT MULT01.CVE_ART, MULT01.CVE_ALM FROM MULT01 WHERE MULT01.CVE_ALM ='3' AND MULT01.CVE_ART NOT LIKE 'ITR%' AND MULT01.CVE_ART NOT LIKE 'IIR%' ";
   $sqlalmacen2="SELECT INVE03.CVE_ART, INVE03.DESCR, INVE03.EXIST, INVE03.STATUS FROM INVE03 where INVE03.CVE_ART NOT LIKE 'ITR%' AND INVE03.CVE_ART NOT LIKE 'IIR%' AND INVE03.TIPO_ELE<>'S'";
   }    
if($almacen=='MONTERREY'){
   $conn=Connectmty(); 
   $sqlmulti="SELECT MULT01.CVE_ART, MULT01.CVE_ALM, MULT01.EXIST, INVE01.LIN_PROD, INVE01.DESCR FROM MULT01 LEFT JOIN INVE01 ON INVE01.CVE_ART=MULT01.CVE_ART WHERE MULT01.CVE_ALM ='4' AND MULT01.CVE_ART NOT LIKE 'ITR%' AND MULT01.CVE_ART NOT LIKE 'IIR%'";
   $sqlalmacen="SELECT INVE03.CVE_ART, INVE03.DESCR, INVE03.EXIST FROM INVE03";
   $ABR2=$almacen;
   $sqlmulti2="SELECT MULT01.CVE_ART, MULT01.CVE_ALM FROM MULT01 WHERE MULT01.CVE_ALM ='4' AND MULT01.CVE_ART NOT LIKE 'ITR%' AND MULT01.CVE_ART NOT LIKE 'IIR%' ";
   $sqlalmacen2="SELECT INVE03.CVE_ART, INVE03.DESCR, INVE03.EXIST, INVE03.STATUS FROM INVE03 where INVE03.CVE_ART NOT LIKE 'ITR%' AND INVE03.CVE_ART NOT LIKE 'IIR%' AND INVE03.TIPO_ELE<>'S'";
   }   
 if($almacen=='PUEBLA'){
   $conn=Connectpue(); 
   $sqlmulti="SELECT MULT01.CVE_ART, MULT01.CVE_ALM, MULT01.EXIST, INVE01.LIN_PROD, INVE01.DESCR FROM MULT01 LEFT JOIN INVE01 ON INVE01.CVE_ART=MULT01.CVE_ART WHERE MULT01.CVE_ALM ='5' AND MULT01.CVE_ART NOT LIKE 'ITR%' AND MULT01.CVE_ART NOT LIKE 'IIR%'";
   $sqlalmacen="SELECT INVE03.CVE_ART, INVE03.DESCR, INVE03.EXIST FROM INVE03";
   $ABR2=$almacen;
   $sqlmulti2="SELECT MULT01.CVE_ART, MULT01.CVE_ALM FROM MULT01 WHERE MULT01.CVE_ALM ='5' AND MULT01.CVE_ART NOT LIKE 'ITR%' AND MULT01.CVE_ART NOT LIKE 'IIR%' ";
   $sqlalmacen2="SELECT INVE03.CVE_ART, INVE03.DESCR, INVE03.EXIST, INVE03.STATUS FROM INVE03 where INVE03.CVE_ART NOT LIKE 'ITR%' AND INVE03.CVE_ART NOT LIKE 'IIR%' AND INVE03.TIPO_ELE<>'S'";
   }  
if($almacen=='VERACRUZ'){
   $conn=Connectver(); 
   $sqlmulti="SELECT MULT01.CVE_ART, MULT01.CVE_ALM, MULT01.EXIST, INVE01.LIN_PROD, INVE01.DESCR FROM MULT01 LEFT JOIN INVE01 ON INVE01.CVE_ART=MULT01.CVE_ART WHERE MULT01.CVE_ALM ='6' AND MULT01.CVE_ART NOT LIKE 'ITR%' AND MULT01.CVE_ART NOT LIKE 'IIR%'";
   $sqlalmacen="SELECT INVE03.CVE_ART, INVE03.DESCR, INVE03.EXIST FROM INVE03";
   $ABR2=$almacen;
   $sqlmulti2="SELECT MULT01.CVE_ART, MULT01.CVE_ALM FROM MULT01 WHERE MULT01.CVE_ALM ='6' AND MULT01.CVE_ART NOT LIKE 'ITR%' AND MULT01.CVE_ART NOT LIKE 'IIR%' ";
   $sqlalmacen2="SELECT INVE03.CVE_ART, INVE03.DESCR, INVE03.EXIST, INVE03.STATUS FROM INVE03 where INVE03.CVE_ART NOT LIKE 'ITR%' AND INVE03.CVE_ART NOT LIKE 'IIR%' AND INVE03.TIPO_ELE<>'S'";
   }  
if($almacen=='CANCUN'){
   $conn=Connectcun(); 
   $sqlmulti="SELECT MULT01.CVE_ART, MULT01.CVE_ALM, MULT01.EXIST, INVE01.LIN_PROD, INVE01.DESCR FROM MULT01 LEFT JOIN INVE01 ON INVE01.CVE_ART=MULT01.CVE_ART WHERE MULT01.CVE_ALM ='7' AND MULT01.CVE_ART NOT LIKE 'ITR%' AND MULT01.CVE_ART NOT LIKE 'IIR%'";
   $sqlalmacen="SELECT INVE03.CVE_ART, INVE03.DESCR, INVE03.EXIST FROM INVE03";
   $ABR2=$almacen;
   $sqlmulti2="SELECT MULT01.CVE_ART, MULT01.CVE_ALM FROM MULT01 WHERE MULT01.CVE_ALM ='7' AND MULT01.CVE_ART NOT LIKE 'ITR%' AND MULT01.CVE_ART NOT LIKE 'IIR%' ";
   $sqlalmacen2="SELECT INVE03.CVE_ART, INVE03.DESCR, INVE03.EXIST, INVE03.STATUS FROM INVE03 where INVE03.CVE_ART NOT LIKE 'ITR%' AND INVE03.CVE_ART NOT LIKE 'IIR%' AND INVE03.TIPO_ELE<>'S'";
   }  
if($almacen=='MERIDA'){
   $conn=Connectmid(); 
   $sqlmulti="SELECT MULT01.CVE_ART, MULT01.CVE_ALM, MULT01.EXIST, INVE01.LIN_PROD, INVE01.DESCR FROM MULT01 LEFT JOIN INVE01 ON INVE01.CVE_ART=MULT01.CVE_ART WHERE MULT01.CVE_ALM ='8' AND MULT01.CVE_ART NOT LIKE 'ITR%' AND MULT01.CVE_ART NOT LIKE 'IIR%'";
   $sqlalmacen="SELECT INVE03.CVE_ART, INVE03.DESCR, INVE03.EXIST FROM INVE03";
   $ABR2=$almacen;
   $sqlmulti2="SELECT MULT01.CVE_ART, MULT01.CVE_ALM FROM MULT01 WHERE MULT01.CVE_ALM ='8' AND MULT01.CVE_ART NOT LIKE 'ITR%' AND MULT01.CVE_ART NOT LIKE 'IIR%' ";
   $sqlalmacen2="SELECT INVE03.CVE_ART, INVE03.DESCR, INVE03.EXIST, INVE03.STATUS FROM INVE03 where INVE03.CVE_ART NOT LIKE 'ITR%' AND INVE03.CVE_ART NOT LIKE 'IIR%' AND INVE03.TIPO_ELE<>'S'";
   }  
if($almacen=='CHIHUAHUA'){
   $conn=Connectcuu(); 
   $sqlmulti="SELECT MULT01.CVE_ART, MULT01.CVE_ALM, MULT01.EXIST, INVE01.LIN_PROD, INVE01.DESCR FROM MULT01 LEFT JOIN INVE01 ON INVE01.CVE_ART=MULT01.CVE_ART WHERE MULT01.CVE_ALM ='9' AND MULT01.CVE_ART NOT LIKE 'ITR%' AND MULT01.CVE_ART NOT LIKE 'IIR%'";
   $sqlalmacen="SELECT INVE03.CVE_ART, INVE03.DESCR, INVE03.EXIST FROM INVE03";
   $ABR2=$almacen;
   $sqlmulti2="SELECT MULT01.CVE_ART, MULT01.CVE_ALM FROM MULT01 WHERE MULT01.CVE_ALM ='9' AND MULT01.CVE_ART NOT LIKE 'ITR%' AND MULT01.CVE_ART NOT LIKE 'IIR%' ";
   $sqlalmacen2="SELECT INVE03.CVE_ART, INVE03.DESCR, INVE03.EXIST, INVE03.STATUS FROM INVE03 where INVE03.CVE_ART NOT LIKE 'ITR%' AND INVE03.CVE_ART NOT LIKE 'IIR%' AND INVE03.TIPO_ELE<>'S'";
   } 
if($almacen=='QUERETARO'){
   $conn=Connectqro(); 
   $sqlmulti="SELECT MULT01.CVE_ART, MULT01.CVE_ALM, MULT01.EXIST, INVE01.LIN_PROD, INVE01.DESCR FROM MULT01 LEFT JOIN INVE01 ON INVE01.CVE_ART=MULT01.CVE_ART WHERE MULT01.CVE_ALM ='10' AND MULT01.CVE_ART NOT LIKE 'ITR%' AND MULT01.CVE_ART NOT LIKE 'IIR%'";
   $sqlalmacen="SELECT INVE03.CVE_ART, INVE03.DESCR, INVE03.EXIST FROM INVE03";
   $ABR2=$almacen;
   $sqlmulti2="SELECT MULT01.CVE_ART, MULT01.CVE_ALM FROM MULT01 WHERE MULT01.CVE_ALM ='10' AND MULT01.CVE_ART NOT LIKE 'ITR%' AND MULT01.CVE_ART NOT LIKE 'IIR%' ";
   $sqlalmacen2="SELECT INVE03.CVE_ART, INVE03.DESCR, INVE03.EXIST, INVE03.STATUS FROM INVE03 where INVE03.CVE_ART NOT LIKE 'ITR%' AND INVE03.CVE_ART NOT LIKE 'IIR%' AND INVE03.TIPO_ELE<>'S'";
   }   
if($almacen=='TUXTLA'){
   $conn=Connecttgz(); 
   $sqlmulti="SELECT MULT01.CVE_ART, MULT01.CVE_ALM, MULT01.EXIST, INVE01.LIN_PROD, INVE01.DESCR FROM MULT01 LEFT JOIN INVE01 ON INVE01.CVE_ART=MULT01.CVE_ART WHERE MULT01.CVE_ALM ='11' AND MULT01.CVE_ART NOT LIKE 'ITR%' AND MULT01.CVE_ART NOT LIKE 'IIR%'";
   $sqlalmacen="SELECT INVE03.CVE_ART, INVE03.DESCR, INVE03.EXIST FROM INVE03";
   $ABR2=$almacen;
   $sqlmulti2="SELECT MULT01.CVE_ART, MULT01.CVE_ALM FROM MULT01 WHERE MULT01.CVE_ALM ='11' AND MULT01.CVE_ART NOT LIKE 'ITR%' AND MULT01.CVE_ART NOT LIKE 'IIR%' ";
   $sqlalmacen2="SELECT INVE03.CVE_ART, INVE03.DESCR, INVE03.EXIST, INVE03.STATUS FROM INVE03 where INVE03.CVE_ART NOT LIKE 'ITR%' AND INVE03.CVE_ART NOT LIKE 'IIR%' AND INVE03.TIPO_ELE<>'S'";
   } 
if($almacen=='TIJUANA'){
   $conn=Connecttij(); 
   $sqlmulti="SELECT MULT01.CVE_ART, MULT01.CVE_ALM, MULT01.EXIST, INVE01.LIN_PROD, INVE01.DESCR FROM MULT01 LEFT JOIN INVE01 ON INVE01.CVE_ART=MULT01.CVE_ART WHERE MULT01.CVE_ALM ='11' AND MULT01.CVE_ART NOT LIKE 'ITR%' AND MULT01.CVE_ART NOT LIKE 'IIR%'";
   $sqlalmacen="SELECT INVE03.CVE_ART, INVE03.DESCR, INVE03.EXIST FROM INVE03";
   $ABR2=$almacen;
   $sqlmulti2="SELECT MULT01.CVE_ART, MULT01.CVE_ALM FROM MULT01 WHERE MULT01.CVE_ALM ='11' AND MULT01.CVE_ART NOT LIKE 'ITR%' AND MULT01.CVE_ART NOT LIKE 'IIR%' ";
   $sqlalmacen2="SELECT INVE03.CVE_ART, INVE03.DESCR, INVE03.EXIST, INVE03.STATUS FROM INVE03 where INVE03.CVE_ART NOT LIKE 'ITR%' AND INVE03.CVE_ART NOT LIKE 'IIR%' AND INVE03.TIPO_ELE<>'S'";
   }	
if($almacen=='LUCITE'){
   $conn=Connectluc(); 
   $sqlmulti="SELECT MULT01.CVE_ART, MULT01.CVE_ALM, MULT01.EXIST, INVE01.LIN_PROD, INVE01.DESCR FROM MULT01 LEFT JOIN INVE01 ON INVE01.CVE_ART=MULT01.CVE_ART WHERE MULT01.CVE_ALM ='11' AND MULT01.CVE_ART NOT LIKE 'ITR%' AND MULT01.CVE_ART NOT LIKE 'IIR%'";
   $sqlalmacen="SELECT INVE04.CVE_ART, INVE04.DESCR, INVE04.EXIST FROM INVE04";
   $ABR2=$almacen;
   $sqlmulti2="SELECT MULT01.CVE_ART, MULT01.CVE_ALM FROM MULT01 WHERE MULT01.CVE_ALM ='11' AND MULT01.CVE_ART NOT LIKE 'ITR%' AND MULT01.CVE_ART NOT LIKE 'IIR%' ";
   $sqlalmacen2="SELECT INVE04.CVE_ART, INVE04.DESCR, INVE04.EXIST, INVE04.STATUS FROM INVE04 where INVE04.CVE_ART NOT LIKE 'ITR%' AND INVE04.CVE_ART NOT LIKE 'IIR%' AND INVE04.TIPO_ELE<>'S'";
   }					
						?>
						</TD>
						<TD class="content" valign="top"><?php
						echo date("d/m/Y·h:i:s");
						?>
						</TD>
					</tr>
					<tr>
						<TD class="content" valign="top" align="right">
						<?PHP
						$rs = ibase_query($conn,$sqlTop);

							while($T=ibase_fetch_row($rs)) {
			
							$ultMov=$T[1];
							$cadena = $T[0];
							$fechaTOP = $cadena{8} . $cadena{9} . $cadena{7} . $cadena{5} . $cadena{6} . $cadena{4} . $cadena{0} . $cadena{1} . $cadena{2} . $cadena{3} . $cadena{10} . $cadena{11} . $cadena{12} . $cadena{13} . $cadena{14} . $cadena{15} . $cadena{16} . $cadena{17} . $cadena{18};
							}
						?>
						<strong>Ultimo Mov. en respaldo:</strong>
						</TD>
						<TD class="content" valign="top" align="left">
						<?php
						echo "$ultMov $fechaTOP";
						?>
						</TD>
					</tr>
					<tr>
						<TD class="content" valign="top" align="justify">
						</TD>
						<TD class="content" valign="top" align="center"><?php
						echo "<strong>Todas las l&iacute;neas</strong>";
						?>
						</TD>
					</tr>
					
			</table>
			<hr />
			<!--Finaliza Encabezado -->
<?php
//Inicia Encabezado
echo "<table border = '0' style='font-family:Arial, Helvetica, sans-serif; font-size:12PX' cellpadding='1' cellspacing='2' align='center' widht='100%' height='100%'><tr>";
echo "<th align='left'>CLAVE</th>";
echo "<th align='left'>DESCRIPCION</th>";
echo "<th align='center'>INV. GRAL.</th>";
echo "<th align='center'>SUCURSAL</th>";
echo "<th align='center'>DIF</th>";

$inv = ibase_query($conninv,$sqlmulti);   

while($I=ibase_fetch_row($inv))
  {
  	$ALM = ibase_query($conn,$sqlalmacen);
		while($A=ibase_fetch_row($ALM)) 
			{
			if($I[0]==$A[0] and $I[2]<>$A[2]){
			$dif = $I[2] - $A[2];
			
			$difMask = sprintf("%01.2f", $dif);
			$cantIMask = sprintf("%01.2f", $I[2]);
			$cantAMask = sprintf("%01.2f", $A[2]);
			if($difMask <>0){ 
			echo "<tr class='contentD'><td>$I[0]</td><td>$I[4]</td><td align = 'center'>$cantIMask</td><td align='center'>$cantAMask</td><td align = 'center'>$difMask</td></tr>";
			$count = $count + 1; 
							}
											}
			}
  }
//----------------------------------------------
echo "<tr><td align='right'><strong>Se encontraron</strong></td><td align='left'><strong>$count Diferencias en Sucursal $ABR2</strong></td></tr>";  
echo "<tr><td class='title'><hr/></td><td><hr/></td></tr>"; 
echo "<tr><td class='title' align='left'></td><td>Este reporte muestra la lista de <strong>c&oacute;digos que <br/>aparecen en la sucursal pero NO <br/> estan dados de alta en Inv. Gral.</strong><br/>Status A = Alta || Status B = Dado de Baja</td></tr>";  
echo "<th align='left'>CLAVE</th>";
echo "<th align='left'>DESCRIPCION</th>";
echo "<th align='center'>STATUS</th>";
echo "<th align='center'>EXISTENCIA</th>";
//----------------------------------------------  
  $ALM = ibase_query($conn,$sqlalmacen2);

while($A=ibase_fetch_row($ALM))
  {
  	$inv = ibase_query($conninv,$sqlmulti2);   
		while($I=ibase_fetch_row($inv)) 
			{
				if($A[0]==$I[0]){
				$check=1;
								}
		    }
		if($check==0 and $A[3]=='A'){
						
			$difMask = sprintf("%01.2f", $dif);
			$cantIMask = sprintf("%01.2f", $I[2]);
			$cantAMask = sprintf("%01.2f", $A[2]);
		
			echo "<tr class='contentD'><td>$A[0]</td><td>$A[1]</td><td align = 'center'>$A[3]</td><td align='center'>$cantAMask</td><td align = 'center'></td></tr>";
				}
		else { $check=0;}
  }
  
echo "</table>";
?>
<table class="content">
<hr />
<tr><td><strong>OJO:</strong> Los productos que comienzan su clave con IIR &oacute; ITR no estan contemplados <br /> en este comparativo aunque pueden existir en las Sucursales y en el Inventario general. <br />Cualquier detalle favor de informar.</td></tr>
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

   $lineaTXT  = "Generó Reporte de Diferencias: ".date("d/m/Y·H:i:s").".";  
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