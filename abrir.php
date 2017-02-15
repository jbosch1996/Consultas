<?php

include ("config.php");

function conectar() {

    global $HOSTNAME, $USERNAME, $PASSWORD, $DATABASE, $TABLA;

    $idcnx = mysql_connect($HOSTNAME, $USERNAME, $PASSWORD) or DIE(mysql_error());

    mysql_select_db($DATABASE, $idcnx);

    return $idcnx;
}

function desconectar() {
    global $HOSTNAME, $USERNAME, $PASSWORD, $DATABASE, $TABLA;

    $idcnx = mysql_connect($HOSTNAME, $USERNAME, $PASSWORD) or DIE(mysql_error());

    mysql_select_db($DATABASE, $idcnx);

    mysql_close($idcnx);
}

function getColoumn($table) {
    $result = mysql_query("SHOW COLUMNS FROM " . $table);
    if (!$result) {
        echo 'Could not run query: ' . mysql_error();
    }
    $fieldnames = array();
    if (mysql_num_rows($result) > 0) {
        while ($row = mysql_fetch_assoc($result)) {
            $fieldnames[] = $row['Field'];
        }
    }

    return $fieldnames;
}

function getdades($table, $codi, $valor) {
    $result = mysql_query("SHOW COLUMNS FROM " . $table);
    if (!$result) {
        echo 'Could not run query: ' . mysql_error();
    }
    $fieldnames = array();
    if (mysql_num_rows($result) > 0) {
        while ($row = mysql_fetch_assoc($result)) {
            $fieldnames[] = $row['Field'];
        }
    }

    //$result_valor = mysql_query("SELECT * FROM ".$table." WHERE (".$codi." = '".$valor."'"));

    $result_valor = mysql_query("SELECT * FROM $table WHERE ($codi LIKE '$valor')");

    if (!$result_valor) {
        echo 'Could not run query: ' . mysql_error();
    }

    $row_valor = mysql_fetch_row($result_valor);

    $dades = array();

    $conta = 0;

    while (isset($fieldnames[$conta])) {

        $dades[$fieldnames[$conta]] = $row_valor[$conta];

        $conta = $conta + 1;
    };


    return $dades;
}

?>