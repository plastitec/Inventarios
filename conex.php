<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<?php
error_reporting(0);
function Connectmex() 
{ 
 if (!($conn=ibase_connect("D:/SAE50/01MEX/MEX.fdb", "SYSDBA", "masterkey"))) 
   { 
      echo "Error!: No se pudo establecer conexion. Trata nuevamente borrando y colocando el respaldo que quieres leer. MEXICO"; 
      exit(); 
   } 
    return $conn; 
}
function Connectgto() 
{ 
 if (!($conn=ibase_connect("D:/SAE50/02GTO/LEO3.fdb", "SYSDBA", "masterkey"))) 
   { 
      echo "Error!: No se pudo establecer conexion. Trata nuevamente borrando y colocando el respaldo que quieres leer. LEON"; 
      exit(); 
   } 
    return $conn; 
}
function Connectgdl() 
{ 
 if (!($conn=ibase_connect("D:/SAE50/03GDL/GDL.fdb", "SYSDBA", "masterkey"))) 
   { 
      echo "Error!: No se pudo establecer conexion. Trata nuevamente borrando y colocando el respaldo que quieres leer. GUADALAJARA"; 
      exit(); 
   } 
    return $conn; 
}
function Connectmty() 
{ 
 if (!($conn=ibase_connect("D:/SAE50/04MTY/MTY.fdb", "SYSDBA", "masterkey"))) 
   { 
      echo "Error!: No se pudo establecer conexion. Trata nuevamente borrando y colocando el respaldo que quieres leer. MONTERREY"; 
      exit(); 
   } 
    return $conn; 
}
function Connectpue() 
{ 
 if (!($conn=ibase_connect("D:/SAE50/05PUE/PUE.fdb", "SYSDBA", "masterkey"))) 
   { 
      echo "Error!: No se pudo establecer conexion. Trata nuevamente borrando y colocando el respaldo que quieres leer. PUEBLA"; 
      exit(); 
   } 
    return $conn; 
}
function Connectver() 
{ 
 if (!($conn=ibase_connect("D:/SAE50/06VER/VER.fdb", "SYSDBA", "masterkey"))) 
   { 
      echo "Error!: No se pudo establecer conexion. Trata nuevamente borrando y colocando el respaldo que quieres leer. VERACRUZ"; 
      exit(); 
   } 
    return $conn; 
}
function Connectcun() 
{ 
 if (!($conn=ibase_connect("D:/SAE50/07CUN/CUN01.fdb", "SYSDBA", "masterkey"))) 
   { 
      echo "Error!: No se pudo establecer conexion. Trata nuevamente borrando y colocando el respaldo que quieres leer. CANCUN"; 
      exit(); 
   } 
    return $conn; 
}
function Connectmid() 
{ 
 if (!($conn=ibase_connect("D:/SAE50/08MID/MID.fdb", "SYSDBA", "masterkey"))) 
   { 
      echo "Error!: No se pudo establecer conexion. Trata nuevamente borrando y colocando el respaldo que quieres leer. MERIDA";
      exit(); 
   } 
    return $conn; 
}
function Connectcuu() 
{ 
 if (!($conn=ibase_connect("D:/SAE50/09CUU/CUU.fdb", "SYSDBA", "masterkey"))) 
   { 
      echo "Error!: No se pudo establecer conexion. Trata nuevamente borrando y colocando el respaldo que quieres leer. CHIHUAHUA"; 
      exit(); 
   } 
    return $conn; 
}
function Connectqro() 
{ 
 if (!($conn=ibase_connect("D:/SAE50/10QRO/QRO.fdb", "SYSDBA", "masterkey"))) 
   { 
      echo "Error!: No se pudo establecer conexion. Trata nuevamente borrando y colocando el respaldo que quieres leer. QUERETARO"; 
      exit(); 
   } 
    return $conn; 
}
function Connecttgz() 
{ 
 if (!($conn=ibase_connect("D:/SAE50/11TGZ/TGZ.fdb", "SYSDBA", "masterkey"))) 
   { 
      echo "Error!: No se pudo establecer conexion. Trata nuevamente borrando y colocando el respaldo que quieres leer. TUXTLA"; 
      exit(); 
   } 
    return $conn; 
}
function Connecttij() 
{ 
 if (!($conn=ibase_connect("D:/SAE50/12TIJ/TIJ.fdb", "SYSDBA", "masterkey"))) 
   { 
      echo "Error!: No se pudo establecer conexion. Trata nuevamente borrando y colocando el respaldo que quieres leer. TIJUANA"; 
      exit(); 
   } 
    return $conn; 
}
function Connectluc() 
{ 
 if (!($conn=ibase_connect("D:/SAE50/13LUC/LUC.fdb", "SYSDBA", "masterkey"))) 
   { 
      echo "Error!: No se pudo establecer conexion. Trata nuevamente borrando y colocando el respaldo que quieres leer. LUCITE"; 
      exit(); 
   } 
    return $conn; 
}
function Inventarios() 
{ 
 if (!($conn=ibase_connect("D:/SAE50/Datos/INVENTARIOS.fdb", "SYSDBA", "masterkey"))) 
   { 
      ?>
 	 <script language='JavaScript'> 
     alert('ERROR DE CONEXION: VUELVE A GENERAR TU REPORTE'); 
	 window.location="indexexporta.php";
     </script>
	<?php 
   } 
    return $conn; 
}

?>
</body>
</html>
