<?php require_once 'header/header.php'; ?>
<?php require_once 'app/sessionconfig/loginsession.php'; ?>
<?php require_once 'configurations/config.php'; ?>
<?php require_once "api/includer.php"; ?>

<div id="app">
<?php require_once 'navigation/top.php'; ?>
<main>
<div class="row postrow">
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
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Leavein</label>
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
         
          </select>
        </div>
          
            
                              
           <div class="form-group">
          <label for="exampleFormControlInput1">Salary</label>
          <input type="text" class="form-control postjobinput" name="salary"id="exampleFormControlInput1" >
        </div>
        
        <div class="form-group">
          <label for="exampleFormControlInput1">Experience</label>
          <input type="text" class="form-control postjobinput" name="worker_experience" id="exampleFormControlInput1" >
        </div>
      
       
        <div class="form-group">
          <label for="exampleFormControlSelect1">Tribe</label>
          <select class="form-control postformselect" name="tribe" id="exampleFormControlSelect1">
            <option>Kikuyu</option>
            <option>Kalenjin</option>
            <option>Maasai</option>
            <option>Kamba</option>
            <option>Taita</option>
          </select>
        </div>
        <!-- Default unchecked -->
        <div class="form-group">
          <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" value="English"id="english" name="language">
              <label class="custom-control-label" for="english">English </label>
          </div>
          <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="Swahilli" value="Swahilli" name="language">
              <label class="custom-control-label" for="Swahilli">Swahilli </label>
          </div>
          <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="French" value="French" name="language">
              <label class="custom-control-label" for="French">French </label>
          </div>
          <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="Spanish" value="Spanish" name="language">
              <label class="custom-control-label" for="Spanish">Spanish </label>
          </div>
          <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="Chinese" value="Chinese"  name="language">
              <label class="custom-control-label" for="Chinese">Chinese</label>
          </div>
        </div>
        
        <div class="form-group">
              <label for="exampleFormControlTextarea1">Example textarea</label>
              <textarea class="form-control postformselect" name="job_description" id="exampleFormControlTextarea1" rows="3"></textarea>
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
<?php require_once 'navigation/bottom.php'; ?>