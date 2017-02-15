<!--ACTUALIZACIÓN DE LA CONSULTA-->
<?php
include ("abrir.php");
$codif=$_GET['volver'];
$decod=base64_decode($codif);
conectar();
$usuario = $_SESSION["usuario"];
$date = new DateTime();
$rdate = $date->format('Y-m-d H:i:s');
$consulta = mysql_query("insert into actu_consulta (usuario_actu,fecha_actu,descripcion,id_consulta) values('".$usuario."','".$rdate."','". $_GET['actu']."','".$_GET["consulid"]."')");

if (!$consulta) {
    die('No pudo conectarse: ' . mysql_error());
}
echo 'Conectado satisfactoriamente';
desconectar();
header("Location: ".$decod);
?>