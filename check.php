<?php
session_start();

mysql_pconnect('localhost','root','apl')or die ('Ha fallado la conexión: '.mysql_error());
mysql_select_db('accesos')or die ('Error al seleccionar la Base de Datos: '.mysql_error());

$ipRemote = 0;
$ipUser = 0;
$conn=0;
$userip=0;
$hostRemote=0;

function quitar($mensaje)
{
	$nopermitidos = array("'",'\\','<','>',"\"");
	$mensaje = str_replace($nopermitidos, "", $mensaje);
	return $mensaje;
}
if(trim($_POST["usuario"]) != "" && trim($_POST["password"]) != "")
{
	
	$usuario = strtolower(htmlentities($_POST["usuario"], ENT_QUOTES));
	$password = $_POST["password"];
	$result = mysql_query('SELECT pwd, user, store, name FROM usuarios WHERE user=\''.$usuario.'\' and tuser="inventario"');
	if($row = mysql_fetch_array($result)){
		if($row["pwd"] == $password and $row["user"] == $usuario){
			$_SESSION["k_username"] = $row['user'];
			$_SESSION["k_nombre"] = $row['name'];
			$_SESSION["k_sucursal"] = $row['store'];
			
			function sacar($TheStr, $sLeft, $sRight){ 
        		$pleft = strpos($TheStr, $sLeft, 0); 
        			if ($pleft !== false){ 
               		 $pright = strpos($TheStr, $sRight, $pleft + strlen($sLeft)); 
                		if ($pright !== false) { 
                        	return (substr($TheStr, $pleft + strlen($sLeft), ($pright - ($pleft + strlen($sLeft))))); 
              			  } 
     			    } 
     	   return ''; 
		   } 
				
				mysql_query("INSERT into rutausr (user,name,store,remoteaddr,remotehost,result) values('".$_SESSION["k_username"]."','".$_SESSION["k_nombre"]."','".$_SESSION["k_sucursal"]."','NO','NO','IN')");
				header("Location: screen.php?noValid=no");
				
					if ($_SESSION["k_sucursal"] == 'mexico'){
						$logAcceso = "D:/Logs/Inventarios/Accesos/sesionMex.txt"; 
					}

				@touch($logAcceso);

	 				if (filesize($logAcceso) > 1024000){
    					rename($logAcceso,$logAcceso.'_'.date(Ymdhis)); 
     			   
    			$logAcceso = @fopen($logAcceso,"a+");    	

  				$lineaTXT  = "Navega: ".date("d/m/Y·H:i:s").".";  
   				$lineaTXT .= "·".$_SESSION["k_username"]."·";
   				$lineaTXT .= $_SERVER["REMOTE_ADDR"]."·";         
   				$lineaTXT .= $_SERVER["REMOTE_PORT"]."·";         
   				$lineaTXT .= $_SERVER["REQUEST_URI"]."·";         
   				$lineaTXT .= gethostbyaddr($_SERVER['REMOTE_ADDR'])."."; 
   				$lineaTXT .= "·".chr(13).chr(10);         
                              	
   				@fwrite($logAcceso,$lineaTXT);    	
   				@fclose($logAcceso);  

				}

		}else{
			header("Location: index.php?noValid=si"); 
		}
	}else{
		echo '<p class=content>Usuario no existente en la base de datos</p>';
		header("Location: index.php?noValid=si");
	}
	mysql_free_result($result);
}else{
	header("Location: index.php?empty=si");
}
mysql_close();
?>