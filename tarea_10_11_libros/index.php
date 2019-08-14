<?php
session_start();
include_once "conexion.php";
 

 function AgregarUsuario($user,$password)
{

    $clave=md5('password');

   $sql = "INSERT INTO usuarios(usuario,password) VALUES('$user','$clave')";

   //se agrego por que mysqli_query solicita la conexion
    $con = mysqli_connect ("localhost","root","","lobreria");

    $rec = mysqli_query($con,$sql);
    echo '<div class="error">usuario agregado con password encriptada.</div>';

}


function verificar_login($user,$password,&$result) {
    
    $clave=md5('password');

    $sql = "SELECT * FROM usuarios WHERE usuario = '$user' and password = '$clave'";
    


   //se agrego por que mysqli_query solicita la conexion
    $con = mysqli_connect ("localhost","root","","lobreria");


    $rec = mysqli_query($con,$sql);
    $count = 0;
 
    while($row = mysqli_fetch_object($rec))
    {
        $count++;
        $result = $row;
    }
 
    if($count == 1)
    {
        return 1;
    }
 
    else
    {
        return 0;
    }
}
 
if(!isset($_SESSION['userid']))
{

 if(isset($_POST['agregar_usuario']))
    {
        if(verificar_login($_POST['user'],$_POST['password'],$result) == 1)
        {
            echo '<div class="error">el usuario ya existe.</div>';
        }
        else
        {
        AgregarUsuario($_POST['user'],$_POST['password']);
        }
   
    }
}



if(!isset($_SESSION['userid']))
{
    if(isset($_POST['login']))
    {
        if(verificar_login($_POST['user'],$_POST['password'],$result) == 1)
        {
            $_SESSION['userid'] = $result->idusuario;
            header("location:Tarea_semana10.html");
        }
        else
        {
            echo '<div class="error">Su usuario es incorrecto, intente nuevamente.</div>';
        }
    }
?>
 
<style type="text/css">
*{
    font-size: 14px;
}
form.login {
    background: none repeat scroll 0 0 #F1F1F1;
    border: 1px solid #DDDDDD;
    font-family: sans-serif;
    margin: 0 auto;
    padding: 20px;
    width: 278px;
}
form.login div {
    margin-bottom: 15px;
    overflow: hidden;
}
form.login div label {
    display: block;
    float: left;
    line-height: 25px;
}
form.login div input[type="text"], form.login div input[type="password"] {
    border: 1px solid #DCDCDC;
    float: right;
    padding: 4px;
}
form.login div input[type="submit"] {
    background: none repeat scroll 0 0 #DEDEDE;
    border: 1px solid #C6C6C6;
    float: right;
    font-weight: bold;
    padding: 4px 20px;
}
.error{
    color: red;
    font-weight: bold;
    margin: 10px;
    text-align: center;
}
</style>
 
<form action="" method="post" class="login">
    <div><label>Username</label><input name="user" type="text" ></div>
    <div><label>Password</label><input name="password" type="password"></div>
    <div><input name="login" type="submit" value="login"></div>
    <div><input name="agregar_usuario" type="submit" value="agregar usuario"></div>
</form>



<?php
} else {
    
    
}
?>