<?php 
require_once('../utils/config.php');
include_once(PATH.'views/global/head.php'); 
require_once(PATH.'models/Platillo.php');

    $platillos = new Platillo();
    $lista = $platillos->getPlatillos();
?>

<body>
    <?php include_once(PATH.'views/global/nav.php'); ?>

    <div class="container p-5">
        <div class="title">
            <h2 class="p-3">Lista de Platillos</h2>
            <a href="crear_platillo.php">Agregar Nuevo <i class="fas fa-plus"></i></a>
        </div>  
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
                <th scope="col">Descripción</th>
                <th scope="col">Presentación</th>
                <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($lista as $platillo){ ?>
                <tr>
                    <th scope="row"><?php print $platillo['id']; ?></th>
                    <td><?php print $platillo['nombre']; ?></td>
                    <td><?php print $platillo['precio']; ?></td>
                    <td><?php print $platillo['descripcion']; ?></td>
                    <td><?php print $platillo['presentacion']; ?></td>
                    <td>
                        <a href="crear_platillo.php?id=<?php print $platillo['id']; ?>"><i class="fas fa-edit"></i></i></a>
                        <a href="../controllers/platillos.php?r=remove&id=<?php print $platillo['id']; ?>"><i class="fas fa-trash-alt"></i></a>                        
                    </td>
                </tr>    
                <?php } ?>    
            </tbody>
        </table>
    </div>

    <?php include_once(PATH.'views/global/footer.php'); ?>

</body>





