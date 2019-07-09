<?php

class Tools {

    public function checkEmail($value){
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return false;
        }else{
            return true;
        }
    }
    
    public function checkPassword($value){
        
        preg_match('/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/', $value, $matches);
        
        if(count($matches)){
            return true;
        }else{
            return false;
        }
    }

    public function cleanInputText($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function isSet($value) {
        return (isset($value) && !empty($value)) ? true : false;
    }
}