<?php
require_once('includes/autoload.inc.php');
$user=new User();
$all_users=$user->getAllUsers();

if(isset($_REQUEST['edit_id'])){
    $edit_id=$_REQUEST['edit_id'];
    $user_info=$user->getUserById($edit_id);
    $name=(isset($user_info['name']) && $user_info['name']!='')?$user_info['name']:'';
    $email=(isset($user_info['email']) && $user_info['email']!='')?$user_info['email']:'';
    $photo=(isset($user_info['photo']) && $user_info['photo']!='')?$user_info['photo']:'';
}   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <div id="wrapper">
    <table border="1">
        <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Photo</th>
        </thead>
        <tbody>
            <?php
            if(isset($all_users) && count($all_users)>0){ 
                for($i=0;$i<count($all_users);$i++){ 
            ?>
            <tr>
                <td><?php echo $all_users[$i]['name'];?></td>
                <td><?php echo $all_users[$i]['email'];?></td>
                <td><img src="<?php echo BASE_URL."/assets/uploads/".$all_users[$i]['photo'];?>" width="150"></td>
            </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>


    <form name="frm_add_user" action="includes/user.inc.php" enctype="multipart/form-data" method="post">      
    <?php
    if(isset($_REQUEST['msg']) && $_REQUEST['msg']=='success'){ 
    ?>
    <div style="color:green">User Registered Successfully</div>   
    <?php
    }
    ?>

    <table>
      
        <tbody>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $name;?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" value="<?php echo $email;?>"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" value=""></td>
            </tr>
            <tr>
                <td>Photo</td>
                <td><input type="file" name="photo">
                <?php
                    if(file_exists(BASE_PATH.'/assets/uploads/'.$photo)){
                ?>
                <img src="<?php echo BASE_URL.'/assets/uploads/'.$photo;?>" width="200"/>
                <?php        
                    }
                ?>  
                </td>
            </tr>
            <tr>
                <td closespan="2"><input type="submit" name="submit_user" value="Register"></td>
                
            </tr>
        </tbody>
    </table>
    </div>
</body>
</html>