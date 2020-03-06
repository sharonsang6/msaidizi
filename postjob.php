<?php require_once 'header/header.php'; ?>
<?php require_once 'app/sessionconfig/loginsession.php'; ?>
<?php require_once 'configurations/config.php'; ?>
<?php require_once "api/includer.php"; ?>

<div id="app">
<?php require_once 'navigation/top.php'; ?>
<main>
<div class="row postrow">
<?php

if ( $userRow['premium'] ==0 && time() > $userRow['public_id']+100) { ?>
	<div class="btn-group btn-group-lg" role="group" aria-label="Basic example" style="width: 100%;">
		<form action="mpesa/pesapal-iframe.php" method="post"  style="width: 100%;">
		<input hidden type="text" name="amount" value="350" />
		<input hidden type="text" name="type" value="MERCHANT" readonly="readonly" />
		<input hidden type="text" name="description" value="Subscription" />
		<input hidden type="text" name="reference" value="<?php echo $userRow['public_id']; ?>" />
		<input hidden type="text" name="first_name" value="<?php echo $userRow['user_name']; ?>" />
		<input hidden type="text" name="last_name" value="null" />
		<input hidden type="text" name="email" value="<?php echo $userRow['user_email']; ?>" />
	  <button type="submit" class="btn btn-secondary" style="width: inherit;">Make payment to enjoy services</button>
		</form>
	</div>	

<?php die(); } 
else{ ?>
      <div class="postjobtitle">
    <h3>Kindly fill the form below to post a job</h3>
  </div>
    <div class="col-md-2 postrowmimage">
        
    </div>
    <div class="col-md-8" style="margin-left: 7%">
    <form method="post" enctype="multipart/form-data" >
        <div class="form-group">
          <label for="exampleFormControlSelect1">Job type</label>
          <select class="form-control postjobinput" name="job_type" id="exampleFormControlSelect1">
            <option>Nanny</option>
            <option>Caregiver</option>
            <option>Gardener</option>
            <option>Other</option>
            <option>Plumber</option>
            <option>Childcare</option>
            <option>Laundry</option>
            <option>Electrician</option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Type of Worker</label>
          <select class="form-control postformselect" name="type_of_worker"id="exampleFormControlSelect1">
            <option>Indoor</option>
            <option>Outdoor</option>
           
         
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Location</label>
          <select class="form-control postformselect" name="your_location"id="exampleFormControlSelect1">
            <option>Nairobi</option>
            <option>Kisumu</option>
            <option>Narok</option>
            <option>Mombasa</option>
            <option>Eldoret</option>
            <option>Kericho</option>
            <option>Nakuru</option>
            <option>Lamu</option>
            <option>Kisii</option>
            <option>Malindi</option>
            <option>Bungoma</option>
            <option>Baragoi</option>
            <option>Butere</option>
            <option>Dadaab</option>
            <option>Diani Beach</option>
            <option>Emali</option>
            <option>Embu</option>
            <option>Garissa</option>
            <option>Gede</option>
            <option>Hola</option>
            <option>Homa Bay</option>
            <option>Isiolo</option>
            <option>Kitui</option>
            <option>Kibwez</option>
            <option>Kajiado</option>
            <option>Kakamega</option>
            <option>Kakuma</option>
            <option>Kapenguria</option>
            <option>Keroka</option>
            <option>Kiambu            </option>
            <option>Kilifi</option>
            <option>Langata</option>
            <option>Litein</option>
            <option>Lodwar</option>
            <option>Lokichoggio</option>
            <option>Londiani</option>
            <option>Loyangalani</option>
            <option>Machakos</option>
            <option>Makindu</option>
            <option>Mandera</option>
            <option>Marlal</option>
            <option>Marsabit</option>
            <option>Meru</option>
            <option>Moyale</option>
            <option>Mumias</option>
            <option>Muranga</option>
            <option>Mutomo</option>
            <option>Naivasha</option>
            <option>Namanga</option>
            <option>Nanyuki</option>
            <option>Naro Moru</option>
            <option>Nyahururu</option>
            <option>Nyeri</option>
            <option>Ruiru</option>
            <option>Shimoni</option>
            <option>Takaungu</option>
            <option>Thika</option>
            <option>Vihiga</option>
            <option>Voi</option>
            <option>Wajir</option>
            <option>Watamu</option>
            <option>Webuye</option>
            <option>Wote</option>
            <option>Wundanyi</option>
            <option>Other</option>

         
          </select>
        </div>
          
            
                              
           <div class="form-group">
          <label for="exampleFormControlInput1">Salary</label>
          <input type="number" class="form-control postjobinput" pattern="d{1+}"  required name="salary"id="exampleFormControlInput1" >
        </div>
        
        <div class="form-group">
          <label for="exampleFormControlInput1">Experience(years)</label>
          <input type="number" class="form-control postjobinput" required pattern="d{0+}" name="worker_experience" id="exampleFormControlInput1" >
        </div>
      
       
        <div class="form-group">
          <label for="exampleFormControlSelect1">Tribe</label>
          <select class="form-control postformselect" name="tribe" id="exampleFormControlSelect1">
            <option>Ameru</option>
            <option>Embu</option>
            <option>Kalenjin</option>
            <option>Kamba</option>
            <option>Kikuyu</option>
            <option>Kisii</option>
            <option>Kuria</option>
            <option>Luhya</option>
            <option>Luo</option>
            <option>Maasai</option>
            <option>Mijikenda</option>
            <option>Orma</option>
            <option>Rendile</option>
            <option>Samburu</option>
            <option>Somali</option>
            <option>Suba</option>
            <option>Swahili</option>
            <option>Taita</option>
            <option>Taveta</option>
            <option>Turkana</option>
            <option>Gabra</option>
            <option>Mbeere</option>
            <option>Nubia</option>
            <option>Tharaka</option>
            <option>IIchamus</option>
            <option>Njemps</option>
            <option>Borana</option>
            <option>Galla</option>
            <option>Gosha</option>
            <option>Konso</option>
            <option>Sakuye</option>
            <option>Waat</option>
            <option>Isaak</option>
            <option>Walwana</option>
            <option>Dasenach</option>
            <option>Galjeel</option>
            <option>Leysan</option>
            <option>Bulji</option>
            <option>Teso</option>
            <option>Arab</option>
            <option>Asian</option>
            <option>European</option>
            <option>American</option>
            <option>Other</option>

          </select>
        </div>
        <!-- Default unchecked -->
        
        <div class="form-group">
              <label for="exampleFormControlTextarea1">Description</label>
              <textarea class="form-control postformselect" required name="job_description" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
       
        <div class="form-group">
                  <label for="exampleFormControlFile1">Example file input</label>
                  <input type="file" class="form-control-file" name="your_file" id="exampleFormControlFile1">
                </div>
                <div class="form-group">
                <button type="submit" name="submitjob" class="btn btn-primary btn-block findworkergroup createservice">POST</button>
        </div>
      </form>
    </div>
    <div class="col-md-1"></div>

</div>
<?php } ?>
  
<?php require_once 'navigation/bottom.php'; ?>