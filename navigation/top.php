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
      <li class="nav-item"><a class="nav-link" href="#aboutus">About us</a></li>
      <li class="nav-item"><a class="nav-link" href="ourservices.php">Our Services</a></li>
      <li class="nav-item"><a class="nav-link" href="#footer">Domestic Agencies</a></li>
      </ul>
     <ul class="nav navbar-nav navbar-right">
      <li class="nav-item"><a class="nav-link" href="services.php">Find worker</a></li>
      <li class="nav-item"><a class="nav-link" href="profile.php">My services</a></li>
      <?php if($user->is_loggedin()!="") { ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Simple reports
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="expenses.php">Employer expenditure</a>
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
            </div>
          </li>
        <?php }
        ?>
      <?php } ?>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php if($user->is_loggedin()!="") { ?>
          welcome <?php echo $userRow['user_name']; ?>
          <?php }else{ ?>
          Account 
          <?php } ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php if($user->is_loggedin()=="") { ?>
          <a class="dropdown-item" href="register.php">REGISTER</a>
          <a class="dropdown-item" href="login.php">LOGIN</a>
          <?php } ?>
          <?php if($user->is_loggedin()!="") { ?>
          <a class="dropdown-item"  href="profile.php">PROFILE</a>
          <a class="dropdown-item"  href="myservices.php">Hired workers</a>
          <a class="dropdown-item"  href="offers.php">My offers</a>
          <a class="dropdown-item"  href="logout.php?logout=true">LOGOUT</a>
          <?php } ?>
        </div>
      </li>
    </ul>
  </div>
</nav>