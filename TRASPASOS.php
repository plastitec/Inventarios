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
									 if($suc1=='TIJUANA'){
 										$conn=Connecttij();
										$ABR='TIJ'; 
									 }
									 if($suc1=='LUCITE'){
 										$conn=Connectluc();
										$ABR='LUC'; 
									 }
									
									 if ($ABR=='LUC'){
									 $sqlTop= "SELECT first(1) MINVE04.fechaelab, MINVE04.REFER FROM MINVE04 ORDER BY MINVE04.num_mov DESC";
									 }else{
									 $sqlTop= "SELECT first(1) MINVE03.fechaelab, MINVE03.REFER FROM MINVE03 ORDER BY MINVE03.num_mov DESC";
									 }
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
                                      if($suc2=='TIJUANA'){
                                         $conn2=Connecttij(); 
										 $ABR2='TIJ';
                                      }
                                      if($suc2=='LUCITE'){
                                         $conn2=Connectluc(); 
										 $ABR2='LUC';
                                      }
				                
								if ($ABR2=='LUC') {
								$sqlTop2= "SELECT first(1) MINVE04.fechaelab, MINVE04.REFER FROM MINVE04 ORDER BY MINVE04.num_mov DESC";
								}else{
								$sqlTop2= "SELECT first(1) MINVE03.fechaelab, MINVE03.REFER FROM MINVE03 ORDER BY MINVE03.num_mov DESC";
								}
								
				
			                    $rs2 = ibase_query($conn2,$sqlTop2);
								$T2=ibase_fetch_row($rs2);
			
									$cadena2 = $T2[0];
									$fechaTOP2 = $cadena2{8} . $cadena2{9} . $cadena2{7} . $cadena2{5} . $cadena2{6} . $cadena2{4} . $cadena2{0} . $cadena2{1} . $cadena2{2} . $cadena2{3} . $cadena2{10} . $cadena2{11} . $cadena2{12} . $cadena2{13} . $cadena2{14} . $cadena2{15} . $cadena2{16} . $cadena2{17} . $cadena2{18};

									echo "$T2[1] $fechaTOP2";				
				 ?> 
					 </td>
				</tr>
				<tr>
					<form action="generate.php">
					<td class="content">
						Exportar:
						<input type="text" maxlength="12" size="12" name="suc1" value=<?php echo "$suc1"; ?> style="color:#006699" onfocus="this.blur()" class="content" />
						a
						<input type="text" maxlength="12" size="12" name="suc2" value=<?php echo "$suc2"; ?> style="color:#990000" onfocus="this.blur()" class="content" />
					</td>
					<td class="content">
						del
						<input type="text" maxlength="12" size="12" name="fecha" value=<?php echo "$fecha"; ?> style="color:#006699" onfocus="this.blur()" class="content" />
						al
						<input type="text" maxlength="12" size="12" name="fechaf" value=<?php echo "$fechaf"; ?> style="color:#990000" onfocus="this.blur()" class="content" />
						<INPUT TYPE='submit' value='Generar' > 	
					</td>
					</form>
				</tr>
				<tr>
					<td>
					<?php
					echo "<td align='left' class='movs'>CARTAS DE TRASPASOS";
					echo "<a href='indexexporta.php'><img src='Images/volver.jpg' border='0' title='Regresar a Menú Exportar'/></a></td>";
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

   $sql="SELECT MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.REFER, SUM(MINVE03.CANT) AS CANTIDAD FROM MINVE03 WHERE MINVE03.CVE_CPTO = 58 AND ((MINVE03.FECHA_DOCU)>='$fecha') and ((MINVE03.FECHA_DOCU)<='$fechaf') GROUP BY MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.REFER ORDER BY MINVE03.REFER, MINVE03.CVE_ART ASC  ";
   $sql3="SELECT MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.REFER, SUM(MINVE03.CANT) AS CANTIDAD FROM MINVE03 WHERE MINVE03.CVE_CPTO = 7 AND ((MINVE03.FECHA_DOCU)>='$fecha') and ((MINVE03.FECHA_DOCU)<='$fechaf') GROUP BY MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.REFER ORDER BY MINVE03.REFER, MINVE03.CVE_ART ASC  ";
    $sqlF="SELECT MINVE03.CVE_ART, MINVE03.FECHA_DOCU,MINVE03.REFER FROM MINVE03 WHERE MINVE03.CVE_CPTO = 58 AND ((MINVE03.FECHA_DOCU)>='$fecha') and ((MINVE03.FECHA_DOCU)<='$fechaf') GROUP BY MINVE03.CVE_ART, MINVE03.FECHA_DOCU,MINVE03.REFER ORDER BY MINVE03.REFER, MINVE03.CVE_ART, MINVE03.FECHA_DOCU ASC  ";

//ENTRADAS   

   $sql2="SELECT MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.REFER, SUM(MINVE03.CANT) AS CANTIDAD FROM MINVE03 WHERE MINVE03.CVE_CPTO = 7 AND ((MINVE03.FECHA_DOCU)>='$fecha') and ((MINVE03.FECHA_DOCU)<='$fechaf') GROUP BY MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.REFER ORDER BY MINVE03.REFER, MINVE03.CVE_ART ASC  ";
   $sql4="SELECT MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.REFER, SUM(MINVE03.CANT) AS CANTIDAD FROM MINVE03 WHERE MINVE03.CVE_CPTO = 58 AND ((MINVE03.FECHA_DOCU)>='$fecha') and ((MINVE03.FECHA_DOCU)<='$fechaf') GROUP BY MINVE03.CVE_ART, MINVE03.CVE_CPTO,MINVE03.REFER ORDER BY MINVE03.REFER, MINVE03.CVE_ART ASC  ";
 
$sal = ibase_query($conn,$sql);

//Inicia Encabezado
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
			echo "<tr style='font-size:9px;color:#0000ff; font-weight:bolder'><td style='font-family:Verdana'>$count</td><td style='font-family:Consolas;font-size:11px'>$S[0]</td><td style='font-family:Verdana'>$S[2]</td><td align='center' style='font-family:Verdana'>$totalDifsal</td><td align='center' style='font-family:Verdana'>$maskSAL</td><td style='font-family:Verdana'>$E[2]</td><td align='center' style='font-family:Verdana'>$totalDifent</td><td style='font-family:Verdana'>$dif</td>";
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
<tr><td class="title">Se encontraron <?php echo "$countdif"; ?> registros con diferencias (Se deberán capturar manualmente)</td></tr>
<tr><td class="title">Gener&oacute; Usuario: <?php echo $_SESSION["k_nombre"]; ?> || Fecha: <?php echo $fecha_arch; ?>  </td></tr>
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
</html>