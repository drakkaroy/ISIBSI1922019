<?php  

if( isset($_POST['titulo']) && isset($_POST['autor']) && isset($_POST['editorial']) && isset($_POST['precio']) ){
$titulo = $_POST ['titulo'];
$autor = $_POST ['autor']; 
$editorial = $_POST ['editorial']; 
$precio = $_POST ['precio']; 



$con = mysqli_connect ("localhost","root","","lobreria")
or die ("Problemas al conectar");
print ("Connected successfully");



mysqli_query($con,("INSERT INTO libros(titulo,autor,editorial,precio) VALUES ('$titulo','$autor','$editorial','$precio')"));
echo "Datos insertados";

}else{
exit('Error: no se han recibido todas las variables necesarias');
}

?>  
