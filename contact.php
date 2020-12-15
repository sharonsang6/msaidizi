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
                        <label for="form-name">Your name</label>
                        <input type="text" id="form-name" required pattern="\D+" name="name" class="form-control">
                      
                      </div>
            
                      <div class="md-form">
                        <!-- <i class="fa fa-envelope fa-2x  "></i> -->
                        <label for="form-email">Your email</label>
                        <input type="email" id="form-email" required name="email" class="form-control">
                        
                      </div>
            
                      <div class="md-form">
                        <!-- <i class="fa fa-tag  fa-2x"></i> -->
                        <label for="form-Subject">Subject</label>
                        <input type="text" id="form-Subject" required pattern="\D+" name="subject" class="form-control">
                      
                      </div>
            
                      <div class="md-form">
                        <!-- <i class="fa fa-pencil-alt fa-2x"></i> -->
                        <label for="form-text">Message <i>Max of 30 words</i></label>
                        <textarea id="form-text" name="message" required class="form-control md-textarea" rows="3"></textarea>
                       
                      </div>
                           <script>
          $(document).ready(function() {
  $("#form-text").on('keyup', function() {
    var words = this.value.match(/\S+/g).length;

    if (words > 30) {
      // Split the string on first 200 words and rejoin on spaces
      var trimmed = $(this).val().split(/\s+/, 30).join(" ");
      // Add a space at the end to make sure more typing creates new words
      $(this).val(trimmed + " ");
    }
    else {
      $('#display_count').text(words);
      $('#word_left').text(30-words);
    }
  });
});           
       </script>
            
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
                <p>+254 720 467 383</p>
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