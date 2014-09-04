<?php
error_reporting(0);

session_start();

mysql_pconnect('localhost','root','apl')or die ('Ha fallado la conexión: '.mysql_error());
mysql_select_db('accesos')or die ('Error al seleccionar la Base de Datos: '.mysql_error());

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
	$result = mysql_query('SELECT pwd, user, store, name, tuser FROM usuarios WHERE user=\''.$usuario.'\' and tuser="almacen"');
	if($row = mysql_fetch_array($result)){
		if($row["pwd"] == $password and $row["user"] == $usuario){
			$_SESSION["k_username"] = $row['user'];
			$_SESSION["k_nombre"] = $row['name'];
			$_SESSION["k_sucursal"] = $row['store'];
			$_SESSION["k_tuser"] = $row['tuser'];
			
			 header("Location: sci.php?noValid=no"); 
		}else{
			header("Location: index.php?noValid=si"); 
		}
	}else{
		//echo '<p class=content>Usuario no existente en la base de datos</p>';
			header("Location: index.php?noValid=si"); 
	}
	mysql_free_result($result);
}else{
	//echo '<p class=content>Es necesario que coloque sus datos de usuario y password</p>';
	header("Location: index.php?noValid=si"); 
}
mysql_close();
?>