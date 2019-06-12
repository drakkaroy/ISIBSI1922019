<?php

function checkPassword($value){
    
    preg_match('/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/', $value, $matches);
    
    if(count($matches)){
        return true;
    }else{
        return false;
    }
}

function checkEmail($value){
    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
        return false;
    }else{
        return true;
    }
}

function checkBirthDate($value){
    $section = explode('-', $value);
    return checkdate($section[1], $section[2], $section[0]);
}

$name = isset($_POST["inputName"]) ? $_POST["inputName"] : 'El nombre no existe';
$email = checkEmail(isset($_POST["inputEmail"]) ? $_POST["inputEmail"] : '') ? 'Correo valido' : 'Correo invalido';
$pass = checkPassword(isset($_POST["inputPassword"]) ? $_POST["inputPassword"] : '') ? 'Clave correcta' : 'Clave incorrecta';
$date = checkBirthDate(isset($_POST["inputDate"]) ? $_POST["inputDate"] : '') ? 'Fecha Correcta' : 'Fecha Incorrecta';


echo $name.'<br>';
echo $email.'<br>';
echo $pass.'<br>';
echo $date.'<br>';
