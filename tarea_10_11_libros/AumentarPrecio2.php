<?php  

if(isset($_POST['editorial']) ){


$editorial = $_POST ['editorial']; 
$porcentaje = $_POST ['porcentaje']; 



$con = mysqli_connect ("localhost","root","","lobreria")
or die ("Problemas al conectar");
print ("Connected successfully");

if($porcentaje == 0)
{
   $porcentaje = 10;
}


mysqli_query($con,("CALL AumentarPrecio2('$editorial','$porcentaje')"));
echo "Precio aumentado";

}else{
exit('Error: no se han recibido todas las variables necesarias');
}

?>  