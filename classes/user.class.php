<?php
include 'dbh.class.php';

class Users extends Dbh{

    public function checkUserExist($user){
    
        $sql="SELECT* FROM users WHERE username=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$user]);
        $records=$stmt->fetchAll();
        if(count($records)>0){
            return $records;
        };
    
    }
    

    public function registerUser($user, $pwd){
    
        $sql="INSERT INTO users (username, userpwd) VALUES (?,?);";
        $hashPass = password_hash($pwd, PASSWORD_DEFAULT);
        try{
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$user, $hashPass]);
        } catch(PDOException $exception){
            //return $exception->getMessage();
            return TRUE;
        }
        
    
    }

}

$user = new Users();
?>