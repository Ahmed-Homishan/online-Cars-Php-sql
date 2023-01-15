<?php
session_start();
error_reporting(0);
require("../controller/connection.php");
if(!isset($_COOKIE['maxwheelsu']))

{
header('location:https://maxwheels-ye.000webhostapp.com');
}
else{
    include("../includes/counter.php");
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

<h2 class="page-title">Dashboard</h2>

<div class="row">
<div class="col-md-12">
<div class="row">
<div class="col-md-3">
<div class="card" style="box-shadow:5px 8px 14px 0px;">
<div class="panel-body bk-primary text-light">
<div class="stat-panel text-center">
<?php 
$sql ="SELECT id from users WHERE (User_type != 0 AND User_type != 1);";
$query = $connecting->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$regusers=$query->rowCount();
?>
<div class="stat-panel-number h1 "><?php echo htmlentities($regusers);?></div>
<div class="stat-panel-title text-uppercase">Regsited Users</div>
</div>
</div>
<a href="reg-users.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
</div>
</div>
<div class="col-md-3">
<div class="card" style="box-shadow:5px 8px 14px 0px;">
<div class="panel-body bk-success text-light">
<div class="stat-panel text-center">
<?php 
$sql1 ="SELECT id from vechiles ;";
$query1 = $connecting -> prepare($sql1);;
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totalvehicle=$query1->rowCount();
?>
<div class="stat-panel-number h1 "><?php echo htmlentities($totalvehicle);?></div>
<div class="stat-panel-title text-uppercase">Listed Vehicles</div>
</div>
</div>
<a href="manage-vehicles.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
</div>
</div>
<div class="col-md-3">
<div class="card" style="box-shadow:5px 8px 14px 0px;">
<div class="panel-body bk-info text-light">
<div class="stat-panel text-center">
<?php 
$sql2 ="SELECT id from booking ;";
$query2= $connecting -> prepare($sql2);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
$bookings=$query2->rowCount();
?>

<div class="stat-panel-number h1 "><?php echo htmlentities($bookings);?></div>
<div class="stat-panel-title text-uppercase">Total Bookings</div>
</div>
</div>
<a href="manage-bookings.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
</div>
</div>
<div class="col-md-3">
<div class="card" style="box-shadow:5px 8px 14px 0px;">
<div class="panel-body bk-warning text-light">
<div class="stat-panel text-center">
<?php 
$sql3 ="SELECT id from brands ;";
$query3= $connecting -> prepare($sql3);
$query3->execute();
$results3=$query3->fetchAll(PDO::FETCH_OBJ);
$brands=$query3->rowCount();
?>												
<div class="stat-panel-number h1 "><?php echo htmlentities($brands);?></div>
<div class="stat-panel-title text-uppercase">Listed Brands</div>
</div>
</div>
<a href="manage-brands.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
</div>
</div>

<div class="col-md-3">
    <div class="card" style="box-shadow:5px 8px 14px 0px;">
        <div class="panel-body bk-warning text-light">
            <div class="stat-panel text-center">
                <?php 
                $sql4 ="SELECT id FROM users WHERE User_type = 1 ;";
                $query4= $connecting -> prepare($sql4);
                $query4->execute();
                $results4=$query4->fetchAll(PDO::FETCH_OBJ);
                $admins=$query4->rowCount();
                ?>												
                <div class="stat-panel-number h1 "><?php echo htmlentities($admins);?></div>
                <div class="stat-panel-title text-uppercase">Admins</div>
            </div>
        </div>
        <a href="adminPage.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
    </div>
</div>


<div class="col-md-3">
    <div class="card" style="box-shadow:5px 8px 14px 0px;">
        <div class="panel-body bk-warning text-light">
            <div class="stat-panel text-center">					
                <div class="stat-panel-number h1 "><?php echo display() ;?></div>
                <div class="stat-panel-title text-uppercase">Vistors</div>
            </div>
        </div>
       </div>
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

<script>

window.onload = function(){

// Line chart from swirlData for dashReport
var ctx = document.getElementById("dashReport").getContext("2d");
window.myLine = new Chart(ctx).Line(swirlData, {
responsive: true,
scaleShowVerticalLines: false,
scaleBeginAtZero : true,
multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
}); 

// Pie Chart from doughutData
var doctx = document.getElementById("chart-area3").getContext("2d");
window.myDoughnut = new Chart(doctx).Pie(doughnutData, {responsive : true});

// Dougnut Chart from doughnutData
var doctx = document.getElementById("chart-area4").getContext("2d");
window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {responsive : true});

}
</script>
</body>
</html>
<?php } ?>