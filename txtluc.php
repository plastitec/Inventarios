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
					<td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold">Movimientos de ventas <?php echo "$sucu"; ?>
					</td>
					</tr>
					<tr>
					<td class="title" align="right">Rango de fechas del reporte:</td>
					<td class="content" align="LEFT">
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
					echo "<td align='center' class='movs'>GENERADOR DE MOVS. VENTAS Y DEVOLUCIONES</td>";
					echo "<td><a href='indexexporta.php'><img src='Images/volver.jpg' border='0' title='Regresar a Menú Exportar'/></a></td>";
					 ?>
					</td>
				</tr>
			</table>

<?php
error_reporting(0);

include("conex.php"); 
$conn=0;

if($sucu=='LUC'){
   $conn=Connectluc(); 
   $almacen=13;
}
 $conninv=Inventarios();   

if($tmov == 'VENTAS') {  
   $counter=0;
   $nomTXT=null; 
   $sql ="SELECT MINVE04.CVE_ART, MINVE04.CVE_CPTO, MINVE04.FECHA_DOCU, MINVE04.REFER, SUM(MINVE04.CANT) AS CANT, MINVE04.ALMACEN, MINVE04.COSTO FROM MINVE04 WHERE MINVE04.FECHA_DOCU>='$fDesde' and MINVE04.FECHA_DOCU<='$fHasta' AND MINVE04.CVE_CPTO = 51 GROUP BY MINVE04.CVE_ART, MINVE04.REFER, MINVE04.CVE_CPTO, MINVE04.FECHA_DOCU, MINVE04.ALMACEN, MINVE04.COSTO order by MINVE04.FECHA_DOCU ASC";

 //  $sql2="SELECT MINVE04.CVE_CPTO, CONM04.DESCR FROM MINVE04 LEFT JOIN CONM04 ON MINVE04.CVE_CPTO = CONM04.CVE_CPTO WHERE MINVE04.FECHA_DOCU>='$fDesde' and MINVE04.FECHA_DOCU<='$fHasta' GROUP BY MINVE04.CVE_CPTO, CONM04.DESCR";



//Inicia Encabezado
echo "<table border = '0' style='border: medium #999999' cellpadding='0' cellspacing='2'><tr>";
echo "<td align='left' class=title >°Mov</td>";
echo "<td align='center' class=title >Descripci&oacute;n de Mov. </td></tr>";

//while($M=ibase_fetch_row($movs))
  //{
echo"<tr class=content><td align ='center'>51</td>";
echo"<td>Ventas</td></tr>";
 //} 
echo "</table>";
//Finaliza Encabezado

echo "<table><tr><td align = center  style='font-family:Arial; font-size:12px; font-weight:bold'>Generar Reporte de Movimiento:</td>";  
echo "<td align = center  style='font-family:Arial; font-size:12px; font-weight:bold'>
<form action='generate2L.php'>
	<input type='text' maxlength='2' size='1px' name = 'movi' value = '51' style='color: #006699; font-weight:bold' onfocus='this.blur()' class='editnull'/>
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
	   <td>
	  <input type='text' size='10px' name = 'nombreTXT' value = '$nomTXT'/>
	  </td>
	  <td><INPUT TYPE='submit' value='Generar' > </form>
	  </td></tr>";   
echo "</table>";

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

while($C=ibase_fetch_row($cedis)){

$counter = $count + 1;
$count = $counter;
  
$fechaE = $C[2];
$fechaDocu = $fechaE{8} . $fechaE{9} . $fechaE{7} . $fechaE{5} . $fechaE{6} . $fechaE{4} . $fechaE{0} . $fechaE{1} . $fechaE{2} . $fechaE{3} . $fechaE{10} /*. $fechaE{11} . $fechaE{12} . $fechaE{13} . $fechaE{14} . $fechaE{15} . $fechaE{16} . $fechaE{17} . $fechaE{18}*/;

echo"<tr><td align = 'center' >$counter</td>";
echo"<td>$C[0]</td>";
echo"<td>$C[1]</td>";
echo"<td>$fechaDocu</td>";
echo"<td>$C[3]</td>";
$maskCantidad = sprintf("%01.2f", $C[4]);
echo"<td align ='right'>$maskCantidad</td>";
echo"<td align ='right'>$C[5]</td>";
echo"<td align ='right'>$C[6]</td></tr>";

$cant = $cant + $C[4];
}
echo "</table>";
}

//Devoluciones

if($tmov == 'DEVOLUCION') {   
  
   $nomTXT=null; 
   $sql ="SELECT MINVE04.CVE_ART, MINVE04.CVE_CPTO, MINVE04.REFER, SUM(MINVE04.CANT) AS CANT, MINVE04.ALMACEN, MINVE04.COSTO FROM MINVE04 WHERE MINVE04.FECHA_DOCU>='$fDesde' and MINVE04.FECHA_DOCU<='$fHasta' AND MINVE04.CVE_CPTO = 2 GROUP BY MINVE04.CVE_ART, MINVE04.REFER, MINVE04.CVE_CPTO, MINVE04.ALMACEN, MINVE04.COSTO ORDER BY MINVE04.REFER ASC";
   $sqlcanc ="SELECT MINVE04.CVE_ART, MINVE04.CVE_CPTO, MINVE04.REFER, SUM(MINVE04.CANT) AS CANT, MINVE04.ALMACEN, MINVE04.COSTO FROM MINVE04 WHERE MINVE04.FECHA_DOCU>='$fDesde' and MINVE04.FECHA_DOCU<='$fHasta' AND MINVE04.CVE_CPTO = 56 GROUP BY MINVE04.CVE_ART, MINVE04.REFER, MINVE04.CVE_CPTO, MINVE04.ALMACEN, MINVE04.COSTO";
   $sqlF="SELECT MINVE04.CVE_ART, MINVE04.FECHA_DOCU,MINVE04.REFER FROM MINVE04 WHERE MINVE04.CVE_CPTO = 2 AND ((MINVE04.FECHA_DOCU)>='$fDesde') and ((MINVE04.FECHA_DOCU)<='$fHasta') GROUP BY MINVE04.CVE_ART, MINVE04.FECHA_DOCU,MINVE04.REFER ORDER BY MINVE04.REFER, MINVE04.CVE_ART, MINVE04.FECHA_DOCU ASC  ";
   $sqlDoctoE="SELECT MINVE04.CVE_ART,MINVE04.REFER, DOCTOSIGF04.CVE_DOC_E FROM MINVE04 LEFT JOIN DOCTOSIGF04 ON MINVE04.REFER=DOCTOSIGF04.CVE_DOC WHERE MINVE04.CVE_CPTO = 2 AND ((MINVE04.FECHA_DOCU)>='$fDesde') and ((MINVE04.FECHA_DOCU)<='$fHasta') GROUP BY MINVE04.CVE_ART,MINVE04.REFER, DOCTOSIGF04.CVE_DOC_E ORDER BY MINVE04.REFER, MINVE04.CVE_ART ASC  ";
	$sqlCosto="SELECT INVE01.CVE_ART, INVE01.ULT_COSTO FROM INVE01 ORDER BY INVE01.CVE_ART ASC";


//Inicia Encabezado
echo "<table border = '0' style='border: medium #999999' cellpadding='0' cellspacing='2'><tr>";
echo "<td align='left' class=title >°Mov</td>";
echo "<td align='center' class=title >Descripci&oacute;n de Mov.</td></tr>";

//while($M=ibase_fetch_row($movs))
  //{
echo"<tr class=content><td align ='center'>2</td>";
echo"<td>Devoluciones</td></tr>";
 //} 
echo "</table>";
//Finaliza Encabezado

echo "<table><tr><td align = center  style='font-family:Arial; font-size:12px; font-weight:bold'>Generar Reporte de Movimiento:</td>";  
echo "<td align = center  style='font-family:Arial; font-size:12px; font-weight:bold'>
<form action='generatedev.php'>
	<input type='text' maxlength='2' size='1px' name = 'movi' value = '2' style='color: #006699; font-weight:bold' onfocus='this.blur()' class='editnull'/>
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
	   <td>
	  <input type='text' size='10px' name = 'nombreTXT' value = '$nomTXT'/>
	  </td>
	  <td><INPUT TYPE='submit' value='Generar' > </form>
	  </td></tr>";   
echo "</table>";

$cedis = ibase_query($conn,$sql);

echo "<table border = '1' style='font-family:Arial, Helvetica, sans-serif; font-size:12PX' cellpadding='1' cellspacing='0' align='center'>";

echo "<th align='center'>N°</th>";
echo "<th align='center'>CLAVE</th>";
echo "<th align='center'>MOV.</th>";
echo "<th align='center'>FECHA</th>";
echo "<th align='center'>DOCTO</th>";
echo "<th align='center'>FACT</th>";
echo "<th align='center'>CANT</th>";
echo "<th align='center'>ALMACEN</th>";
echo "<th align='center'>COSTO</th>";

$count = 0;
$cant=0;
$dif=0;
$enlazado=0;
$ult_costo=0;
$counter = 0;
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
	
	echo"<tr><td align = 'center' >$counter</td>";
	echo"<td>$C[0]</td>";
	echo"<td>$C[1]</td>";
	//echo"<td>$fechaDocu</td>";
	echo"<td>$maskSAL</td>";
	echo"<td>$C[2]</td>";
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
}

if($tmov == 'MERMAS') {  
   $counter=0;
   $nomTXT=null; 
   $sql ="SELECT MINVE04.CVE_ART, MINVE04.CVE_CPTO, MINVE04.FECHA_DOCU, MINVE04.REFER, SUM(MINVE04.CANT) AS CANT, MINVE04.ALMACEN, MINVE04.COSTO, MINVE04.FECHAELAB FROM MINVE04 WHERE MINVE04.FECHA_DOCU>='$fDesde' and MINVE04.FECHA_DOCU<='$fHasta' AND MINVE04.CVE_CPTO = 55 GROUP BY MINVE04.CVE_ART, MINVE04.REFER, MINVE04.CVE_CPTO, MINVE04.FECHA_DOCU, MINVE04.ALMACEN, MINVE04.COSTO, MINVE04.FECHAELAB order by MINVE04.FECHAELAB ASC";

 //  $sql2="SELECT MINVE04.CVE_CPTO, CONM04.DESCR FROM MINVE04 LEFT JOIN CONM04 ON MINVE04.CVE_CPTO = CONM04.CVE_CPTO WHERE MINVE04.FECHA_DOCU>='$fDesde' and MINVE04.FECHA_DOCU<='$fHasta' GROUP BY MINVE04.CVE_CPTO, CONM04.DESCR";



//Inicia Encabezado
echo "<table border = '0' style='border: medium #999999' cellpadding='0' cellspacing='2'><tr>";
echo "<td align='left' class=title >°Mov</td>";
echo "<td align='center' class=title >Descripci&oacute;n de Mov.</td></tr>";

//while($M=ibase_fetch_row($movs))
  //{
echo"<tr class=content><td align ='center'>55</td>";
echo"<td>Mermas</td></tr>";
 //} 
echo "</table>";
//Finaliza Encabezado

echo "<table><tr><td align = center  style='font-family:Arial; font-size:12px; font-weight:bold'>Generar Reporte de Movimiento:</td>";  
echo "<td align = center  style='font-family:Arial; font-size:12px; font-weight:bold'>
<form action='mermas.php'>
	<input type='text' maxlength='2' size='1px' name = 'movi' value = '55' style='color: #006699; font-weight:bold' onfocus='this.blur()' class='editnull'/>
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
	   <td>
	  <input type='text' size='10px' name = 'nombreTXT' value = '$nomTXT'/>
	  </td>
	  <td><INPUT TYPE='submit' value='Generar' > </form>
	  </td></tr>";   
echo "</table>";

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

while($C=ibase_fetch_row($cedis)){

$counter = $count + 1;
$count = $counter;
  
$fechaE = $C[2];
$fechaDocu = $fechaE{8} . $fechaE{9} . $fechaE{7} . $fechaE{5} . $fechaE{6} . $fechaE{4} . $fechaE{0} . $fechaE{1} . $fechaE{2} . $fechaE{3} . $fechaE{10} /*. $fechaE{11} . $fechaE{12} . $fechaE{13} . $fechaE{14} . $fechaE{15} . $fechaE{16} . $fechaE{17} . $fechaE{18}*/;

echo"<tr><td align = 'center' >$counter</td>";
echo"<td>$C[0]</td>";
echo"<td>$C[1]</td>";
echo"<td>$fechaDocu</td>";
echo"<td>$C[3]</td>";
$maskCantidad = sprintf("%01.2f", $C[4]);
echo"<td align ='right'>$maskCantidad</td>";
echo"<td align ='right'>$C[5]</td>";
echo"<td align ='right'>$C[6]</td>";

$cant = $cant + $C[4];
}
echo "</table>";
}

if($tmov == 'AJUSTES') {  
   $counter=0;
   $nomTXT=null; 
   $sql ="SELECT MINVE04.CVE_ART, MINVE04.CVE_CPTO, MINVE04.FECHA_DOCU, MINVE04.REFER, SUM(MINVE04.CANT) AS CANT, MINVE04.ALMACEN, MINVE04.COSTO, MINVE04.FECHAELAB FROM MINVE04 WHERE MINVE04.FECHA_DOCU>='$fDesde' and MINVE04.FECHA_DOCU<='$fHasta' AND MINVE04.CVE_CPTO = 6 GROUP BY MINVE04.CVE_ART, MINVE04.REFER, MINVE04.CVE_CPTO, MINVE04.FECHA_DOCU, MINVE04.ALMACEN, MINVE04.COSTO, MINVE04.FECHAELAB order by MINVE04.FECHAELAB ASC";
   $sqlCosto="SELECT INVE01.CVE_ART, INVE01.ULT_COSTO FROM INVE01 ORDER BY INVE01.CVE_ART ASC";

//Inicia Encabezado
echo "<table border = '0' style='border: medium #999999' cellpadding='0' cellspacing='2'><tr>";
echo "<td align='left' class=title >°Mov</td>";
echo "<td align='center' class=title >Descripci&oacute;n de Mov.</td></tr>";

//while($M=ibase_fetch_row($movs))
  //{
echo"<tr class=content><td align ='center'>6</td>";
echo"<td>Ajustes</td></tr>";
 //} 
echo "</table>";
//Finaliza Encabezado

echo "<table><tr><td align = center  style='font-family:Arial; font-size:12px; font-weight:bold'>Generar Reporte de Movimiento:</td>";  
echo "<td align = center  style='font-family:Arial; font-size:12px; font-weight:bold'>
<form action='ajustes.php'>
	<input type='text' maxlength='2' size='1px' name = 'movi' value = '6' style='color: #006699; font-weight:bold' onfocus='this.blur()' class='editnull'/>
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
	   <td>
	  <input type='text' size='10px' name = 'nombreTXT' value = '$nomTXT'/>
	  </td>
	  <td><INPUT TYPE='submit' value='Generar' > </form>
	  </td></tr>";   
echo "</table>";

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
$ult_costo=0;
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
}
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
