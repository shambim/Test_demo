<?php

class User extends Database{

    


    public function getAllUsers(){
        $sql="select * from tbl_users";
        $allUsers=$this->connect()->query($sql)->fetchAll();
        return $allUsers;
    }
    
    public function getUserById($id){
        $sql="select * from tbl_users where id=:id";
        $userInfo=$this->connect()->prepare($sql);
        $userInfo->execute(['id'=>$id]);
        $res=$userInfo->fetch();
       
        return $res;
    }

    public function setUser($name,$email,$password,$photo){
        $sql="INSERT INTO tbl_users (`name`,`email`,`password`,`photo`,`created`) 
        VALUES(:name,:email,:password,:photo,:created)";
        $data=[
            'name'=>$name,
            'email'=>$email,
            'password'=>$password,
            'photo'=>$photo,
            'created'=>date('Y-m-d H:i:s')    
        ];
        $ins=$this->connect()->prepare($sql)->execute($data);
        return $ins;
    }

    public function updateUser($name,$email,$photo,$id){
        $sql="UPDATE tbl_users SET `name`=:name,`email`=:email,`photo`=:photo 
        WHERE id=:id";
        $data=[
            'name'=>$name,
            'email'=>$email,
            'photo'=>$photo,
            'id'=>$id
        ];
        $upd=$this->connect()->prepare($sql)->execute($data);
        return $upd;
    }

    public function deleteUser(){

    }
}