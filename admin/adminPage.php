<?php
	session_start();
	error_reporting(0);
	require("../controller/connection.php");
	if(!isset($_COOKIE['maxwheelsu']))

	{	
	header('location:https://maxwheels-ye.000webhostapp.com');
	}
	else{
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
							<h2 class="page-title">Registered Admins</h2>
							<div class="panel panel-default">
								<div class="panel-heading">Reg Users</div>
									<div class="panel-body" style="overflow: overlay;">
										<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
											else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
											<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
												<thead>
													<tr>
														<th>#</th>
														<th> Name</th>
														<th>Email </th>
														<th>Contact no</th>
														<th>Age</th>
														<th>Address</th>
														<th>City</th>
														<th>Country</th>
														<th>Activity</th>
														<?php
															if($auth['user']["User_type"] == '0'){
																echo'<th>Rmove From Admin</th>';
															}?>
														<th>Registion Date</th>
														<th>Updating Date</th>
													</tr>
												</thead>
												<tbody>
													<?php
														$sql = "SELECT * from  users  WHERE User_type = 1 ;";
														$query = $connecting -> prepare($sql);
														$query->execute();
														$results=$query->fetchAll(PDO::FETCH_OBJ);
														$cnt=1;
														if($query->rowCount() > 0)
														{
															foreach($results as $result)
														{
													?>	
													<tr>
														<td><?php echo htmlentities($cnt);?></td>
														<td><?php echo htmlentities($result->UserName);?></td>
														<td><?php echo htmlentities($result->Email);?></td>
														<td><?php echo htmlentities($result->numberPhone);?></td>
														<td><?php echo htmlentities($result->Age);?></td>
														<td><?php echo htmlentities($result->address);?></td>
														<td><?php echo htmlentities($result->City);?></td>
														<td><?php echo htmlentities($result->Country);?></td>
														<td><?php 
															if($auth["user"]["User_type"] == '0'){
																if( $result->Activity == '1'){
																	echo "<a href=deactivate.php?id=".($result->id)." class='btns btns-outline-danger'>Bannd</a>";
																}else{
																	echo"<a href=activate.php?id=".($result->id)." class='btns btns-outline-scuess'>Unbannd</a>";
																}
															}else{
																if( $result->Activity == '1'){
																echo "<p class='scuess'>Activitied</p>";
															}else{
																echo "<p class='danger'>Unactivitied</p>";
															}
														}
														?></td>
														<?php if($auth['user']["User_type"] == '0'){
															if($result->User_type == '1' ){
															echo"<td><a href=deprmote.php?id=".($result->id)." class='btns btns-outline-danger'>Remove</a></td>";
														}}?>
														<td><?php echo htmlentities($result->RegDate);?></td>
														<td><?php echo htmlentities($result->updationDate);?></td>
													</tr>
													<?php 
														$cnt=$cnt+1;
													}}	
													?>
												</tbody>
											</table>
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
