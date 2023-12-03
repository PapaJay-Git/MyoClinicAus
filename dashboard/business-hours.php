<?php
include_once "../db/db.php";
require_once 'checker.php';
include_once "header.php";
$businesshours = "SELECT * FROM business_hours ORDER BY id ASC";
$retrieved_businesshours= $conn->query($businesshours);
?>
<script type="text/javascript">
  $("#hours").addClass("active");
</script>
  <div class="container-fluid" style="margin-bottom:200px">
    <div class="container table-responsive mt-5">
      <div style="margin-bottom:25px; padding-bottom: 10px; width:fit-content;" id="blue-line">
          <h1 class="anton-font">BUSINESS HOURS</h1>
      </div>

  <form action="update-business-hour" id='businesshours' onsubmit="return update('businesshours');"method="post" enctype="multipart/form-data">
    <button type="submit" class="btn btn-primary mb-3 float-end" name="button">SAVE</button>
      <table class="table table-striped">
        <tr>
          <th>Days</th>
          <th >Start</th>
          <th >End</th>
          <th >Status</th>
        </tr>
        <?php
        $num = 0;
        while ($array_businesshours_result = mysqli_fetch_assoc($retrieved_businesshours)) {
          $valid_time = ['6:00 AM', '7:00 AM','8:00 AM','9:00 AM','10:00 AM','11:00 AM','12:00 PM', '1:00 PM', '2:00 PM','3:00 PM','4:00 PM','5:00 PM','6:00 PM','7:00 PM','8:00 PM', '9:00 PM'];
          ?>
        <tr>
          <td class="pt-3"><b><?php echo $array_businesshours_result['days'];?></b></td>
          <td>
            <input type="text" name="id[]" value="<?php echo $array_businesshours_result['id'];?>" hidden>
              <select class="form-control" name="schedule_start[]" style="margin-top:10px;">
                <?php foreach ($valid_time as $key => $value) {
                  if ($array_businesshours_result['schedule_start'] == $value) {
                    ?>
                    <option selected><?php echo $value; ?></option>
                    <?php
                  }else {
                    ?>
                    <option><?php echo $value; ?></option>
                    <?php
                  }
                } ?>
              </select>
          </td>
          <td>
            <select class="form-control" name="schedule_end[]" style="margin-top:10px;">
                <?php foreach ($valid_time as $key => $value) {
                  if ($array_businesshours_result['schedule_end'] == $value) {
                    ?>
                    <option selected><?php echo $value; ?></option>
                    <?php
                  }else {
                    ?>
                    <option><?php echo $value; ?></option>
                    <?php
                  }
                } ?>
            </select>
          </td>
          <td>
          <?php
          $stat = $array_businesshours_result['status'];
          if($stat == "OPEN"){
            ?>
          <div class="form-check form-check-inline pt-2">
            <input class="form-check-input" type="radio" name="status<?php echo $num; ?>" id="inlineRadio1<?php echo $num; ?>" value="OPEN" checked >
            <label class="form-check-label" for="inlineRadio1<?php echo $num; ?>">OPEN</label>
          </div>
          <div class="form-check form-check-inline pt-2">
              <input class="form-check-input" type="radio" name="status<?php echo $num; ?>" id="inlineRadio2<?php echo $num; ?>" value="CLOSED">
              <label class="form-check-label" for="inlineRadio2<?php echo $num; ?>">CLOSED</label>
           </div>
        <?php }else{
         ?>
         <div class="form-check form-check-inline pt-2">
           <input class="form-check-input" type="radio" name="status<?php echo $num; ?>" id="inlineRadio1<?php echo $num; ?>" value="OPEN">
           <label class="form-check-label" for="inlineRadio1<?php echo $num; ?>">OPEN</label>
         </div>
          <div class="form-check form-check-inline pt-2">
              <input class="form-check-input" type="radio" name="status<?php echo $num; ?>" id="inlineRadio2<?php echo $num; ?>" value="CLOSED" checked>
              <label class="form-check-label" for="inlineRadio2<?php echo $num; ?>">CLOSED</label>
           </div>
         </td> <?php
       }?>
        </tr>
        <?php
        $num ++;
      }
         ?>
      </table>

    </form>
      </div>
    </div>
<?php include_once "footer.php"; ?>
