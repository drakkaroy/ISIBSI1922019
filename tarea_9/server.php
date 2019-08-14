<?php  

if( isset($_POST['Nombre']) && isset($_POST['PApellido']) && isset($_POST['SApellido']) && isset($_POST['Cedula']) && isset($_POST['Telefono']) && isset($_POST['Provincia']) && isset($_POST['Canton']) && isset($_POST['Distrito']) && isset($_POST['Direccion'])  ){

    $Nombre = $_POST ['Nombre'];
    $PApellido = $_POST ['PApellido']; 
    $SApellido = $_POST ['SApellido']; 
    $Cedula = $_POST ['Cedula']; 
    $Telefono = $_POST ['Telefono'];
    $Provincia = $_POST ['Provincia']; 
    $Canton = $_POST ['Canton']; 
    $Distrito = $_POST ['Distrito']; 
    $Direccion = $_POST ['Direccion']; 

    $con = mysqli_connect ("localhost","root","","cliente")
    or die ("Problemas al conectar");
    print ("Connected successfully");

    mysqli_query($con,("INSERT INTO cliente(Nombre,PApellido,SApellido,Cedula,Telefono,Provincia,Canton,Distrito,Direccion) VALUES ('$Nombre','$PApellido','$SApellido','$Cedula','$Telefono','$Provincia','$Canton','$Distrito','$Direccion')"));
    echo "Datos insertados";

}else{

    exit('Error: no se han recibido todas las variables necesarias');
    
}
