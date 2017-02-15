<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include ("abrir.php");
conectar();
$usuario = $_SESSION["usuario"];
$permisos = $_SESSION["permisos"];
?>
<html>
    <head>
        <title>Consultas</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/consulta.css" rel="stylesheet" type="text/css"/>
        <meta charset="UTF-8">
    </head>
    <!--Regresar-->
    <div class="logeo" align="left"> <b>Usuario:  <?php echo $usuario; ?> </b>
        <a class="tornar" href="../menu.php">regresar</a>
        <br>
    </div>
    <!--Div contiene todo lo restanter-->
    <div align="center">
        <!--Cabecera consultas con el boton de consultas cerradas-->
        <div class="cabecera"><div id="left">CONSULTAS</div>
            <div id="cerradas">
                <a href="consul.cerrada.php"><button>Consultas Cerradas</button></a>
            </div>
        </div><br>
        <br>
        <div id="nuevaCon">
            <!--Nueva consulta-->
            <a class="botons" href="novac.php" title="Nueva Consulta">Nueva Consulta &nbsp<img src="IMG/add.png" width="20" height="20" border="0px"></a><br>
        </div>
        <br>
        <!--Tabla de listado de consultas abiertas-->
        <div><h1>Listado Consultas Abiertas</h1>
            <br>
            <?php
            $consulta = mysql_query("SELECT consulta.id_consulta as consulid, consulta.tipo_consulta as consultatipo,
            DATE_FORMAT(fecha_creacion,'%H:%i %d/%m/%Y') as fechacreada,
            consulta.codigo_web as codigoweb,consulta.descripcion as descrip,consulta.codigo_web as coweb,
            consulta.tipo_contacto as tipoc,DATE_FORMAT(MAX(actu_consulta.fecha_actu),'%H:%i %d/%m/%Y') as fechactu 
            FROM consulta LEFT JOIN actu_consulta
            ON consulta.id_consulta=actu_consulta.id_consulta WHERE consulta.estado_consulta='0' GROUP BY consulta.id_consulta ORDER BY consulta.fecha_creacion ASC") or die("no se puedde conectar ni recibir valores");
            ?>
            <table class="llistat" style="font-size:15px;">
                <tr class="token"><td>C&#243;digo Consulta</td><td>Creaci&#243;n</td><td>&#218;ltima Actualizaci&#243;n</td><td>Tipo Contacto</td><td>Consulta Sobre</td><td>Acci&#243;n</td></tr>
                <?php
                while ($registro = mysql_fetch_object($consulta)) {
                    echo "<tr>";
                    echo "<td>$registro->consulid</td>";
                    echo "<td>$registro->fechacreada</td>";
                    if ($registro->fechactu == null) {
                        echo"<td>No se ha tramitado</td>";
                    } else {
                        echo "<td>$registro->fechactu</td>";
                    }
                    if ($registro->coweb != 0) {
                        echo "<td>Web : $registro->coweb</td>";
                    } else {
                        echo "<td>$registro->tipoc</td>";
                    }
                    echo "<td>$registro->consultatipo</td>";
                    echo "<td><form action='consultar.php' method='GET'><input type='hidden' name='consulid' value='$registro->consulid'><input type='submit' value='Consultar'></form></td>";
                    echo "</tr>";
                }
                desconectar();
                ?>
            </table>  
        </div>         
    </div>
    <div class="pie" align="center">
        <a href="../menu.php">Regresar</a><br>
    </div>
</body>
</html>
