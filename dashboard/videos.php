<?php
include_once "../db/db.php";
require_once 'checker.php';
include_once "header.php";
$video = "SELECT * FROM videos ORDER BY id DESC";
$retrieved_videos= $conn->query($video);
?>
<script type="text/javascript">
  $("#videos").addClass("active");
</script>
  <div class="container-fluid" style="margin-bottom:100px">
    <div class="container table-responsive mt-5">
      <div style="margin-bottom:15px; padding-bottom: 10px; width:fit-content;" id="blue-line">
          <h1 class="anton-font">VIDEOS</h1>
      </div>
          <button type="button" name="button"class="btn btn-primary" style="position: absolute; right:10%" data-bs-toggle="modal" data-bs-target="#add-service">Upload Videos</button>
          <div class="modal fade" id="add-service" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title" >Add Video</h3>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                  <form id='add_videos' onsubmit="return add('add_videos');" action="add-videos" method="post" enctype="multipart/form-data">
                <div class="modal-body ms-2">
                  <label  for="title"><b>Title</b></label><br>
                  <textarea class="form-control" id="title" name="title" placeholder="Title" maxlength="100" required></textarea><br>
                    <label  for="change"><b>Gallery Video</b></label><br>
                    <small>Max size 100MB and valid file types are 'mp4', 'mov', 'wmv', 'webm', 'mkv', and 'avi'.</small><br>
                    <input class="form-control" type="file" name="video" id='change' accept="video/*" required>
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
        while ($array_video_result = mysqli_fetch_assoc($retrieved_videos)) {
          $num++;
          ?>
            <div class="col-lg-8 pt-5">
              <video style="width: 100%;height: 500px; background-color: black;" class="shadow" controls >
                <source src="../gallery_media/<?php echo $array_video_result['file_name']; ?>" type="video/<?php echo $array_video_result["file_extension"]; ?>" />
                </video>
            </div>
            <div class="col-lg-4 pt-5 my-auto">
              <h1 class="anton-font"><?php echo $array_video_result["title"];?> </h1>
               <blockquote class="blockquote mb-3 mt-3">
                 <p style="font-size: 15px">
                   This video can be seen in your video gallery.
                 </p>
               </blockquote>
                <button type="button" class="btn btn-danger" onclick="return delete1('delete-videos?id=<?php echo $array_video_result['id'];?>')" >DELETE</button>
                <button type="button" name="button"class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?php echo $num; ?>">EDIT</button>
                <div class="modal fade" id="edit<?php echo $num;  ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h3 class="modal-title" ><?php echo $array_video_result['title'];?></h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                        <form id='update_video<?php echo $num; ?>' onsubmit="return update('update_video<?php echo $num; ?>');" action="update-video?id=<?php echo $array_video_result['id']; ?>" method="post" enctype="multipart/form-data">
                      <div class="modal-body ms-2">
                          <label for="title"><B>Title</B></label><br>
                          <small>100 max characters</small>
                          <textarea class="form-control" id="title" name="title" placeholder="Title" maxlength="100" required><?php echo $array_video_result['title'];?> </textarea><br>
                          <label for="change"><b>Change video</b></label><br>
                          <small>Max size 100MB and valid file types are 'mp4', 'mov', 'wmv', 'webm', 'mkv', and 'avi'.</small><br>
                          <input class="form-control" type="file" name="video" id='change' accept="video/*">
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="button">UPDATE</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
            </div>
        <?php
      }
         ?>

         </div>
      </div>
    </div>

















<?php include_once "footer.php"; ?>
