<?php
    require_once('autoload.inc.php');
    if($_SERVER['REQUEST_METHOD']=="POST"){
        if(isset($_REQUEST['submit_user']) && $_REQUEST['submit_user']=='Register'){
            $name=(isset($_REQUEST['name']) && $_REQUEST['name']!='')?$_REQUEST['name']:'';
            $email=(isset($_REQUEST['email']) && $_REQUEST['email']!='')?$_REQUEST['email']:'';
            $password=(isset($_REQUEST['password']) && $_REQUEST['password']!='')?password_hash($_REQUEST['password'],PASSWORD_DEFAULT):'';
            
            if(isset($_FILES['photo']['tmp_name'])){
                $photo=basename($_FILES['photo']['name']);
                move_uploaded_file($_FILES['photo']['tmp_name'],BASE_PATH.'/assets/uploads/'.$photo);
            }

            $user=new User();
            $ins=$user->setUser($name,$email,$password,$photo);
            if($ins) header('location:'.BASE_URL.'dashboad.php?msg=success');
            else header('location:'.BASE_URL.'dashboad.php?msg=fail');

        }
    }

?>