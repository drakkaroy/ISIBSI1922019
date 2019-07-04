<?php

include 'Db.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurante";

// $conn = new mysqli($servername, $username, $password, $dbname);

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } else {
//     echo "Connected successfully";
// }

$sql = "INSERT INTO clientes (nombre, cedula, telefono, correo, direccion, provincia, canton, distrito)
VALUES ('Rafael Monroy', '112500420', '88925162', 'drakkaroy@gmail.com', 'barrio la granja', 'sna jose', 'desamparados', 'san rafael arriba')";

// if ($conn->query($sql) === TRUE) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

// $conn->close();

$db = new Db($servername, $username, $password, $dbname);


$insert = $db->query($sql);
echo $insert->affectedRows();

$db->close();

//echo $db->query_count;

