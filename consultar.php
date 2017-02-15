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
        <title>Consultar</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../Index Consultes/css/consulta.css" rel="stylesheet" type="text/css"/>
        <link href="css/consulta.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="jquery-1.js"></script>
        <script src="consultascript.js" type="application/javascript"></script>
    </head>
    <body>
        <?php
        ?>

        <div class="logeo" align="left"> <b>Usuario:  <?php echo $usuario; ?> </b>
            <a class="tornar" href="indexc.php">regresar</a>
            <br>
        </div>
        <div align="center">

            <div class="cabecera"><div id="left">INFO CONSULTA</div>
            </div><br>
            <!--TODOS LOS DATOS -->
            <div class="recuadroConsul">
                <div id="recuadrodatos">                    
                    <?php
                    $urll = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING'];
                    $cod = base64_encode($urll);
                    $idconsulta = $_GET["consulid"];
                    $consulta = mysql_query("select id_consulta as consulid,tipo_consulta as tipoc,tipo_modalidad as modalidad,DATE_FORMAT(fecha_creacion,'%H:%i %d/%m/%Y') as fechacreada,descripcion as descrip,nombre as nombre,email as email,telf as telf,idioma as idioma,usuario_creado as user,localidad as localidad,curso as curso,capacidad_aula capac,dia_alquiler as dias from consulta WHERE id_consulta='" . $idconsulta . "'") or die("no se puede conectar ni recibir valores");
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
                    echo "<td><label class='bold'>Nombre:</label> " . $registro->nombre . "</td>";
                    echo "<td><label class='bold'>Telf:</label> " . $registro->telf . "</td>";
                    echo "<td><label class='bold'>Email:</label> " . $registro->email . "</td>";
                    echo "<td><label class='bold'>Idioma:</label> " . $registro->idioma . "</td>";
                    echo "<td><label class='bold'>Localidad:</label> " . $registro->localidad . "</td>";
                    echo"</table>";
                    echo"<h1>Informaci&#243;n de la Consulta</h1>";
                    echo"<table>";
                    if($registro->tipoc == "Reglada"){
                      echo "<td><label class='bold'>Tipo de Consulta:</label><br> " . $registro->tipoc . "</td>";
                      echo "<td><label class='bold'>Tipo de Modalidad:</label><br> " . $registro->modalidad . "</td>";
                      echo "<td><label class='bold'>Formaci&#243;n:</label><br> " . $registro->curso . "</td>";                    
                    }
                     if($registro->tipoc == "No Reglada"){
                       echo "<td><label class='bold'>Tipo de Consulta:</label><br> " . $registro->tipoc . "</td>";
                      echo "<td><label class='bold'>Tipo de Modalidad:</label><br> " . $registro->modalidad . "</td>";
                      echo "<td><label class='bold'>Formaci&#243;n:</label><br> " . $registro->curso . "</td>"; 
                    }
                     if($registro->tipoc == "Opos"){
                         echo "<td><label class='bold'>Tipo de Consulta:</label><br> " . $registro->tipoc . "</td>";
                       echo "<td><label class='bold'>Formaci&#243;n:</label><br> " . $registro->curso . "</td>"; 
                    }
                     if($registro->tipoc == "Alquiler"){
                         echo "<td><label class='bold'>Capacidad Aula:</label><br> " . $registro->capac . "</td>"; 
                         echo "<td><label class='bold'>Dias:</label><br> " . $registro->dias . "</td>"; 
                         echo "<td><label class='bold'>Horario:</label><br>fdasfsa</td>";
                       
                    }
                    echo"</table>";
                     echo"<br>";
                    echo"<table class='descriptd'>";
                    echo "<td><label class='bold'>Descripci&#243;n:</label><br> " . $registro->descrip . "</td>";
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
                <p></p>
                <form id="idform" enctype="multipart/form-data" action="updateConsulta.php" method="GET">
                    <label>Descripci&#243;n de la consulta</label><br><br> <textarea name='actu' rows="2" cols="45" autocomplete="off" required></textarea><br><br>
                    <input type="hidden" name="consulid" value="<?php echo $idconsulta; ?>">
                    <input type="hidden" name="volver" value="<?php echo $cod; ?>">
                    <input value="Actualizar" style="font-weight:bold;font-size:20px;height: 35px; width: 150px" type="submit">
                </form>      
            </div>
            <br><br>
            <a href="javascript:void(0)" onclick="document.getElementById('light').style.display = 'block';document.getElementById('fade').style.display = 'block'"><button style="font-weight:bold;font-size:20px;height: 35px; width: 250px">Cerrar Consulta</button></a>
            <div id="light" class="white_content">
                <a href="javascript:void(0)" onclick="document.getElementById('light').style.display = 'none';document.getElementById('fade').style.display = 'none'"><img id="cerrarventana" src="IMG/close.png" alt=""/></a>
                <h1>Soluci&#243;n</h1><br>
                <form id="idform" enctype="multipart/form-data" action="solu.consulta.php" method="GET">
                    <label>Descripci&#243;n de la soluci&#243;n:</label><br><textarea name='solu' rows="2" cols="45" autocomplete="off" required></textarea>
                    <input type="hidden" name="consulid" value="<?php echo $idconsulta; ?>">
                    <p></p>
                    <p></p>
                    <p></p>
                    <input value="Cerrar Consulta" style="font-weight:bold;font-size:20px;height: 35px; width: 250px" type="submit">
                </form>
            </div>
            <div id="fade" class="black_overlay"></div>
            <div class="pie" align="center">
                <a href="indexc.php">Regresar</a><br>
            </div>
    </body>
</html>