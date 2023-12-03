<?php

require_once "db/db.php";
include_once "visits.php";
include_once "header.php";

$dirname = "images/gallery/";
$images = glob("{$dirname}*.{jpg,png,jpeg,JPG,PNG,JPEG}", GLOB_BRACE);

?>
<script type="text/javascript">
  $("#gallery-nav").addClass("active");
</script>
<!-- Background image -->
<div class="pt-4 text-center bg-image"style="background: url(WEBSITE/A_1_HEADING/A_OUTSTANDING_RESULTS.webp); box-shadow: inset 0 0 0 1000px rgba(0,0,0,.3);  background-size: cover; background-repeat: no-repeat; background-position:center; height: 90vh; ">
          <div class="d-flex justify-content-center align-items-center h-100 pt-5">
            <div class="text-white">
              <h1 class="display-4 anton-font pt-5">GALLERY</h1>
              <h4 class="t-bold textDesign2 ">MYO CLINIC</h4>
              <p class="textDesign2 "><img loading="lazy"  class ="logo " src="images/maps.png" width="17px" height="17px">
                 Nerang, Gold Coast, QLD, Australia, 4211
              </p>
            </div>
          </div>
      </div>
<!-- Background image-->

<!-- Gallery -->


  <div class="container-fluid ps-lg-5 ps-sm-4 ps-3 pe-lg-5 pe-sm-4 pe-3 pt-5 pb-5" >
    <div style="padding-bottom: 10px; width:fit-content;" id="orange-line">
        <h1 class="anton-font">PHOTO GALLERY</h1>
    </div>
    <?php
    $result = $conn->query("SELECT * FROM photos");
     ?>

    <div class="row pt-5">
      <?php
      if($result->num_rows > 0){
       while($row = $result->fetch_assoc()){ ?>

       <div class="col-sm-6 col-md-4 col-lg-2 mt-3">
         <div class="card shadow bg-white rounded">
           <img loading="lazy"  class="image-fixed-size-250 shadow" src="gallery_media/<?php echo $row['file_name']; ?>" alt="Logo of trusted Partners">
         </div>
       </div>
     <?php  }
        }else{ ?>
           <p class="status error">Image(s) not found...</p>
       <?php }?>

    </div>
  </div>
<!-- gallery -->
<?php include_once "footer.php"; ?>
