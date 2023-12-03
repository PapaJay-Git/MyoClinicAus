<?php
include_once "../db/db.php";
require_once 'checker.php';
include_once "header.php";

$username = 'papajay';
?>
<script type="text/javascript">
  $("#account").addClass("active");
</script>
  <div class="container-fluid" style="margin-bottom:100px">
    <div class="container table-responsive mt-5">
      <div style="margin-bottom:15px; padding-bottom: 10px; width:fit-content;" id="blue-line">
          <h1 class="anton-font">CHANGE PASSWORD</h1>
      </div>

      <form id='password-form' onsubmit="return update('password-form');" action="change-password" method="post">
        <h4>Change your password based on your preference.</b></h4>
        <div class="p-md-3">
          <div class="form-group">
            <label for="exampleInputPassword1">New Password</label><br>
            <label for="password"><small>Only letters (either case), numbers, and the underscore; 6 to 20 characters.</small></label>
            <input type="password" class="form-control" pattern="[A-Za-z0-9_]{6,20}"
            placeholder="password" name="new_password" id="password2" onkeyup="check();" title=
            "Only letters (either case), numbers, and the underscore; 6 to 20 characters. " required>
          </div>
          <div class="form-group">
            <label for="password3">Confirm New Password</label>
            <input type="password" class="form-control" pattern="[A-Za-z0-9_]{6,20}"
            placeholder="password" name="confirm_new_password" id="password3" onkeyup="check();" title=
            "Only letters (either case), numbers, and the underscore; 6 to 20 characters."  required>
            <span id='message'></span>
          </div>
            <div class="form-group">
              <label for="password4">Confirm Old Password</label>
              <input type="password" class="form-control" placeholder="password" id="password4"name="old_password" required>
            </div>
            <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1" onClick="showPass2()">
              <label class="form-check-label" for="exampleCheck1">Show Password</label>
            </div>
          <button type="submit" class="btn btn-primary mt-3 float-end" name="button" >CHANGE</button>
        </div>
      </form>
      </div>
    </div>

    <script type="text/javascript">
    var check = function() {
      if (document.getElementById('password3').value != "" ||  document.getElementById('password2').value !=""){
        if (document.getElementById('password3').value == document.getElementById('password2').value) {
          document.getElementById('message').style.color = 'green';
          document.getElementById('message').innerHTML = 'password match';
        } else {
          document.getElementById('message').style.color = 'red';
          document.getElementById('message').innerHTML = 'password not match';
        }
      }else {
        document.getElementById('message').innerHTML = '';
      }
    }
    function showPass2() {

      var p2 = document.getElementById('password2');
      //question form
      var p3 = document.getElementById('password3');
      var p4 = document.getElementById('password4');
      if (p2.type === "password") {
          p2.type = "text";
          p3.type = "text";
          p4.type = "text";
          } else {
            p2.type = "password";
            p3.type = "password";
            p4.type = "password";
          }
    }
    </script>

















<?php include_once "footer.php"; ?>
