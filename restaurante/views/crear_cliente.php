<!DOCTYPE html>
<html lang="en">
<?php 
    require_once('../utils/config.php');
    include_once(PATH.'views/global/head.php'); 
    require_once(PATH.'models/Cliente.php');

    $exist = false;

    if(isset($_GET['id'])){
        $id = is_numeric($_GET['id']) ? $_GET['id'] : 0;        
        $clienteObject = new Cliente();
        $cliente = $clienteObject->getCliente($id);        
        if(isset($cliente['id'])){
            $exist = true;
        }        
    }
?>

<body>
    <?php include_once(PATH.'views/global/nav.php'); ?>

    <div class="container p-5">
        <h2 class="p-3">Agregar Cliente</h2>
        <?php 

            if($exist){
                print '<form action="../controllers/clientes.php" method="GET">';
                print '<input type="hidden" name="r" value="edit">';
                print '<input type="hidden" name="id" value="'.$cliente['id'].'">';
            } else {
                print '<form action="../controllers/clientes.php" method="POST">';
            }
        ?>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php print $exist ? $cliente['nombre'] : '' ?>" required>
            </div>

            <div class="form-group">
                <label for="cedula">Cédula:</label>
                <input type="number" class="form-control" id="cedula" name="cedula" value="<?php print $exist ? $cliente['cedula'] : '' ?>" required>
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="<?php print $exist ? $cliente['telefono'] : '' ?>" required>
            </div>

            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="email" class="form-control" id="correo" name="correo" value="<?php print $exist ? $cliente['correo'] : '' ?>" required>
            </div>

            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" class="form-control" id="direccion" name="direccion" value="<?php print $exist ? $cliente['direccion'] : '' ?>">
            </div>

            <div class="form-group">
                <label for="provincia">Provincia:</label>
                <input type="text" class="form-control" id="provincia" name="provincia" value="<?php print $exist ? $cliente['provincia'] : '' ?>" required>
            </div>

            <div class="form-group">
                <label for="canton">Cantón:</label>
                <input type="text" class="form-control" id="canton" name="canton" value="<?php print $exist ? $cliente['canton'] : '' ?>" required>
            </div>

            <div class="form-group">
                <label for="distrito">Distrito:</label>
                <input type="text" class="form-control" id="distrito" name="distrito" value="<?php print $exist ? $cliente['distrito'] : '' ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>

        </form>
    </div>
    

    <?php include_once(PATH.'views/global/footer.php'); ?>
</body>

</html>





