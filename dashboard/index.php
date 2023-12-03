<?php
include_once "../db/db.php";
require_once 'checker.php';
include_once "header.php";
$visits = "SELECT count(id) AS counts FROM visits";
$total_visit = $conn->query($visits);

?>
<script type="text/javascript">
  $("#home").addClass("active");
</script>
  <div class="container-fluid" style="margin-bottom:100px">
    <div class="container table-responsive mt-5">
      <div style="margin-bottom:15px; padding-bottom: 10px; width:fit-content;" id="blue-line">
          <h1 class="anton-font">Hello, <?php echo $username; ?>!</h1>
      </div>
      <div class="card" >
        <div class="card-body">
          <h5 class="card-title mb-3">HERE IS THE TOTAL VISITS OF YOUR WEBSITE</h5>
          <h1 class="display-2"><?php while ($row1 = mysqli_fetch_assoc($total_visit)) {
            echo $row1['counts'];
          } ?>
        </h1>
        </div>
      </div>
      </div>
    </div>

















<?php include_once "footer.php"; ?>
