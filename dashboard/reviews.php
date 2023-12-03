<?php
include_once "../db/db.php";
require_once 'checker.php';
include_once "header.php";
$reviews = "SELECT * FROM reviews ORDER BY id DESC";
$retrieved_reviews= $conn->query($reviews);
?>
<script type="text/javascript">
  $("#reviews-nav").addClass("active");
</script>
  <div class="container-fluid" style="margin-bottom:100px">
    <div class="container table-responsive mt-5">
      <div style="margin-bottom:15px; padding-bottom: 10px; width:fit-content;" id="blue-line">
          <h1 class="anton-font">CUSTOMER REVIEWS</h1>
      </div>
      <button type="button" name="button"class="btn btn-primary mb-5 float-end" data-bs-toggle="modal" data-bs-target="#add-reviews">Add reviews</button>
      <div class="modal fade" id="add-reviews" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" >Add Review</h3>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
              <form action="add-reviews" id='add_reviews' onsubmit="return add('add_reviews');" method="post" enctype="multipart/form-data">
            <div class="modal-body ms-2">
                <label for="sourceName"><B>Soure Name</B></label><br>
                <small>100 max characters</small>
                <input class="form-control" type="text" id='sourceName' name="sourceName" required maxlength="100">
                <label class="mt-3"for="description"><B>Description</B></label><br>
                <small>500 max characters</small>
                <textarea name="description" id='description' class="form-control" rows="6" required maxlength="500"></textarea>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" name="button">ADD</button>
            </div>
          </form>
          </div>
        </div>
      </div>
      <table class="table table-striped">
        <tr>
          <th>Source Name</th>
          <th>Description</th>
          <th>Action</th>
        </tr>
        <?php
        $num = 0;
        while ($array_reviewss_result = mysqli_fetch_assoc($retrieved_reviews)) {
          $num ++;
          ?>
        <tr>
          <td><?php echo $array_reviewss_result['source_name'];?></td>
          <td><?php echo $array_reviewss_result['reviews'];?></td>
          <td>
            <div class="btn btn-group">
              <button type="button" name="button"class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?php echo $num; ?>">EDIT</button>
              <button type="button" name="button" class="btn btn-danger" onclick="return delete1('delete-reviews?id=<?php echo $array_reviewss_result['id'];?>')" >DELETE</button>
            </div>
        </td>
        </tr>
        <div class="modal fade" id="edit<?php echo $num;  ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title anton-font" ><?php echo $array_reviewss_result['source_name'];?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
                <form id='update_reviews<?php echo $num; ?>' onsubmit="return update('update_reviews<?php echo $num;?>');" action="update-reviews.php?id=<?php echo $array_reviewss_result['id']; ?>" method="post" enctype="multipart/form-data">
              <div class="modal-body ms-2">
                  <label for="title"><B>Source Name</B></label><br>
                  <input class="form-control" type="text" id='title' name="title" value="<?php echo $array_reviewss_result['source_name'];?>">
                  <label class="mt-3"for="price"><B>reviews</B></label><br>
                  <textarea name="description" id='price' class="form-control" rows="6"><?php echo $array_reviewss_result['reviews'];?></textarea>
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
      </table>
      </div>
    </div>
<?php include_once "footer.php"; ?>
