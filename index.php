<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MaxWheels</title>
        <link rel="stylesheet" href="css/swiper-bundle.min.css" />

        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="css/all.min.css" />
        <link rel="stylesheet" href="css/fontawesome.css" />

        <!-- custom css file link  -->
        <link rel="shortcut icon" href="image/favicon-icon/favicon.png" />
        <link rel="stylesheet" href="css/style.css" />   
        <script>
            if(window.history.replaceState){
                window.history.replaceState(null,null,window.location.href);
            }
        </script>
        
    </head>
        
    <body>

    <!-- header -->
    
    <header class="header">

        <div id="menu-btn" class="fas fa-bars"></div>

        <a href="#" class="logo"> <span>max</span>wheels </a>

        <nav class="navbar">
            <a href="index.php">home</a>
            <a href="#vehicles">vehicles</a>
            <a href="pages/services.php">services</a>
            <a href="pages/feature-cars.php">featured</a>
            <a href="#reviews">reviews</a>
            <a href="pages/contact-us.php">contact</a>
        </nav>

        <?php 
            include("includes/counter.php");
            $auth["user"] =[];
            $user;
            require("controller/connection.php");
            session_start();
            HitCounter();
            $_SESSION['vistors'] ="vistors";
            //singup
            require("pages/signup.php");
            //login
            require("pages/login.php");

            if(isset($_COOKIE['maxwheelsu'])){
            $auth["user"] =json_decode($_COOKIE['maxwheelsu'],true);
                if($auth["user"]["User_type"] == '0' || $auth["user"]["User_type"] == '1'){
                header("location:https://maxwheels-ye.000webhostapp.comadmin/");
                }
                if(isset($auth["user"])){
                $user = $auth['user']['UserName'];
                $email = $auth['user']['Email'];
        ?>
        <div id="user-btn">
            <div class="action">
                    <div class="profile" >
                        <img src="image/user.png" alt="" />
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
                                <a href="pages/profile.php">My Profile</a>
                            </li>
                            <li>
                                <a href="admin/logout.php" onclick="return confirm('Do you want to leave the page ..?');">Logout</a>
                            </li>
                        </ul>
                    </div>
            </div>
        </div>

        <?php
            }}else{
                $user="login";
        ?>  
            <div id="login-btn">
                <button class="btn"><?php echo($user)?></button>
                <i class="far fa-user"></i>
            </div>

        <?php
            }
        ?>

        <div class="login-form-container">

            <span id="close-login-form" class="fas fa-times"></span>

            <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" onsubmit="return  validateLoginInputs();" >
                <h3>user login</h3>

                <div class="input-control">
                    <input type="email" placeholder="email" id="email" name="email" class="box" >
                    <div class="error"><?php echo $email_err;?></div>
                </div>

                <div class="input-control">
                    <input type="password" placeholder="password" name="password" id="password" class="box" >
                    <div class="error"><?php echo $password_err;?></div>
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
                    <input type="text" placeholder="Name" name="username" id="username" class="box" >
                    <div class="error"><?php echo $username_err;?></div>
                </div>

                <div class="input-control">
                    <input type="email" placeholder="example@email.com" name="email" id="signemail" class="box" >
                    <div class="error"><?php echo $email_err;?></div>
                </div>

                <div class="input-control">
                    <input type="text" placeholder="Number Phone" name="numberphone" id="numberphone" class="box" >
                    <div class="error"><?php echo $numberphone_err;?></div>
                </div>

                <div class="input-control">
                    <input type="date"  name="BirthDate" id="BirthDate" class="box" >
                    <div class="error"><?php echo  $BirthDate_err;?></div>
                </div>

                <div class="input-control">
                    <input type="text" placeholder="Country" name="country" id="country" class="box" >
                    <div class="error"><?php echo $country_err;?></div>
                </div>

                <div class="input-control">
                    <input type="text" placeholder="City" name="city" id="city" class="box" >
                    <div class="error"><?php echo $city_err;?></div>
                </div>

                <div class="input-control">
                    <input type="text" placeholder="Address" name="address" id="address"  class="box" >
                    <div class="error"><?php echo $address_err;?></div>
                </div>

                <div class="input-control">
                    <input type="password" placeholder="password" name="password" id="signpassword" class="box" >
                    <div class="error"><?php echo $password_err;?></div>
                </div>

                <div class="input-control">
                    <input type="password" placeholder="Confirm Password" name="confirm_password" id="password2" class="box" >
                    <div class="error"><?php echo $confirm_password_err;?></div>
                </div>

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


        </header> 

    <section class="home" id="home">

    <h3 data-speed="-2" class="home-parallax">find your car</h3>

    <img data-speed="5" class="home-parallax" src="image/vehicleimages/home-img.png" alt="">

    <a data-speed="7" href="pages/feature-cars.php" class="btn home-parallax">explore cars</a>

    </section>

    <section class="icons-container">

    <div class="icons">
        <i class="fa fa-home"></i>
        <div class="content">
            <h3>150+</h3>
            <p>branches</p>
        </div>
    </div>

    <div class="icons">
        <i class="fas fa-car"></i>
        <div class="content">
            <h3>4770+</h3>
            <p>cars sold</p>
        </div>
    </div>

    <div class="icons">
        <i class="fas fa-users"></i>
        <div class="content">
            <h3>320+</h3>
            <p>happy clients</p>
        </div>
    </div>

    <div class="icons">
        <i class="fas fa-car"></i>
        <div class="content">
            <h3>1500+</h3>
            <p>news cars</p>
        </div>
    </div>

    </section>

    <?php 
        $sql = "SELECT vechiles.id,vechiles.Vtitle,brands.name,vechiles.Price,vechiles.FuelType,vechiles.model,vechiles.Vimage1,brands.name AS brandName,vechiles.overview,vechiles.SeatingCapacity,vechiles.id from vechiles join brands on brands.id = vechiles.Vbrand";
        $query = $connecting -> prepare($sql);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query->rowCount() >0){
            foreach($results as $result)
                {			
    ?>

    <section class="vehicles" id="vehicles">

        <h1 class="heading"> popular <span>vehicles</span> </h1>

        <div class="swiper vehicles-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide box">
                    <img src="image/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" alt="">
                    <div class="content">
                        <h3><?php echo htmlentities($result->Vtitle);?></h3>
                        <div class="price"> <span>price : </span> $<?php echo htmlentities($result->Price);?> </div>
                        <p>
                            <span class="fas fa-circle"></span> <?php echo htmlentities($result->model);?>
                            <span class="fas fa-circle"></span> <?php echo htmlentities($result->brandName);?>
                            <span class="fas fa-circle"></span> <?php echo htmlentities($result->Price);?>
                            <span class="fas fa-circle"></span> <?php echo htmlentities($result->FuelType);?>
                        </p>
                        <a href="pages/car-details.php?id=<?php echo htmlentities($result->id);?>" class="btn">check out</a>
                    </div>
                </div>


            </div>

            <div class="swiper-pagination"></div>

        </div>

    </section>

    <?php $cnt=$cnt+1; }} ?>

    <section class="newsletter">
        
        <h3>subscribe for latest updates</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, suscipit.</p>

    </section>

    <section class="reviews" id="reviews">

        <h1 class="heading"> client's <span>review</span> </h1>

        <div class="swiper review-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide box">
                    <img src="image/vehicleimages/pic-1.png" alt="">
                    <div class="content">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsam incidunt quod praesentium iusto id autem possimus assumenda at ut saepe.</p>
                        <h3>john deo</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <img src="image/vehicleimages/pic-2.png" alt="">
                    <div class="content">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsam incidunt quod praesentium iusto id autem possimus assumenda at ut saepe.</p>
                        <h3>john deo</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <img src="image/vehicleimages/pic-3.png" alt="">
                    <div class="content">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsam incidunt quod praesentium iusto id autem possimus assumenda at ut saepe.</p>
                        <h3>john deo</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <img src="image/vehicleimages/pic-4.png" alt="">
                    <div class="content">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsam incidunt quod praesentium iusto id autem possimus assumenda at ut saepe.</p>
                        <h3>john deo</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <img src="image/vehicleimages/pic-5.png" alt="">
                    <div class="content">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsam incidunt quod praesentium iusto id autem possimus assumenda at ut saepe.</p>
                        <h3>john deo</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <img src="image/vehicleimages/pic-6.png" alt="">
                    <div class="content">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsam incidunt quod praesentium iusto id autem possimus assumenda at ut saepe.</p>
                        <h3>john deo</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>

            </div>

            <div class="swiper-pagination"></div>

        </div>

    </section>


    <!-- footer -->

    <section class="footer" id="footer">

    <div class="box-container">

        <div class="box">
            <h3>our branches</h3>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> Indionesia </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> Japan </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> France </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> Russia </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> USA </a>
        </div>

        <div class="box">
            <h3>quick links</h3>
            <a href=" index.php"> <i class="fas fa-arrow-right"></i> home </a>
            <a href="#vehicles"> <i class="fas fa-arrow-right"></i> vehicles </a>
            <a href="pages/services.php"> <i class="fas fa-arrow-right"></i> services </a>
            <a href="pages/feature-cars.php"> <i class="fas fa-arrow-right"></i> featured </a>
            <a href="#reviews"> <i class="fas fa-arrow-right"></i> reviews </a>
            <a href="pages/contact-us.php"> <i class="fas fa-arrow-right"></i> contact </a>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <a href="#"> <i class="fas fa-phone"></i> +967******* </a>
            <a href="#"> <i class="fas fa-phone"></i> +967*******  </a>
            <a href="#"> <i class="fas fa-envelope"></i> maxteam@gmail.com </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> Sana'a - Yemen - 000000 </a>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
            <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
            <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
            <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
            <a href="#"> <i class="fab fa-pinterest"></i> pinterest </a>
        </div>

    </div>

    <div class="credit"> created by <a href="#">Max Team</a> | all rights reserved </div>

    </section>

        <!-- java script -->
        <script src="js/valdition.js"></script>
        <script src="js/jquery-3.6.0.min.js"></script>
        <script src="js/js.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/swiper-bundle.min.js"></script>
        <script src="js/script.js"></script>
    </body>
</html>