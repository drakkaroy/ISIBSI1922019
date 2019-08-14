<?php  

if( isset($_POST['titulo']) && isset($_POST['autor']) && isset($_POST['editorial']) && isset($_POST['precio']) && isset($_POST['identificador']) ){
$titulo = $_POST ['titulo'];
$autor = $_POST ['autor']; 
$editorial = $_POST ['editorial']; 
$precio = $_POST ['precio']; 
$identificador = $_POST ['identificador']; 



$con = mysqli_connect ("localhost","root","","lobreria")
or die ("Problemas al conectar");
print ("Connected successfully");



mysqli_query($con,("Update libros set titulo = '$titulo', autor = '$autor', editorial = '$editorial', precio = '$precio' where identificador = '$identificador'"));

}else{
exit('Error: no se han recibido todas las variables necesarias');
}

?>  