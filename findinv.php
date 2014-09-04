<?php
class Buscador {
 var $src="Facturas/3050:D:/0_Aspel/Sistemas Aspel/SAE5.00/DB/APL/MEX/Datos/MEX.fdb", $src2="conexgtoconnapl.no-ip.org/3050:D:/0_SAE/Sistemas Aspel/SAE5.00/DB/APL/LEO/Datos/LEO3.fdb" , $host="localhost", $usersql="root", $passwordsql="apl", $user="SYSDBA", $password="masterkey", $db='accesos', $c_servidor='Conectado', $i_servidor='No se conect&oacute;', $c_DB='Correcto DB', $i_DB='Incorrecto DB';


 	function Conectar() 
 	{
 		$conn=ibase_connect($this->src,$this->user,$this->password);
	
 			if(!$conn)
				{
				print $this->i_servidor;
				}
			else
				{
			
				}	
	}
	
	function Buscar($q) 
	{
		
		$conn=ibase_connect($this->src,$this->user,$this->password);
		
		$query = "SELECT INVE03.CVE_ART, INVE03.DESCR FROM inve03 where INVE03.DESCR LIKE '%". $q ."%' AND INVE03.STATUS='A' OR INVE03.CVE_ART LIKE '%".$q."%' AND INVE03.STATUS='A' ORDER BY INVE03.CVE_ART";
		$inv = ibase_query($conn,$query);
		
		print "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='font-family:Verdana; font-size:10; font-color:#CDCD'>
				<tr>
					<td></td>
					<td></td>
					<td></td>
				</tr>";	
					
			while ($IN = ibase_fetch_row($inv)) {
				print "<tr>".
					   	"<td>". $IN[1] ."</td>".
					   	"<td><input style='border:0; background-color: #f9f9f9; font-family:Verdana; font-size:10; font-color:#CDCD; cursor:pointer' type='submit' id='valor2' value='". $IN[0] ."' onClick='Resultado(\"". $IN[0] ."\");'/></td>".
					   "</tr>";
			}
				print "</table>";
			
 	 }	
} //CIERRA BUSCADOR



?>	