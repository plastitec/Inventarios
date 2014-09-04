<?php
include ("findinv.php");
$conexion = new Buscador;
$q = $_GET['q'];
$conexion->Buscarsuc($q);
?>
