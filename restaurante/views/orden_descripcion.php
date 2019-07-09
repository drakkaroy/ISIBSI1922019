<?php 
require_once('../utils/config.php');
include_once(PATH.'views/global/head.php'); 
require_once(PATH.'models/Orden.php');

$exist = false;

if(isset($_GET['orden'])){    
    $id = is_numeric($_GET['orden']) ? $_GET['orden'] : 0;      
    $ordenObject = new Orden();
    $orden = $ordenObject->getOrden($id);        
    if(isset($orden['id'])){
        $exist = true;
        $platillosObject = new Orden();
        $platillos = $platillosObject->getPlatillosByOrden($id);
    }        
}    
?>

<body>
    <?php include_once(PATH.'views/global/nav.php'); ?>

    <div class="container p-5">
        <div class="title">
            <h2 class="p-3">Orden N# <?php print $orden['id'] ?></h2>
        </div>  
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Fecha</th>
                <th scope="col">Hora</th>
                <th scope="col">Mesa</th>
                <th scope="col">Cliente</th>
                <th scope="col">Estado</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row"><?php print $orden['id']; ?></th>
                <td><?php print $orden['fecha']; ?></td>
                <td><?php print $orden['hora']; ?></td>
                <td><?php print $orden['mesa']; ?></td>
                <td><?php print $orden['nombre']; ?></td>
                <td><?php print $orden['estado']; ?></td>
            </tr>   
            </tbody>
        </table>

        <div class="title">
            <h2 class="p-3">Platillos</h2>
        </div>  
        <table class="table table-striped">
            <tbody>            
            <?php foreach($platillos as $platillo){ ?>
            <tr>
                <td><?php print $platillo['nombre']; ?></td>
                <td><?php print $platillo['precio']; ?></td>
                <td><?php print $platillo['descripcion']; ?></td>
            </tr>   
            <?php } ?>            
            </tbody>
        </table>

        <h4><a href="ordenes.php"><i class="fas fa-arrow-circle-left"></i>Volver</a></h4>

    </div>

    <?php include_once(PATH.'views/global/footer.php'); ?>

</body>





