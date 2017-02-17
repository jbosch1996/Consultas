<!--INSERTAR CONSULTA A LA BBDD-->
<?php
 include ("abrir.php");
conectar();
$usuario = $_SESSION["usuario"];
//IF PARA IGUALAR A 0 SI CODWEB ESTA VACÍO
if ($_POST['codweb'] == null) {
    $codWeb = 0;
} else {
    $codWeb = $_POST['codweb'];
}
if ($_POST['telf'] == null) {
    $telf = 0;
} else {
    $telf = $_POST['telf'];
}
//IF PARA IGUALAR A 0 SI CAPACIDAD AULA ESTA VACÍO
if (!isset($_POST['capac'])) {
    $capac = 0;
} else {
    $capac = $_POST['capac'];
}
//IF PARA INTRODUCIR EL ARRAY DE CICLOS CON COMAS EN SQL
if (isset($_POST['cic'])) {
    $ciclos = implode(',', $_POST['cic']);
} else {
    $ciclos = null;
}
//IF PARA INTRODUCIR EL ARRAY DE DIAS CON COMAS EN SQL
if (isset($_POST['dia'])) {
    $dias = implode(',', $_POST['dia']);
} else {
    $dias = null;
}
if (isset($_POST['horas'])) {
    $horas = $_POST['horas'];
} else {
    $horas = null;
}
if (!isset($_POST['solu'])) {
    $cerrada = 0;
} else {
    $cerrada = 1;
}

$date = new DateTime();
$rdate = $date->format('Y-m-d H:i:s');
if ($cerrada == 0) {
    $consulta = mysql_query("insert into consulta (usuario_creado,fecha_creacion,estado_consulta,nombre,email,localidad,cp,tipo_consulta,idioma,descripcion,codigo_web,curso,capacidad_aula,dia_alquiler,telf,tipo_contacto,tipo_modalidad,horario_alquiler) values ('".$usuario."','" . $rdate . "','" . $cerrada . "','" . $_POST['nombrec'] . "','" . $_POST['email'] . "','" . $_POST['localidad'] . "','" . $_POST['cp'] . "','" . $_POST['tipoc'] . "','" . $_POST['idioma'] . "','" . $_POST['desconsulta'] . "','" . $codWeb . "','" . $ciclos . "','" . $capac . "','" . $dias . "','" . $telf . "','" . $_POST['medioc'] . "','" . $_POST['tmod'] . "','".$horas."')");
}
if ($cerrada == 1) {
    $consulta = mysql_query("insert into consulta (usuario_creado,usuario_cerrado,fecha_cierre,fecha_creacion,estado_consulta,nombre,email,localidad,cp,tipo_consulta,idioma,descripcion,codigo_web,curso,capacidad_aula,dia_alquiler,telf,tipo_contacto,solucion,tipo_modalidad,horario_alquiler) values ('".$usuario."','".$usuario."','".$rdate."','" . $rdate . "','" . $cerrada . "','" . $_POST['nombrec'] . "','" . $_POST['email'] . "','" . $_POST['localidad'] . "','" . $_POST['cp'] . "','" . $_POST['tipoc'] . "','" . $_POST['idioma'] . "','" . $_POST['desconsulta'] . "','" . $codWeb . "','" . $ciclos . "','" . $capac . "','" . $dias . "','" . $telf . "','" . $_POST['medioc'] . "','" . $_POST['solu'] . "','" . $_POST['tmod'] . "','".$horas."')");
}

if (!$consulta) {
    die('No pudo conectarse: ' . mysql_error());
}
echo 'Conectado satisfactoriamente';
desconectar();
header('Location: indexc.php');
?>
