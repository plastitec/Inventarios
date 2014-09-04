<style type="text/css">
.overlay {
 position: fixed; /* Le damos el valor Fixed para que flote */
 background: rgba(255, 255, 255, 0.50); /* Color de fondo de la capa */
 width: 100%; 
 height: 100%;
 top: 0;
 left: 0;
 z-index: 999;
}

.float-content{
 background:#FFF; /*Color de fondo del contenedor*/
 padding: 10px; 
 border-radius: 2px; /* Redondeado */
 box-shadow: 0px 0px 0px 2px white, 0 5px 14px black; /* Sombra exterior */
 z-index: 9999;
 position: fixed;
 top: 50%;
 left: 50%;
 width: 500px; /* Ancho */
 height: 210px; /* Alto */
 margin-top: -175px; /* Aquí debes colocar la mitad del alto del contenedor */
 margin-left: -270px; /* Aquí debes colocar la mitad del ancho del contenedor */
}

.close a {
 position: absolute;
 display: block;
 top: -15px;
 right: -15px;
 cursor: pointer;
 background-color:#006600;
 /*background: url(Url_de_la_imagen) 0px 0px no-repeat; /* Imagen del boton */
 width: 30px;
 height: 30px;
 overflow: hidden;
 text-indent: -9999px;
}
</style>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="master.css" rel="stylesheet" type="text/css">
<title>Aplicacion para Administración de Inventarios</title>
</head>


<script>
function showme() {div = document.getElementById('prueba');div.style.display = '';}
</script>
<script>
function hiddeme() {div = document.getElementById('prueba');div.style.display = 'none';}
</script>
<body>
<div class="overlay" id="prueba"> <!-- Esta es la capa del contenedor-->
	<div class="float-content"> <!-- Este es el contenedor-->
		<table align="center">
					<tr>
						<td><img src="Images/logo.jpg" border="0" /></td>
						<td class="enc1" align="center">Acrilicos Plastitec S.A. de C.V.<br />Aplicaci&oacute;n para Administraci&oacute;n de Inventarios	<br /> Depto. Inventarios</td>
					</tr>
		</table>
		<HR />		
		<table align="center">
				<form action="check.php" method="post">
				<tr> 
					<td align="left" class="content">Usuario:</td> 
					<td><input type="Text" name="usuario" size="8" maxlength="50"></td> 
				</tr> 
				
				<tr> 
					<td align="right" class="content">Password:</td> 
					<td><input type="password" name="password" size="8" maxlength="50"></td> 
				</tr> 
				
				<tr> 
					<td colspan="2" align="center"><input type="Submit" value="ENTRAR" class="c"></td> 
				<td width="4"></form>
				</tr>	
			</table>
		<hr />
		<table>
				<tr>
					<td class="content">WebMaster | E.N.L. Sistemas Plastitec S.A. de C.V.
					</td>
				</tr>
		</table>	
	</div>
</div>
</body>
</html>

