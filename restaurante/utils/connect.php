<?php

include 'config.php';
include 'Db.php';

$sql = "INSERT INTO clientes (nombre, cedula, telefono, correo, direccion, provincia, canton, distrito)
VALUES ('Rafael Monroy', '112500420', '88925162', 'drakkaroy@gmail.com', 'barrio la granja', 'sna jose', 'desamparados', 'san rafael arriba')";

$db = new Db(SERVERNAME, USERNAME, PASSWORD, DBNAME);


$insert = $db->query($sql);
echo $insert->affectedRows();

$db->close();

//echo $db->query_count;

