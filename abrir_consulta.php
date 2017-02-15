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
            <div class="recuadroConsul2">
                <div id="recuadrodatos">
                    <h1>Datos</h1>
                    <?php
                    $consulta = mysql_query("select id_consulta as consulid,tipo_consulta as tipoc,DATE_FORMAT(fecha_creacion,'%H:%i %d/%m/%Y') as fechacreada,descripcion as descrip,nombre as nombre,email as email,telf as telf,idioma as idioma,solucion as solu,usuario_cerrado as usuario_cerrado,usuario_creado as usuario_creado,localidad as localidad from consulta WHERE id_consulta='" . $_POST["consulid"] . "'") or die("no se puede conectar ni recibir valores");
                    $registro = mysql_fetch_object($consulta);
                    echo "<div class='colum1'>";
                    echo "<h2>ID:</h2> " . $registro->consulid . "";
                    echo "<h2>Tipo:</h2> " . $registro->tipoc . "";
                    echo "<h2>Fecha:</h2> " . $registro->fechacreada . "";
                    echo "<h2>Email:</h2> " . $registro->email . "";
                    echo "<h2>Creada por:</h2> " . $registro->usuario_creado . "";                    
                    echo "</div>";
                    echo "<div class='colum2'>";
                    echo "<h2>Nombre:</h2> " . $registro->nombre . "";
                    echo "<h2>Telf:</h2> " . $registro->telf . "";
                    echo "<h2>Localidad:</h2> " . $registro->localidad . "";
                    echo "<h2>Idioma:</h2> " . $registro->idioma . "";
                    echo "<h2>Cerrada por:</h2> " . $registro->usuario_cerrado . "";
                    echo "</div>";
                    desconectar();
                    ?>
                    <br>
                </div>
            </div>
            <div class="recuadroConsul2">
                <div id="recuadromedio">
                <?php
                    
                    echo "<h1>Descripci&#243;n:</h1> " . $registro->descrip . "";
                    echo "<h1>Soluci&#243;n:</h1> " . $registro->solu . "";
                    ?>
            </div>
            </div>
<!--            DIV ACTUALIZACIONES-->
            <div class="recuadroConsul2">
                <h1>Actualizaciones</h1>
                <?php
                conectar();
                $consulta = mysql_query("SELECT DATE_FORMAT(fecha_actu,'%H:%i %d/%m/%Y') as fechactu,actu_consulta.descripcion as descrip,usuario_actu as usuario_actu FROM actu_consulta WHERE actu_consulta.id_consulta='" . $_POST["consulid"] . "' ORDER BY actu_consulta.fecha_actu DESC") or die("no se puede conectar ni recibir valores");
                ?>
                <table style="font-size:12px;">
                    <tr><td>Nombre</td><td>Fecha</td><td>Descripci&#243;n</td></tr>
                    <?php
                    while ($registro = mysql_fetch_object($consulta)) {
                        echo "<tr>";
                        echo "<td>$registro->usuario_actu</td>";
                        echo "<td>$registro->fechactu</td>";
                        echo "<td><p>$registro->descrip</p></td>";
                        echo "</tr>";
                    }
                    desconectar();
                    ?>
                </table>
            </div><br>
            <p></p>
            <p></p>

<form action="abrir_consulta_co.php" method="POST">
                <input type="hidden" name="consulid" value="<?php echo $_POST["consulid"]; ?>">
                            <?php
            if (strpos($permisos, "abrir") !== FALSE) {
                echo ' <input type="submit" style="font-weight:bold;font-size:20px;height: 35px; width: 250px" value="Abrir Consulta">';
            }
            ?>
            </form>
        </div>
        <br><br>
        <div class="pie" align="center">
            <a href="consul.cerrada.php">Regresar</a><br>
        </div>
    </body>
</html>