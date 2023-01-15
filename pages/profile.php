<!DOCTYPE html>
<html lang="en">
	<?php include("../includes/head.php");?>
<body>
	<?php 
	require_once("../controller/connection.php");
	session_start();
	$auth["user"] =json_decode($_COOKIE['maxwheelsu'],true);
	$msg=$confirmpassword=$password="";
	$Email = $auth["user"]["Email"];

	$password_err= $newpassword_err = $confirm_password_err =$FullName_err =$numberphone_err=$country_err =$city_err=$address_err=$bio_err="";

	if(isset($_POST['changing']))
	{
		$password=  md5(sha1(md5(sha1(md5($_POST['password'])))));
		$newpassword = $_POST["newpassword"];
		$confirmpassword=$_POST['confirmpassword'];
	if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a current password.";     
    }
	
    if(empty(trim($_POST["newpassword"]))){
        $newpassword_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["newpassword"])) <= 8){
        $newpassword_err = "Password must have atleast 8 characters.";
    } else{
        $newpassword = trim($_POST["newpassword"]);
    }
    
    if(empty(trim($_POST["confirmpassword"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirmpassword"]);
        if(empty($newpassword_err) && ($newpassword != $confirmpassword)){
            $confirm_password_err = "Password did not match.";
        }
    }
if(empty($newpassword_err)&&empty($email_err)&&empty($password_err)){
		$newpassword=$_POST['newpassword'];
		$email= $auth["user"]["Email"] ;
		$sql ="SELECT Password FROM users WHERE Email=:email AND Password=:password";
		$query= $connecting -> prepare($sql);
		$query-> bindParam(':email', $email, PDO::PARAM_STR);
		$query-> bindParam(':password', $password, PDO::PARAM_STR);
		$query-> execute();
		$results = $query -> fetchAll(PDO::FETCH_OBJ);
		if($query -> rowCount() > 0)
		{
			$newpassword = md5(sha1(md5(sha1(md5( $newpassword)))));
			$con="UPDATE users set Password=:newpassword where Email=:email";
			$chngpwd1 = $connecting->prepare($con);
			$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
			$chngpwd1-> bindParam(':newpassword',  $newpassword, PDO::PARAM_STR);
			if($chngpwd1->execute()){
				$msg= "Password is uploaded sucessfully.";	
			}
		}
		else {
			$msg= "Your current password is not correct.";	
		}}
	}

	if(isset($_POST['update'])){
		
		if(empty(trim($_POST['FullName']))){
			$FullName_err = "Please enter FullName.";
		} else{
			$FullName = trim($_POST["FullName"]);
		}
		if(empty(trim($_POST['numberphone']))){
			$numberphone_err = "Please enter numberphone.";
		} else{
			$numberphone = trim($_POST["numberphone"]);
		}
		if(empty(trim($_POST['country']))){
			$country_err = "Please enter country.";
		} else{
			$country = trim($_POST["country"]);
		}
		if(empty(trim($_POST['city']))){
			$city_err = "Please enter city.";
		} else{
			$city= trim($_POST["country"]);
		}
		if(empty(trim($_POST['address']))){
			$address_err = "Please enter address.";
		} else{
			$address= trim($_POST["address"]);
		}
		if(empty(trim($_POST['bio']))){
			$bio_err = "Please enter bio.";
		} else{
			$bio= trim($_POST["bio"]);
		}
		$date = date("Y-m-d h:i:sa");
		if(empty($FullName_err)&&empty($numberphone_err)&&empty($country_err)&&empty($city_err)&&empty($address_err)&&empty($bio_err)){
			$Query2 ="UPDATE users SET UserName=:UserName,numberphone=:numberphone,Country=:Country,City=:City,address=:address,Bio=:Bio,updationDate=:UpdationDate WHERE Email=:Email;";
			$updating = $connecting->prepare($Query2);
			$updating->bindParam(":Email",$Email);
			$updating->bindParam(":UserName",$_POST['FullName']);
			$updating->bindParam(":numberphone",$_POST['numberphone']);
			$updating->bindParam(":Country",$_POST['country']);
			$updating->bindParam(":City",$_POST['city']);
			$updating->bindParam(":address",$_POST['address']);
			$updating->bindParam(":Bio",$_POST['bio']);
			$updating->bindParam(":UpdationDate",$date);
			if($updating->execute()){
				header("location:profile.php");
			}
	}else{
		echo "<script>alert('Someting went wrong');</script>";
	}
	}
		if(isset($_COOKIE['maxwheelsu'])){
			$query = "SELECT UserName,Email,numberphone,Country,City,address,Bio FROM users WHERE Email=:Email;";
			$details = $connecting->prepare($query);
			$details->bindParam(":Email",$Email);
			$details->execute();
			$results=$details->fetchAll(PDO::FETCH_OBJ);
			$cnt=1;
			if($details->rowCount() > 0){
				foreach($results as $result){
	?>
	<section class="py-5 my-5">
		<div class="container">
			<h1 class="mb-5">Account Settings</h1>
			<div class="bg-white shadow rounded-lg d-block d-sm-flex">
				<div class="profile-tab-nav border-right">
					<div class="p-4">
						<div class="img-circle text-center mb-3">
							<img src="../image/user.png" alt="Image" class="shadow">
						</div>
						<h4 class="text-center"><?php echo htmlentities($result->UserName);?></h4>
					</div>
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="false">
							<i class="fa fa-home text-center mr-1"></i> 
							Account
						</a>
						<a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="true">
							<i class="fa fa-key text-center mr-1"></i> 
							Password
						</a>
						<a class="nav-link" id="security-tab" data-toggle="pill" href="#security" role="tab" aria-controls="security" aria-selected="false">
							<i class="fa fa-user text-center mr-1"></i> 
							My Booking
						</a>
					</div>
				</div>
				<div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
					<div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
						<h3 class="mb-4">Account Settings</h3>
						<form method="post" onsubmit="return validating();">
							<div class="row">
								<div class="col-md-6">
									<div class="input-control">
										<label>Full Name</label>
										<input name ="FullName" type="text" class="form-control" id="username" value="<?php echo htmlentities($result->UserName)?>">
										<div class="error"><?php echo $FullName_err;?></div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="input-control">
										<label>Email</label>
										<input type="email" name ="email"  class="form-control"  value="<?php echo htmlentities($result->Email)?>" disabled>
										<div class="error">Email cannot be chanaged</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="input-control">
										<label>Number phone</label>
										<input type="text" name ="numberphone" id ="numberphone" class="form-control" value="<?php echo htmlentities($result->numberphone)?>">
										<div class="error"><?php echo $numberphone_err;?></div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="input-control">
										<label>Country</label>
										<input type="text" name ="country" id ="country" class="form-control" value="<?php echo htmlentities($result->Country)?>">
										<div class="error"><?php echo $country_err;?></div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="input-control">
										<label>City</label>
										<input type="text" name ="city" id ="city" class="form-control" value="<?php echo htmlentities($result->City)?>">
										<div class="error"><?php echo $city_err;?></div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="input-control">
										<label>Address</label>
										<input type="text" name ="address" id ="address" class="form-control" value="<?php echo htmlentities($result->address)?>">
										<div class="error"><?php echo $address_err;?></div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="input-control">
										<label>Bio</label>
										<textarea class="form-control" name ="bio" id="bio" rows="4"><?php echo htmlentities($result->Bio)?></textarea>
										<div class="error"><?php echo $bio_err;?></div>
									</div>
								</div>
							</div>
							<div>
								<button class="btn btn-primary" type="submit" name="update">Update</button>
								<button class="btn btn-light">Cancel</button>
							</div>
						</form>
					</div>
						<div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
							<h3 class="mb-4">Password Settings</h3>
							
							<form method="post" onsubmit="return validate();">
								<div class="row">
									<div class="col-md-6">
										<div class="input-control">
											<label>Old password</label>
											<input type="password" name="password" id="curpassword" class="form-control">
											<div class="error"><?php echo $password_err;?></div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="input-control">
											<label>New password</label>
											<input type="password" name="newpassword" id="newpassword"  class="form-control">
											<div class="error"><?php echo $newpassword_err;?></div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="input-control">
											<label>Confirm new password</label>
											<input type="password" name="confirmpassword" id="confirmpassword" class="form-control">
											<div class="error"><?php echo $confirm_password_err;?></div>
										</div>
									</div>
									<?php echo $msg ?>
								</div>
									<br>
								<div>
									<button type="submit" name="changing" class="btn btn-primary">Update</button>
									<button class="btn btn-light">Cancel</button>
								</div>
								
							</form>
						</div>
					<div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
						<h3 class="mb-4">My Booking</h3>
						<div class="col-md-6 col-sm-8">
						<div class="profile_wrap">
						<h5 class="uppercase underline">My Bookings </h5>
						<div class="my_vehicles_list">
							<ul class="vehicle_listing">
							<?php
									$useremail=$auth["user"]["Email"];
									$sql = "SELECT vechiles.Vimage1 as Vimage1,vechiles.Vtitle,vechiles.id as vid,brands.name,booking.status,booking.booking_date,booking.userEmail  from booking join vechiles on booking.vechile_id=vechiles.id join brands on brands.id=vechiles.Vbrand where booking.userEmail=:useremail";
									$query = $connecting -> prepare($sql);
									$query-> bindParam(':useremail', $useremail, PDO::PARAM_STR);
									$query->execute();
									$results=$query->fetchAll(PDO::FETCH_OBJ);
									$cnt=1;
									if($query->rowCount() > 0)
									{
									foreach($results as $result)
									{  
							?>
								<li>
									<div class="vehicle_img">
										<a href="car-details.php?id=<?php echo htmlentities($result->vid);?>"><img style="width: 22rem;" src="../image/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" alt="image"></a>
									</div>
									<div class="vehicle_title">
										<h6><a href="car-details.php?id=<?php echo htmlentities($result->vid);?>"> <?php echo htmlentities($result->name);?> , <?php echo htmlentities($result->Vtitle);?></a></h6>
										<p><b>From Date:</b> <?php echo htmlentities($result->booking_date);?><br/>
									</div>
									<?php 
										if($result->status==1)
									{ ?>
									<div class="vehicle_status"> 
										<a href="#" class="btn outline btn-xs active-btn">Confirmed</a>
										<div class="clearfix"></div>
									</div>
									<?php } else if($result->status==2) { ?>
									<div class="vehicle_status">
										<a href="#" class="btn outline btn-xs">Cancelled</a>
										<div class="clearfix"></div>
									</div>
										<?php } else { ?>
									<div class="vehicle_status"> <a href="#" class="btn outline btn-xs">Not Confirm yet</a>
											<div class="clearfix"></div>
										</div>
								</li>
									<?php }}} ?>
							</ul>
						</div>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php 	
}
}
}else{
	header("location:https://maxwheels-ye.000webhostapp.com");
}

 include("../includes/footer.php");
?>
</body>
</html>