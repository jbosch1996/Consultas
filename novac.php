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
        <title>Nueva Consulta</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../Index Consultes/css/consulta.css" rel="stylesheet" type="text/css"/>
        <link href="css/consulta.css" rel="stylesheet" type="text/css"/>
        <script src="jquery-1.js" type="text/javascript"></script>
        <script src="consultascript.js" type="application/javascript"></script>
    </head>
    <body>
    <div class="logeo" align="left"> <b>Usuario:  <?php echo $usuario; ?> </b>
        <a class="tornar" href="indexc.php">regresar</a>
        <br>
    </div>
        <!--Div Global-->
        <div align="center">
            <!--Header-->
            <div class="cabecera"><div id="left">NUEVA CONSULTA</div>
            </div><br>
            <!--Inicio Form-->
            <form id="idform" enctype="multipart/form-data" action="add.consulta.php" method="POST">
                <!--Tabla de datos personales-->
                <div class="tabla">
                    <!--Datos-->
                    <h1>Datos Personales</h1>
                    <div style="text-align:left" id="divnom">
                        <!--Nombre con input text-->
                        Nombre:<br> <input name="nombrec" size="20" type="text" autocomplete="off" required><br>
                    </div>
                    <p></p>                 
                    <div class="bloque">
                        <!--Telefono con input text-->
                        Tel&#233;fono:<br> <input name="telf" type="number" size="24" min="111111111" max="999999999" autocomplete="off" required>
                    </div>
                    &nbsp;
                    <div class="bloque">
                        <!--Email con input text-->
                        Email:<br> <input name="email" size="20" type="email"  autocomplete="off" required>
                    </div>
                    <br>
                    <p></p>
                    <div class="bloque">
                        <!--Localidades con list-->
                        Localidad:<br> <select name="localidad" autocomplete="off" required>
                            <option disabled selected value> ------- Selecciona------ </option>
                            <option value="Andaluc&#237;a">Andaluc&#237;a</option>
                            <option value="Arag&#243;n">Arag&#243;n</option>
                            <option value="Asturias">Asturias</option>
                            <option value="Islas Baleares">Islas Baleares</option>
                            <option value="Canarias">Canarias</option>
                            <option value="Cantabria">Cantabria</option> 
                            <option value="Castilla-La Mancha">Castilla-La Mancha</option>
                            <option value="Castilla y Le&#243;n">Castilla y Le&#243;n</option>
                            <option value="Catalu&#241;a">Catalu&#241;a</option>
                            <option value="Comunidad Valenciana">Comunidad Valenciana</option>                                   
                            <option value="Extremadura">Extremadura</option>
                            <option value="Galicia">Galicia</option>
                            <option value="La Rioja">La Rioja</option>
                            <option value="Madrid">Madrid</option>
                            <option value="Navarra">Navarra</option>
                            <option value="Pa&#237;s Vasco">Pa&#237;s Vasco</option>                                                                     
                            <option value="Regi&#243;n de M&#250;rcia">Regi&#243;n de M&#250;rcia</option>
                            <option value="Ceuta">Ceuta</option>
                            <option value="Melilla">Melilla</option>                                   
                        </select>
                    </div>
                    &nbsp;
                    <div class="bloque">
                        <!--CP con input text-->
                        C&#243;digo Postal:<br><input name="cp" size="20" type="text" autocomplete="off">
                    </div>
                    <br>
                    <br>
                    <!--Idioma con radio-->
                    <br>Idioma:<br> 
                    <input type="radio" name="idioma" value="Catal&#225;n" required>Catal&#225;n
                    <input type="radio" name="idioma" value="Castellano">Castellano
                    <input type="radio" name="idioma" value="Ingl&#233;s">Ingl&#233;s
                    <p></p>
                    <br>
                    <!--Tipo de consulta con radio-->
                    Medio de consulta:<br>
                    <input id="inputweb" type="radio" name="medioc" value="Web" onclick="inputrequired()"required>Web
                    <input id="inputelf"type="radio" name="medioc" value="Tel&#233;fono" onclick="inputrequired()">Tel&#233;fono
                    <input id="inputpres" type="radio" name="medioc" value="Presencial" onclick="inputrequired()">Presencial
                    <input id="inputemail" type="radio" name="medioc" value="Email" onclick="inputrequired()">Email<br>
                    <div id="divcodweb" style="display:none"><input id="codinput"type="number" name="codweb" placeholder="Introduce el CodWeb" autocomplete="off"></div>

                    <!--Fin tabla Datos personales-->
                </div>
                <!--Inicio tabla Consulta-->
                <div class="tabla">
                    <!--Consulta-->
                    <h1>Consulta</h1>
                    <!--Los 4 radio con javascript-->
                    <input id="mostrar" name="tipoc" type="radio" value="Reglada" onclick="regladarequired()" required>Reglada

                    <input id="mostrar2" name="tipoc" type="radio"  value="No Reglada" onclick="regladarequired()">No Reglada

                    <input id="mostrar3" name="tipoc" type="radio" value="Alquiler" onclick="regladarequired()">Alquiler

                    <input id="mostrar4" name="tipoc" type="radio" value="Opos" onclick="regladarequired()">Opos

                    <input id="mostrar5" name="tipoc" type="radio" value="Otros" onclick="regladarequired()">Otros
                    <br>
                    <!--Div reglada con display:none-->
                    <div id="consulta">           

                    </div>
                    <br><br>  
                    <!--Boton Submit to add.consulta.php-->
                </div>
                <br><br>
                <input value="A&#241;adir" style="font-weight:bold;font-size:20px;height: 35px; width: 100px" type="submit">
            </form>
            <div class="pie" align="center">
                <a href="indexc.php">Regresar</a><br>
            </div>
        </div>
    </body>
</html>