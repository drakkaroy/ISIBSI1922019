<?php
include '../models/Cliente.php';
require_once('../utils/Tools.php');

$tools = new Tools();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if ( $tools->isSet($_POST['nombre']) 
    && $tools->isSet($_POST['cedula']) 
    && $tools->isSet($_POST['telefono']) 
    && $tools->isSet($_POST['correo']) 
    && $tools->isSet($_POST['provincia']) 
    && $tools->isSet($_POST['canton']) 
    && $tools->isSet($_POST['distrito']) ){

        $nombre = $_POST['nombre'];
        $cedula = $_POST['cedula'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $direccion = $_POST['direccion'];
        $provincia = $_POST['provincia'];
        $canton = $_POST['canton'];
        $distrito = $_POST['distrito'];

        if ( !is_numeric($cedula) || !$tools->checkEmail($correo) ) {
            die('Error: Invalid email or identification!');
        }                            

        $cliente = new Cliente();

        $cliente->setNombre($nombre);
        $cliente->setCedula($cedula);
        $cliente->setTelefono($telefono);
        $cliente->setCorreo($correo);
        $cliente->setDireccion($direccion);
        $cliente->setProvincia($provincia);
        $cliente->setCanton($canton);
        $cliente->setDistrito($distrito);

        if($cliente->save()){
            header("Location: ../views/clientes.php");
        }

    } else {
        die('Error: Some fields are empty');
    }
} else if($_SERVER['REQUEST_METHOD'] == 'GET' && count($_GET) >= 1){
    
    if(isset($_GET['r'])){
        $request = $_GET['r'];
        if($request == 'remove' && isset($_GET['id'])){

            $id = is_numeric($_GET['id']) ? $_GET['id'] : 0;  
                  
            $clienteObject = new Cliente();
            $cliente = $clienteObject->deleteCliente($id);                
            
            header("Location: ../views/clientes.php");

        }
        if($request == 'edit' && isset($_GET['id'])){
            //echo 'hay que editar el cliente: '.$_GET['id'];
            //header("Location: ../views/crear_cliente.php?id=".$_GET['id']);

            if ( $tools->isSet($_GET['nombre']) 
                && $tools->isSet($_GET['cedula']) 
                && $tools->isSet($_GET['telefono']) 
                && $tools->isSet($_GET['correo']) 
                && $tools->isSet($_GET['provincia']) 
                && $tools->isSet($_GET['canton']) 
                && $tools->isSet($_GET['distrito']) ){

                    $nombre = $_GET['nombre'];
                    $cedula = $_GET['cedula'];
                    $telefono = $_GET['telefono'];
                    $correo = $_GET['correo'];
                    $direccion = $_GET['direccion'];
                    $provincia = $_GET['provincia'];
                    $canton = $_GET['canton'];
                    $distrito = $_GET['distrito'];

                    if ( !is_numeric($cedula) || !$tools->checkEmail($correo) ) {
                        die('Error: Invalid email or identification!');
                    }                            

                    $cliente = new Cliente();

                    $cliente->setNombre($nombre);
                    $cliente->setCedula($cedula);
                    $cliente->setTelefono($telefono);
                    $cliente->setCorreo($correo);
                    $cliente->setDireccion($direccion);
                    $cliente->setProvincia($provincia);
                    $cliente->setCanton($canton);
                    $cliente->setDistrito($distrito);

                    $cliente->updateCliente($_GET['id']);

                    header("Location: ../views/clientes.php");

                } else {
                    die('Error: Some fields are empty');
                }            
        }
    }
} else {
    die('Error: Invalid request!');
}

