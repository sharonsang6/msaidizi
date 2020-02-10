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
    <div class="col-md-1 postrowmimage">
        
    </div>
    <div class="col-md-5" style="margin-left: 7%">
        <form>
            <div class="form-group">
              <label for="exampleFormControlInput1">First Name</label>
              <input type="text" class="form-control postjobinput" id="exampleFormControlInput1" >
            </div>
            
          <div class="form-group">
          <label for="exampleFormControlInput1">Email address</label>
          <input type="email" class="form-control postjobinput" id="exampleFormControlInput1" >
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Job type</label>
          <select class="form-control postjobinput" id="exampleFormControlSelect1">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Leavein</label>
          <select class="form-control postformselect" id="exampleFormControlSelect1">
            <option>1</option>
            <option>2</option>
            <option>3</option>
         
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Location</label>
          <select class="form-control postformselect" id="exampleFormControlSelect1">
            <option>1</option>
            <option>2</option>
            <option>3</option>
         
          </select>
        </div>
          
      

     
          
            <div class="form-group">
                <label for="exampleFormControlSelect1">Height</label>
                <select class="form-control postformselect" id="exampleFormControlSelect1">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>
             
            <div class="form-group">
                <label for="exampleFormControlSelect1">Age</label>
                <select class="form-control postformselect" id="exampleFormControlSelect1">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>
             
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Example textarea</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            
                <div class="form-group">
                  <label for="exampleFormControlFile1">Example file input</label>
                  <input type="file" class="form-control-file" id="exampleFormControlFile1">
                </div>
              
          </form>
    </div>
    <div class="col-md-5">
      <form>
        <div class="form-group" style="display:inline">
          <label for="exampleFormControlInput1">Last Name</label>
          <input type="text" class="form-control postjobinput" id="exampleFormControlInput1" >
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Salary</label>
          <input type="text" class="form-control postjobinput" id="exampleFormControlInput1" >
        </div>
        
        <div class="form-group">
          <label for="exampleFormControlInput1">Experience</label>
          <input type="text" class="form-control postjobinput" id="exampleFormControlInput1" >
        </div>
      
        <div class="form-group">
          <label for="exampleFormControlSelect1">Weight</label>
          <select class="form-control postformselect" id="exampleFormControlSelect1">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Tribe</label>
          <select class="form-control postformselect" id="exampleFormControlSelect1">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>
        <!-- Default unchecked -->
        <div class="form-group">
          <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="english">
              <label class="custom-control-label" for="english">English </label>
          </div>
          <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="Swahilli">
              <label class="custom-control-label" for="Swahilli">Swahilli </label>
          </div>
          <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="French">
              <label class="custom-control-label" for="French">French </label>
          </div>
          <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="Spanish">
              <label class="custom-control-label" for="Spanish">Spanish </label>
          </div>
          <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="Chinese">
              <label class="custom-control-label" for="Chinese">Chinese</label>
          </div>
        </div>
        <div class="form-group">
          <button class="btn jobbtn" href="#">POST</button></button>
        </div>
   
      </form>
    </div>
    <div class="col-md-1"></div>
</div>
<?php require_once 'navigation/bottom.php'; ?>