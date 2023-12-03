
<?php
include_once "db/db.php";
include_once "visits.php";
include_once "header.php"; ?>

<script type="text/javascript">
  $("#services-nav").addClass("active");
</script>
<!-- Background image -->
<div class="pt-4 text-center bg-image"style="background: url(WEBSITE/A_3_SERVICES/header.webp); box-shadow: inset 0 0 0 1000px rgba(0,0,0,.3); background-size: cover; background-repeat: no-repeat; background-position:center; height: 90vh; ">
          <div class="d-flex justify-content-center align-items-center h-100 pt-5" >
            <div class="text-white">
              <h1 class="display-3 pt-5 anton-font">SERVICES</h1>
              <h4 class="t-bold textDesign2 ">MYO CLINIC</h4>
              <p class="textDesign2 "><img loading="lazy"  class ="logo " src="images/maps.png" width="17px" height="17px">
                 Nerang, Gold Coast, QLD, Australia, 4211
              </p>
            </div>
          </div>
      </div>
<!-- Background image-->

<!-- SERVICES -->
<?php
$result1 = $conn->query("SELECT * FROM services ORDER BY id DESC" );
 ?>
<div class="container-fluid services-home" style="padding-bottom: 100px;" >
  <div class="container-fluid ps-lg-5 ps-sm-4 ps-1 pe-lg-5 pe-sm-4 pe-3 pt-5 pb-5" >
    <div style="padding-bottom: 10px; width:fit-content;" id="orange-line">
        <h1 class="anton-font">CHECK OUR SERVICES</h1>
    </div>
    <?php
        if($result1->num_rows > 0){
         while($row = $result1->fetch_assoc()){
           $serviceid = $row["id"];
           $result = $conn->query("SELECT * FROM services_media WHERE service_id = $serviceid LIMIT 1 ");
           $row2 = $result->fetch_assoc();
           ?>
                   <div class="row mt-5 g-0">
                     <div class="col-lg-6">
                         <img loading="lazy"  class="image-fixed-size-2" src="service_media/<?php echo $row2['file_name']; ?>" alt="<?php echo $row["service_title"];?>">
                     </div>
                     <div class="col-lg-6 ps-lg-5 ps-sm-4 ps-1 pt-5 pb-5 my-auto">
                       <div style="margin-bottom:15px; padding-bottom: 10px; width:fit-content;">
                           <h2 class="anton-font"><?php echo $row["service_title"];?></h2>
                           <small><?php echo $row["service_price"];  ?> </small>
                       </div>
                           <blockquote class="blockquote mb-0">
                             <p style="font-size: 15px">
                             <?php echo $row["service_desc"]; ?>
                             </p>
                           </blockquote>
                           <div class="text-start">
                               <button type="button" class="btn-primary shadow mt-5" id='view-more-white' data-bs-toggle="modal" data-bs-target="#messageNow" name="button">Contact Now</button>
                           </div>
                     </div>
                   </div>
  <?php  }
     }else{ ?>
        <p class="status error">Image(s) not found...</p>
    <?php }?>

      <!-- modal -->
                <div class="modal fade" id="messageNow" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title anton-font" >BOOK NOW</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body ">
                      <span id="copy-notif">
                      </span>
                        <h5 class="textDesign mb-1">Call or Email us to book your appointment. Thank you!</h5>
                        <div id="allContacts" >
                          <h5 class="textDesign ms-2">Number</h5>
                            <div class="color-5 ms-3">
                              <ul role="button">
                                <li id="num1" class="textDesign"onclick="CopyToClipboard('num1');return false;">+61 423 489 838</li>
                              </ul>
                            </div>
                          <h5 class="textDesign  ms-2">Email</h5>
                            <div class="color-5 ms-3" >
                              <ul role="button">
                                <li id="mail1" class="textDesign "onclick="CopyToClipboard('mail1');return false;">info@myoclinic.com.au</li>
                              </ul>
                            </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <h5 onclick="CopyToClipboard('allContacts');return false;" class="textDesign fw-bold text-secondary" role="button">Copy all</h5>
                      </div>
                    </div>
                  </div>
                </div>
  </div>
</div>

<script type="text/javascript" src="copy.js"> </script>
<!-- SERVICES -->
<?php include_once "footer.php"; ?>
