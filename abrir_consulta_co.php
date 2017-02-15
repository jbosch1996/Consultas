<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 include ("abrir.php");
conectar();
$usuario = $_SESSION["usuario"];
$consulta = mysql_query("update consulta SET estado_consulta='0' WHERE id_consulta='".$_POST["consulid"]."'");

if (!$consulta) {
    die('No pudo conectarse: ' . mysql_error());
}
echo 'Conectado satisfactoriamente';
desconectar();
header('Location: indexc.php');
?>