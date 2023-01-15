	<?php
	session_start();
	error_reporting(0);
	require("../controller/connection.php");
	if(!isset($_COOKIE['maxwheelsu']))

	{	
	header('location:index.php');
	}
	else{
	// Code for change password	
	if(isset($_POST['submit']))
	{
	$brand=$_POST['brand'];
	$id=$_GET['id'];
	$date = date("Y-m-d h:i:sa");

	$sql="update  brands set name=:brand,updating_date =:updating_date where id=:id";
	$query = $connecting->prepare($sql);
	$query->bindParam(':brand',$brand,PDO::PARAM_STR);
	$query->bindParam(':id',$id,PDO::PARAM_STR);
	$query->bindParam(':updating_date',$date,PDO::PARAM_STR);
	$query->execute();
	$lastInsertId = $connecting->lastInsertId();

	$msg="Brand updted successfully";

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

	<h2 class="page-title">Create Brand</h2>

	<div class="row">
	<div class="col-md-10">
	<div class="panel panel-default">
	<div class="panel-heading">Form fields</div>
	<div class="panel-body">
		<form method="post" name="chngpwd" class="form-horizontal" onSubmit="return valid();">
		
			
	<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
	else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

	<?php	
	$id=$_GET['id'];
	$ret="select * from brands where id=:id";
	$query= $connecting -> prepare($ret);
	$query->bindParam(':id',$id, PDO::PARAM_STR);
	$query-> execute();
	$results = $query -> fetchAll(PDO::FETCH_OBJ);
	$cnt=1;
	if($query -> rowCount() > 0)
	{
	foreach($results as $result)
	{
	?>

			<div class="form-group">
				<label class="col-sm-4 control-label">Brand Name</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" value="<?php echo htmlentities($result->name);?>" name="brand" id="brand" required>
				</div>
			</div>
			<div class="hr-dashed"></div>
			
		<?php }} ?>

			
			<div class="form-group">
				<div class="col-sm-8 col-sm-offset-4">

					<button class="btn btn-primary" name="submit" type="submit">Update</button>
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