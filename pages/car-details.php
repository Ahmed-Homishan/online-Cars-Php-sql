<!DOCTYPE html>
<html dir="ltr" lang="en">
    <?php include('../includes/head.php');?>
    <body>
    <?php include('../includes/header.php');?>
        <main>
            <!--            desc            -->
            <section class="desc" >
              <?php 
                require_once("../controller/connection.php");
                  if(isset($_COOKIE['maxwheelsu'])){
                    $useremail=$auth["user"]["Email"];
                    $Vid=intval($_GET['id']);
                    $bool = 0;
                    $details;
                    $checking = $connecting->prepare("SELECT vechile_id,userEmail,status FROM booking WHERE userEmail=:useremail AND vechile_id=:Vid");
                    $checking->bindParam(":useremail",$useremail);
                    $checking->bindParam(":Vid",$Vid);
                    $checking->execute();
                    $details = $checking->fetchObject();
                    if($checking->rowCount() > 0){
                      $bool = 1;
                    }else{
                      $bool = 0;
                    }
                  }
                  if(isset($_POST['booking']))
                  {
                    $check = $connecting->prepare("SELECT userEmail,vechile_id FROM booking WHERE userEmail =:UserEmail AND vechile_id=:VID;");
                    $check->bindParam(':UserEmail',$useremail,PDO::PARAM_STR);
                    $check->bindParam(':VID',$Vid,PDO::PARAM_STR);
                    $check->execute();
                    if($check->rowCount() == 0){
                     
                      $status = 0;
                      $booking_date =date("Y-m-d h:i:sa");
                      $sql="INSERT INTO booking (vechile_id,userEmail,status,booking_date) VALUES(:Vid,:useremail,:status,:booking_date);";
                      $query = $connecting->prepare($sql);
                      $query->bindParam(':useremail',$useremail,PDO::PARAM_STR);
                      $query->bindParam(':Vid',$Vid,PDO::PARAM_STR);
                      $query->bindParam(':status',$status,PDO::PARAM_STR);
                      $query->bindParam(':booking_date',$booking_date,PDO::PARAM_STR);
                      $query->execute();
                      $lastInsertId = $connecting->lastInsertId();
                    if($lastInsertId)
                    {
                       $bool = 1;
                      echo "<script>alert('Booking successfull.');</script>";
                    }
                    else 
                    {
                      echo "<script>alert('Something went wrong. Please try again');</script>";
                    }
                    }else if($check->rowCount() > 0){
                      echo "<script>alert('you already booked ..');</script>";
                    }
                  }
                  if(isset($_GET['id'])){
                    $id =intval($_GET['id']);
                    $query="SELECT V.*, B.name , B.id FROM vechiles AS V join brands AS B ON V.Vbrand = B.id WHERE V.id =:ID";
                    $detailed = $connecting->prepare($query);
                    $detailed->bindParam(":ID",$id);
                    if($detailed->execute()){
                      $info = $detailed->fetchAll(PDO::FETCH_OBJ);
                      $cnt =1;
                      if($detailed->rowCount()){
                        foreach($info as $result){

              ?>
                <h2 style="margin-top:4rem; font-size:3rem;"><?php echo htmlentities($result->Vtitle)?></h2>
                <hr>
                <section class="nav justify-content-center">
                    <p class="badge bg-secondary p-4 m-3" style="word-break: break-word;
                    white-space: break-spaces;"><?php echo htmlentities($result->overview)?></p>
                    <p class="badge bg-secondary p-4 m-3"><?php echo htmlentities($result->name)?></p>
                    <p class="badge bg-danger p-4 m-3">$<?php echo htmlentities($result->Price)?></p>
                    <p class="badge bg-danger p-4 m-3">Fuel Type : <?php echo htmlentities($result->FuelType)?></p>
                    <p class="badge bg-danger p-4 m-3"><?php echo htmlentities($result->SeatingCapacity)?> seats  <i class="fa fa-user"></i> </p>
                    <p class="badge bg-warning p-4 m-3"><?php echo htmlentities($result->miles)?> miles</p>
                    <!-- Accessories -->
                    <div role="tabpanel" class="tab-pane" id="accessories"> 
                    <!--Accessories-->
                      <table>
                        <tbody>
                          <tr class="badge bg-primary p-2 m-3">
                            <td>Air Conditioner</td>
                              <?php if($result->AirConditioner==1)
                              {
                              ?>
                             <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php } else { ?> 
                              <td><i class="fa fa-close" aria-hidden="true"></i></td>
                              <?php } ?> 
                          </tr>
                          <tr class="badge bg-primary p-2 m-3">
                            <td>AntiLock Braking System</td>
                            <?php if($result->AntiLockBrakingSystem==1)
                            {
                            ?>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php } else {?>
                            <td><i class="fa fa-close" aria-hidden="true"></i></td>
                            <?php } ?>
                          </tr>
                          <tr class="badge bg-primary p-2 m-3">
                            <td>Power Steering</td>
                              <?php if($result->PowerSteering==1)
                              {
                              ?>
                              <td><i class="fa fa-check" aria-hidden="true"></i></td>
                              <?php } else { ?>
                              <td><i class="fa fa-close" aria-hidden="true"></i></td>
                              <?php } ?>
                          </tr>
                          <tr class="badge bg-primary p-2 m-3">
                            <td>Power Windows</td>
                            <?php if($result->PowerWindows==1)
                            {
                            ?>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php } else { ?>
                            <td><i class="fa fa-close" aria-hidden="true"></i></td>
                            <?php } ?>
                          </tr>                 
                          <tr class="badge bg-primary p-2 m-3">
                            <td>CD Player</td>
                            <?php if($result->CDPlayer==1)
                            {
                            ?>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php } else { ?>
                            <td><i class="fa fa-close" aria-hidden="true"></i></td>
                            <?php } ?>
                          </tr>
                          <tr class="badge bg-primary p-2 m-3">
                            <td >Leather Seats</td>
                            <?php if($result->LeatherSeats==1)
                            {
                            ?>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php } else { ?>
                            <td><i class="fa fa-close" aria-hidden="true"></i></td>
                            <?php } ?>
                          </tr>
                          <tr class="badge bg-primary p-2 m-3">
                            <td>Central Locking</td>
                            <?php if($result->CentralLocking==1)
                            {
                            ?>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php } else { ?>
                            <td><i class="fa fa-close" aria-hidden="true"></i></td>
                            <?php } ?>
                          </tr>
                          <tr class="badge bg-primary p-2 m-3">
                            <td>Power Door Locks</td>
                            <?php if($result->PowerDoorLocks==1)
                            {
                            ?>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php } else { ?>
                            <td><i class="fa fa-close" aria-hidden="true"></i></td>
                            <?php } ?>
                          </tr>
                          <tr class="badge bg-primary p-2 m-3">
                            <td>Brake Assist</td>
                            <?php if($result->BrakeAssist==1)
                            {
                            ?>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php  } else { ?>
                            <td><i class="fa fa-close" aria-hidden="true"></i></td>
                            <?php } ?>
                          </tr>
                          <tr class="badge bg-primary p-2 m-3">
                            <td>Driver Airbag</td>
                            <?php if($result->DriverAirbag==1)
                            {
                            ?>
                              <td><i class="fa fa-check" aria-hidden="true"></i></td>
                              <?php } else { ?>
                              <td><i class="fa fa-close" aria-hidden="true"></i></td>
                            <?php } ?>
                          </tr>
                          <tr class="badge bg-primary p-2 m-3">
                            <td>Passenger Airbag</td>
                            <?php if($result->PassengerAirbag==1)
                            {
                            ?>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php } else {?>
                            <td><i class="fa fa-close" aria-hidden="true"></i></td>
                            <?php } ?>
                          </tr>
                          <tr class="badge bg-primary p-2 m-3">
                            <td>Crash Sensor</td>
                            <?php if($result->CrashSensor==1)
                            {
                            ?>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            <?php } else { ?>
                            <td><i class="fa fa-close" aria-hidden="true"></i></td>
                            <?php } ?>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      
                </section>
                <?php 
                      if(isset($_COOKIE['maxwheelsu'])){
                        if($bool == 0){
                          echo '<form method="post"><button type="submit" name="booking" class="btn">Book it right now</button></form>';
                        }else if($bool == 1){
                          if($details->status == '1'){
                            echo ' <button class="scuess">conforming successfully</button>';
                          }else if($details->status == '0'){
                            echo '<button class="danger">It is sitll waiting for conforming</button>';
                          }else{
                            echo '<button class="danger">It has been cancel</button>';
                          }
                        }
                      }else{
                        echo '<div id="btn"> <button class="btn">login</button> </div>';
                      }
                    ?>  
            </section>
            <section class="photo p-5">
                <section id="main_car" class="p-5">
                  <img  src="../image/vehicleimages/<?php echo htmlentities($result->Vimage1)?>" alt="car">
                </section>
                <img src="../image/vehicleimages/<?php echo htmlentities($result->Vimage2)?>" alt="car">
                <img  src="../image/vehicleimages/<?php echo htmlentities($result->Vimage3)?>" alt="car">
                <img src="../image/vehicleimages/<?php echo htmlentities($result->Vimage4)?>" alt="car">
                <?php 
                  if(!empty($result->Vimage5)){
                    echo" <img  src='../image/vehicleimages/ $result->Vimage5' alt='car'>";
                  }
                  if(!empty($result->Vimage6)){
                    echo"<img  src='../image/vehicleimages/$result->Vimage6' alt='car'>";
                  }
                ?>
            </section>
            <?php 
              $cnt = $cnt+1; 
                  }
                }
              }
              
            }
            ?>
        </main> 
        <script>
          
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
        <script src="../js/js.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/script.js"></script>
        <script src="../js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="../js/bootstrap.min.js.map"></script>
        <script src="../js/swiper-bundle.min.js"></script>
    </body>
</html>