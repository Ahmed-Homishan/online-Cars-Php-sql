<?php

// Define variables and initialize with empty values
$email = $password = $confirm_password =$numberphone= "";
$user_type = 2;

$email_err = $password_err = $confirm_password_err = $username_err = $BirthDate_err = $city_err = $country_err = $address_err = $numberphone_err = $checking = "";

// Processing form data when form is submitted
if(isset($_POST['signup'])){
 
    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter an email.";
    } 
    else{
        $registing = $connecting->prepare("SELECT id,email FROM users WHERE email = :EMAIL");

            $registing->bindParam("EMAIL",$_POST["email"]);
            
            if($registing->execute()){
                
                if($registing->rowCount() > 0){
                    $email_err = "This email is already used.";
                    echo "<script>alert(' The email is already registed');</script>";

                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
                }

            
            if(empty(trim($_POST["numberphone"]))){
                $numberphone_err = "Please enter a numberphone.";
            } 
            else{
                
            $registing = $connecting->prepare("SELECT id,numberphone FROM users WHERE numberphone = :NUMBERPHONE");
    
                $registing->bindParam("NUMBERPHONE",$_POST["numberphone"]);
                
                if($registing->execute()){
                    
                    if($registing->rowCount() > 0){
                        $numberphone_err = "This numberphone is already used.";
                        echo "<script>alert(' the numberphone is already registed');</script>";

                    } else{
                        $numberphone= trim($_POST["numberphone"]);
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
            if(empty(trim($_POST["BirthDate"]))){
                $BirthDate_err = "please enter the birithdate";
            }
            if(empty(trim($_POST["username"]))){
                $username_err= "please enter a username";
            }
            if(empty(trim($_POST["country"]))){
                $country_err= "please enter a country";
            }
            if(empty(trim($_POST["city"]))){
                $city_err= "please enter a city";
            }
           
            if(empty(trim($_POST["address"]))){
                $address_err= "please enter an address";
            }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) <= 8){
        $password_err = "Password must have atleast 8 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    $date = date("Y-m-d h:i:sa");
    if(empty($email_err) && empty($numberphone_err) && empty($password_err) && empty($confirm_password_err)&& empty($birthdate_err)){
        $param_password =md5(sha1(md5(sha1(md5($password)))));

        // Prepare an insert statement
        $sginingup = $connecting->prepare("INSERT INTO users(UserName,Age,Email,numberPhone,password,User_type,Activity,Country,City,address,RegDate,updationDate)
            VALUES (:USERNAME,:BIRTHDATE,:EMAIL,:NUMBERPHONE,:PASSWORD,2,1,:COUNTRY,:CITY,:ADDRESS, :RegDate, :updationDate);"); 
            $sginingup->bindParam("USERNAME",$_POST['username']);
            $sginingup->bindParam("EMAIL",$email);
            $sginingup->bindParam("NUMBERPHONE",$numberphone);
            $sginingup->bindParam("BIRTHDATE",$_POST['BirthDate']);
            $sginingup->bindParam("COUNTRY",$_POST['country']);
            $sginingup->bindParam("CITY",$_POST['city']);
            $sginingup->bindParam("ADDRESS",$_POST['address']);
            $sginingup->bindParam("PASSWORD",$param_password);
            $sginingup->bindParam("RegDate",$date);
            $sginingup->bindParam("updationDate",$date);

        if($sginingup->execute()){
            echo "<script>alert(' scussfully....');</script>";
        } 
        else{
            echo "Oops! Something went wrong. Please try again later.";
            echo "<script>alert('Oops! Something went wrong. Please try again later.');</script>";
        }
     

}
}}
?>