<?php
include '../models/Platillo.php';
require_once('../utils/Tools.php');

$tools = new Tools();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if ( $tools->isSet($_POST['nombre']) 
    && $tools->isSet($_POST['precio']) 
    && $tools->isSet($_POST['descripcion']) 
    && $tools->isSet($_POST['presentacion']) ){

        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $presentacion = $_POST['presentacion'];

        if ( !is_numeric($precio) ) {
            die('Error: Invalid price!');
        }                            

        $platillo = new Platillo();

        $platillo->setNombre($nombre);
        $platillo->setPrecio($precio);
        $platillo->setDescripcion($descripcion);
        $platillo->setPresentacion($presentacion);

        if($platillo->save()){
            header("Location: ../views/platillos.php");
        }

    } else {
        die('Error: Some fields are empty');
    }
} else if($_SERVER['REQUEST_METHOD'] == 'GET' && count($_GET) >= 1){
    
    if(isset($_GET['r'])){
        $request = $_GET['r'];
        if($request == 'remove' && isset($_GET['id'])){

            $id = is_numeric($_GET['id']) ? $_GET['id'] : 0;  
                  
            $platilloObject = new Platillo();
            $platillo = $platilloObject->deletePlatillo($id);
            
            header("Location: ../views/platillos.php");

        }
        if($request == 'edit' && isset($_GET['id'])){

            if ( $tools->isSet($_GET['nombre']) 
                && $tools->isSet($_GET['precio']) 
                && $tools->isSet($_GET['descripcion']) 
                && $tools->isSet($_GET['presentacion']) ){

                    $nombre = $_GET['nombre'];
                    $precio = $_GET['precio'];
                    $descripcion = $_GET['descripcion'];
                    $presentacion = $_GET['presentacion'];

                    if ( !is_numeric($precio) ) {
                        die('Error: Invalid price!');
                    }                            

                    $platillo = new Platillo();

                    $platillo->setNombre($nombre);
                    $platillo->setPrecio($precio);
                    $platillo->setDescripcion($descripcion);
                    $platillo->setPresentacion($presentacion);

                    $platillo->updatePlatillo($_GET['id']);

                    header("Location: ../views/platillos.php");

                } else {
                    die('Error: Some fields are empty');
                }            
        }
    }
} else {
    die('Error: Invalid request!');
}

