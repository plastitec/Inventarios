<style type="text/css">
.consulta {
	position:absolute;
	top:225PX;
	_top:180PX;
	left: 160PX;
	float: left;
	height:auto;
	min-height: 20px;
	max-height: 300px;
	overflow-Y:auto;
	_height: 200px;
	width: 437px;
	_width: 438px;
	background-color:#f9f9f9;
	border: solid #333333 1px;
	z-index:500;
	
}
.consulta2 {
	position:absolute;
	top:255PX;
	_top:190PX;
	left: 160PX;
	float: left;
	height:auto;
	min-height: 20px;
	max-height: 300px;
	overflow-Y:auto;
	_height: 200px;
	width: 437px;
	_width: 438px;
	background-color:#f9f9f9;
	border: solid #333333 1px;
	z-index:500;
	
}
</style>
<script>
function showme() {div = document.getElementById('consulta');div.style.display = '';}
function hideme() {div = document.getElementById('consulta');div.style.display = 'none';}
function showme2() {div = document.getElementById('consulta2');div.style.display = '';}
function hideme2() {div = document.getElementById('consulta2');div.style.display = 'none';}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="master.css" rel="stylesheet" type="text/css">
<title>Index: Consulta de Movimientos</title>
</head>

<script src="searchinv.js" language="javascript"></script>
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
						<td class="content">
						<strong>M&oacute;dulo para consulta de informaci&oacute;n en Sucursales</strong>
						<a href='screen.php'><img src='Images/volver.jpg' border='0' title='Regresar a Menú Exportar'/></a></td>
					</tr>
				</table>
<hr />

				<table style="font-family:Arial, Helvetica, sans-serif; font-size:12px;" class="content">
					<tr>
						<td><strong>M&oacute;dulo para consulta de k&aacute;rdex.</strong></td>
					</tr>
					<tr>
						<td>-Base Tultitlan-</td>
					</tr>
					<tr>
						<FORM action="kardex.php" method="post">
						<TD><div align="right">Clave:</div></TD> 
  						<td><INPUT TYPE="text" NAME="clave" SIZE="20" MAXLENGTH="16" style="color: #990000" id="valor" onKeyUp="Buscar();" onClick="Buscar();" onFocus="javascript:showme();" onKeyPress="this.value=this.value.toUpperCase();"></TD> 
						<td>
							<select name="kardex" style=" color: #006699 ">
								  <option value="MEXICO">M&eacute;xico
 								  <option value="LEON">Le&oacute;n
 								  <option value="GUADALAJARA">Guadalajara
 								  <option value="MONTERREY">Monterrey
 								  <option value="PUEBLA">Puebla
 								  <option value="VERACRUZ">Veracruz
 								  <option value="CANCUN">Canc&uacute;n
 								  <option value="MERIDA">M&eacute;rida
 								  <option value="CHIHUAHUA">Chihuahua
   								  <option value="QUERETARO">Queretaro
								  <option value="TUXTLA">Tuxtla
								<option value="TIJUANA">Tijuana
								<option value="LUCITE">Lucite
   						   	</select>
						</td>
					</tr>
					<tr>
							<TD>
							<INPUT TYPE="submit" value="Consultar" class="c"> 
							</td>
					</tr>
					</FORM>
					<tr>
							<td class="content"></td>
					</tr>		
				</table>
			<div class="consulta" id="consulta" style="overflow-y:auto; display:none" onClick="javascript:hideme();"></div>
			
			<hr />
			
			<TABLE style="font-family:Arial, Helvetica, sans-serif; font-size:12px;" class="content">
					<tr>
					<FORM action="Cartas.php">
						<TD><div align="right">Buscar por folio de Movimiento:</div></TD> 
  						<td><INPUT TYPE="text" NAME="folio" SIZE="20" MAXLENGTH="20" style="color: #990000"></TD> 
						<TD><div align="right">Clave de Producto:</div></TD> 
  						<td><INPUT TYPE="text" NAME="clave" SIZE="20" MAXLENGTH="16" style="color: #990000"></TD> 
					</tr>
					<tr>
					<td>
					<INPUT TYPE="submit" value="Consultar" class="c"> 
					</td>
					</FORM>	
					</tr>	
					</TABLE>
			<hr />
			
			<table style="font-family:Arial, Helvetica, sans-serif; font-size:12px;" class="content">
					<tr>
						<td style="font-weight:bold">M&oacute;dulo para revisi&oacute;n de diferencias.</td>
					</tr>
					<tr>
						<td>- Generar reporte s&oacute;lo al cierre de mes -</td>
					</tr>
					<tr>
						<FORM action="diferencias.php" method="post">
						<TD><div align="right">Linea:</div></TD> 
  						<td><INPUT TYPE="text" NAME="linea" SIZE="2" MAXLENGTH="16" style="color: #990000" disabled="disabled"></TD> 
				 			
						<td>Almacen:
							<select name="almacen" style=" color: #006699 ">
								  <option value="MEXICO">M&eacute;xico
 								  <option value="LEON">Le&oacute;n
 								  <option value="GUADALAJARA">Guadalajara
 								  <option value="MONTERREY">Monterrey
 								  <option value="PUEBLA">Puebla
 								  <option value="VERACRUZ">Veracruz
 								  <option value="CANCUN">Canc&uacute;n
 								  <option value="MERIDA">M&eacute;rida
 								  <option value="CHIHUAHUA">Chihuahua
   								  <option value="QUERETARO">Queretaro
								  <option value="TUXTLA">Tuxtla
   						   		<option value="TIJUANA">Tijuana
								<option value="LUCITE">Lucite
   						   	</select>
						</td>
					</tr>
					<tr>
							<TD>
							<INPUT TYPE="submit" value="Diferencias" class="c"> 
							</td>
							</FORM> 
							
					</tr>
					<tr>
							<td class="content"></td>
					</tr>		
				</table>
				
				<HR />
				
				<table style="font-family:Arial, Helvetica, sans-serif; font-size:12px;" class="content">
					<tr>
						<td style="font-weight:bold">Generaci&oacute;n de reportes de Movimientos</td>
					</tr>
					<tr>
						<td>- Para impresi&oacute;n -</td>
					</tr>
					<tr>
						<FORM action="mov.php">
						<td class="content" align="right">Desde: <INPUT TYPE="text" NAME="fDesde" SIZE="10" MAXLENGTH="10" style="color: #990000"></td>
						<td class="content" align="right">Hasta: <INPUT TYPE="text" NAME="fHasta" SIZE="10" MAXLENGTH="10" style="color: #990000"></td>
						<td></td>
				 			
						<td>Almacen:
							<TD><select name="sucu" style=" color: #006699 ">
								  <option value="MEX">M&eacute;xico
 								  <option value="GTO">Le&oacute;n
 								  <option value="GDL">Guadalajara
 								  <option value="MTY">Monterrey
 								  <option value="PUE">Puebla
 								  <option value="VER">Veracruz
 								  <option value="CUN">Canc&uacute;n
 								  <option value="MID">M&eacute;rida
 								  <option value="CUU">Chihuahua
   								  <option value="QRO">Queretaro
								  <option value="TGZ">Tuxtla
   						   		<option value="TIJ">Tijuana
								<option value="LUC">Lucite
   						   	</select>
						</td>
					</tr>
					<tr>
							<TD>
							<INPUT TYPE="submit" value="Aceptar" class="c"> 
							</td>
							</FORM> 
							
					</tr>
					<tr>
							<td class="content"></td>
					</tr>		
				</table>
				
				<HR />
				
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

   $lineaTXT  = "Entró a indice consulta: ".date("d/m/Y·H:i:s").".";  
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
