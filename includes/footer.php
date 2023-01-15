
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
        <a href="../index.php"> <i class="fas fa-arrow-right"></i> home </a>
        <a href="services.php"> <i class="fas fa-arrow-right"></i> services </a>
        <a href="feature-cars.php"> <i class="fas fa-arrow-right"></i> featured </a>
        <a href="contact-us.php"> <i class="fas fa-arrow-right"></i> contact </a>
    </div>

    <div class="box">
        <h3>contact info</h3>
        <a href="#"> <i class="fas fa-phone"></i> +967******* </a>
        <a href="#"> <i class="fas fa-phone"></i> +967*******  </a>
        <a href="#"> <i class="fas fa-envelope"></i> maxteam@gmail.com </a>
        <a href="#"> <i class="fas fa-map-marker-alt"></i> City - Country - 000000 </a>
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
<script >
    

document.querySelector('#login-btn').onclick = () =>{
  document.querySelector('.login-form-container').classList.toggle('active');
};


document.querySelector('#close-login-form').onclick = () =>{
  document.querySelector('.login-form-container').classList.remove('active');
};

document.querySelector('#signup-btn').onclick = () =>{
  document.querySelector('.login-form-container').classList.remove('active');
  document.querySelector('.signup-form-container').classList.toggle('active');  
};

document.querySelector('#relogin-btn').onclick = () =>{
  document.querySelector('.signup-form-container').classList.remove('active');
  document.querySelector('.login-form-container').classList.toggle('active');  
};

document.querySelector('#close-signup-form').onclick = () =>{
  document.querySelector('.signup-form-container').classList.remove('active');
};


document.querySelector('#btn').onclick = () =>{
  document.querySelector('.login-form-container').classList.toggle('active');
};

</script>
<script src="../js/valdition.js"></script>
<script src="../js/jquery-3.6.0.min.js"></script>
<script src="../js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="../js/bootstrap.min.js.map"></script>