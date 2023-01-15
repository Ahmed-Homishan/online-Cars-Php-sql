<?php 
require("../controller/connection.php");
if (isset($_GET['id'])){
    $block = intval(($_GET['id']));
    $activity = "UPDATE users SET Activity='0' WHERE id=:Block ; ";
    $activity=$connecting->prepare($activity);
    $activity->bindParam(":Block",$block, PDO::PARAM_STR);
    $activity->execute();
}

header('location:adminPage.php');
?>