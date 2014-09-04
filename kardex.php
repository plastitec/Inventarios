<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="./master.css" rel="stylesheet" type="text/css">
<title>Kardex</title>
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
			<!--Encabezado-->
			<hr />
			<table height="50px" width="405" cellpadding="0" cellspacing="0">
					<tr>
						<td width="186"><img src="images/logo.jpg" /></td>
					  <td width="217" align="center"><p class="content">Acrilicos Plastitec S.A. de C.V.</p><p class="title">K&aacute;rdex Sucursal <?php echo "$kardex"; ?> <a href='indexconsulta.php'><img src='Images/volver.jpg' border='0' title='Regresar a Menú Exportar'/></a></p></td>
					</tr>
					<?php
					//error_reporting(0);
					
					include("conex.php");
					
					if ($kardex == "MEXICO") {
					$conn=Connectmex(); 
					}
					if ($kardex == "LEON") {
					$conn=Connectgto(); 
					}
					if ($kardex == "GUADALAJARA") {
					$conn=Connectgdl();
					}
					if ($kardex == "MONTERREY") {
  					$conn=Connectmty(); 
					}
					if ($kardex == "PUEBLA") {
  					$conn=Connectpue(); 
					}
					if ($kardex == "VERACRUZ") {
  					$conn=Connectver(); 
					}
					if ($kardex == "CANCUN") {
  					$conn=Connectcun(); 
					}
					if ($kardex == "MERIDA") {
  					$conn=Connectmid(); 
					}
					if ($kardex == "CHIHUAHUA") {
  					$conn=Connectcuu(); 
					}
					if ($kardex == "QUERETARO") {
  					$conn=Connectqro();
					} 
					if ($kardex == "TUXTLA") {
  					$conn=Connecttgz(); 
					}
					
					$sqlD= "SELECT INVE03.DESCR, INVE03.EXIST, INVE03.STATUS FROM INVE03 WHERE INVE03.CVE_ART = '$clave'";
					$sqlTop= "SELECT first(1) MINVE03.fechaelab, MINVE03.REFER FROM MINVE03 ORDER BY MINVE03.num_mov DESC";
					$sqlINV = "SELECT INVE03.CVE_ART, INVE03.DESCR, INVE03.LIN_PROD, INVE03.EXIST FROM INVE03";
					
					$invDescr = ibase_query($conn,$sqlD);
					
					$ENC=ibase_fetch_row($invDescr);
 				 	$descripcion=$ENC[0];
					$catExist=$ENC[1];
					$status=$ENC[2];
  					
					$rs = ibase_query($conn,$sqlTop);
				    $T=ibase_fetch_row($rs);
								
					$cadena = $T[0];
			 		$fechaTOP = $cadena{8} . $cadena{9} . $cadena{7} . $cadena{5} . $cadena{6} . $cadena{4} . $cadena{0} . $cadena{1} . $cadena{2} . $cadena{3} . $cadena{10} . $cadena{11} . $cadena{12} . $cadena{13} . $cadena{14} . $cadena{15} . $cadena{16} . $cadena{17} . $cadena{18};
			
echo "<tr><td align = 'right' class = 'title'>Producto:</td><td class = 'content'> $clave</td></tr>";
echo "<tr><td align = 'right' class = 'title'>Descripcion:</td><td class = 'content'> $descripcion</td></tr>";
echo "<tr><td align = 'right' class = 'title'>Existencia:</td><td class = 'content'> $catExist</td></tr>";
if($status=='A'){
echo "<tr><td align = 'right' class = 'title'>Satus:</td><td class = 'content'>Producto Activo</td></tr>";
}
if($status!='A'){
echo "<tr><td align = 'right' class = 'title'>Satus:</td><td class = 'content' bgcolor='#FF0000'>Producto dado de Baja</td></tr>";
}
echo "<tr><td align = 'right' class = 'title'>Ult. mov. en resplado:</td><td class = 'content'> <strong>$T[1] </strong>$fechaTOP</td></tr>";

?>
					<tr>
						<TD class="content" valign="top" align="right"><?php
						echo "Fecha de Generacion: ";
						?>
						</TD>
						<TD class="content" valign="top"><?php
						echo date("d/m/Y·h:i:s");
						?>
						</TD>
					</tr>
			</table>
			<hr />
			<!--Finaliza Encabezado -->
<?php
error_reporting(0);

//Inicia Encabezado
echo "<table border = '0' style='font-family:Arial, Helvetica, sans-serif; font-size:12PX' cellpadding='1' cellspacing='1' align='center' widht='100%' height='100%'><tr>";
echo "<th align='left'>DOCTO. </th>";
echo "<th align='center'>CANT.  </th>";
echo "<th align='center'>FECHA  </th>";
echo "<th align='center'>MOV.  </th>";
echo "<th align='center'>SUCURSAL</th>";
echo "<th align='center'>TIP. MOV.</th>";
echo "<th align='center'>EXISTENCIA</th></TR>";

$x = 0;
$count = 0;
$dif = 0;
$CC= 0;

$sql="SELECT MINVE03.CVE_ART, MINVE03.CVE_CPTO, MINVE03.FECHA_DOCU,MINVE03.REFER, MINVE03.CANT AS CANTIDAD, MINVE03.EXISTENCIA, INVE03.EXIST, CONM03.DESCR FROM MINVE03 LEFT JOIN CONM03 ON MINVE03.CVE_CPTO=CONM03.CVE_CPTO LEFT JOIN INVE03 ON MINVE03.CVE_ART=INVE03.CVE_ART WHERE MINVE03.CVE_ART ='$clave' ORDER BY MINVE03.NUM_MOV DESC  ";
$suc= $kardex;
$calcula = 0;
$id_count = 0;
$cantidad = 0;

$regs = ibase_query($conn,$sql);

	while($PINTA=ibase_fetch_row($regs))
 	{
  		$fechasal = $PINTA[2];
			
		$maskSAL = $fechasal{8} . $fechasal{9} . $fechasal{7} . $fechasal{5} . $fechasal{6} . $fechasal{4} . $fechasal{0} . $fechasal{1} . $fechasal{2} . $fechasal{3};

//MASCARA CANTIDAD
		if($PINTA[1] > '50'){
			$cant = $PINTA[4] * -1;
		}
		else {
			$cant = $PINTA[4];
		}

		if($id_count==0){
			$exist=$PINTA[6];			
		}
			
		if($id_count!=0){
			$exist=0;	
		}
			
			$CC = $CC + $exist - $cantidad;
			$maskCC = sprintf("%01.2f", $CC);
			echo "<tr class='contentK'><td>$PINTA[3]</td><td align='center'>$cant</td><td align='center'>$maskSAL</td><td align = 'center'>$PINTA[1]</td><td align='center'>$suc</td><TD align='center'>$PINTA[7]</TD><TD align='center'>$maskCC</TD></tr>";
			
			$count = $count + 1; 
			
			if($count == 41 or 
			$count == 97 or 
			$count == 153 or 
			$count == 209 or 
			$count == 265 or 
			$count == 321 or
			$count == 377 or
			$count == 433 or
			$count == 489 or
			$count == 545 or 
			$count == 601 or 
			$count == 657 or 
			$count == 713 or 
			$count == 769 or 
			$count == 825 or 
			$count == 881 or 
			$count == 937 or 
			$count == 993 or 
			$count == 1049 or 
			$count == 1105 or 
			$count == 1161 or 
			$count == 1217 or 
			$count == 1273 or 
			$count == 1329 or 
			$count == 1385 or 
			$count == 1441 or 
			$count == 1497 or 
			$count == 1553 or 
			$count == 1609 or 
			$count == 1665 or 
			$count == 1721 or 
			$count == 1777){
			echo "<th align='left'>DOCTO. </th>";
			echo "<th align='center'>CANT.  </th>";
			echo "<th align='center'>FECHA  </th>";
			echo "<th align='center'>MOV.  </th>";
			echo "<th align='center'>SUCURSAL</th>";
			echo "<th align='center'>TIP. MOV.</th>";
			echo "<th align='center'>EXISTENCIA</th></TR>";
			}
$id_count=$id_count+1;
$cantidad = $cant;		
}
if($id_count==0){
?>
 	 <script language='JavaScript'> 
     alert('ERROR: NO EXISTEN REGISTROS EN EL KARDEX PARA ESTE PRODUCTO'); 
	 window.location="indexconsulta.php";
     </script>
<?php
}
echo "</table>";
?>

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
</div>
</body>
<?php

$logAcceso = "D:/Logs/Inventarios/Accesos/Bitacora.txt"; 

@touch($logAcceso);

	 if (filesize($logAcceso) > 1024000) 
	 {
     rename($logAcceso,$logAcceso.'_'.date(Ymdhis)); 
     }
   
   $logAcceso = @fopen($logAcceso,"a+");    	

   $lineaTXT  = "Generó Reporte de Kárdex: ".date("d/m/Y·H:i:s").".";  
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