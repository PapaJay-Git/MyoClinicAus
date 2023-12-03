<?php
include_once "../db/db.php";
require_once 'checker.php';
include_once "header.php";
?>
<script type="text/javascript">
  $("#account").addClass("active");
</script>
  <div class="container-fluid" style="margin-bottom:100px">
    <div class="container table-responsive mt-5">
      <div style="margin-bottom:15px; padding-bottom: 10px; width:fit-content;" id="blue-line">
          <h1 class="anton-font">CHANGE USERNAME</h1>
      </div>

      <form id='username' onsubmit="return update('username');" action="change-username" method="post">
        <h4>Your current username is <b><?php echo $username; ?></b></h4>
        <div class="p-md-3">
          <label for="username">Enter your new username</label><br>
          <small>Only letters (either case), numbers, and the underscore; 6 to 20 characters.</small>
          <input type="text" class="form-control"  autocomplete="off" name="username" id='username' placeholder="<?php echo $username; ?>" pattern="[A-Za-z0-9_]{6,20}" required title="Only letters (either case), numbers, and the underscore; 6 to 20 characters.">
          <button type="submit" class="btn btn-primary mt-3 float-end" name="button">CHANGE</button>
        </div>
      </form>
      </div>
    </div>

















<?php include_once "footer.php"; ?>
