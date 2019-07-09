<?php 
require_once('../utils/config.php');
include_once(PATH.'views/global/head.php'); 
require_once(PATH.'models/Orden.php');

    $ordenes = new Orden();
    $lista = $ordenes->getOrdenes();
?>

<body>
    <?php include_once(PATH.'views/global/nav.php'); ?>

    <div class="container p-5">
        <div class="title">
            <h2 class="p-3">Lista de Ordenes</h2>
            <a href="crear_orden.php">Agregar Nuevo <i class="fas fa-plus"></i></a>
        </div>  
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Fecha</th>
                <th scope="col">Hora</th>
                <th scope="col">Mesa</th>
                <th scope="col">Cliente</th>
                <th scope="col">Platillos</th>
                <th scope="col">Estado</th>
                <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($lista as $orden){ ?>
                <tr>
                    <th scope="row"><?php print $orden['ordenid']; ?></th>
                    <td><?php print $orden['fecha']; ?></td>
                    <td><?php print $orden['hora']; ?></td>
                    <td><?php print $orden['mesa']; ?></td>
                    <td><?php print $orden['nombre']; ?></td>
                    <td><a href="orden_descripcion.php?orden=<?php print $orden['ordenid']; ?>">Ver platillos</a></td>
                    <td><?php print $orden['estado']; ?></td>
                    <td>
                        <a href="crear_orden.php?id=<?php print $orden['id']; ?>"><i class="fas fa-edit"></i></i></a>
                        <a href="../controllers/ordenes.php?r=remove&id=<?php print $orden['id']; ?>"><i class="fas fa-trash-alt"></i></a>                        
                    </td>
                </tr>    
                <?php } ?>    
            </tbody>
        </table>
    </div>

    <?php include_once(PATH.'views/global/footer.php'); ?>

</body>





