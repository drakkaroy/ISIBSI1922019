<!DOCTYPE html>
<html lang="en">
<?php 
    require_once('../utils/config.php');
    include_once(PATH.'views/global/head.php'); 
    require_once(PATH.'models/Platillo.php');

    $exist = false;

    if(isset($_GET['id'])){
        $id = is_numeric($_GET['id']) ? $_GET['id'] : 0;        
        $platilloObject = new Platillo();
        $platillo = $platilloObject->getPlatillo($id);        
        if(isset($platillo['id'])){
            $exist = true;
        }        
    }
?>

<body>
    <?php include_once(PATH.'views/global/nav.php'); ?>

    <div class="container p-5">
    <h2 class="p-3">Agregar Platillo</h2>
        <?php 

            if($exist){
                print '<form action="../controllers/platillos.php" method="GET">';
                print '<input type="hidden" name="r" value="edit">';
                print '<input type="hidden" name="id" value="'.$platillo['id'].'">';
            } else {
                print '<form action="../controllers/platillos.php" method="POST">';
            }
        ?>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php print $exist ? $platillo['nombre'] : '' ?>" required>
            </div>

            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="text" class="form-control" id="precio" name="precio" value="<?php print $exist ? $platillo['precio'] : '' ?>" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php print $exist ? $platillo['descripcion'] : '' ?>" required>
            </div>

            <div class="form-group">
                <label for="presentacion">Presentación:</label>
                <input type="text" class="form-control" id="presentacion" name="presentacion" value="<?php print $exist ? $platillo['presentacion'] : '' ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>

        </form>
    </div>
    

    <?php include_once(PATH.'views/global/footer.php'); ?>
</body>

</html>





