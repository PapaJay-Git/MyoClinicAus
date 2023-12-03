<?php
include_once "db/db.php";
include_once "visits.php";
include_once "header.php"; ?>
<script type="text/javascript">
  $("#about-us-nav").addClass("active");
</script>
<!-- Background image -->
<div class="pt-4 text-center bg-image"style="background: url(WEBSITE/A_1_HEADING/B_Beautiful_Outcome.webp); box-shadow: inset 0 0 0 1000px rgba(0,0,0,.3);  background-size: cover; background-repeat: no-repeat; background-position:center; height: 90vh; ">
          <div class="d-flex justify-content-center align-items-center h-100 pt-5">
            <div class="text-white">
              <h2 class="display-4 anton-font pt-5">ABOUT US</h2>
              <h4 class="t-bold textDesign2 ">MYO CLINIC</h4>
              <p class="textDesign2 "><img loading="lazy"  class ="logo " src="images/maps.png" width="17px" height="17px">
                 Nerang, Gold Coast, QLD, Australia, 4211
              </p>
            </div>
          </div>
      </div>
<!-- Background image-->

<!-- about us -->
  <div class="container-fluid p-0">
        <div class="ps-lg-5 ps-sm-4 ps-3 pe-lg-5 pe-sm-4 pe-3 pt-5 pb-5 my-auto">
          <div style=" margin-bottom:15px; padding-bottom: 10px; width:fit-content;" id="orange-line">
              <h1 class="anton-font">ABOUT MYO CLINIC</h1>
          </div>
              <blockquote class="blockquote">
                <p style = "font-size:15px;">
                  The Myo Clinic's latest and in-demand treatment is 4D HIFU. For NonSurgicalFaceLift, Double Chin, Jawline Definition, Neck, and Facial Firming, wrinkles eraser, Bodyshape, Arm and Thighs shaping and firming, breast and buttocks enlargement, Laser pigmentation removal, tattoo removal, lymphatic treatment, Coughing and Flu Red clinical light therapy to get of swollen tissue and sign of infections besides Myotherapy treatment for pain relief, sciatic pain, back pain, frozen shoulder, Acute and chronic pain, rehabilitation, and postural structural anatomical alignment.
                  <br><br>
                  4D HIFU stands for High-Intensity Focused Ultrasound and targets deep skin levels. It is a non-surgical procedure. The results of this treatment include skin tightening and lifting by promoting the body’s own collagen production. Expect areas of your skin that undergo this treatment to be tightened, strengthened, and lifted, for a more youthful-looking appearance.
                  <br><br>
                  The key here is the promotion of collagen production which is a natural process for this treatment combination with RF a radio frequency technique to build up more healthy tissue and develop healthy skin called collagen and elastin synthesis boosters for a better result.
                  At MYOClinic we deliver professional clinical tests and services.
                  We are approachable friendly and highly qualified practitioners
                  Our focus is to deliver a healing clinical treatment to help fix their concern or issues.
                  Every patient they are deserving to keep their personal details secured and private.
                  We advise the patient to do something like exercise or skin maintenance for long-term benefits from the treatment.

                </p>
              </blockquote>
        </div>
  </div>
<div class="container-fluid p-0" id="clr-nav">
  <div class="row g-0">
      <div class="col-lg-6 order-1 ps-lg-5 ps-sm-4 ps-3 pe-lg-5 pe-sm-4 pe-3 pt-5 pb-5 my-auto">
        <div style=" margin-bottom:15px;padding-bottom: 10px; width:fit-content;" id="blue-line">
            <h1 class="anton-font">OUR MISSION</h1>
        </div>
            <blockquote class="blockquote">
              <p style = "font-size:15px;">
                To help those people who are in stressful situations to get back again to their self-confidence after experiencing difficulties or circumstances issues.<br><br>

                We also want to help men and women who are looking for self-improvement to gain self-esteem or people who are looking for plastic surgery. We highly recommended our amazing Hifu Deluxe treatment for nonsurgical facelifts, which 96% of our clients are totally satisfied with the amazing results.
                As we all know, we want to impress other people from the first time we met them, based on our personal appearance.<br><br>

                We want to help clients and patients who are over 40 years old to help themselves how to look after their skin to fight signs of skin aging. As we notice there are a lot of people who are not looking after their skin and look older than the people who went to professional care to maintain the quality of the tissue to look way younger for about 10-20 years.
            </p>
            </blockquote>
      </div>
      <div class="col-lg-6 order-lg-1">
          <img loading="lazy"  class="image-fixed-size-2" src="WEBSITE/A_5_ABOUT_US/MISSION.webp" alt="Card image cap" >
      </div>
    </div>
</div>
<div class="container-fluid p-0" id="clr-nav">
  <div class="row g-0">
    <div class="col-lg-6">
        <img loading="lazy"  class="image-fixed-size-2" src="WEBSITE/A_5_ABOUT_US/VISION.webp" alt="Card image cap">
    </div>
      <div class="col-lg-6 ps-lg-5 ps-sm-4 ps-3 pe-lg-5 pe-sm-4 pe-3 pt-5 pb-5 my-auto">
        <div style=" margin-bottom:15px;padding-bottom: 10px; width:fit-content;" id="blue-line">
          <h1 class="anton-font">OUR VISION</h1>
        </div>
          <blockquote class="blockquote">
            <p style = "font-size:15px;">
              To be the number one choice for skincare, health, and well-being to help people feel more confident about their appearance.<br><br>
  To improve patients' and clients' health and well-being by giving them the right advice and putting them in control. To offer patients and clients help them choose the correct treatment plan matching their needs and budget.
          </p>
          </blockquote>
      </div>
  </div>
</div>
<div class="container-fluid image-backround-services" id="reviews">
  <div class="container-fluid ps-lg-5 ps-sm-4 ps-3 pe-lg-5 pe-sm-4 pe-3 pt-5 pb-5" style="padding-bottom: 50px;">
    <div style=" width:fit-content;" id="orange-line">
      <h1 class="anton-font mt-5">Booking Hours</h1>
    </div>
    <?php

$businesshours = "SELECT * FROM business_hours ORDER BY id ASC";
$retrieved_businesshours= $conn->query($businesshours);
?>
      <table class="table table-striped mt-5" style="font-size:14px;">
        <tbody class="table-light">
        <?php  $num = 0;
          while ($array_businesshours_result = mysqli_fetch_assoc($retrieved_businesshours)){
            $num ++;
            ?>
          <tr>
            <?php
            if ($array_businesshours_result['status'] == 'CLOSED') {
            ?>
               <td scope="row" style="color:red"><?php echo $array_businesshours_result['days'];?></td>
               <td style="color:red">CLOSED</td>
            <?php
          }else {
            ?>
            <td scope="row" ><?php echo $array_businesshours_result['days'];?></td>
            <td ><?php echo $array_businesshours_result['schedule_start'];?> - <?php echo $array_businesshours_result['schedule_end'];?></td>
            <?php
          }
             ?>
          </tr>
        <?php
           }?>

        </tbody>
      </table>
  <div class="pt-5">
        <div style=" margin-bottom:15px; padding-bottom: 10px; width:fit-content;" id="orange-line">
            <h1 class="anton-font">VISIT US HERE</h1>
        </div>

            <div class="gmap_canvas">
                <!--<iframe class="googlemap" width="100%" height="500" id="gmap_canvas" src="https://goo.gl/maps/ufKigFsSDsNtpvU66" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
               -->
               <iframe class="googlemap" width="100%" height="500" id="gmap_canvas"
                src="https://maps.google.com/maps?width=818&amp;height=200&amp;hl=en&amp;q=Myo Clinic, 19 Souter St, Nerang&amp;t=k&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
              </iframe>
            </div>

        <!-- ============================================================================ -->
  </div>
</div>
</div>
</DIV>
<!-- about us -->
<?php include_once "footer.php"; ?>
