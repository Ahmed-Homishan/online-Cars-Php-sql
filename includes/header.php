   
<header class="header">

<?php  
require("../controller/connection.php");

if(isset($_COOKIE['maxwheelsu'])){  
    $auth["user"] =json_decode($_COOKIE['maxwheelsu'],true);
}

?>
<div id="menu-btn" class="fas fa-bars"></div>

<a href="#" class="logo"> <span>max</span>wheels </a>

<nav class="navbar">
    <a href="../index.php">home</a>
    <a href="services.php">services</a>
    <a href="feature-cars.php">featured</a>
    <a href="contact-us.php">contact</a>
</nav>

<?php 
$user;
session_start();
if(isset($_COOKIE['maxwheelsu'])){
   $user = $auth["user"]["UserName"];
   $email = $auth["user"]["Email"];

?>
<div id="user-btn">
<div class="action">
        <div class="profile" >
            <img src="../image/user.png" alt="">
        </div>

        <div class="menu">
            <h3>
                <?php echo($user) ?>
                <div>
                <?php echo($email) ?>
                </div>
            </h3>
            <ul>
                <li>
                    <a href="../pages/profile.php">My Profile</a>
                </li>
                <li>
                    <a href="../admin/logout.php" onclick="return confirm('Do you want to leave the page ..?');">Logout</a>
                </li>
                
            </ul>
        </div>
    </div>
</div>
<?php
}else{
    $user="login";
?>  
<div id="login-btn">
<button class="btn"><?php echo($user) ?></button>
<i class="far fa-user"></i>
</div>

<?php
}
?>

<?php 
//loggin

include("../pages/login.php");
?>

<div class="login-form-container">

    <span id="close-login-form" class="fas fa-times"></span>

    <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" onsubmit="return  validateLoginInputs();" >
        <h3>user login</h3>

        <div class="input-control">
            <input type="email" placeholder="email" id="email" name="email" class="box" >
            <div class="error"></div>
        </div>

        <div class="input-control">
            <input type="password" placeholder="password" name="password" id="password" class="box" >
            <div class="error"></div>
        </div>
       
        <p> forget your password <a href="#">click here</a> </p>
        <input type="submit" value="login" name="login" class="btn">

        <p>or login with</p>
        <div class="buttons">
            <a href="#" class="btn"> google </a>
            <a href="#" class="btn"> facebook </a>
        </div>
        <div id="signup-btn">
            <p > don't have an account <a href="#">create one</a></p>
        </div> 
    </form>

</div>





<div class="signup-form-container">

    <span id="close-signup-form" class="fas fa-times"></span>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" onsubmit="return validateSignupInputs();">
        <h3>SignUp</h3>

        <div class="input-control">
            <input type="text" placeholder="Name" name="username" id="username" class="box" required>
            <div class="error"></div>
        </div>

        <div class="input-control">
            <input type="email" placeholder="example@email.com" name="email" id="email" class="box" required>
            <div class="error"></div>
        </div>

        <div class="input-control">
            <input type="text" placeholder="Number Phone" name="numberphone" id="numberphone" class="box" required>
            <div class="error"></div>
        </div>

        <div class="input-control">
            <input type="date"  name="BirthDate" id="BirthDate" class="box" required>
            <div class="error"></div>
        </div>

        <div class="input-control">
            <input type="text" placeholder="Country" name="country" id="country" class="box" required>
            <div class="error"></div>
        </div>

        <div class="input-control">
            <input type="text" placeholder="City" name="city" id="city" class="box" required>
            <div class="error"></div>
        </div>

        <div class="input-control">
            <input type="text" placeholder="Address" name="address" id="address"  class="box" required>
            <div class="error"></div>
        </div>

        <div class="input-control">
            <input type="password" placeholder="password" name="password" id="signpassword" class="box" required>
            <div class="error"></div>
        </div>

        <div class="input-control">
            <input type="password" placeholder="Confirm Password" name="confirm_password" id="password2" class="box" required>
            <div class="error"></div>
        </div>

        <input type="checkbox" id="customer" name="customer" value="customer" class="check" checked disabled>
			<label for="customer">customer</label>
		<input type="checkbox" id="saler" name="usertype" class="check"  value="saler">
			<label for="saler">saler</label>


        <p> forget your password <a href="#">click here</a> </p>
        <input type="submit"  value="signup" name="signup" class="btn">

        <div class="buttons">
            <a href="#" class="btn"> google </a>
            <a href="#" class="btn"> facebook </a>
        </div>
        <div id="relogin-btn">
            <p>  you already have an account  <a href="#" > Login </a> </p>
        </div>
    </form>



</div>

<?php

//singup
include("../pages/signup.php");
?>

</header> 