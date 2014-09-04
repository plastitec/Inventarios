<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<?php

function cmp($a, $b)
{
    return strcmp($a["fruta"], $b["fruta"]);
}

$num=0;

while($num<=5){
$frutas[$num]["fruta"] = "uvas";
$num=$num+1;
}

$frutas[0]["sabor"] = "dulce";
$frutas[1]["sabor"] = "agrio";
$frutas[2]["sabor"] = "feo";
$frutas[3]["sabor"] = "sin sabor";
$frutas[4]["sabor"] = "rico";
$frutas[5]["sabor"] = "ricossss";

usort($frutas, "cmp");

while (list($clave, $valor) = each($frutas)) {
    echo "\$frutas[$clave]: " . $valor["fruta"] . "\n" . $valor["sabor"] . "\n"."</br>";
}
/*
while ($id<=2){
	while ($id2<=2){
		$nombre='$'.'name'.$id;
		$profesion=$id.'profesion';

		echo $nombre . "</br>";
		
		if($id2==0){
		$shop[$id][$id2] = $nombre; 
		}
		if($id2==1){
		$shop[$id][$id2] = $profesion; 
		}
		$id2=$id2+1;
	}
	$id=$id+1;	
	$id2=0;		 
}			 

for ($row = 0; $row <= 2; $row++)
{
    echo "<li><b>The row number $row</b>";
    echo "<ul>";

    for ($col = 0; $col <= 1; $col++)
    {
        echo "<li>".$shop[$row][$col]."</li>";
    }

    echo "</ul>";
    echo "</li>";
}
echo "</ol>";
*/
/*echo "<strong>".$shop[0][0]." ".$shop[0][1]."</br>";
echo "<strong>".$shop[1][0]." ".$shop[1][1]."</br>";
echo "<strong>".$shop[2][0]." ".$shop[2][1]."</br>";

echo "<h1>Using loops to display array elements</h1>";*/
echo "</ol>";			 
 ?>
</body>
</html>
