<?php
error_reporting(0);
/*session_start();
if ($_SESSION["k_username"] == '') {
header("Location: index.php?empty=si");
//exit();*/
}
$fecha_arch = date('Y-m-d H:i:s');
?>
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

<body class="body">

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
								<td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold">Movimientos Sucursal <?php echo "$suc4"; ?> Entradas x Traspaso
								</td>
							</tr>
							<tr>
								<td>
								</td>
								<td align="right" style="font-family:Arial, Helvetica, sans-serif; font-size:12px;">Movimientos sin coincidencias-Se recomienda revisar toda la carta
								</td>
							</tr>
							<tr>
								<td class="title" align="right">Rango de fechas del reporte:</td>
								<td class="content" align="right">
					<?php
					$maskfD = $fecha;
					$maskfH = $fechaf;
$maskFD = $maskfD{8} . $maskfD{9} . $maskfD{7} . $maskfD{5} . $maskfD{6} . $maskfD{4} . $maskfD{0} . $maskfD{1} . $maskfD{2} . $maskfD{3};
$maskFH = $maskfH{8} . $maskfH{9} . $maskfH{7} . $maskfH{5} . $maskfH{6} . $maskfH{4} . $maskfH{0} . $maskfH{1} . $maskfH{2} . $maskfH{3};
 					echo "$maskFD"; ?>  al  <?php echo "$maskFH";?>
	 				</td>
					</tr>
					

<?php

include("conex.php"); 

$id = 0;

								     if($suc4=='MEXICO'){
  									 	$conn=Connectmex();
										$ABR='MEX'; 
 									 }				
 									 if($suc4=='LEON'){
   										$conn=Connectgto(); 
										$ABR='GTO';
   									 }
									 if($suc4=='GUADALAJARA'){
  										$conn=Connectgdl(); 
										$ABR='GDL';
 									 }
									 if($suc4=='MONTERREY'){
 										$conn=Connectmty(); 
										$ABR='MTY';
 									 }
									 if($suc4=='PUEBLA'){
 										$conn=Connectpue();
										$ABR='PUE'; 
									 }
									 if($suc4=='VERACRUZ'){
   										$conn=Connectver(); 
										$ABR='VER';
  									 }
									 if($suc4=='CANCUN'){
  										$conn=Connectcun();
										$ABR='CUN'; 
 									 }
									 if($suc4=='MERIDA'){
									    $conn=Connectmid(); 
										$ABR='MID';
  									 }
									 if($suc4=='CHIHUAHUA'){
 										$conn=Connectcuu();
										$ABR='CUU'; 
									 }
									 if($suc4=='QUERETARO'){
  										$conn=Connectqro(); 
										$ABR='QRO';
								     }
									 if($suc4=='TUXTLA'){
 										$conn=Connecttgz();
										$ABR='TGZ'; 
									 }
									 
   $sql="SELECT MINVE03.CVE_ART, MINVE03.CVE_CPTO, MINVE03.FECHA_DOCU,MINVE03.REFER, SUM(MINVE03.CANT) AS CANTIDAD FROM MINVE03 WHERE MINVE03.CVE_CPTO = 7 AND ((MINVE03.FECHA_DOCU)>='$fecha') and ((MINVE03.FECHA_DOCU)<='$fechaf') GROUP BY MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.FECHA_DOCU,MINVE03.REFER ORDER BY MINVE03.REFER, MINVE03.CVE_ART, MINVE03.FECHA_DOCU ASC  ";
 
$sqlTop= "SELECT first(1) MINVE03.fechaelab, MINVE03.REFER FROM MINVE03 ORDER BY MINVE03.num_mov DESC";

$rs = ibase_query($conn,$sqlTop);

$T=ibase_fetch_row($rs);
			
			$ultMov=$T[1];
			$cadena = $T[0];
			$fechaTOP = $cadena{8} . $cadena{9} . $cadena{7} . $cadena{5} . $cadena{6} . $cadena{4} . $cadena{0} . $cadena{1} . $cadena{2} . $cadena{3} . $cadena{10} . $cadena{11} . $cadena{12} . $cadena{13} . $cadena{14} . $cadena{15} . $cadena{16} . $cadena{17} . $cadena{18};
			
echo "<tr><td align = 'right' class = 'title'>Ult. mov. en resplado:</td><td class = 'content' align='right'>$ultMov $fechaTOP</td></tr>";
echo "<tr><td></td><td align='center' class='movs'>CARTAS DE TRASPASOS<a href='indexexporta.php'><img src='Images/volver.jpg' border='0' title='Regresar a Menú Exportar'/></a></td></tr></table>";

$sal = ibase_query($conn,$sql);

//Inicia Encabezado
echo "<table border = '1' style='font-family:Arial, Helvetica, sans-serif; font-size:12PX' cellpadding='1' cellspacing='0' align='center'><tr>";
echo "<th align='center' >CLAVE $ABR</th>";
echo "<th align='center'>DOCTO. $ABR</th>";
echo "<th align='center'>CANT. $ABR</th>";
echo "<th align='center'>FECHA $ABR</th>";
echo "<th align='center'>STATUS</th></tr>";

$mex = 0;
$gto = 0;
$gdl = 0;
$mty = 0;
$pue = 0;
$ver = 0;
$cun = 0;
$mid = 0;
$cuu = 0;
$qro = 0;
$count = 0;

while($S=ibase_fetch_row($sal))
  {

$fechasal = $S[2];
$maskSAL = $fechasal{8} . $fechasal{9} . $fechasal{7} . $fechasal{5} . $fechasal{6} . $fechasal{4} . $fechasal{0} . $fechasal{1} . $fechasal{2} . $fechasal{3};
//CONECTA MEXICO		
		 $conn1=Connectmex();
  		 $sql1="SELECT MINVE03.CVE_ART, MINVE03.CVE_CPTO, MINVE03.FECHA_DOCU,MINVE03.REFER, SUM(MINVE03.CANT) AS CANTIDAD FROM MINVE03 WHERE MINVE03.CVE_CPTO = 58 AND ((MINVE03.FECHA_DOCU)>='$fecha') and ((MINVE03.FECHA_DOCU)<='$fechaf') GROUP BY MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.FECHA_DOCU,MINVE03.REFER ORDER BY MINVE03.REFER, MINVE03.CVE_ART, MINVE03.FECHA_DOCU ASC  ";
		
		 $ent1 = ibase_query($conn1,$sql1);
		
		while($MX=ibase_fetch_row($ent1)) 
			{
				if($S[3]==$MX[3] and $S[0]==$MX[0])
				{
				$mex=1;
				}
			}
//CONECTA LEON
		$conn2=Connectgto();
   		$sql2="SELECT MINVE03.CVE_ART, MINVE03.CVE_CPTO, MINVE03.FECHA_DOCU,MINVE03.REFER, SUM(MINVE03.CANT) AS CANTIDAD FROM MINVE03 WHERE MINVE03.CVE_CPTO = 58 AND ((MINVE03.FECHA_DOCU)>='$fecha') and ((MINVE03.FECHA_DOCU)<='$fechaf') GROUP BY MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.FECHA_DOCU,MINVE03.REFER ORDER BY MINVE03.REFER, MINVE03.CVE_ART, MINVE03.FECHA_DOCU ASC  ";
 
 		$ent2 = ibase_query($conn2,$sql2);
		
		while($GTO=ibase_fetch_row($ent2)) 
			{
				if($S[3]==$GTO[3] and $S[0]==$GTO[0])
				{
				$gto=1;
				}
			} 
//CONECTA GUADALAJARA
		$conn3=Connectgdl();
   		$sql3="SELECT MINVE03.CVE_ART, MINVE03.CVE_CPTO, MINVE03.FECHA_DOCU,MINVE03.REFER, SUM(MINVE03.CANT) AS CANTIDAD FROM MINVE03 WHERE MINVE03.CVE_CPTO = 58 AND ((MINVE03.FECHA_DOCU)>='$fecha') and ((MINVE03.FECHA_DOCU)<='$fechaf') GROUP BY MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.FECHA_DOCU,MINVE03.REFER ORDER BY MINVE03.REFER, MINVE03.CVE_ART, MINVE03.FECHA_DOCU ASC  ";
 
 		$ent3 = ibase_query($conn3,$sql3);
		
		while($GDL=ibase_fetch_row($ent3)) 
			{
				if($S[3]==$GDL[3] and $S[0]==$GDL[0])
				{
				$gdl=1;
				}
			} 
//CONECTA MONTERREY
	   $conn4=Connectmty();
 	   $sql4="SELECT MINVE03.CVE_ART, MINVE03.CVE_CPTO, MINVE03.FECHA_DOCU,MINVE03.REFER, SUM(MINVE03.CANT) AS CANTIDAD FROM MINVE03 WHERE MINVE03.CVE_CPTO = 58 AND ((MINVE03.FECHA_DOCU)>='$fecha') and ((MINVE03.FECHA_DOCU)<='$fechaf') GROUP BY MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.FECHA_DOCU,MINVE03.REFER ORDER BY MINVE03.REFER, MINVE03.CVE_ART, MINVE03.FECHA_DOCU ASC  "; 
	   
	   $ent4 = ibase_query($conn4,$sql4);
		
		while($MTY=ibase_fetch_row($ent4)) 
			{
				if($S[3]==$MTY[3] and $S[0]==$MTY[0])
				{
				$mty=1;
				}
			}
//CONECTA PUEBLA
	   $conn5=Connectpue();
 	   $sql5="SELECT MINVE03.CVE_ART, MINVE03.CVE_CPTO, MINVE03.FECHA_DOCU,MINVE03.REFER, SUM(MINVE03.CANT) AS CANTIDAD FROM MINVE03 WHERE MINVE03.CVE_CPTO = 58 AND ((MINVE03.FECHA_DOCU)>='$fecha') and ((MINVE03.FECHA_DOCU)<='$fechaf') GROUP BY MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.FECHA_DOCU,MINVE03.REFER ORDER BY MINVE03.REFER, MINVE03.CVE_ART, MINVE03.FECHA_DOCU ASC  "; 
	   
	   $ent5 = ibase_query($conn5,$sql5);
		
		while($PUE=ibase_fetch_row($ent5)) 
			{
				if($S[3]==$PUE[3] and $S[0]==$PUE[0])
				{
				$pue=1;
				}
			}
//CONECTA VERACRUZ
	   $conn6=Connectver();
 	   $sql6="SELECT MINVE03.CVE_ART, MINVE03.CVE_CPTO, MINVE03.FECHA_DOCU,MINVE03.REFER, SUM(MINVE03.CANT) AS CANTIDAD FROM MINVE03 WHERE MINVE03.CVE_CPTO = 58 AND ((MINVE03.FECHA_DOCU)>='$fecha') and ((MINVE03.FECHA_DOCU)<='$fechaf') GROUP BY MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.FECHA_DOCU,MINVE03.REFER ORDER BY MINVE03.REFER, MINVE03.CVE_ART, MINVE03.FECHA_DOCU ASC  "; 
	   
	   $ent6 = ibase_query($conn6,$sql6);
		
		while($VER=ibase_fetch_row($ent6)) 
			{
				if($S[3]==$VER[3] and $S[0]==$VER[0])
				{
				$ver=1;
				}
			}
//CONECTA CANCUN
	   $conn7=Connectcun();
 	   $sql7="SELECT MINVE03.CVE_ART, MINVE03.CVE_CPTO, MINVE03.FECHA_DOCU,MINVE03.REFER, SUM(MINVE03.CANT) AS CANTIDAD FROM MINVE03 WHERE MINVE03.CVE_CPTO = 58 AND ((MINVE03.FECHA_DOCU)>='$fecha') and ((MINVE03.FECHA_DOCU)<='$fechaf') GROUP BY MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.FECHA_DOCU,MINVE03.REFER ORDER BY MINVE03.REFER, MINVE03.CVE_ART, MINVE03.FECHA_DOCU ASC  "; 
	   
	   $ent7 = ibase_query($conn7,$sql7);
		
		while($CUN=ibase_fetch_row($ent7)) 
			{
				if($S[3]==$CUN[3] and $S[0]==$CUN[0])
				{
				$cun=1;
				}
			}
//CONECTA MERIDA
	   $conn8=Connectmid();
 	   $sql8="SELECT MINVE03.CVE_ART, MINVE03.CVE_CPTO, MINVE03.FECHA_DOCU,MINVE03.REFER, SUM(MINVE03.CANT) AS CANTIDAD FROM MINVE03 WHERE MINVE03.CVE_CPTO = 58 AND ((MINVE03.FECHA_DOCU)>='$fecha') and ((MINVE03.FECHA_DOCU)<='$fechaf') GROUP BY MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.FECHA_DOCU,MINVE03.REFER ORDER BY MINVE03.REFER, MINVE03.CVE_ART, MINVE03.FECHA_DOCU ASC  "; 
	   
	   $ent8 = ibase_query($conn8,$sql8);
		
		while($MID=ibase_fetch_row($ent8)) 
			{
				if($S[3]==$MID[3] and $S[0]==$MID[0])
				{
				$mid=1;
				}
			}
//CONECTA CHIHUAHUA
	   $conn9=Connectcuu();
 	   $sql9="SELECT MINVE03.CVE_ART, MINVE03.CVE_CPTO, MINVE03.FECHA_DOCU,MINVE03.REFER, SUM(MINVE03.CANT) AS CANTIDAD FROM MINVE03 WHERE MINVE03.CVE_CPTO = 58 AND ((MINVE03.FECHA_DOCU)>='$fecha') and ((MINVE03.FECHA_DOCU)<='$fechaf') GROUP BY MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.FECHA_DOCU,MINVE03.REFER ORDER BY MINVE03.REFER, MINVE03.CVE_ART, MINVE03.FECHA_DOCU ASC  "; 
	   
	   $ent9 = ibase_query($conn9,$sql9);
		
		while($CUU=ibase_fetch_row($ent9)) 
			{
				if($S[3]==$CUU[3] and $S[0]==$CUU[0])
				{
				$cuu=1;
				}
			}
//CONECTA QUERETARO
	   $conn10=Connectqro();
 	   $sql10="SELECT MINVE03.CVE_ART, MINVE03.CVE_CPTO, MINVE03.FECHA_DOCU,MINVE03.REFER, SUM(MINVE03.CANT) AS CANTIDAD FROM MINVE03 WHERE MINVE03.CVE_CPTO = 58 AND ((MINVE03.FECHA_DOCU)>='$fecha') and ((MINVE03.FECHA_DOCU)<='$fechaf') GROUP BY MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.FECHA_DOCU,MINVE03.REFER ORDER BY MINVE03.REFER, MINVE03.CVE_ART, MINVE03.FECHA_DOCU ASC  "; 
	   
	   $ent10 = ibase_query($conn10,$sql10);
		
		while($QRO=ibase_fetch_row($ent10)) 
			{
				if($S[3]==$QRO[3] and $S[0]==$QRO[0])
				{
				$qro=1;
				}
			}
//CONECTA TUXTLA
	   $conn11=Connecttgz();
 	   $sql11="SELECT MINVE03.CVE_ART, MINVE03.CVE_CPTO, MINVE03.FECHA_DOCU,MINVE03.REFER, SUM(MINVE03.CANT) AS CANTIDAD FROM MINVE03 WHERE MINVE03.CVE_CPTO = 58 AND ((MINVE03.FECHA_DOCU)>='$fecha') and ((MINVE03.FECHA_DOCU)<='$fechaf') GROUP BY MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.FECHA_DOCU,MINVE03.REFER ORDER BY MINVE03.REFER, MINVE03.CVE_ART, MINVE03.FECHA_DOCU ASC  "; 
	   
	   $ent11 = ibase_query($conn11,$sql11);
		
		while($TGZ=ibase_fetch_row($ent11)) 
			{
				if($S[3]==$TGZ[3] and $S[0]==$TGZ[0])
				{
				$qro=1;
				}
			}			
			if ($mex==0 and $gto==0 and $gdl==0 and $mty==0 and $pue==0 and $ver==0 and $cun==0 and $mid==0 and $cuu==0 and $qro==0 and $tgz==0) {
				echo "<tr><td>$S[0]</td><td>$S[3]</td><td>$S[4]</td><td>$maskSAL</td><td>Sin Coincidencia</td></tr>";
				$count = $count + 1; 
  				}
				if ($mex==1) {
				$mex=0;
				}
				if ($gto==1) {
				$gto=0;
				}
				if ($gdl==1) {
				$gdl=0;
				}
				if ($mty==1) {
				$mty=0;
				}
				if ($pue==1) {
				$pue=0;
				}
				if ($ver==1) {
				$ver=0;
				}
				if ($cun==1) {
				$cun=0;
				}
				if ($mid==1) {
				$mid=0;
				}
				if ($cuu==1) {
				$cuu=0;
				}
				if ($qro==1) {
				$qro=0;
				}
				if ($tgz==1) {
				$tgz=0;
				}
				
  }//WHILE PRINCIPAL

ibase_close($conn);
ibase_close($conn1);
ibase_close($conn2);
ibase_close($conn3);
ibase_close($conn4);
ibase_close($conn5);
ibase_close($conn6);
ibase_close($conn7);
ibase_close($conn8);
ibase_close($conn9);
ibase_close($conn10);  
ibase_close($conn11);
  
echo "</table>";

?>

<table class="content">
<tr><td class="title">Se encontraron <?php echo "$count"; ?> registros</td></tr>
<tr><td class="title">Es necesario revisar los movimientos de toda la carta tanto en el Sistema de Inventarios como en la Sucursal.</td></tr>
<tr><td class="title">Estos se capturan manualmente.</td></tr>
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
	</div>
</body>
</html>