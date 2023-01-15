<?php
	session_start();
	error_reporting(0);
	require("../controller/connection.php");
	if(!isset($_COOKIE['maxwheelsu']))
	{	
		header('location:https://maxwheels-ye.000webhostapp.com');
	}
	else{	
		if(isset($_POST['submit']))
		{
			if(isset($_COOKIE['maxwheelsu'])){  
				$auth["user"] =json_decode($_COOKIE['maxwheelsu'],true);
			}

			// Validate confirm password
			if(empty(trim($_POST["newpassword"]))){
				$error = "Please confirm password.";     
			}
			elseif(strlen(trim($_POST["newpassword"])) <= 8){
				$error = "Confirm Password must have atleast 8 characters.";
			}
			if(empty($error) &&($_POST["newpassword"] != $_POST["confirmpassword"])){
				$error = "Password did not match.";
			}
			
			if(empty($error)){
				$password = md5(sha1(md5(sha1(md5($_POST["password"] )))));
				$newpassword =md5(sha1(md5(sha1(md5($_POST["newpassword"])))));
				$email= $auth["user"]["Email"];
				$sql ="SELECT password FROM users WHERE Email=:email AND Password=:password";
				$query= $connecting -> prepare($sql);
				$query-> bindParam(':email', $email, PDO::PARAM_STR);
				$query-> bindParam(':password', $password, PDO::PARAM_STR);
				$query-> execute();
				$results = $query -> fetchAll(PDO::FETCH_OBJ);
				if($query -> rowCount() > 0)
				{

					$con="UPDATE users set Password=:newpassword where Email=:email";
					$chngpwd1 = $connecting->prepare($con);
					$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
					$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
					$chngpwd1->execute();
					$msg="Your Password succesfully changed";
				}
				else {
					$error="Your current password is not correct.";	
			}}
		}
?>

<!doctype html>
<html lang="en" class="no-js">

	<?php include("includes/head.php");?>

	<body>
		<?php include('includes/header.php');?>
		<div class="ts-main-content">
			<?php include('includes/leftbar.php');?>
			<div class="content-wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<h2 class="page-title">Change Password</h2>
							<div class="row">
								<div class="col-md-10">
									<div class="panel panel-default">
										<div class="panel-heading">Form fields</div>
									<div class="panel-body">
										<form method="post" name="chngpwd" class="form-horizontal" onsubmit="return valid();">
											<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
											else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
											<div class="form-group">
												<label class="col-sm-4 control-label">Current Password</label>
												<div class="col-sm-8">
													<input type="password" class="form-control" name="password" id="password" required>
												</div>
											</div>
											<div class="hr-dashed"></div>
											<div class="form-group">
												<label class="col-sm-4 control-label">New Password</label>
												<div class="col-sm-8">
													<input type="password" class="form-control" name="newpassword" id="newpassword" required>
												</div>
											</div>
											<div class="hr-dashed"></div>
											<div class="form-group">
												<label class="col-sm-4 control-label">Confirm Password</label>
												<div class="col-sm-8">
													<input type="password" class="form-control" name="confirmpassword" id="confirmpassword" required>
												</div>
											</div>
											<div class="hr-dashed"></div>
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
													<button class="btn btn-primary" name="submit" type="submit">Save changes</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Loading Scripts -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap-select.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/dataTables.bootstrap.min.js"></script>
		<script src="js/Chart.min.js"></script>
		<script src="js/fileinput.js"></script>
		<script src="js/chartData.js"></script>
		<script src="js/main.js"></script>

	</body>

</html>
<?php } ?>