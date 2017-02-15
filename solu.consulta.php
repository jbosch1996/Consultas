<!--SOLUCIÓN DE LA CONSULTA-->
<?php
 include ("abrir.php");
conectar();
$usuario = $_SESSION["usuario"];
$date = new DateTime();
$rdate = $date->format('Y-m-d H:i:s');
$consulta = mysql_query("update consulta SET solucion='".$_GET["solu"]."',usuario_cerrado='".$usuario."',fecha_cierre='".$rdate."',estado_consulta='1' WHERE id_consulta='".$_GET["consulid"]."'");

if (!$consulta) {
    die('No pudo conectarse: ' . mysql_error());
}
echo 'Conectado satisfactoriamente';
desconectar();
header('Location: indexc.php');
?>