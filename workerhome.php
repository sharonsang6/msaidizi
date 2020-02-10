<?php require_once 'header/header.php'; ?>
<?php require_once 'app/sessionconfig/loginsession.php'; ?>
<?php require_once 'configurations/config.php'; ?>
<?php require_once "api/includer.php"; ?>

<div id="app">
<?php require_once 'navigation/top.php'; ?>
<main>
            <div class="row employersliderrow" style="width: 100%;margin: 0px;">
               
                <div class="col-md-3">
                
                    </div>
                    <div class="col-md-6">
                            <div class="card employercard ">
                                    <div class="card-header employercardheader">
                                        <h2 class="employerhometitle">Welcome to Msaidizi East Africa</h2>
                                        <p class="employerhomepara">Join thousands of employers seeking higly experinced <br>and trustworthy workers.
                                            Click links below to visit our pages</p>
                                    </div>
                    
                                    <div class="card-body employercardbody">
                                       <a href="services.php" class="employershortlinks">Services</a><br>
                                       <hr>
                                       <a href="jobs.php" class="employershortlinks">Jobs</a><br>
                                       <hr>
                                       
                                       <a href="contact.php" class="employershortlinks">Contact Us</a>   
                                    </div>
                    </div>
                    <div class="col-md-3"></div>

                </div>
                            </div>
   <div class="container" style="height: 400px;">
			<div>
			<h3 class="page_title">Our Services</h3>
		</div>
	<div class="row">


		<div class="col-md-4">
			<h3>Nanny Services</h3>
			<p>Nannies are people who provide housework and are very involved in the children's lives. Babysitters are short-term caretakers who are typically hired to watch the children for a set period.</p>
			<button class="btn slider-btn">Learn more</button>
		</div>
		<div class="col-md-4">
			<h3>Caregiver Services</h3>
			<p>A caregiver is someone who is actively engaged in providing care and needs to another such as a chronically ill, disabled or aged family member or friend.</p>
			<button class="btn slider-btn">Learn more</button>
		</div>
		<div class="col-md-4">
			<h3>Laundry services</h3>
			<p style="margin-bottom: 35px">Laundry services is the act of washing and ironing clothes and is done either by leave-in workers or leave-out workers.</p>
			<button class="btn slider-btn">Learn more</button>
		</div>
	</div>
	
</div><div class="call-wrapper" style="height: 250px">
        <div class="inner-wrapper" style="margin-top: 20px">
           <h3 class="call-action-title">Get your dream job today </h3>
           <p>Make your profile more appealing to employers. Edit your profile after logging in</p>
           <center><a href="profile.php" class="btn call-btn">Read more</a></center>
       </div>
    
    </div><div class="container">
<div class="" style="height: 275px;margin: 20px 0;">
 
<div class="row">
    <div class="col-md-4">
        <img src="images/banner.jpg" width="100%" class="aboutimg">
    </div>
    <div class="col-md-8">
            <div>
                    <h3 class="page_title">About Us</h3>
                </div>
            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                         </p>  
    </div>
 
</div>

</div>


  </div><section class="testimonials py-5 text-white px-1 px-md-5 margin-top-xl">
  <img src="../raw.githubusercontent.com/solodev/testimonial-slider-fullwidth/master/solodev-logo-stacked.png" class="icon-overlay" />
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h2 class="pt-2 text-center font-weight-bold">Our Customers Are Seeing Big Results</h2>

        <div class="carousel-controls testimonial-carousel-controls">
          <div class="control d-flex align-items-center justify-content-center prev mt-3"><i class="fa fa-chevron-left"></i></div>
          <div class="control d-flex align-items-center justify-content-center next mt-3"><i class="fa fa-chevron-right"></i></div>

          <div class="testimonial-carousel">
            <div class="h5 font-weight-normal one-slide ">
              <div class="testimonial w-100 px-3 text-center d-flex flex-direction-column justify-content-center flex-wrap align-items-center">
                <div class="message text-center blockquote w-100">"They’ve been consistent throughout the years and grown together with us. Even as they’ve grown, they haven’t lost sight of what they do. Most of their key resources are still with them, which is also a testament to their organization."</div>
                <div class="blockquote-footer w-100 text-white">Ted, WebCorpCo</div>
              </div>
            </div>
            <div class="h5 font-weight-normal one-slide">
              <div class="testimonial w-100 px-3 text-center  d-flex flex-direction-column justify-content-center flex-wrap align-items-center">
                <div class="message text-center blockquote w-100">"Our website uses Solodev to craft a website capable of representing its diverse residents. The website features a newsroom with the latest events, an interactive calendar, and a mobile app that puts the resources at a user’s fingertips."</div>
                <div class="blockquote-footer w-100 text-white">Jim Joe, WebCorpCo</div>
              </div>
            </div>
            <div class="h5 font-weight-normal one-slide">
              <div class="testimonial w-100 px-3 text-center  d-flex flex-direction-column justify-content-center flex-wrap align-items-center">
                <div class="message text-center blockquote w-100">Solodev is a great company to partner with! We are extremely happy with the software, service, and support.</div>
                <div class="blockquote-footer w-100 text-white">Jim Joe, WebCorpCo</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require_once 'navigation/bottom.php'; ?>