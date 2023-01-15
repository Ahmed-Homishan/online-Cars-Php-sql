<?php
if(isset($_POST['login'])){

    if(empty(trim($_POST['email']))){
        $email_err = "Please enter email.";
    } else{
        $email = trim($_POST['email']);
    }
 
    if(empty(trim($_POST['password']))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST['password']);
    }

    if(empty($email_err) && empty($password_err)){
        $param_password = md5(sha1(md5(sha1(md5($password)))));
       
        $login = $connecting->prepare("SELECT Email,password,Activity,UserName,User_type  FROM users WHERE email = :EMAIL AND password = :PASSWORD;");
        $login->bindParam("EMAIL",$email);
        $login->bindParam("PASSWORD",$param_password);
        $login->execute();
        
        if($login->rowCount() > 0 ){
            $user = $login->fetchObject();
            if($user->Activity == '1'){  
                if($user->User_type =='0' || $user->User_type == '1'){
                    $_SESSION['user'] = $user;
                    header("location:https://maxwheels-ye.000webhostapp.comadmin/index.php");

                }else{
                    $_SESSION['user'] = $user; 
                    header("location:https://maxwheels-ye.000webhostapp.comindex.php");
                }
            
            setcookie( "maxwheelsu",json_encode($_SESSION['user']), time() + (86400 * 2),"/");
            }
            else{
                echo "<script>alert('Email is blocked');</script>";
            }
        }else{
            echo "<script>alert('Your email or password is wrong');</script>";

        }   
    }
}
?>
