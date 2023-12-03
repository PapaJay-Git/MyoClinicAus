<?php
include_once 'db/db.php';
include_once "visits.php";
include_once "header.php";
$video = "SELECT * FROM videos ORDER BY id DESC";
$retrieved_videos= $conn->query($video);
?>
<script type="text/javascript">
  $("#gallery-nav").addClass("active");
</script>
<!-- Background image -->
<div class="pt-4 text-center bg-image"style="background: url(WEBSITE/A_1_HEADING/A_OUTSTANDING_RESULTS.webp);  box-shadow: inset 0 0 0 1000px rgba(0,0,0,.3);  background-size: cover; background-repeat: no-repeat; background-position:center; height: 90vh; ">
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
    <div style=" padding-bottom: 10px; width:fit-content;" id="orange-line">
        <h1 class="anton-font">VIDEO GALLERY</h1>
    </div>
    <?php
    $num = 1;
    while ($array_video_result = mysqli_fetch_assoc($retrieved_videos)) {
      ?>
      <div class="pt-5 pb-5">
        <h3><b><?php echo $array_video_result['title']; ?></b></h3>
            <video style="width: 100%;height: 500px; background-color: black;" class="shadow" controls >
              <source src="gallery_media/<?php echo $array_video_result['file_name']; ?>" type="video/<?php echo $array_video_result["file_extension"]; ?>" />
              </video>
      </div>
    <?php
  }
     ?>
  </div>
<?php include_once "footer.php"; ?>
<!-- gallery -->
