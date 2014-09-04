<?php
include ("findinv.php");
$conexion = new Buscador;
$conexion->Conectar();
$q = $_GET['q'];
$conexion->Buscar($q);
?>