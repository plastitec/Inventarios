<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="master.css" rel="stylesheet" type="text/css">
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
							<td><img src="images/logo.jpg" /></td>
							<td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold">Movimientos Sucursal Salida <?php echo "$suc1"; ?> - Entrada <?php echo "$suc2"; ?>
							</td>
						</tr>
						<tr>
							<td class="title" align="right"><div align="left">Este reporte se gener&oacute; del periodo:</div></td>
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
 									 }				
 									 if($suc1=='LEON'){
   										$conn=Connectgto(); 
										$ABR='GTO';
   									 }
									 if($suc1=='GUADALAJARA'){
  										$conn=Connectgdl(); 
										$ABR='GDL';
 									 }
									 if($suc1=='MONTERREY'){
 										$conn=Connectmty(); 
										$ABR='MTY';
 									 }
									 if($suc1=='PUEBLA'){
 										$conn=Connectpue();
										$ABR='PUE'; 
									 }
									 if($suc1=='VERACRUZ'){
   										$conn=Connectver(); 
										$ABR='VER';
  									 }
									 if($suc1=='CANCUN'){
  										$conn=Connectcun();
										$ABR='CUN'; 
 									 }
									 if($suc1=='MERIDA'){
									    $conn=Connectmid(); 
										$ABR='MID';
  									 }
									 if($suc1=='CHIHUAHUA'){
 										$conn=Connectcuu();
										$ABR='CUU'; 
									 }
									 if($suc1=='QUERETARO'){
  										$conn=Connectqro(); 
										$ABR='QRO';
								     }
									 if($suc1=='TUXTLA'){
 										$conn=Connecttgz();
										$ABR='TGZ'; 
									 }
									
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
								      }				
									  if($suc2=='LEON'){
  										 $conn2=Connectgto();
										 $ABR2='GTO';
 								      }
									  if($suc2=='GUADALAJARA'){
   										 $conn2=Connectgdl();
										 $ABR2='GDL';
  									  }
                                      if($suc2=='MONTERREY'){
  										 $conn2=Connectmty();
										 $ABR2='MTY'; 
                                      }
                                      if($suc2=='PUEBLA'){
                                         $conn2=Connectpue(); 
										 $ABR2='PUE';
                                      }
                                      if($suc2=='VERACRUZ'){
                                         $conn2=Connectver();
										 $ABR2='VER';
                                      }
                                      if($suc2=='CANCUN'){
                                         $conn2=Connectcun();
										 $ABR2='CUN';
                                      }
                                      if($suc2=='MERIDA'){
                                         $conn2=Connectmid();
										 $ABR2='MID';
                                      }
                                      if($suc2=='CHIHUAHUA'){
                                         $conn2=Connectcuu();
										 $ABR2='CUU';
                                      }
                                      if($suc2=='QUERETARO'){
                                         $conn2=Connectqro(); 
										 $ABR2='QRO';
                                      }
                                      if($suc2=='TUXTLA'){
                                         $conn2=Connecttgz(); 
										 $ABR2='TGZ';
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
					echo "<a href='indexconsulta.php'><img src='Images/volver.jpg' border='0' title='Regresar a Menú Consulta'/></a></td>";
					?>
					</td>
					<td>
					</td>
				</tr>
			</table>

<?php
error_reporting(0);

if($ABR==$ABR2){
?>
 	 <script language='JavaScript'> 
     alert('ERROR: NO PUEDES GENERAR UN REPORTE DE LA MISMA SUCURSAL EN SALIDA Y ENTRADA'); 
	 window.location="indexexporta.php";
     </script>
<?php
}
//SALIDAS

if($clave==''){
?>
 	 <script language='JavaScript'> 
     alert('ERROR: NO PUEDES GENERAR UN REPORTE SIN UNA CLAVE'); 
	 window.location="indexconsulta.php";
     </script>
<?php
}
else {
   $sql="SELECT MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.REFER, SUM(MINVE03.CANT) AS CANTIDAD FROM MINVE03 WHERE MINVE03.CVE_CPTO = 58 AND ((MINVE03.FECHA_DOCU)>='$fecha') and ((MINVE03.FECHA_DOCU)<='$fechaf') AND MINVE03.CVE_ART='$clave'  GROUP BY MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.REFER ORDER BY MINVE03.REFER, MINVE03.CVE_ART ASC  ";
   $sql3="SELECT MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.REFER, SUM(MINVE03.CANT) AS CANTIDAD FROM MINVE03 WHERE MINVE03.CVE_CPTO = 7 AND ((MINVE03.FECHA_DOCU)>='$fecha') and ((MINVE03.FECHA_DOCU)<='$fechaf') AND MINVE03.CVE_ART='$clave'  GROUP BY MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.REFER ORDER BY MINVE03.REFER, MINVE03.CVE_ART ASC  ";
    $sqlF="SELECT MINVE03.CVE_ART, MINVE03.FECHA_DOCU,MINVE03.REFER FROM MINVE03 WHERE MINVE03.CVE_CPTO = 58 AND ((MINVE03.FECHA_DOCU)>='$fecha') and ((MINVE03.FECHA_DOCU)<='$fechaf') AND MINVE03.CVE_ART='$clave' GROUP BY MINVE03.CVE_ART, MINVE03.FECHA_DOCU,MINVE03.REFER ORDER BY MINVE03.REFER, MINVE03.CVE_ART, MINVE03.FECHA_DOCU ASC  ";

//ENTRADAS   

   $sql2="SELECT MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.REFER, SUM(MINVE03.CANT) AS CANTIDAD FROM MINVE03 WHERE MINVE03.CVE_CPTO = 7 AND ((MINVE03.FECHA_DOCU)>='$fecha') and ((MINVE03.FECHA_DOCU)<='$fechaf') AND MINVE03.CVE_ART='$clave'  GROUP BY MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.REFER ORDER BY MINVE03.REFER, MINVE03.CVE_ART ASC  ";
   $sql4="SELECT MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.REFER, SUM(MINVE03.CANT) AS CANTIDAD FROM MINVE03 WHERE MINVE03.CVE_CPTO = 58 AND ((MINVE03.FECHA_DOCU)>='$fecha') and ((MINVE03.FECHA_DOCU)<='$fechaf') AND MINVE03.CVE_ART='$clave'  GROUP BY MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.REFER ORDER BY MINVE03.REFER, MINVE03.CVE_ART ASC  ";
}
 
$sal = ibase_query($conn,$sql);

//Inicia Encabezado
echo "Cartas encontradas en ambas sucursales";
echo "<table border = '1' style='font-family:Arial, Helvetica, sans-serif; font-size:12PX' cellpadding='1' cellspacing='0' align='center'><tr>";
echo "<th align='center' >NUM.</th>";
echo "<th align='center' >CLAVE $ABR</th>";
echo "<th align='center'>DOCTO. $ABR</th>";
echo "<th align='center'>CANT. $ABR</th>";
echo "<th align='center'>FECHA $ABR</th>";
echo "<th align='center'>DOCTO. $ABR2</th>";
echo "<th align='center'>CANT. $ABR2</th>";
echo "<th align='center'>DIF.</th></tr>";

$x = 0;
$count = 0;
$countdif = 0;
$dif = 0;

while($S=ibase_fetch_row($sal))
  {
  	$ent = ibase_query($conn2,$sql2);
		while($E=ibase_fetch_row($ent)) 
			{
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
				
				$dif = $totalDifsal + $totalDifent;
						
			$fechasal = $encontro;
			$maskSAL = $fechasal{8} . $fechasal{9} . $fechasal{7} . $fechasal{5} . $fechasal{6} . $fechasal{4} . $fechasal{0} . $fechasal{1} . $fechasal{2} . $fechasal{3};
			
			$count = $count + 1;
			
			if($dif == 0){
			echo "<tr style='font-size:9px; color:#000000'><td style='font-family:Verdana'>$count</td><td style='font-family:Consolas;font-size:11px'>$S[0]</td><td style='font-family:Verdana'>$S[2]</td><td align='center' style='font-family:Verdana'>$totalDifsal</td><td align='center' style='font-family:Verdana'>$maskSAL</td><td style='font-family:Verdana'>$E[2]</td><td align='center' style='font-family:Verdana'>$totalDifent</td><td style='font-family:Verdana'>$dif</td>";
			}
			else {
			$countdif = $countdif + 1;
			echo "<tr style='font-size:9px;color:#000000; font-weight:bolder'><td style='font-family:Verdana'>$count</td><td style='font-family:Consolas;font-size:11px'>$S[0]</td><td style='font-family:Verdana'>$S[2]</td><td align='center' style='font-family:Verdana'>$totalDifsal</td><td align='center' style='font-family:Verdana'>$maskSAL</td><td style='font-family:Verdana'>$E[2]</td><td align='center' style='font-family:Verdana'>$totalDifent</td><td style='font-family:Verdana'>$dif</td>";
			}
			echo "</tr>";
			
$difSal=0;			
$difEnt=0;							}
			}
  }
ibase_close($conn); 
ibase_close($conn2); 
echo "</table>";

?>

<table class="content">
<tr><td class="title">Se encontraron <?php echo "$count"; ?> registros en total</td></tr>
<tr><td class="title">Gener&oacute; Usuario: <?php echo $_SESSION["k_nombre"]; ?> || Fecha: <?php echo $fecha_arch; ?>  </td></tr>
</table>
<?php

 $sql="SELECT MINVE03.CVE_ART, MINVE03.CVE_CPTO, MINVE03.FECHA_DOCU,MINVE03.REFER, SUM(MINVE03.CANT) AS CANTIDAD FROM MINVE03 WHERE MINVE03.CVE_CPTO = 58 AND ((MINVE03.FECHA_DOCU)>='$fecha') and ((MINVE03.FECHA_DOCU)<='$fechaf') and MINVE03.CVE_ART='$clave' GROUP BY MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.FECHA_DOCU,MINVE03.REFER ORDER BY MINVE03.REFER, MINVE03.CVE_ART, MINVE03.FECHA_DOCU ASC  ";
 
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
$tgz = 0;
$count = 0;

while($S=ibase_fetch_row($sal))
  {
$diferencia = 0;

$fechasal = $S[2];
$maskSAL = $fechasal{8} . $fechasal{9} . $fechasal{7} . $fechasal{5} . $fechasal{6} . $fechasal{4} . $fechasal{0} . $fechasal{1} . $fechasal{2} . $fechasal{3};
//CONECTA MEXICO		
		 $conn1=Connectmex();
  		 $sql1="SELECT MINVE03.CVE_ART, MINVE03.CVE_CPTO, MINVE03.FECHA_DOCU,MINVE03.REFER, SUM(MINVE03.CANT) AS CANTIDAD FROM MINVE03 WHERE MINVE03.CVE_CPTO = 7 AND ((MINVE03.FECHA_DOCU)>='$fecha') and ((MINVE03.FECHA_DOCU)<='$fechaf') and MINVE03.CVE_ART='$clave' GROUP BY MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.FECHA_DOCU,MINVE03.REFER ORDER BY MINVE03.REFER, MINVE03.CVE_ART, MINVE03.FECHA_DOCU ASC  ";
		
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
   		$sql2="SELECT MINVE03.CVE_ART, MINVE03.CVE_CPTO, MINVE03.FECHA_DOCU,MINVE03.REFER, SUM(MINVE03.CANT) AS CANTIDAD FROM MINVE03 WHERE MINVE03.CVE_CPTO = 7 AND ((MINVE03.FECHA_DOCU)>='$fecha') and ((MINVE03.FECHA_DOCU)<='$fechaf') and MINVE03.CVE_ART='$clave' GROUP BY MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.FECHA_DOCU,MINVE03.REFER ORDER BY MINVE03.REFER, MINVE03.CVE_ART, MINVE03.FECHA_DOCU ASC  ";
 
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
   		$sql3="SELECT MINVE03.CVE_ART, MINVE03.CVE_CPTO, MINVE03.FECHA_DOCU,MINVE03.REFER, SUM(MINVE03.CANT) AS CANTIDAD FROM MINVE03 WHERE MINVE03.CVE_CPTO = 7 AND ((MINVE03.FECHA_DOCU)>='$fecha') and ((MINVE03.FECHA_DOCU)<='$fechaf') and MINVE03.CVE_ART='$clave' GROUP BY MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.FECHA_DOCU,MINVE03.REFER ORDER BY MINVE03.REFER, MINVE03.CVE_ART, MINVE03.FECHA_DOCU ASC  ";
 
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
 	   $sql4="SELECT MINVE03.CVE_ART, MINVE03.CVE_CPTO, MINVE03.FECHA_DOCU,MINVE03.REFER, SUM(MINVE03.CANT) AS CANTIDAD FROM MINVE03 WHERE MINVE03.CVE_CPTO = 7 AND ((MINVE03.FECHA_DOCU)>='$fecha') and ((MINVE03.FECHA_DOCU)<='$fechaf') and MINVE03.CVE_ART='$clave' GROUP BY MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.FECHA_DOCU,MINVE03.REFER ORDER BY MINVE03.REFER, MINVE03.CVE_ART, MINVE03.FECHA_DOCU ASC  "; 
	   
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
 	   $sql5="SELECT MINVE03.CVE_ART, MINVE03.CVE_CPTO, MINVE03.FECHA_DOCU,MINVE03.REFER, SUM(MINVE03.CANT) AS CANTIDAD FROM MINVE03 WHERE MINVE03.CVE_CPTO = 7 AND ((MINVE03.FECHA_DOCU)>='$fecha') and ((MINVE03.FECHA_DOCU)<='$fechaf') and MINVE03.CVE_ART='$clave' GROUP BY MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.FECHA_DOCU,MINVE03.REFER ORDER BY MINVE03.REFER, MINVE03.CVE_ART, MINVE03.FECHA_DOCU ASC  "; 
	   
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
 	   $sql6="SELECT MINVE03.CVE_ART, MINVE03.CVE_CPTO, MINVE03.FECHA_DOCU,MINVE03.REFER, SUM(MINVE03.CANT) AS CANTIDAD FROM MINVE03 WHERE MINVE03.CVE_CPTO = 7 AND ((MINVE03.FECHA_DOCU)>='$fecha') and ((MINVE03.FECHA_DOCU)<='$fechaf') and MINVE03.CVE_ART='$clave' GROUP BY MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.FECHA_DOCU,MINVE03.REFER ORDER BY MINVE03.REFER, MINVE03.CVE_ART, MINVE03.FECHA_DOCU ASC  "; 
	   
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
 	   $sql7="SELECT MINVE03.CVE_ART, MINVE03.CVE_CPTO, MINVE03.FECHA_DOCU,MINVE03.REFER, SUM(MINVE03.CANT) AS CANTIDAD FROM MINVE03 WHERE MINVE03.CVE_CPTO = 7 AND ((MINVE03.FECHA_DOCU)>='$fecha') and ((MINVE03.FECHA_DOCU)<='$fechaf') and MINVE03.CVE_ART='$clave' GROUP BY MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.FECHA_DOCU,MINVE03.REFER ORDER BY MINVE03.REFER, MINVE03.CVE_ART, MINVE03.FECHA_DOCU ASC  "; 
	   
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
 	   $sql8="SELECT MINVE03.CVE_ART, MINVE03.CVE_CPTO, MINVE03.FECHA_DOCU,MINVE03.REFER, SUM(MINVE03.CANT) AS CANTIDAD FROM MINVE03 WHERE MINVE03.CVE_CPTO = 7 AND ((MINVE03.FECHA_DOCU)>='$fecha') and ((MINVE03.FECHA_DOCU)<='$fechaf') and MINVE03.CVE_ART='$clave' GROUP BY MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.FECHA_DOCU,MINVE03.REFER ORDER BY MINVE03.REFER, MINVE03.CVE_ART, MINVE03.FECHA_DOCU ASC  "; 
	   
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
 	   $sql9="SELECT MINVE03.CVE_ART, MINVE03.CVE_CPTO, MINVE03.FECHA_DOCU,MINVE03.REFER, SUM(MINVE03.CANT) AS CANTIDAD FROM MINVE03 WHERE MINVE03.CVE_CPTO = 7 AND ((MINVE03.FECHA_DOCU)>='$fecha') and ((MINVE03.FECHA_DOCU)<='$fechaf') and MINVE03.CVE_ART='$clave' GROUP BY MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.FECHA_DOCU,MINVE03.REFER ORDER BY MINVE03.REFER, MINVE03.CVE_ART, MINVE03.FECHA_DOCU ASC  "; 
	   
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
 	   $sql10="SELECT MINVE03.CVE_ART, MINVE03.CVE_CPTO, MINVE03.FECHA_DOCU,MINVE03.REFER, SUM(MINVE03.CANT) AS CANTIDAD FROM MINVE03 WHERE MINVE03.CVE_CPTO = 7 AND ((MINVE03.FECHA_DOCU)>='$fecha') and ((MINVE03.FECHA_DOCU)<='$fechaf') and MINVE03.CVE_ART='$clave' GROUP BY MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.FECHA_DOCU,MINVE03.REFER ORDER BY MINVE03.REFER, MINVE03.CVE_ART, MINVE03.FECHA_DOCU ASC  "; 
	   
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
 	   $sql11="SELECT MINVE03.CVE_ART, MINVE03.CVE_CPTO, MINVE03.FECHA_DOCU,MINVE03.REFER, SUM(MINVE03.CANT) AS CANTIDAD FROM MINVE03 WHERE MINVE03.CVE_CPTO = 7 AND ((MINVE03.FECHA_DOCU)>='$fecha') and ((MINVE03.FECHA_DOCU)<='$fechaf') and MINVE03.CVE_ART='$clave' GROUP BY MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.FECHA_DOCU,MINVE03.REFER ORDER BY MINVE03.REFER, MINVE03.CVE_ART, MINVE03.FECHA_DOCU ASC  "; 
	   
	   $ent11 = ibase_query($conn11,$sql11);
		
		while($TGZ=ibase_fetch_row($ent11)) 
			{
				if($S[3]==$TGZ[3] and $S[0]==$TGZ[0])
				{
				$tgz=1;
				}
				
			}
			
			if ($mex==0 and $gto==0 and $gdl==0 and $mty==0 and $pue==0 and $ver==0 and $cun==0 and $mid==0 and $cuu==0 and $qro==0 and $tgz==0) {
				echo "<tr><td>$S[0]</td><td>$S[3]</td>";
				
				
				echo "<td>$S[4]</td>";
				
				echo "<td>$maskSAL</td><td>Sin Coincidencia</td></tr>";
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

</div><!--EFECTO!--->
	
</body>
</html>