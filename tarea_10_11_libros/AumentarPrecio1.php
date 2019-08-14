<?php  

if(isset($_POST['editorial']) ){


$editorial = $_POST ['editorial']; 



$con = mysqli_connect ("localhost","root","","lobreria")
or die ("Problemas al conectar");
print ("Connected successfully");



mysqli_query($con,("CALL AumentoPrecio1('$editorial')"));
echo "Precio aumentado";

}else{
exit('Error: no se han recibido todas las variables necesarias');
}

?>  