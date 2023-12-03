<?php
include_once "../db/db.php";
require_once 'checker.php';
include_once "header.php";
$services = "SELECT * FROM services ORDER BY id DESC";
$retrieved_services= $conn->query($services);
?>
<script type="text/javascript">
  $("#services").addClass("active");
</script>
  <div class="container-fluid" style="margin-bottom:100px">
    <div class="container table-responsive mt-5">
      <div style="margin-bottom:15px; padding-bottom: 10px; width:fit-content;" id="blue-line">
          <h1 class="anton-font">SERVICES</h1>
      </div>
        <button type="button" name="button"class="btn btn-primary" style="position: absolute; right:10%" data-bs-toggle="modal" data-bs-target="#add-service">Add Service</button>
        <div class="modal fade" id="add-service" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title" >Add Service</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
                <form id='add_services' onsubmit="return add('add_services');" action="add-service" method="post" enctype="multipart/form-data">
              <div class="modal-body ms-2">
                  <label for="title"><B>Title</B></label><br>
                  <small>100 max characters</small>
                  <input class="form-control" type="text" id='title' name="title" required maxlength="100">
                  <label class="mt-3"for="Price"><B>Price</B></label><br>
                  <small>100 max characters</small>
                  <input class="form-control" type="text" id='price' name="price" required maxlength="100">
                  <label class="mt-3"for="price"><B>Description</B></label><br>
                  <small>500 max characters</small>
                  <textarea name="description" id='price' class="form-control" rows="6" required maxlength="500"></textarea>
                  <label class="mt-3" for="change"><b>Change cover</b></label><br>
                  <small>Max size 25MB and valid file types are 'jpg', 'jpeg', 'png', and 'gif'.</small><br>
                  <input type="file" class="form-control" name="cover-image" id='change' accept="image/*" required>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="button">ADD</button>
              </div>
            </form>
            </div>
          </div>
        </div>
<div class="row mt-5 pt-3">
        <?php
        $num = 0;
        while ($array_services_result = mysqli_fetch_assoc($retrieved_services)) {
          $serviceid = $array_services_result["id"];
          $result = $conn->query("SELECT * FROM services_media WHERE service_id = $serviceid LIMIT 1 ");
          $row2 = $result->fetch_assoc();
          $num ++;
          ?>
          <div class="col-lg-8 pb-5">
              <img loading="lazy"  class="image-fixed-size-2"src="../service_media/<?php echo $row2['file_name']; ?>">
          </div>
          <div class="col-lg-4 pb-5 my-auto">
            <h1 class="anton-font"><?php echo $array_services_result['service_title'];?></h1>
            <small><?php echo $array_services_result['service_price'];?></small>
             <blockquote class="blockquote ">
               <p style="font-size: 15px">
                 <?php echo $array_services_result['service_desc'];?>
               </p>
             </blockquote>
               <button type="button" name="button"class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?php echo $num; ?>">EDIT</button>
               <button type="button" class="btn btn-danger" onclick="return delete1('delete-services?id=<?php echo $array_services_result['id'];?>')" >DELETE</button>
          </div>

        <div class="modal fade" id="edit<?php echo $num;  ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title" ><?php echo $array_services_result['service_title'];?></h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
                <form id='update_service<?php echo $num; ?>' onsubmit="return update('update_service<?php echo $num; ?>');" action="update-services?id=<?php echo $array_services_result['id']; ?>&cover-id=<?php echo $row2['id']; ?>" method="post" enctype="multipart/form-data">
              <div class="modal-body ms-2">
                  <label for="title"><B>Title</B></label><br>
                  <small>100 max characters</small>
                  <input class="form-control" type="text" id='title' name="title" value="<?php echo $array_services_result['service_title'];?>" required maxlength="100">
                  <label class="mt-3"for="Price"><B>Price</B></label><br>
                  <small>100 max characters</small>
                  <input class="form-control" type="text" id='price' name="price" value="<?php echo $array_services_result['service_price'];?>" required maxlength="100">
                  <label class="mt-3"for="price"><B>Description</B></label><br>
                  <small>500 max characters</small>
                  <textarea name="description" id='price' class="form-control" rows="6" required maxlength="500"><?php echo $array_services_result['service_desc'];?></textarea>
                  <label class="mt-3" for="change"><b>Change cover</b></label><br>
                  <small>Max size 25MB and valid file types are 'jpg', 'jpeg', 'png', and 'gif'.</small><br>
                  <input type="file" name="cover" id='change' accept="image/*">
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="button">UPDATE</button>
              </div>
            </form>
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
