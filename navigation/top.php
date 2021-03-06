<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark shadow-sm custom_nav  justify-content-between">
  <a class="navbar-brand" href="./">
    <img src=images/capture.png width="120" height="35" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
      <li class="nav-item"><a class="nav-link" href="contact.php">Contact us</a></li>
      <li class="nav-item"><a class="nav-link" href="aboutus.php">About us</a></li>
      <li class="nav-item"><a class="nav-link" href="ourservices.php">Our Services</a></li>
      <li class="nav-item"><a class="nav-link" href="#footer">Domestic Agencies</a></li>
      </ul>
     <ul class="nav navbar-nav navbar-right">
     <?php
     if ($userRow['user_account'] == "employer") { ?>
      <li class="nav-item"><a class="nav-link" href="services.php">Find worker</a></li>
      <li class="nav-item"><a class="nav-link" href="postjob.php">Post Job</a></li>
     <?php }
     ?>
      <?php
     if ($userRow['user_account'] == "worker") { ?>
     <li class="nav-item"><a class="nav-link" href="jobs.php">Jobs</a></li>
          <li class="nav-item"><a class="nav-link" href="profile.php">My services</a></li>
          <li class="nav-item"><a class="nav-link" href="offers.php">My offers</a></li>
          <li class="nav-item"><a class="nav-link" href="work.php">Services reports</a></li>
     <?php }
     ?>
   
      <?php if($user->is_loggedin()!="") { ?>
      <li class="nav-item dropdown">
      <?php if ($userRow['user_account'] == "employer") { ?>
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Simple reports
        </a>
      <?php } ?>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="expenses.php">My expenditure</a>
        </div>
      </li>
      <?php } ?>
      <?php if($user->is_loggedin()!="") { ?>
        <?php
        if ($userRow['admin'] == 1) { ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Admin view
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="users.php">Users</a>
              <a class="dropdown-item" href="payments.php">Payments</a>
              <a class="dropdown-item" href="messages.php">Messages</a>
              <a class="dropdown-item" href="activeworkers.php">Active workers</a>
              <a class="dropdown-item" href="archived_users.php">Archived Users</a>
              <a class="dropdown-item" href="subscriptions.php">Subscriptions</a>
              <a class="dropdown-item" href="accounts.php">Income</a>
              </div>
          </li>
        <?php }
        ?>
      <?php } ?>
       </ul>
       <div>
        <ul>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php if($user->is_loggedin()!="") { ?>
          welcome <?php echo $userRow['user_name']; ?>
          <?php }else{ ?>
          <button class="btn logginbtn" href="login.php">LOGIN</button>
          <?php } ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php if($user->is_loggedin()=="") { ?>
          <a class="dropdown-item" href="register.php">REGISTER</a>
          <a class="dropdown-item" href="login.php">LOGIN</a>
          <?php } ?>
          <?php if($user->is_loggedin()!="") { ?>
          <a class="dropdown-item"  href="profile.php">PROFILE</a>
          <?php if ($userRow['user_account'] == "employer") { ?>
            <a class="dropdown-item"  href="hiredworkers.php">Hired workers</a>
            <a class="dropdown-item"  href="myjobs.php">My jobs</a>
          <?php } ?>
          <?php if ($userRow['user_account'] == "worker") { ?>
            <a class="dropdown-item"  href="offers.php">My offers</a>
          <?php } ?>      
          <a class="dropdown-item"  href="logout.php?logout=true">LOGOUT</a>
          <?php } ?>
        </div>
      </li>
    </ul>
  </div>
    
  </div>
</nav>