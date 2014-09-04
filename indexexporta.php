<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="master.css" rel="stylesheet" type="text/css">
<title>Index:Exportar a SAE</title>
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
						<td class="content">
						<strong>M&oacute;dulo de Generaci&oacute;n de Movimientos para Exportaci&oacute;n a SAE</strong>
						<a href='screen.php'><img src='Images/volver.jpg' border='0' title='Regresar a Menú Exportar'/></a></td>
					</tr>
				</table>
<hr />
				<FORM action="TRASPASOS.php" method="post"> 			
				<TABLE style="font-family:Arial, Helvetica, sans-serif; font-size:12px;" class="content">
					<tr>
					   	<td align="left"><strong>Reporte 1°. Genera Movs. de cartas que existen en ambas sucursales.</strong></td>
						<td></td>
					</tr>
					<TR> 
   						<TD><div align="right">De (aaaa/mm/dd):</div></TD> 
  						<TD><INPUT TYPE="text" NAME="fecha" SIZE="10" MAXLENGTH="10" style="color: #990000"></TD> 
    					<TD> <div align="right">Hasta (aaaa/mm/dd):</div></TD> 
  					    <TD><INPUT TYPE="text" NAME="fechaf" SIZE="10" MAXLENGTH="10" style="color: #990000"></TD> 
					</TR> 
					<tr>
						<TD><div align="right">De (aaaa/mm/dd):</div></TD> 
  					    <TD><select name="suc1" style=" color: #006699 ">
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
   					   	</select></TD> 
						  <TD><div align="right">A (aaaa/mm/dd):</div></TD> 
  						  <TD><select name="suc2" style=" color: #006699 ">
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
   						 </select></TD>
					</tr>
				</TABLE> 
				<INPUT TYPE="submit" value="Consultar" class="c"> 
				</FORM>
<hr />
				
				<table style="font-family:Arial, Helvetica, sans-serif; font-size:12px;" class="content">
				<FORM action="TRASPASOS_.php" method="post">
					<tr>
						<td align="left"><strong>Reporte 2°. Genera Movs. de cartas que no se pudieron comparar. <br />(OJO: Reporte para Revisi&oacute;n y captura Manual)</strong></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<TD><div align="right">De (aaaa/mm/dd):</div></TD> 
  						<td><INPUT TYPE="text" NAME="fecha" SIZE="10" MAXLENGTH="10" style="color: #990000"></TD> 
    					<TD> <div align="right">Hasta (aaaa/mm/dd):</div></TD> 
  					    <TD><INPUT TYPE="text" NAME="fechaf" SIZE="10" MAXLENGTH="10" style="color: #990000"></TD> 
					</tr>
					<tr>
						<TD><select name="suc3" style=" color: #006699 ">
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
   					   	</select>
						<INPUT TYPE="submit" value="Salidas" class="c"> 
						</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					</FORM>
					<FORM action="_TRASPASOS.php" method="post">
					<tr>
						<TD><div align="right">De (aaaa/mm/dd):</div></TD> 
  						<TD><INPUT TYPE="text" NAME="fecha" SIZE="10" MAXLENGTH="10" style="color: #990000"></TD> 
    					<TD> <div align="right">Hasta (aaaa/mm/dd):</div></TD> 
  						<TD><INPUT TYPE="text" NAME="fechaf" SIZE="10" MAXLENGTH="10" style="color: #990000"></TD> 
					</tr>	
					<tr>
						<TD><select name="suc4" style=" color: #006699 ">
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
   						   </select>
						   <INPUT TYPE="submit" value="Entradas" class="c"> 
						</TD>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					</FORM>		
				</table>
<hr />
				
				<table style="font-family:Arial, Helvetica, sans-serif; font-size:12px;" class="content">
				<FORM ACTION="txt.php">
					<tr>
						<td align="left"><strong>Reporte 3°. Genera movimientos de ventas y devoluciones.</strong></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td class="content" align="right">Desde: <INPUT TYPE="text" NAME="fDesde" SIZE="10" MAXLENGTH="10" style="color: #990000"></td>
						<td class="content" align="right">Hasta: <INPUT TYPE="text" NAME="fHasta" SIZE="10" MAXLENGTH="10" style="color: #990000"></td>
					<td></td>
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
   						   	</select></TD>
							<TD><select name="tmov" style=" color: #006699 ">
 								  <option value="VENTAS">Ventas
 								  <option value="DEVOLUCION">Devoluciones
								  <option value="MERMAS">Mermas
								  <option value="AJUSTES">Ajustes
 							</select></TD>
					</tr>
				</table>
<INPUT TYPE="submit" value="Generar" class="c">  
</FORM> 
<hr />
				
				<table style="font-family:Arial, Helvetica, sans-serif; font-size:12px;" class="content">
				<FORM ACTION="txtluc.php">
					<tr>
						<td align="left"><strong>Reporte 4°. Genera movimientos de ventas y devoluciones para Lucite.</strong></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td class="content" align="right">Desde: <INPUT TYPE="text" NAME="fDesde" SIZE="10" MAXLENGTH="10" style="color: #990000"></td>
						<td class="content" align="right">Hasta: <INPUT TYPE="text" NAME="fHasta" SIZE="10" MAXLENGTH="10" style="color: #990000"></td>
					<td></td>
						   <TD><select name="sucu" style=" color: #006699 ">
 								  <option value="LUC">Lucite

   						   	</select></TD>
							<TD><select name="tmov" style=" color: #006699 ">
 								  <option value="VENTAS">Ventas
 								  <option value="DEVOLUCION">Devoluciones
								  <option value="MERMAS">Mermas
								  <option value="AJUSTES">Ajustes
 							</select></TD>
					</tr>
				</table>
<INPUT TYPE="submit" value="Generar" class="c">  
</FORM> 			
							
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
</html>
