<?php include "includes/cfs_header.php"; ?>

<!--=================================
product-listing  -->

<section class="product-listing page-section-ptb">
    <div class="container">
     <div class="row">
        <div class="col-lg-12 col-md-12">
          
           <div class="row">

                
<?php

                  $per_page = 9;

                  if(isset($_GET['page'])) {
                    $page = $_GET['page'];
                  } else {
                    $page = "";
                  }

                  if($page == "" || $page == 1) {
                    $page_1 = 0;
                  } else {
                    $page_1 = ($page * $per_page) - $per_page;
                  }

                  $listing_type = 'featured';
                  $post_count_query = "SELECT * from vehicles where listing_type LIKE '$listing_type'";
                  $find_count = mysqli_query($con, $post_count_query);
                  $count = mysqli_num_rows($find_count);

                  $count = ceil($count/$per_page);
?>

<?php
                  $listing_type = 'featured';

                  $sql = "SELECT * from vehicles where listing_type LIKE '$listing_type' limit $page_1, $per_page";
                  $query = $dbh->prepare($sql);
                  $query->execute();
                  $results=$query->fetchAll(PDO::FETCH_OBJ);

                  if($query->rowCount() > 0) {
                    foreach($results as $result) {
                      $vehicle_id = htmlentities($result->vehicle_id);
                      $vehicle_make =  htmlentities($result->vehicle_make);
                      $vehicle_model = htmlentities($result->vehicle_model);
                      $vehicle_year = htmlentities($result->vehicle_year);
                      $vehicle_image1 = htmlentities($result->vehicle_image1);
                      $vehicle_price = htmlentities($result->vehicle_price);
                      $vehicle_status = htmlentities($result->vehicle_status);
                      $vehicle_condition = htmlentities($result->vehicle_condition);
                      $vehicle_transmission = htmlentities($result->vehicle_transmission);
                      $vehicle_color = htmlentities($result->vehicle_color);
                      $vehicle_listing_type = htmlentities($result->listing_type);
                      $vehicle_overview = htmlentities($result->vehicle_overview);

                ?>
 
             <div class="col-lg-4">
               <div class="car-item gray-bg text-center">
                <div class="car-image">
                      <img src="img/<?php echo htmlentities($result->vehicle_image1);?>" height="270" alt="">
                      <div class="car-overlay-banner">
                   <ul> 
                     <li><a href="car-details.php?vehicle_id=<?php echo $result->vehicle_id; ?>"><i class="fa fa-link"></i></a></li>
                     <li><a href="car-details.php?vehicle_id=<?php echo $result->vehicle_id; ?>"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="car-list">
                  <ul class="list-inline">
                    <li><i class="fa fa-registered"></i><?php echo $result->vehicle_year; ?></li>
                  <li><i class="fa fa-cog"></i><?php echo $result->vehicle_transmission; ?></li>
                  <li><i class="fa fa-dashboard"></i><?php echo $result->vehicle_status; ?></li>
                  </ul>
               </div>
                <div class="car-content">
                  <a href="car-details.php?vehicle_id=<?php echo $result->vehicle_id; ?>"><?php echo $result->vehicle_make.' '.$result->vehicle_model; ?></a>
                  <div class="separator"></div>
                  <div class="price">
                    <span class="new-price">N<?php echo $result->vehicle_price; ?></span>
                  </div>
                </div>
              </div>
              </div>

                    <?php  }  }
      ?>
      
             
             </div>
             <div class="pagination-nav d-flex justify-content-center">
                  <ul class="pagination">
                    <li><a href="#">«</a></li>
                    <?php
                      for($i = 1; $i <= $count; $i++) {
                        if($i == $page){
                          echo "<li class=\"active\"><a href=\"cars-for-sale.php?page={$i}\">{$i}</a></li>";
                        }else {
                          echo "<li><a href=\"cars-for-sale.php?page={$i}\">{$i}</a></li>";
                        }
                      }
                    ?>
                    <li><a href="#">»</a></li>
                    <!-- <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li> -->

                  </ul>
             </div>
          </div>
        </div>
     </div>
   </section>
   
   <!--=================================
   product-listing  -->


<?php include "includes/footer.php"; ?>