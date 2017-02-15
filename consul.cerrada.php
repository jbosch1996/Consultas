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
        <a class="tornar" href="indexc.php">regresar</a>
        <br>
    </div>
    <!--Div contiene todo lo restanter-->
    <div align="center">
        <!--Cabecera consultas con el boton de consultas cerradas-->
        <div class="cabecera"><div id="left">CONSULTAS CERRADAS</div></div><br>
        <!--Tabla de listado de consultas abiertas-->
        <div><h1>Listado Consultas Cerradas</h1><br>
            <p></p>
            <?php
            $consulta = mysql_query("SELECT consulta.id_consulta as consulid, consulta.tipo_consulta as consultatipo,DATE_FORMAT(fecha_creacion,'%H:%i %d/%m/%Y') as fechacreada,consulta.codigo_web as codigoweb,consulta.descripcion as descrip,consulta.solucion as solu,usuario_creado as usu_cre,usuario_cerrado as usu_cerr,DATE_FORMAT(fecha_cierre ,'%H:%i %d/%m/%Y') as fechacerrada,tipo_contacto as tipoc FROM consulta WHERE consulta.estado_consulta='1' ORDER BY consulta.fecha_creacion DESC") or die("no se puedde conectar ni recibir valores");
            ?>
            <table class="llistat" style="font-size:15px;">
                <tr class="token"><td>C&#243;digo Consulta</td><td>Consulta Sobre</td><td>Tipo Contacto</td><td>Fecha Creaci&#243;n</td><td>Fecha Cierre</td><td>Creada Por</td><td>Cerrada Por</td><td>Acci&#243;n</td></tr>
                <?php
                while ($registro = mysql_fetch_object($consulta)) {
                    echo "<tr>";
                    echo "<td>$registro->consulid</td>";
                    echo "<td>$registro->consultatipo</td>";
                    echo "<td>$registro->tipoc</td>";
                    echo "<td>$registro->fechacreada</td>";
                    echo "<td>$registro->fechacerrada</td>";
                    echo "<td>$registro->usu_cre</td>";
                    echo "<td>$registro->usu_cerr</td>";
                    echo "<td><form action='abrir_consulta.php' method='POST'><input type='hidden' name='consulid' value='$registro->consulid'><input type='hidden' name='tipoc' value='$registro->consultatipo'><input type='hidden' name='fechac' value='$registro->fechacreada'><input type='hidden' name='descrip' value='$registro->descrip'><input type='hidden' name='solu' value='$registro->solu'><input type='submit' value='Consultar'></form></td>";

                    echo "</tr>";
                }
                desconectar();
                ?>
            </table>
        </div>   
        <div class="pie" align="center">
            <a href="indexc.php">Regresar</a><br>
        </div>
    </div>
</body>
</html>
