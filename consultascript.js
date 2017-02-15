/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//REGLADA
function inputrequired() {

    if ($("#inputweb").is(':checked')) {
        $('#codinput').attr('required', true);
    } else {
        $('#codinput').removeAttr('required');
    }
}
;
function regladarequired() {

    if ($("#mostrar").is(':checked')) {
        $('#requiredMod').attr('required', true);
    } else {
        $('#requiredMod').removeAttr('required');
    }
}
function showsolucion() {
        $('input[name=radiocheck]').one('click', function () { 
        if ($('input[id=mostrarcheck]').is(':checked')) {
            var checksolu = $("<textarea id='divsolucion' name='solu' rows='2' cols='45' autocomplete='off' required></textarea>");
            $("#consulta").append(checksolu);
            
        }
    });
}
;
//var tipomod = $("<p></p><label>Tipo de modalidad<label><br><input id='requiredMod'type ='radio' name='tmod' value='Presencial'><label>Presencial</label> <input type ='radio' name='tmod' value='No Presencia'><label>No Presencial</label> <input type ='radio' name='tmod' value='Ambas'><label>Ambas</label><br><p></p>");
//var formacionregl = $("<label>Formación</label><br><div id='tamFormacion' align='left'> <input type ='checkbox' name='cic[]' value='CAI' class='cicselect'><label>CFGM-CAI</label><input type ='checkbox' name='cic[]' value='APSD' class='cicselect'><label>CFGM-APSD</label> <input type ='checkbox' name='cic[]' value='DIET' class='cicselect'><label>CFGS-DIET</label><input type ='checkbox' name='cic[]' value='IS' class='cicselect'><label>CFGS-IS</label><input type ='checkbox' name='cic[]' value='DAS' class='cicselect'><label>CFGS-DAS</label></div>");
//var ForNoregl = $("<p></p><label>Formaci&#243n</label></br><div align='left'><input type ='checkbox' name='cic[]' value='Acceso a Grado Superior' class='cicselect'><label>Acceso a Grado Superior</label><br><input type ='checkbox' name='cic[]' value='Acceso Universidad' class='cicselect'><label>Acceso Universidad</label><br></div>");
//var descripcion = $("<p></p><label>Descripci&oacute;n de la consulta</label><br> <textarea name='desconsulta' rows='2' cols='45' autocomplete='off'></textarea><br><p></p>");
//var alquiler = $("<br> <p></p><label>Capacidad Aula</label><br><input type='text' name='capac'><br><br><label>Dias</label><br><input type ='checkbox' name='dia[]' value='L' class='diaselect'><label>Lunes</label><input type ='checkbox' name='dia[]' value='M' class='diaselect'><label>Martes</label><input type ='checkbox' name='dia[]' value='MI' class='diaselect'><label>Mi&#233;rcoles</label><input type ='checkbox' name='dia[]' value='J' class='diaselect'><label>Jueves</label><input type ='checkbox' name='dia[]' value='V' class='diaselect'><label>Viernes</label><br><br>");
//var opos = $("<br><p></p><label>Formaci&#243n</label><br><div align='left'><input type ='checkbox' name='cic[]' value='Oposición Bombero' class='cicselect'>Oposici&#243;n Bombero<br><input type ='checkbox' name='cic[]' value='Oposición Auxiliar Infermeria' class='cicselect'><label>Oposici&#243;n Auxiliar Infermeria</label><br></div>");
//var checksolu = $("<textarea name='solu' rows='2' cols='45' autocomplete='off'></textarea>");

$(document).ready(function () { 
    window.onclick = inputrequired();
    window.onclick = regladarequired();

    $('input[name=tipoc]').click(function () {
        $("#consulta").empty();
        if (this.id == "mostrar") {
            var tipomod = $("<p></p><label>Tipo de modalidad<label><br><input id='requiredMod'type ='radio' name='tmod' value='Presencial' required><label>Presencial</label> <input type ='radio' name='tmod' value='No Presencial'><label>No Presencial</label> <input type ='radio' name='tmod' value='Ambas'><label>Ambas</label><br><p></p>");
            var formacionregl = $("<label>Formaci&#243;n</label><br><br><div id='tamFormacion'> <input type ='checkbox' name='cic[]' value='CAI' class='cicselect'><label>CFGM-CAI</label><input type ='checkbox' name='cic[]' value='APSD' class='cicselect'><label>CFGM-ASPD</label> <input type ='checkbox' name='cic[]' value='DIET' class='cicselect'><label>CFGS-DIET</label><br><input type ='checkbox' name='cic[]' value='IS' class='cicselect'><label>CFGS-IS</label><input type ='checkbox' name='cic[]' value='DAS' class='cicselect'><label>CFGS-DAS</label></div>");
            var descripcion = $("<p></p><label>Descripci&oacute;n de la consulta</label><br> <textarea name='desconsulta' rows='2' cols='45' autocomplete='off' required></textarea><br><p></p>");
            var solucion = $("<input id='mostrarcheck' name='radiocheck' type='checkbox'><label>Soluci&#243;n</label><br>");
            $("#consulta").append(tipomod);
            $("#consulta").append(formacionregl);
            $("#consulta").append(descripcion);
            $("#consulta").append(solucion);
            showsolucion();
        }
        if (this.id == "mostrar2") {
            var tipomod = $("<p></p><label>Tipo de modalidad<label><br><input id='requiredMod'type ='radio' name='tmod' value='Presencial' required><label>Presencial</label> <input type ='radio' name='tmod' value='No Presencial'><label>No Presencial</label> <input type ='radio' name='tmod' value='Ambas'><label>Ambas</label><br><p></p>");
            var ForNoregl = $("<p></p><label>Formaci&#243n</label></br><div align='left'><input type ='checkbox' name='cic[]' value='Acceso a Grado Superior' class='cicselect'><label>Acceso a Grado Superior</label><br><input type ='checkbox' name='cic[]' value='Acceso Universidad' class='cicselect'><label>Acceso Universidad</label><br></div>");
            var descripcion = $("<p></p><label>Descripci&oacute;n de la consulta</label><br> <textarea name='desconsulta' rows='2' cols='45' autocomplete='off' required></textarea><br><p></p>");
            var solucion = $("<input id='mostrarcheck' name='radiocheck' type='checkbox'><label>Soluci&#243;n</label><br>");
            $("#consulta").append(tipomod);
            $("#consulta").append(ForNoregl);
            $("#consulta").append(descripcion);
            $("#consulta").append(solucion);
            showsolucion();
        }

        if (this.id == "mostrar3") {
            var descripcion = $("<p></p><label>Descripci&oacute;n de la consulta</label><br> <textarea name='desconsulta' rows='2' cols='45' autocomplete='off' required></textarea><br><p></p>");
            var solucion = $("<div id='divsolu'><input id='mostrarcheck' name='radiocheck' type='checkbox'><label>Solución</label></div><div id='solucion' style='display:none'><label>Soluci&oacute;n de la consulta</label><br> <textarea name='solu' rows='2' cols='45' autocomplete='off'></textarea><br><p></p>");
            var alquiler = $("<br> <p></p><label>Capacidad Aula</label><br><input type='text' name='capac'><br><br><label>Dias</label><br><input type ='checkbox' name='dia[]' value='L' class='diaselect'><label>Lunes</label><input type ='checkbox' name='dia[]' value='M' class='diaselect'><label>Martes</label><input type ='checkbox' name='dia[]' value='MI' class='diaselect'><label>Mi&#233;rcoles</label><input type ='checkbox' name='dia[]' value='J' class='diaselect'><label>Jueves</label><input type ='checkbox' name='dia[]' value='V' class='diaselect'><label>Viernes</label><br><br>");
            var solucion = $("<input id='mostrarcheck' name='radiocheck' type='checkbox'><label>Soluci&#243;n</label><br>");
            $("#consulta").append(alquiler);
            $("#consulta").append(descripcion);
            $("#consulta").append(solucion);
            showsolucion();
        }
        if (this.id == "mostrar4") {
            var opos = $("<br><p></p><label>Formaci&#243n</label><br><div align='left'><input type ='checkbox' name='cic[]' value='Oposición Bombero' class='cicselect'>Oposici&#243;n Bombero<br><input type ='checkbox' name='cic[]' value='Oposición Auxiliar Infermeria' class='cicselect'><label>Oposici&#243;n Auxiliar Infermeria</label><br></div>");
            var descripcion = $("<p></p><label>Descripci&oacute;n de la consulta</label><br> <textarea name='desconsulta' rows='2' cols='45' autocomplete='off' required></textarea><br><p></p>");
            var solucion = $("<input id='mostrarcheck' name='radiocheck' type='checkbox'><label>Soluci&#243;n</label><br>");
            $("#consulta").append(opos);
            $("#consulta").append(descripcion);
            $("#consulta").append(solucion);
            showsolucion();
        }
        if (this.id == "mostrar5") {
           var descripcion = $("<p></p><label>Descripci&oacute;n de la consulta</label><br> <textarea name='desconsulta' rows='2' cols='45' autocomplete='off' required></textarea><br><p></p>");
            var solucion = $("<input id='mostrarcheck' name='radiocheck' type='checkbox'><label>Soluci&#243;n</label><br>");
            $("#consulta").append(descripcion);
            $("#consulta").append(solucion);
            showsolucion();
        };
    });

    $('input[name=medioc]').click(function () {
        if (this.id == "inputweb") {
            $("#divcodweb").show(600);
        } else {
            $("#divcodweb").hide('slow');
        }
    });


//dom ready handler
    jQuery(function ($) {
        //form submit handler
        $('#idform').submit(function (e) {
            //check atleat 1 checkbox is checked
            if (!$('.cicselect').is(':checked') && $('#mostrar').is(':checked')) {
                //prevent the default form submit if it is not checked
                alert("Escoge un curso");
                e.preventDefault();
            }
        })
    });
    jQuery(function ($) {
        //form submit handler
        $('#idform').submit(function (e) {
            //check atleat 1 checkbox is checked
            if (!$('.cicselect').is(':checked') && $('#mostrar2').is(':checked')) {
                //prevent the default form submit if it is not checked
                alert("Escoge un curso");
                e.preventDefault();
            }
        })
    });
    jQuery(function ($) {
        //form submit handler
        $('#idform').submit(function (e) {
            //check atleat 1 checkbox is checked
            if (!$('.cicselect').is(':checked') && $('#mostrar4').is(':checked')) {
                //prevent the default form submit if it is not checked
                alert("Escoge un curso");
                e.preventDefault();
            }
        })
    });

    jQuery(function ($) {
        //form submit handler
        $('#idform').submit(function (e) {
            //check atleat 1 checkbox is checked
            if (!$('.diaselect').is(':checked') && $('#mostrar3').is(':checked')) {
                //prevent the default form submit if it is not checked
                alert("Escoge un dia");
                e.preventDefault();
            }
        })
    });
});