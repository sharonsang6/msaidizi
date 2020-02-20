<?php require_once 'header/header.php'; ?>
<?php require_once 'configurations/config.php'; ?>
<?php require_once "api/includer.php"; ?>

<div id="app">
<?php require_once 'navigation/top.php'; ?>
<main>
            <div id="slider" class="sl-slider-wrapper">

				<div class="sl-slider">
				
					<div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
						<div class="sl-slide-inner">
							<div class="bg-img bg-img-1"></div>
							<h2>Welcome to Msaidizi</h2>
							<blockquote><p class="sl-caption">Join thousands of Kenyans looking for workers and employment.Make finding a job or work easy with minimum effort.</blockquote>
								<center><button class="btn slider-btn btn-danger"> <a href="ourservices.php" class="sliderbutton">Learn more</a></button></center>
							</div>
					</div>
					
					<div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
						<div class="sl-slide-inner">
							<div class="bg-img bg-img-2"></div>
							<h2>Welcome to Msaidizi</h2>
							<blockquote><p class="sl-caption">Join thousands of Kenyans looking for workers and employment.Make finding a job or work easy with minimum effort.</blockquote>
								<center><button class="btn slider-btn btn-danger"><a class="sliderbutton" href="ourservices.php">Learn more</a></button></center>
							</div>
					</div>
					
					
					
					<div class="sl-slide" data-orientation="vertical" data-slice1-rotation="-5" data-slice2-rotation="25" data-slice1-scale="2" data-slice2-scale="1">
						<div class="sl-slide-inner">
							<div class="bg-img bg-img-3"></div>
							<h2>Welcome to Msaidizi</h2>
							<blockquote><p>Join thousands of Kenyans looking for workers and employment.Make finding a job or work easy with minimum effort.</blockquote>
								<center><button class="btn slider-btn btn-danger"><a class="sliderbutton" href="ourservices.php">Learn more</a></button></center>
							</div>
					</div>

				</div><!-- /sl-slider -->

				<nav id="nav-dots" class="nav-dots">
					<span class="nav-dot-current"></span>
					<span></span>
					<span></span>
				
				</nav>

			</div>

			

<div class="container" style="text-align: center;height:400px;margin-top:10px">
			<div>
			<h3 class="page_title">Our Services</h3>
		</div>
	<div class="row">


		<div class="col-md-4">
			<h3>Nanny Services</h3>
			<p>Nannies are people who provide housework and are very involved in the children's lives. Babysitters are short-term caretakers who are typically hired to watch the children for a set period.</p>
			<button class="btn slider-btn"><a class="sliderbutton" href="ourservices.php">Learn more</a></button>
		</div>
		<div class="col-md-4">
			<h3>Caregiver Services</h3>
			<p>A caregiver is someone who is actively engaged in providing care and needs to another such as a chronically ill, disabled or aged family member or friend.</p>
			<button class="btn slider-btn"><a class="sliderbutton" href="ourservices.php">Learn more</a></button>
		</div>
		<div class="col-md-4">
			<h3>Laundry services</h3>
			<p style="margin-bottom: 35px">Laundry services is the act of washing and ironing clothes and is done either by leave-in workers or leave-out workers.</p>
			<button class="btn slider-btn"><a class="sliderbutton" href="ourservices.php">Learn more</a></button>
		</div>
	</div>
	
</div><div class="call-wrapper" style="height: 250px">
	<div class="inner-wrapper" style="margin-top: 20px">
   	<h3 class="call-action-title">Get your dream job/worker today </h3>
   	<p>Create an account as a worker or employer or both and enjoy the services we offer.</p>
   	<center><a href="login.php" class="btn call-btn">Click here</a></center>
   </div>

</div>
<div class="container" id="aboutus" style="text-align: center; height:400px">
<div class="">
 
<div class="row" >
    <div class="col-md-4">
        <img src="images/banner.jpg" width="100%" class="aboutimg">
    </div>
    <div class="col-md-8">
            <div>
                    <h3 class="page_title">About Us</h3>
                </div>
            <p>Msaidizi East Africa was started in 2019 by a student in Kenyatta university with the aim of expanding
                       market opportunities for domestic workers in Kenya and in East Africa. The company also aims at making it easy for people to acquire domestic workers
                       anywhere, anytime and everyhere with minimal effort and at lower cost.
                         </p>  
    </div>
 
</div>

</div>


  </div>
	<section class="testimonials py-5 text-white px-1 px-md-5 margin-top-xl">
 
  <div class="container" style="height:200px">

    <div class="row" style="height:200px">
		<img src="images/banner.jpg" class="icon-overlay" />
      <div class="col-sm-12">
        <h2 class="pt-2 text-center font-weight-bold">Our Customers Are Seeing Big Results</h2>

        <!-- <div class="carousel-controls testimonial-carousel-controls">
          <div class="control d-flex align-items-center justify-content-center prev mt-3"><i class="fa fa-chevron-left"></i></div>
          <div class="control d-flex align-items-center justify-content-center next mt-3"><i class="fa fa-chevron-right"></i></div>

          <div class="testimonial-carousel">
             -->
            <?php
            $stmt = $auth_user->runQuery("SELECT * FROM  offers 
            LEFT JOIN users ON `users`.`public_id`=`offers`.`public_id` ");
            $stmt->execute(array());
            $comment=$stmt->fetchAll(PDO::FETCH_OBJ);
            foreach ($comment as $c) { ?>
	            <div class="h5 font-weight-normal one-slide ">
	              <div class="testimonial w-100 px-3 text-center d-flex flex-direction-column justify-content-center flex-wrap align-items-center">
	                <div class="message text-center blockquote w-100">"<?php echo $c->comment; ?>"This website has really helped me a lot"</div>
	                <div class="blockquote-footer w-100 text-white"><?php echo $c->user_name; ?></div>
	              </div>
	            </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php require_once 'navigation/bottom.php'; ?>