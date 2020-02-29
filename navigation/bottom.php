<div class="footer" id="footer">
    <div class="container">
      <div class="row">
      
        <div class="col-lg-3">
          <h4 class="footer-heading"><span>Our Services</span></h4><br />
          <ul class="list-unstyled">
            <?php
            $stmt = $auth_user->runQuery("SELECT * FROM  services LIMIT 4 ");
            $stmt->execute(array());
            $servics=$stmt->fetchAll(PDO::FETCH_OBJ);
            foreach ($servics as $service) { ?>
              <li><a href="services.php"><?php echo $service->job; ?></a></li>
            <?php } ?>
              <li><a href="services.php">View all services</a></li>            
          </ul>
      </div>
       
      <div class="col-lg-3">
          <h4 class="subscribe">Subscribe to our newslater</h4><br />
          <input class="subemail rounded-pill" name="e_mail" type="email" placeholder="email" >
          <button class="btn subbtn" type="submit" name="subscribetonewsletter">GO</button>
        </div>

        <div class="col-lg-3">
            <h4 class="footer-heading"><span>Domestic Agencies</span></h4>
            <ul class="list-unstyled">
                <li><a href="https://www.nairobinanny.com/">Nairobi Nanny Services</a></li>
               <li><a href="https://www.facebook.com/Angels-Domestic-Workers-Agency-181539105259365/">Angels domestic workers agency</a></li>
                <li><a href="https://www.greataupair.com/">GreatAupair</a></li>
                <li><a href="https://www.maxchildcare.com/">Max Child Care </a></li>

            </ul>
        </div>
        <div class="col-lg-3 footersocialinks">
        <!-- Add font awesome icons -->
        <a href="https://www.facebook.com/sharon.chepkirui.7739" class="fa fa-facebook"></a>
        <a href="#" class="fa fa-twitter"></a>
        <a href="https://www.instagram.com/sharon_sangg/" class="fa fa-instagram"></a><br></br>
        <a href="#" class="fa fa-youtube"></a>
        <a href="https://www.linkedin.com/in/sharon-sang-16a7b0122/" class="fa fa-linkedin"></a>
      </div>
      </div>


    </div>
            <div class="row copyright_wrap">
        <div class="col-12">
          <div class="copyright">
              <p>
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  Copyright © <script>document.write(new Date().getFullYear());</script> All rights reserved 
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  </p>
          </div>
        </div>
      </div>
  </div>        </main>
    </div>
<style type="text/css">
.snack-wrap {display:block;position:fixed;bottom:0px;left:10px;padding:0px;}

.snackbar {display:block;background:#222;border:#f2f2f2;padding:10px 40px 10px 20px;color:#fff;font-family:Arial;position:relative;left:0px;bottom:-70px;transition: bottom 0.5s ease-in-out;z-index:9;} 
.snackclose, #label {bottom:-70px;position:absolute;border:0;}
.snackclose {display:none;z-index:10;}
#label {z-index:11;display:block;width:100%;height:100%;color:rgba(255,255,255,0.8);cursor:pointer;}
.animated {animation-name: snackbar-show;animation-duration: 1s;animation-direction: forwards;animation-timing-function: ease-in-out;animation-delay:0s;animation-fill-mode: forwards;}
.snackclose:checked~.snackbar, .snackclose:checked, .snackclose:checked+label {animation-name: snackbar-hide;animation-delay:0s;}
@keyframes snackbar-show { 0%{ bottom:-80px; }90%, 95% {bottom:15px; }92.5%, 100% {bottom:10px; }} 
@keyframes snackbar-hide { 0%, 7.5% {bottom:10px; }5%,10% {bottom:15px; }100% {bottom:-80px; }}
</style>
<?php if (@$alert != "") { ?>
<div class="snack-wrap" id="snack-wrap" style="z-index: 3 !important;min-width: 300px;">
<input type="checkbox" class="snackclose animated" id="close"/><label id="label" class="snacklable animated" for="close"></label>  
<div class="snackbar animated">
   <p>
      <a class="mdl-navigation__link mdl-js-ripple-effect" style="padding-left: 10px;font-size: 17px !important;color: #fff;background:none !important;" href=""><i class="material-icons" style="margin-right:20px;color: green;">notifications</i> <?php echo @$alert; ?>.</a>
    </p>
</div>
</div>
<?php } ?>


<script>
  setTimeout(function() {
      $('#snack-wrap').fadeOut("slow");
  }, 4000); // <-- time in milliseconds
</script>

<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>

    <script type="text/javascript" src="js/jquery.ba-cond.min.js"></script>
    <script type="text/javascript" src="js/jquery.slitslider.js"></script>
    <script type="text/javascript" src="js/my_custom.js"></script>
    <script type="text/javascript" src="js/slick.min.js"></script>


</body>

<!-- Mirrored from 127.0.0.1:8000/home by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Feb 2020 08:56:45 GMT -->
</html>
