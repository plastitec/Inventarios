<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="master.css" rel="stylesheet" type="text/css">
<title>Documento sin t&iacute;tulo</title>
</head>
 
<body class="body" oncontextmenu="return false" onselectstart="return false" ondragstart="return false">

<div style="position:absolute; top:0px; left:0px;"> 
	<table cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
		<tr>
			<td class="corntopleft"></td>
			<td class="middletop"></td>
			<td class="corntopright"></td>
		</tr>
		<tr>
			<td class="left"></td>
			<!--- Contenido ---->
			<td>
			
			   <table>
					<tr>
						<td><img src="Images/logo.jpg" border="0" /></td>
						<td class="enc1" align="center">Acrilicos Plastitec S.A. de C.V.<br />Inventario Sucursales	</td>
					</tr>
					<tr valign="top"> 
						<td class="content">
						<?php
						echo "Fecha de acceso: ".date('d-M-Y');
						?>
						</td>
						<td class="content">
						<?php
					echo '<a href="out.php"><img src="Images/user.jpg" border="0" alt="Cerrar Sesion" title="Cerrar Sesion"/></a>.';
						?>
						</td>
					</tr>
				</table>
<hr />
				<table>
					<tr>
						<td class="enc1" align="right">QUE ACCION DESEAS</td>
						<td class="enc1" align="left">REALIZAR?</td>
					</tr>
					<tr valign="top"> 
						<td class="content"><form action='indexexporta.php' method='POST'><input style='border:0; cursor:pointer' type='image' title='Exportar a SAE' src='Images/exportaSAE.jpg' name='varreport' value='"Exportar a SAE"' /></form></td>
						<td class="content"><form action='indexconsulta.php' method='POST'><input style='border:0; cursor:pointer' type='image' title='Consultar Movimientos' src='Images/consultaMOVS.jpg' name='varreport' value='"Consultar Movimientos"' /></form></td>
					</tr>
				</table>
			
			</td>
			<!--- Finaliza Contenido ---->
			<td class="right"></td>
		</tr>
		<tr>
			<td class="cornbottleft"></td>
			<td class="middlebott"></td>
			<td class="cornbottright"></td>
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

   $lineaTXT  = "Entro a menú principal: ".date("d/m/Y·H:i:s").".";  
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
