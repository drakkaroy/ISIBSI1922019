<?php 
require_once('../utils/config.php');
include_once(PATH.'views/global/head.php'); 
require_once(PATH.'models/Cliente.php');

    $clientes = new Cliente();
    $lista = $clientes->getClientes();
?>

<body>
    <?php include_once(PATH.'views/global/nav.php'); ?>

    <div class="container p-5">
        <div class="title">
            <h2 class="p-3">Lista de Clientes</h2>
            <a href="crear_cliente.php">Agregar Nuevo <i class="fas fa-plus"></i></a>
        </div>        
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Cédula</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Correo</th>
                <!-- <th scope="col">Dirección</th> -->
                <!-- <th scope="col">Provincia</th>
                <th scope="col">Cantón</th>
                <th scope="col">Distrito</th> -->
                <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($lista as $cliente){ ?>
                <tr>
                    <th scope="row"><?php print $cliente['id']; ?></th>
                    <td><?php print $cliente['nombre']; ?></td>
                    <td><?php print $cliente['cedula']; ?></td>
                    <td><?php print $cliente['telefono']; ?></td>
                    <td><?php print $cliente['correo']; ?></td>
                    <!-- <td><?php //print $cliente['direccion']; ?></td>
                    <td><?php //print $cliente['provincia']; ?></td>
                    <td><?php //print $cliente['canton']; ?></td>
                    <td><?php //print $cliente['distrito']; ?></td> -->
                    <td>
                        <a href="crear_cliente.php?id=<?php print $cliente['id']; ?>"><i class="fas fa-edit"></i></i></a>
                        <a href="../controllers/clientes.php?r=remove&id=<?php print $cliente['id']; ?>"><i class="fas fa-trash-alt"></i></a>                        
                    </td>
                </tr>    
                <?php } ?>    
            </tbody>
        </table>
    </div>

    <?php include_once(PATH.'views/global/footer.php'); ?>

</body>





