<?php
include_once "db/db.php";
include_once "visits.php";
include_once "header.php";
$reviews = "SELECT * FROM reviews ORDER BY id DESC";
$reviews2= $conn->query($reviews);

$pics2 = "SELECT * FROM photos ORDER BY id DESC LIMIT 6";
$pics = $conn->query($pics2);
//$hashed_password = password_hash('P@ssw0rd', PASSWORD_DEFAULT);
//echo $hashed_password;
?>
<script type="text/javascript">
  $("#home-nav").addClass("active");
</script>
<div id="top_d" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item" id="wall-carousel" >
          <div class="pt-4 text-center bg-image"style="background: url(WEBSITE/A_1_HEADING/A_OUTSTANDING_RESULTS.webp); box-shadow: inset 0 0 0 1000px rgba(0,0,0,.3);  background-size: cover; background-repeat: no-repeat; background-position:center; height: 90vh; width:100%; ">
                    <div class="d-flex justify-content-center align-items-center h-100 pt-5">
                      <div class="container mt-5">
                        <div class="row mt-5 " >
                          <div class="col-lg-12">
                            <div class="text-white text-shadow ">
                              <h2 class="display-5 anton-font " >OUTSTANDING RESULTS</h2>
                              <h4 class="t-bold textDesign2 ">MYO CLINIC</h4>
                              <p class="textDesign2 "><img loading="lazy"  class ="logo " src="images/maps.png" width="17px" height="17px">
                                 Nerang, Gold Coast, QLD, Australia, 4211
                              </p>
                            </div>
                          </div>
                            <div class="col-lg-12">
                                <div class="text-center pt-5">
                                      <button type="button" class="btn-primary shadow " id='view-more-blue' data-bs-toggle="modal" data-bs-target="#messageNow" name="button">Contact Now</button>
                                </div>
                            </div>
                        </div>
                      </div>
                </div>
              </div>
          </div>
          <div class="carousel-item" id="wall-carousel" >
            <div class="pt-4 text-center bg-image"style="background: url(WEBSITE/A_1_HEADING/B_Beautiful_Outcome.webp); box-shadow: inset 0 0 0 1000px rgba(0,0,0,.3);background-size: cover; background-repeat: no-repeat; background-position:center; height: 90vh; width:100%; ">
                      <div class="d-flex justify-content-center align-items-center h-100 pt-5">
                        <div class="container mt-5">
                          <div class="row mt-5 " >
                            <div class="col-lg-12">
                              <div class="text-white text-shadow ">
                                <h2 class="display-5 anton-font " >BEAUTIFUL OUTCOME</h2>
                                <h4 class="t-bold textDesign2 ">MYO CLINIC</h4>
                                <p class="textDesign2 "><img loading="lazy"  class ="logo " src="images/maps.png" width="17px" height="17px">
                                   Nerang, Gold Coast, QLD, Australia, 4211
                                </p>
                              </div>
                            </div>
                              <div class="col-lg-12">
                                  <div class="text-center pt-5">
                                        <button type="button" class="btn-primary shadow " id='view-more-blue'data-bs-toggle="modal" data-bs-target="#messageNow" name="button">Contact Now</button>
                                  </div>
                              </div>
                          </div>
                        </div>
                  </div>
                </div>
            </div><div class="carousel-item active" id="wall-carousel" >
              <div class="pt-4 text-center bg-image"style="background: url(WEBSITE/A_1_HEADING/C_SATISFYING_BEAUTY.webp); box-shadow: inset 0 0 0 1000px rgba(0,0,0,.3);background-size: cover; background-repeat: no-repeat; background-position:center; height: 90vh; width:100%; ">
                        <div class="d-flex justify-content-center align-items-center h-100 pt-5">
                          <div class="container mt-5">
                            <div class="row mt-5 " >
                              <div class="col-lg-12">
                                <div class="text-white text-shadow ">
                                  <h2 class="display-5 anton-font " >SATISFYING BEAUTY</h2>
                                  <h4 class="t-bold textDesign2 ">MYO CLINIC</h4>
                                  <p class="textDesign2 "><img loading="lazy"  class ="logo " src="images/maps.png" width="17px" height="17px">
                                     Nerang, Gold Coast, QLD, Australia, 4211
                                  </p>
                                </div>
                              </div>
                                <div class="col-lg-12">
                                    <div class="text-center pt-5">
                                          <button type="button" class="btn-primary shadow " id='view-more-blue' data-bs-toggle="modal" data-bs-target="#messageNow" name="button">Contact Now</button>
                                    </div>
                                </div>
                            </div>
                          </div>
                    </div>
                  </div>
              </div>
            </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#top_d" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#top_d" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
</div>

<!-- modal -->
          <div class="modal fade" id="messageNow" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title anton-font" >CONTACTS</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ms-2">
                  <span id="copy-notif">
                  </span>
                  <div id="allContacts" >
                    <h5 class="textDesign ms-2">NUMBER</h5>
                      <div class="color-5 ms-3">
                        <ul role="button">
                          <li id="num1" class="textDesign"onclick="CopyToClipboard('num1');return false;">+61 423 489 838</li>
                        </ul>
                      </div>
                    <h5 class="textDesign ms-2">EMAIL</h5>
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
<!-- Welcome message -->
<div class="container-fluid p-0">
  <div class="row ps-lg-5 ps-sm-4 ps-3 pe-lg-5 pe-sm-4 pe-3 pt-5 pb-5 my-auto g-0">
    <div class="col-lg-5 ">
      <h1 class="anton-font"style="font-size:65px;">WELCOME</h1><br>
      <h3 style="font-size:15px; ">
      Welcome to Broad Beach MYO Clinic. We deliver the quality of our services after clinical tests & medical history.
      </h3>
    </div>
    <div class="col-lg-7">
      <h5 style="font-size:15px;">
        <br>

We have the latest developments in facial skin tightening and lifting technology in Australia. Using high-intensity focused ultrasonic technology to lift, tighten and contour sagging or non-elastic skin. It also eliminates fat cells on the face, resulting in a more slender appearanceareance.<br><br>

It also alters the skin elasticity, increases the metabolism, and, stimulates cellular generation activity to give you tight, firm, lifted, and younger-looking skin.
      </h5>
    </div>
  </div>
</div>
<!-- Welcome message -->

<!-- who we are-->
<div class="container-fluid p-0" id="clr-nav">
  <div class="row g-0">
    <div class="col-lg-6">
        <img loading="lazy"  class="image-fixed-size-2" src="WEBSITE/A_2_BODY/A_WHO_WE_ARE.webp" alt="Card image cap">
    </div>
    <div class="col-lg-6 ps-lg-5 ps-sm-4 ps-3 pe-lg-5 pe-sm-4 pe-3 pt-5 pb-5 text-white my-auto">
      <div style="margin-bottom:15px; padding-bottom: 10px; width:fit-content;" id="blue-line">
          <h1 class="anton-font">WHO WE ARE</h1>
      </div>
          <blockquote class="blockquote mb-0">
            <p style="font-size: 15px">
            The Myo Clinic's latest and most in-demand treatment is 4D HIFU. For Non-Surgical Face Lift, Double Chin, Jawline Definition, Neck, and Facial Firming, wrinkles eraser, Bodyshape, Arm and Thighs shaping and firming, breast and buttocks enlargement, Laser pigmentation removal, tattoo removal, lymphatic treatment, Coughing and Flu Red clinical light therapy to get of swollen tissue and sign of infections besides Myotherapy treatment for pain relief, sciatic pain, back pain, frozen shoulder, Acute and chronic pain, rehabilitation, and postural structural anatomical alignment.
            </p>
          </blockquote>
          <div class="text-start">
              <button type="button" class="btn-light mt-5 shadow" id="view-more-white" name="button"
              onclick="window.location.href='about-us';">More about us</button>
          </div>
    </div>
  </div>
</div>
<!-- who we are -->

<!-- what we do -->
<div class="container-fluid p-0" id="reviews">
  <div class="row g-0">
      <div class="col-lg-6 order-1 ps-lg-5 ps-sm-4 ps-3 pe-lg-5 pe-sm-4 pe-3 pt-5 pb-5  my-auto">
        <div style=" margin-bottom:15px;padding-bottom: 10px; width:fit-content;" id="orange-line">
            <h1 class="anton-font">WHAT WE DO</h1>
        </div>
            <blockquote class="blockquote">
              <p style="font-size: 15px" >
        At MYO Clinic we deliver professional clinical tests and services. We are approachable friendly and highly qualified practitioners. Our focus is to deliver a healing clinical treatment to help fix their concerns or issues. Every patient deserves to keep their personal details secure and private. We advise the patient to do something like exercise or skin maintenance for long-term benefits from the treatment.
            </p>
            </blockquote>
            <div class="text-start">
                <button type="button" class="btn-light mt-5 mb-5 shadow" id="view-more-blue" name="button"
                onclick="window.location.href='services';">View our services</button>
            </div>
      </div>
        <div class="col-lg-6 order-lg-1">
            <img loading="lazy"  class="image-fixed-size-2" src="WEBSITE/A_2_BODY/B_WHAT_WE_DO.webp" alt="Card image cap">
        </div>
  </div>
</div>
<!-- what we do->

<!-- satisfactory -->
<div class="container-fluid p-0" id="clr-nav">
  <div class="row g-0 ps-lg-5 ps-sm-4 ps-3 pe-lg-5 pe-sm-4 pe-3 pt-5 pb-5">
        <div style="margin-bottom:15px; padding-bottom: 10px; width:fit-content;" id="blue-line">
            <h1 class="anton-font">CUSTOMER REVIEWS</h1>
        </div>
        <div class="container-fluid pb-5 pt-5 text-dark mb-5 pb-5">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-indicators" style="margin-bottom: -50px;">

                    <?php
                    $data_bs_slide = 0;
                    $aria_label = 1;
                    while ($row1 = mysqli_fetch_assoc($reviews2)) {
                      if ($data_bs_slide > 0) {
                      ?>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $data_bs_slide;?>" id="navigator-image" aria-label="Slide <?php echo $aria_label;?>"></button>
                      <?php
                    }else {
                      ?>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $data_bs_slide;?>" class="active" id="navigator-image" aria-current="true" aria-label="Slide <?php echo $aria_label;?>"></button>
                      <?php
                    }
                        $data_bs_slide +=1;
                        $aria_label +=1;
                    }
                     ?>
                  </div>
                  <div class="carousel-inner">
                    <?php
                    $reviews2->data_seek(0);
                    $num = 1;
                    while ($row = mysqli_fetch_assoc($reviews2)) {
                        if ($num == 1) {
                          ?>
                         <div class="carousel-item active" >
                             <div class="card shadow-lg rounded justify-content-center" style="width:95%; margin: auto;">
                               <div class="card-body p-4 ">
                                 <blockquote class="blockquote mb-0">
                                   <p style="font-size:14px; color:gray"><img loading="lazy"  src="images/qoutation_mark.svg" height="25" width="25" style="margin-top:-20px; margin-right:20px; ">
                                     <?php echo $row['reviews']; ?>
                                   </p>
                                   <span class="justify-content-center ">
                                     <p class="text-center">
                                       <img loading="lazy"  src="images/star.svg" style="width:20px">
                                       <img loading="lazy"  src="images/star.svg" style="width:20px">
                                       <img loading="lazy"  src="images/star.svg" style="width:20px">
                                       <img loading="lazy"  src="images/star.svg" style="width:20px">
                                       <img loading="lazy"  src="images/star.svg" style="width:20px">
                                     </p>
                                   </span>
                                   <footer class="blockquote-footer mt-3 float-end"><cite title="Source Title" style="font-size:14px">Adi Sanchez</cite></footer>
                                 </blockquote>
                               </div>
                               </div>
                           </div>
                          <?php
                        }else {
                          ?>
                          <div class="carousel-item">
                              <div class="card shadow-lg rounded justify-content-center" style="width:95%; margin: auto;">
                                <div class="card-body p-4 ">
                                  <blockquote class="blockquote mb-0">
                                    <p style="font-size:14px; color:gray"><img loading="lazy"  src="images/qoutation_mark.svg" height="25" width="25" style="margin-top:-20px; margin-right:20px; ">
                                      <?php echo $row['reviews']; ?>
                                    </p>
                                    <span class="justify-content-center ">
                                      <p class="text-center">
                                        <img loading="lazy"  src="images/star.svg" style="width:20px">
                                        <img loading="lazy"  src="images/star.svg" style="width:20px">
                                        <img loading="lazy"  src="images/star.svg" style="width:20px">
                                        <img loading="lazy"  src="images/star.svg" style="width:20px">
                                        <img loading="lazy"  src="images/star.svg" style="width:20px">
                                      </p>
                                    </span>
                                    <footer class="blockquote-footer mt-3 float-end"><cite title="Source Title" style="font-size:14px"><?php echo $row['source_name']; ?></cite></footer>
                                  </blockquote>
                                </div>
                                </div>
                            </div>
                          <?php
                        }
                        $num +=1;
                     ?>
                    <?php
                  }
                     ?>
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
  </div>

  <div class="container-fluid p-0" id="reviews">
    <div class="row g-0">
      <div class="col-lg-6">
            <img loading="lazy"  class="image-fixed-size-2" src="WEBSITE/A_2_BODY/C_PROCEDURE.webp" alt="Card image cap">
      </div>
      <div class="col-lg-6 ps-lg-5 ps-sm-4 ps-3 pe-lg-5 pe-sm-4 pe-3 pt-5 pb-5 my-auto">
          <div style="margin-bottom:15px; padding-bottom: 10px; width:fit-content;" id="orange-line">
              <h2 class="anton-font">Procedure</h2>
          </div>
          <blockquote class="blockquote">
            <p style = "font-size:15px;">
              Doctors usually begin HIFU facial rejuvenation by cleaning the chosen area of the face and applying a gel.
              Then, they use a handheld device that emits the ultrasound waves in short bursts. Each session typically lasts 30–90 minutes.<br><br>

              Some people report mild discomfort during the treatment, and some have pain afterward. Doctors may apply a local anesthetic before
              the procedure to help prevent this pain. Over-the-counter pain relievers, such as acetaminophen (Tylenol) or ibuprofen (Advil), may also help.

            </p>
          </blockquote>
      </div>
  </div>
</div>
<div class="container-fluid p-0" id="clr-nav">
  <div class="row g-0 ps-lg-5 ps-sm-4 ps-3 pe-lg-5 pe-sm-4 pe-3 pt-5 pb-5">
        <div style="margin-bottom:15px; padding-bottom: 10px; width:fit-content;" id="blue-line">
            <h1 class="anton-font">Frequently Ask Question</h1>
        </div>
        <div id="ask" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-inner "  style="padding-top: 30px">
              <div class="carousel-item active ">
                <div class="card shadow-lg rounded justify-content-center" style="width:95%; margin: auto;">
                <div class="card-body p-4 justify-content-center text-center text-dark">
                <h3> <strong>What is HIFU?</strong></h3>
                <p style="font-size:14px; color:gray"><img loading="lazy"  src="images/qoutation_mark.svg" height="25" width="25" style="margin-top:-20px; margin-right:20px;">
                  HIFU stands for "High-Intensity Focused Ultrasound." It is also known as MRgFUS (MRI-guided focused ultrasound) and FUS (focused ultrasound).
                   HIFU is an innovative, non-invasive treatment for a wide range of tumors and diseases. HIFU uses an ultrasound transducer, similar to the ones used for diagnostic imaging,
                   but with much higher energy. The transducer focuses sound waves to generate heat at a single point within the body and destroy the target tissue.
                   The tissue can get as hot as 150-200°F in just 20 seconds. This process is repeated as many times as is necessary until the target tissue is destroyed.
                   MRI images are used to plan the treatment and monitor the degree of heating in real time.
                </p>
              </div>
             </div>
            </div>
           <div class="carousel-item">
             <div class="card shadow-lg rounded justify-content-center" style="width:95%; margin: auto;">
             <div class="card-body p-4 justify-content-center text-center text-dark">
             <h3> <strong>Does HIFU hurt?</strong></h3>
             <p style="font-size:14px; color:gray"><img loading="lazy"  src="images/qoutation_mark.svg" height="25" width="25" style="margin-top:-20px; margin-right:20px;">
               Both aspects can be discussed by a very suitable human relationship, it is the pain that the individual suffers and the suffering,
               therefore, the pain point of view, therefore, in the case of stress, it can also be based on different positions and bears. The magnitude of the
               force accepts,accepts pressure and pressure. If Guoguo wants to avoid all kinds of pain, other methods can also be used,
               or the output capacity or quantity of the instrument can be reduced.
             </p>
           </div>
           </div>
         </div>
          <div class="carousel-item">
            <div class="card shadow-lg rounded justify-content-center" style="width:95%; margin: auto;">
            <div class="card-body p-4 justify-content-center text-center text-dark">
            <h3> <strong>What is HIFU?</strong></h3>
            <p style="font-size:14px; color:gray"><img loading="lazy"  src="images/qoutation_mark.svg" height="25" width="25" style="margin-top:-20px; margin-right:20px;">
              HIFU stands for "High-Intensity Focused Ultrasound." It is also known as MRgFUS (MRI-guided focused ultrasound) and FUS (focused ultrasound).
               HIFU is an innovative, non-invasive treatment for a wide range of tumors and diseases. HIFU uses an ultrasound transducer, similar to the ones used for diagnostic imaging,
               but with much higher energy. The transducer focuses sound waves to generate heat at a single point within the body and destroy the target tissue.
               The tissue can get as hot as 150-200°F in just 20 seconds. This process is repeated as many times as is necessary until the target tissue is destroyed.
               MRI images are used to plan the treatment and monitor the degree of heating in real time.
            </p>
          </div>
          </div>
          </div>

          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#ask" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#ask" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
          </button>
        </div>
     </div>
 </div>
<!-- Praparation aftercare-->
<div class="container-fluid p-0">
    <div class="row g-0">
      <div class="col-lg-6 ps-lg-5 ps-sm-4 ps-3 pe-lg-5 pe-sm-4 pe-3 pt-5 pb-5  my-auto">

          <div style="margin-bottom:15px;padding-bottom: 10px; width:fit-content;" id="orange-line">
              <h1 class="anton-font">Preparation and Aftercare</h1>
          </div>
            <blockquote class="blockquote">
              <h2 class="anton-font">Week Before Treatment</h2>
              <p style="font-size: 15px; padding-top:30px">
          Avoid sun exposure and sunless tanning. Sun burned or tanned skin will not be treated. All skin irritants must be stopped
          (glycolic/ salicylic acids, benzoyl peroxide, retinol products such as Retin A, Tazorac, Triluma, Differin, and Vitamin C)
          on the area being treated. Advise staff when taking antibiotics. Certain antibiotics (Tetracycline, Doxycycline) can make a
          patient photosensitive, therefore, treatment may not be able to done until two weeks after completion of antibiotic.
            </p>
            </blockquote>
      </div>
        <div class="col-lg-6">
            <img loading="lazy"  class="image-fixed-size-2" src="WEBSITE/A_2_BODY/D_PREPERATION_AND_AFTERCARE.webp" alt="Card image cap">
        </div>
  </div>

  </div>

  <div class="container-fluid p-0" id="clr-nav">
    <div class="row g-0">
      <div class="col-lg-6 order-1" >
          <img loading="lazy"  class="image-fixed-size-2" src="WEBSITE/A_2_BODY/E_A_DAY_BEFORE_TREATMENT.webp" alt="Card image cap">
      </div>
      <div class="col-lg-6 ps-lg-5 ps-sm-4 ps-3 pe-lg-5 pe-sm-4 pe-3 pt-5 pb-5 my-auto order-lg-1 " >
            <blockquote class="blockquote">
              <h2 class="anton-font">Day Before Treatment</h2>
              <p style="font-size: 15px; padding-top:30px">
                Please let the staff know if you have a history of cold sores/fever blisters PRIOR to treatment, so an antiviral medication
                 can be prescribed by your doctor (please arrange with your GP). Treatment can not be done if you have an active cold sore or
                 skin infection and will be rescheduled.
            </p>
            </blockquote>
      </div>
</div>
</div>
<div class="container-fluid p-0" id="reviews">
  <div class="row g-0">
      <div class="col-lg-6 ps-lg-5 ps-sm-4 ps-3 pe-lg-5 pe-sm-4 pe-3 pt-5 pb-5  my-auto" >
            <blockquote class="blockquote">
              <h2 class="anton-font">Day of Treatment</h2>
              <p style="font-size: 15px; padding-top:30px" >
                  Do not wear any make-up or moisturizers on the area being treated, however, we have cleaners that can be used for you to remove
                  in the clinic. If a patient chooses to use a topical numbing (anaesthetic) cream, please refer to the recommended product list
                  below and purchase and apply 30 minutes prior to arrival.<br><br>

                 Please purchase the topical anaesthetic PRIOR to treatment from your local pharmacy the following products are listed by brand
                name and are recommended for use (refer to pharmacist on how to apply correctly).
            </p>
            </blockquote>
      </div>
        <div class="col-lg-6 " >
            <img loading="lazy"  class="image-fixed-size-2" src="WEBSITE/A_2_BODY/E_DAY_OF_TREATMENT.webp" alt="Card image cap">
        </div>
  </div>
</div>

<div class="container-fluid ps-lg-5 ps-sm-4 ps-3 pe-lg-5 pe-sm-4 pe-3 pt-5 pb-5 " id="reviews"  style="width:100%">
        <div>
          <div>
              <h1 class="anton-font">FOLLOW US</h1>
          </div>
                    <p class = "title-logo" style ="font-size:14px; color: #C35214; font-weight: bold; cursor:pointer;" onclick="window.open('https://www.instagram.com/myoclinic_broadbeach/');">
                    <img loading="lazy"  src="https://cdn-icons-png.flaticon.com/512/2111/2111463.png" height="17" width="17" >
                    <span class="sub-title-logo text-shadow-1"title="MYO Clinic Instagram" style="margin-top:10px"> @myoclinic_broadbeach</span></p>
        </div>
    <div class="row mt-4">
      <?php
    while ($pic = mysqli_fetch_assoc($pics)) {
       ?>
      <div class="col-sm-6 col-md-4 col-lg-2 mt-3">
        <div class="card shadow bg-white rounded">
          <img loading="lazy"  src="gallery_media/<?php echo $pic['file_name']; ?>"  class="image-fixed-size-250 shadow">
        </div>
      </div>
    <?php
  }
     ?>
      <!-- -->
      </div>
      <div class="content-display-center text-center">
        <div >
            <button type="button" class="btn-light mt-5 mb-2 shadow" id="view-more-blue" name="button"
            onclick="window.location.href='photo-gallery';">Visit our gallery</button>
        </div>
      </div>
  </div>
</div>
<script type="text/javascript" src="copy.js"> </script>

<?php include_once "footer.php"; ?>
