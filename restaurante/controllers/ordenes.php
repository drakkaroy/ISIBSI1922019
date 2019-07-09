<?php
include '../models/Orden.php';
include '../models/Platillo.php';
require_once('../utils/Tools.php');

$tools = new Tools();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if ( $tools->isSet($_POST['fecha']) 
    && $tools->isSet($_POST['hora']) 
    && $tools->isSet($_POST['mesa']) 
    && $tools->isSet($_POST['cliente']) 
    && $tools->isSet($_POST['platillos']) 
    && $tools->isSet($_POST['estado']) ){

        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $mesa = $_POST['mesa'];
        $cliente = $_POST['cliente'];
        $platillos = $_POST['platillos'];
        $estado = $_POST['estado'];

        if ( !is_numeric($mesa) ) {
            die('Error: Invalid mesa!');
        }                            

        $orden = new Orden();

        $orden->setFecha($fecha);
        $orden->setHora($hora);
        $orden->setMesa($mesa);
        $orden->setCliente($cliente);
        $orden->setEstado($estado);

        $latestOrden =  $orden->save();
            
        $platilloObject = new Orden();

        if($platilloObject->savePlatillosByOrden($latestOrden['id'], $platillos)){
            header("Location: ../views/ordenes.php");
        }

    } else {
        die('Error: Some fields are empty');
    }
} else if($_SERVER['REQUEST_METHOD'] == 'GET' && count($_GET) >= 1){
    
    if(isset($_GET['r'])){
        $request = $_GET['r'];
        if($request == 'remove' && isset($_GET['id'])){

            $id = is_numeric($_GET['id']) ? $_GET['id'] : 0;  
                  
            $ordenObject = new Orden();
            $orden = $ordenObject->deleteCliente($id);                
            
            header("Location: ../views/ordenes.php");

        }
        if($request == 'edit' && isset($_GET['id'])){

            if ( $tools->isSet($_POST['fecha']) 
                && $tools->isSet($_POST['hora']) 
                && $tools->isSet($_POST['mesa']) 
                && $tools->isSet($_POST['cliente']) 
                && $tools->isSet($_POST['platillos']) 
                && $tools->isSet($_POST['estado']) ){

                    $fecha = $_POST['fecha'];
                    $hora = $_POST['hora'];
                    $mesa = $_POST['mesa'];
                    $cliente = $_POST['cliente'];
                    $platillos = $_POST['platillos'];
                    $estado = $_POST['estado'];

                    if ( !is_numeric($mesa) ) {
                        die('Error: Invalid mesa!');
                    }                            

                    $orden = new Orden();

                    $orden->setFecha($fecha);
                    $orden->setHora($hora);
                    $orden->setMesa($mesa);
                    $orden->setCliente($cliente);
                    $orden->setPlatillos($platillos);
                    $orden->setEstado($estado);

                    $cliente->updateOrden($_GET['id']);

                    header("Location: ../views/ordenes.php");

                } else {
                    die('Error: Some fields are empty');
                }            
        }
    }
} else {
    die('Error: Invalid request!');
}

