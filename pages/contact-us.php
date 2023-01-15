<?php
    include('../controller/connection.php');
    $msg=$error= $message_err =$email_err= $fullname_err=$subject_err="";
    if(isset($_POST['send']))
    {
        if(empty(trim($_POST['email']))){
            $email_err = "Please enter email.";
        } else{
            $email = trim($_POST['email']);
        }

        if(empty(trim($_POST['fullname']))){
            $fullname_err = "Please enter your fullname.";
        } else{
            $fullname = trim($_POST['fullname']);
        }
        
        if(empty(trim($_POST['subject']))){
            $subject_err = "Please enter your subject.";
        } else{
            $subject = trim($_POST['subject']);
        }

        if(empty(trim($_POST['message']))){
            $message_err = "Please enter your message.";
        } else{
            $message = trim($_POST['message']);
        }

        if(empty($email_err) && empty($fullname_err)&& empty($subject_err)&& empty($message_err)){
            $date = date("Y-m-d h:i:sa");
            $sql="INSERT INTO  contentus(username,email,subject,message,PostingDate) VALUES(:name,:email,:subject,:message,:postingDate)";
            $query = $connecting->prepare($sql);
            $query->bindParam(':name',$fullname,PDO::PARAM_STR);
            $query->bindParam(':email',$email,PDO::PARAM_STR);
            $query->bindParam(':subject',$subject,PDO::PARAM_STR);
            $query->bindParam(':message',$message,PDO::PARAM_STR);
            $query->bindParam(':postingDate',$date,PDO::PARAM_STR);
            $query->execute();
            $lastInsertId = $connecting->lastInsertId();
        if($lastInsertId)
        {
            $msg="Message Sent. We will contact you shortly ";
        }
        else 
        {
            $error="Something went wrong. Please try again";
        }

        }}
?>
<!DOCTYPE HTML>
<html>
    <?php include("../includes/head.php");?>
    <body>

        <!-- header -->
        <?php include("../includes/header.php"); ?>

        <section class="contact" id="contact">

        <h1 class="heading"><span>contact</span> us</h1>
        <div class="row">

            <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30153.788252261566!2d72.82321484621745!3d19.141690214227783!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b63aceef0c69%3A0x2aa80cf2287dfa3b!2sJogeshwari%20West%2C%20Mumbai%2C%20Maharashtra%20400047!5e0!3m2!1sen!2sin!4v1632137920043!5m2!1sen!2sin" allowfullscreen="" loading="lazy"></iframe>

            <form action="" method="post" onsubmit="return valdatingmsg();">
                <h3>get in touch</h3>
                <?php if($error) { ?>
                <div class="errorWrap">
                    <h4 style ="background-color:#ed4c4c;color:White; font-size:1.6rem;"> <strong>ERROR</strong>:<?php echo htmlentities($error); ?> </h4>
                </div>
                <?php } 
                else if($msg){?>
                <div class="succWrap">
                   <h4 style ="background-color:#2e9f48;color:White; font-size:1.6rem;"> <strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </h4>
                </div><?php }?>
                <div class="input-control">
                    <input type="text" placeholder="your name" name="fullname" id="yourname" class="form-control">
                    <div class="error"><?php echo $fullname_err ?></div>
                </div>
                <div class="input-control">
                    <input type="email" placeholder="your email" name="email" id="emailaddress" class="form-control">
                    <div class="error"><?php echo $email_err ?></div>
                </div>
                <div class="input-control">
                    <input type="tel" placeholder="subject"  name="subject" id="subject" class="form-control">
                    <div class="error"><?php echo $subject_err ?></div>
                </div>
                <div class="input-control">
                    <textarea placeholder="your message"  name="message" id="message" class="form-control" cols="30" rows="10"></textarea>
                    <div class="error"><?php echo $message_err ?></div>
                </div>
                <input type="submit" value="send message" id="send" name="send" class="btn">
            </form>

        </div>

        </section>
        <?php include("../includes/footer.php")?>
    </body>
</html>
