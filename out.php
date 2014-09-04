<?php
error_reporting(0);
session_start();

session_destroy();
//echo 'Ha terminado la session <p><a href="index.php">index</a></p>';

if ($_SESSION["k_sucursal"] == 'mexico') {
$logAcceso = "D:/Logs/Inventarios/Accesos/sesionMex.txt"; 
}

@touch($logAcceso);

	 if (filesize($logAcceso) > 1024000) 
	 {
     rename($logAcceso,$logAcceso.'_'.date(Ymdhis)); 
     }
   
    $logAcceso = @fopen($logAcceso,"a+");    	

   $lineaTXT  = "Cierra Sesion: ".date("d/m/Y·H:i:s").".";  
   $lineaTXT .= "·".$_SESSION["k_username"]."·";
   $lineaTXT .= $_SERVER["REMOTE_ADDR"]."·";         
   $lineaTXT .= $_SERVER["REMOTE_PORT"]."·";         
   $lineaTXT .= $_SERVER["REQUEST_URI"]."·";         
   $lineaTXT .= gethostbyaddr($_SERVER['REMOTE_ADDR'])."."; 
   $lineaTXT .= "·".chr(13).chr(10);         
                              	
   @fwrite($logAcceso,$lineaTXT);    	
   @fclose($logAcceso);  
?>
<SCRIPT LANGUAGE="javascript">
location.href = "index.php";
</SCRIPT>