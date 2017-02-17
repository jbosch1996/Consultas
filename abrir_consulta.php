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
        <title>Consultar</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../Index Consultes/css/consulta.css" rel="stylesheet" type="text/css"/>
        <link href="css/consulta.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="jquery-1.js"></script>
        <script src="consultascript.js" type="application/javascript"></script>
    </head>
    <body>
        <div class="logeo" align="left"> <b>Usuario: </b><?php echo $usuario; ?>
            <a href="consul.cerrada.php" class="tornar">regresar</a>
            <br>
        </div>
        <div align="center">

            <div class="cabecera"><div id="left">INFO CONSULTA</div>
            </div><br>
            <!--            DIV DATOS-->
            <div class="recuadroConsul">
                <div id="recuadrodatos">                    
                    <?php
                    $urll = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING'];
                    $cod = base64_encode($urll);
                    $idconsulta = $_POST["consulid"];
                    $consulta = mysql_query("select id_consulta as consulid,tipo_consulta as tipoc,tipo_modalidad as modalidad,DATE_FORMAT(fecha_creacion,'%H:%i %d/%m/%Y') as fechacreada,descripcion as descrip,nombre as nombre,email as email,telf as telf,idioma as idioma,usuario_creado as user,localidad as localidad,curso as curso,capacidad_aula capac,dia_alquiler as dias,solucion as solu from consulta WHERE id_consulta='" . $idconsulta . "'") or die("no se puede conectar ni recibir valores");
                    $registro = mysql_fetch_object($consulta);
                    echo"<h1>Datos Consulta</h1>";
                    echo "<div class='columna'>";
                    echo"<table>";
                    echo "<td><label class='bold'>ID Consulta:</label><br> " . $registro->consulid . "</td>";
                    echo "<td><label class='bold'>Creado Por:</label><br> " . $registro->user . "</td>";
                    echo "<td><label class='bold'>Fecha:</label><br> " . $registro->fechacreada . "</td>";
                    echo"</table>";
                    echo"<h1>Datos Consultante</h1>";
                    echo"<table>";
                    echo "<td><label class='bold'>Nombre:</label><br> " . $registro->nombre . "</td>";
                    echo "<td><label class='bold'>Telf:</label><br> " . $registro->telf . "</td>";
                    echo "<td><label class='bold'>Email:</label><br> " . $registro->email . "</td>";
                    echo "<td><label class='bold'>Idioma:</label><br> " . $registro->idioma . "</td>";
                    echo "<td><label class='bold'>Localidad:</label><br> " . $registro->localidad . "</td>";
                    echo"</table>";
                    echo"<h1>Informaci&#243;n de la Consulta</h1>";
                    echo"<table>";
                    if ($registro->tipoc == "Reglada") {
                        echo "<td><label class='bold'>Tipo de Consulta:</label><br> " . $registro->tipoc . "</td>";
                        echo "<td><label class='bold'>Tipo de Modalidad:</label><br> " . $registro->modalidad . "</td>";
                        echo "<td><label class='bold'>Formaci&#243;n:</label><br> " . $registro->curso . "</td>";
                    }
                    if ($registro->tipoc == "No Reglada") {
                        echo "<td><label class='bold'>Tipo de Consulta:</label><br> " . $registro->tipoc . "</td>";
                        echo "<td><label class='bold'>Tipo de Modalidad:</label><br> " . $registro->modalidad . "</td>";
                        echo "<td><label class='bold'>Formaci&#243;n:</label><br> " . $registro->curso . "</td>";
                    }
                    if ($registro->tipoc == "Opos") {
                        echo "<td><label class='bold'>Tipo de Consulta:</label><br> " . $registro->tipoc . "</td>";
                        echo "<td><label class='bold'>Formaci&#243;n:</label><br> " . $registro->curso . "</td>";
                    }
                    if ($registro->tipoc == "Alquiler") {
                        echo "<td><label class='bold'>Capacidad Aula:</label><br> " . $registro->capac . "</td>";
                        echo "<td><label class='bold'>Dias:</label><br> " . $registro->dias . "</td>";
                        echo "<td><label class='bold'>Horario:</label><br>fdasfsa</td>";
                    }
                    echo"</table>";
                    echo"<br>";
                    echo"<table class='descriptd'>";
                    echo "<td><label class='bold'>Descripci&#243;n:</label><br> " . $registro->descrip . "</td>";
                    echo"</table>";
                    echo"<br>";
                    echo"<table class='descriptd'>";
                    echo "<td><label class='bold'>Soluci&#243;n:</label><br> " . $registro->solu . "</td>";
                    echo"</table>";
                    echo "</div>";
                    ?>
                </div>
            </div>

            <!--            DIV ACTUALIZACIONES-->
            <div class="recuadroConsul">
                <h1>Actualizaciones</h1>
                <?php
                $consulta = mysql_query("SELECT DATE_FORMAT(fecha_actu,'%H:%i %d/%m/%Y') as fechactu,actu_consulta.descripcion as descrip,usuario_actu as usuario_actu FROM actu_consulta WHERE actu_consulta.id_consulta='" . $idconsulta . "' ORDER BY actu_consulta.fecha_actu DESC") or die("no se puede conectar ni recibir valores");
                ?>
                <table id="tablactu" style="font-size:12px;">
                    <tr><td>Nombre</td><td>Fecha</td><td>Descripci&#243;n</td></tr>
                    <?php
                    while ($registro = mysql_fetch_object($consulta)) {
                        echo "<tr class='tablecolor'>";
                        echo "<td>$registro->usuario_actu</td>";
                        echo "<td>$registro->fechactu</td>";
                        echo "<td><p>$registro->descrip</p></td>";
                        echo "</tr>";
                    }
                    desconectar();
                    ?>
                </table>         
        </div>
            <p></p>
             <form action="abrir_consulta_co.php" method="POST">
                <input type="hidden" name="consulid" value="<?php echo $_POST["consulid"]; ?>">
                <?php
                if (strpos($permisos, "abrir") !== FALSE) {
                    echo ' <input type="submit" style="font-weight:bold;font-size:20px;height: 35px; width: 250px" value="Abrir Consulta">';
                }
                ?>
            </form>
        <br><br>
        <div class="pie" align="center">
            <a href="consul.cerrada.php">Regresar</a><br>
        </div>
    </body>
</html>