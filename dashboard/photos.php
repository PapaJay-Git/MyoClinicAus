<?php
include_once "../db/db.php";
require_once 'checker.php';
include_once "header.php";
$photo = "SELECT * FROM photos ORDER BY id DESC";
$retrieved_photos= $conn->query($photo);
?>
<script type="text/javascript">
  $("#photos").addClass("active");
</script>
  <div class="container-fluid" style="margin-bottom:100px">
    <div class="container table-responsive mt-5">
      <div style="margin-bottom:15px; padding-bottom: 10px; width:fit-content;" id="blue-line">
          <h1 class="anton-font">PHOTOS</h1>
      </div>
          <button style="position: absolute; right:10%" type="button" name="button"class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#add-service">Upload Photos</button>
          <div class="modal fade" id="add-service" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title" >Add Photo</h3>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                  <form id='add_photos' onsubmit="return add('add_photos');" action="add-photos" method="post" enctype="multipart/form-data">
                <div class="modal-body ms-2">
                    <label  for="change"><b>Gallery Photo</b></label><br>
                    <small>Max size 25MB and valid file types are 'jpg', 'jpeg', 'png', and 'gif'.</small><br>
                    <input type="file" class="form-control" name="image" id='change' accept="image/*" required>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" name="button" >UPLOAD</button>
                </div>
              </form>
              </div>
            </div>
          </div>
        <div class="row">
        <?php
        $num = 1;
        while ($array_photo_result = mysqli_fetch_assoc($retrieved_photos)) {
          $id = $array_photo_result["id"];
          ?>
            <div class="col-lg-8 pt-5">
                <img loading="lazy"  class="image-fixed-size-2"src="../gallery_media/<?php echo $array_photo_result['file_name']; ?>">
            </div>
            <div class="col-lg-4  pt-5 my-auto">
              <h1 class="anton-font">IMAGE ID NO. <?php echo $id = $array_photo_result["id"];?></h1>
               <blockquote class="blockquote mb-3 mt-3">
                 <p style="font-size: 15px">
                   This picture can be seen in your photo gallery.
                 </p>
               </blockquote>
                <button type="button" class="btn btn-danger" onclick="return delete1('delete-photos?id=<?php echo $id;?>')" >DELETE</button>
            </div>
        <?php
      }
         ?>

         </div>
      </div>
    </div>


<?php include_once "footer.php"; ?>
