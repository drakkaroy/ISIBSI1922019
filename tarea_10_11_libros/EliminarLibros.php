<?php  

if(isset($_POST['identificadorE']) ){


$identificadorE = $_POST ['identificadorE']; 



$con = mysqli_connect ("localhost","root","","lobreria")
or die ("Problemas al conectar");
print ("Connected successfully");



mysqli_query($con,("Delete from libros where identificador = '$identificadorE'"));
echo "Datos Eliminados";

}else{
exit('Error: no se han recibido todas las variables necesarias');
}

?>  