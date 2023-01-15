<!DOCTYPE HTML>
<html>
   
    <!-- head -->
    <?php include("../includes/head.php");?>
    
    <body>
        <!-- header -->
        <?php include("../includes/header.php"); ?>

        <section class="featured" id="featured">  
            <h1 class="heading"> our <span>featured</span> </h1>
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
            <div class="box-container">
            <div class="box">
                <img src="../image/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" alt="">
                <h3><?php echo htmlentities($result->Vtitle);?></h3>
                <p><i class="far fa-"></i>  <?php echo htmlentities($result->model);?></p>
                <p><?php echo htmlentities($result->brandName);?></p>
                <div class="price">$<?php echo htmlentities($result->Price);?></div>
                <a href="car-details.php?id=<?php echo htmlentities($result->id);?>" class="btn">check out</a>
            </div>
            <?php $cnt=$cnt+1; }} ?>
        </div>

</section>
    <?php include("../includes/footer.php")?>
    </body>
</html>