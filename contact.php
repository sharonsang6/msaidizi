<?php require_once 'header/header.php'; ?>
<?php require_once 'configurations/config.php'; ?>
<?php require_once "api/includer.php"; ?>

<div id="app">
<?php require_once 'navigation/top.php'; ?>
<main>
<div class="containerfluid">

    <div class="container">
    <div class="row">
        <!--Section: Contact v.1-->
<section class="section pb-5" style="width:100%,background-size:cover;">

        <!--Section heading-->
        
        <!--Section description-->
        <p class="section-description pb-4">Contact us by filling and submitting the form below. Find us using directions from the map below.</p>
      
        <div class="row contactrowtwo" >
      
          <!--Grid column-->
          <div class="col-lg-5 mb-4">
      
            <!--Form with header-->
            <div class="card">
      
              <div class="card-body">
              
      
                <h5>Send us a message</h5>
                <br>
              <style type="text/css">
                .md-form{
                  margin:0px;
                  padding: 0px;
                }
              </style>
                <!--Body-->
                <form method="post">
                      <div class="md-form">
                        <!-- <i class="fa fa-user fa-2x "></i> -->
                        <input type="text" id="form-name" name="name" class="form-control">
                        <label for="form-name">Your name</label>
                      </div>
            
                      <div class="md-form">
                        <!-- <i class="fa fa-envelope fa-2x  "></i> -->
                        <input type="text" id="form-email" name="email" class="form-control">
                        <label for="form-email">Your email</label>
                      </div>
            
                      <div class="md-form">
                        <!-- <i class="fa fa-tag  fa-2x"></i> -->
                        <input type="text" id="form-Subject" name="Subject" class="form-control">
                        <label for="form-Subject">Subject</label>
                      </div>
            
                      <div class="md-form">
                        <!-- <i class="fa fa-pencil-alt fa-2x"></i> -->
                        <textarea id="form-text" name="message" class="form-control md-textarea" rows="3"></textarea>
                        <label for="form-text">Message</label>
                      </div>
            
                      <div class="text-center mt-4">
                        <button class="btn contactbtn" type="submit" name="mailsend">Submit</button>
                      </div>
                              
                </form>

              </div>
      
            </div>
            <!--Form with header-->
      
          </div>
          <!--Grid column-->
      
          <!--Grid column-->
          <div class="col-lg-7">
      
            <!--Google map-->
            <div id="map-container-google-11" class="z-depth-1-half map-container-6" style="height: 400px">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.9769458723267!2d36.93429711432477!3d-1.1766935358472759!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f3f6d8cf92d5b%3A0xbe8bd901bf9fdb7f!2sKenyatta%20University%2C%20Main%20Campus!5e0!3m2!1sen!2ske!4v1580307683888!5m2!1sen!2ske" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
      
            <br>
            <!--Buttons-->
            <div class="row text-center">
              <div class="col-md-4">
                <a class="btn-floating blue accent-1"><i class="fa fa-map-marker fa-2x"></i></a>
                <p>Kenyatta University, 44380</p>
                <p>Nairobi, Kenya</p>
              </div>
      
              <div class="col-md-4">
                <a class="btn-floating blue accent-1"><i class="fa fa-phone fa-2x"></i></a>
                <p>+257 720 467 383</p>
                <p>Mon - Fri, 8:00-22:00</p>
              </div>
      
              <div class="col-md-4">
                <a class="btn-floating blue accent-1"><i class="fa fa-envelope fa-2x"></i></a>
                <p>info@msaidizi.co.ke</p>
               
              </div>
            </div>
      
          </div>
          <!--Grid column-->
      
        </div>
    </div>
      
      </section>
      <!--Section: Contact v.1-->
        
</div>
                    </div>
                    </div>
                    </main>
<?php require_once 'navigation/bottom.php'; ?>