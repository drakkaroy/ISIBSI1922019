<!DOCTYPE html>
<html lang="en">
<?php 
    require_once('../utils/config.php');
    include_once(PATH.'views/global/head.php'); 
    require_once(PATH.'models/Orden.php');
    require_once(PATH.'models/Cliente.php');
    require_once(PATH.'models/Platillo.php');

    $exist = false;

    if(isset($_GET['id'])){
        $id = is_numeric($_GET['id']) ? $_GET['id'] : 0;        
        $ordenObject = new Platillo();
        $platillo = $ordenObject->getOrden($id);        
        if(isset($orden['id'])){
            $exist = true;
        }        
    }

    $clientes = new Cliente();
    $lista = $clientes->getClientes();

    $platillos = new Platillo();
    $listaPlatillos = $platillos->getPlatillos();
?>

<body>
    <?php include_once(PATH.'views/global/nav.php'); ?>

    <div class="container p-5">
    <h2 class="p-3">Agregar Orden</h2>
        <?php 

            if($exist){
                print '<form action="../controllers/ordenes.php" method="GET">';
                print '<input type="hidden" name="r" value="edit">';
                print '<input type="hidden" name="id" value="'.$orden['id'].'">';
            } else {
                print '<form action="../controllers/ordenes.php" method="POST">';
            }
        ?>
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" class="form-control" id="fecha" name="fecha" value="<?php print $exist ? $orden['fecha'] : '' ?>" required>
            </div>

            <div class="form-group">
                <label for="hora">Hora:</label>
                <input type="time" class="form-control" id="hora" name="hora" value="<?php print $exist ? $orden['hora'] : '' ?>" required>
            </div>

            <div class="form-group">
                <label for="mesa">Mesa:</label>
                <input type="number" class="form-control" id="mesa" name="mesa" value="<?php print $exist ? $orden['mesa'] : '' ?>" required>
            </div>

            <div class="form-group">
                <label for="cliente">Cliente</label>
                <select class="form-control" id="cliente" name="cliente">
                    <?php foreach($lista as $cliente){ ?>
                    <option value="<?php print $cliente['id'] ?>"><?php print $cliente['nombre'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label>Platillos:</label>                
            </div>

            <div class="form-group">
                <?php foreach($listaPlatillos as $platillo){ ?>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="<?php print 'platillo'.$platillo['id'] ?>" value="<?php print $platillo['id'] ?>" name="platillos[]">
                    <label class="form-check-label" for="<?php print 'platillo'.$platillo['id'] ?>"><?php print $platillo['nombre'] ?></label>
                </div>
                <?php } ?>
            </div>

            <div class="form-group">
                <label for="estado">Estado</label>
                <select class="form-control" id="estado" name="estado">
                <option value="P" selected="selected">Pendiente</option>
                <option value="R">Rechasada</option>
                <option value="C">Preparando</option>
                <option value="L">Lista</option>
                <option value="E">Entregada</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>

        </form>
    </div>
    

    <?php include_once(PATH.'views/global/footer.php'); ?>
</body>

</html>





