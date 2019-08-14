<?php  


$con = mysqli_connect ("localhost","root","","lobreria")
or die ("Problemas al conectar");




$datos = mysqli_query($con,("SELECT * FROM libros"));



 echo "<tr>";   
 echo "<th>";
 echo  "Identificador";
 echo "</th>";
 echo "<th>";
 echo  "Titulo";
 echo "</th>";
 echo "<th>";
 echo  "Autor";
 echo "</th>";
 echo "<th>";
 echo  "Editorial";
 echo "</th>";
 echo "<th>";
 echo  "Precio";
 echo "</th>";
   
echo"</tr>";
while ($fila =mysqli_fetch_array($datos)){
echo "<tr>";
   
 echo "<th>";
 echo  $fila ["identificador"];
 echo "</th>";
 echo "<th>";
 echo  $fila ["titulo"];
 echo "</th>";
 echo "<th>";
 echo  $fila ["autor"];
 echo "</th>";
 echo "<th>";
 echo  $fila ["editorial"];
 echo "</th>";
 echo "<th>";
 echo  $fila ["precio"];
 echo "</th>";
 echo"</tr>";


}



?>
	
