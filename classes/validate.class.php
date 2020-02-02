<?php

class Validate{

    public function validPassword($pwd){
        $error="";
        if(strlen ($pwd) <='8'){
            $error = "Password must contain atleast 8 characters";

        }
        else if(!preg_match("#[0-9]+#",$pwd)){
            $error = "Password must contain atleast 1 number";
        }
        else if(!preg_match("#[A-Z]+#",$pwd)){
            $error = "Password must contain atleast 1 capital letter";
        }
        else if(!preg_match("#[a-z]+#",$pwd)){
            $error = "Password must contain atleast 1 lowercase letter";
        }

        return $error;

    }

    public function validateUser($user){
        $error="";
        if(!preg_match('/^[a-zA-Z0-9]$/', $user)){
            $error ="Username Invalid";
        } 
    }
}

$validate = new Validate();
