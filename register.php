<?php require_once 'header/header.php'; ?>
<?php require_once 'configurations/config.php'; ?>
<?php require_once "api/includer.php"; ?>
<?php
if($auth_user->is_loggedin()!="")
    {
        $auth_user->redirect('../msaidizi/profile.php');
    }
?>
<div id="app">
<?php require_once 'navigation/top.php'; ?>
<main>
<div class="logincontainer">
<div class="row justify-content-center loginrow">
    <div class="col-md-3"></div>
<div class="col-md-6">
<div class="card regcard">
<div class="card-header loginheader">Register</div>
<div class="card-body">
    <P>P assword must contain atleast 8 characters, one capital letter, one small letter and one number</P>
    <form method="POST" method="post">
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">Username</label>
            <div class="col-md-6">
            <input id="user_name" type="text" required class="form-control "  value="<?php echo isset($_POST["user_name"]) ? $_POST["user_name"] : ''; ?>" name="user_name" />
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
            <div class="col-md-6">
            <input id="email" type="email" required class="form-control " value="<?php echo isset($_POST["user_email"]) ? $_POST["user_email"] : ''; ?>" name="user_email" />
            </div>
        </div>
        <div class="form-group row">
            <label for="account" name="user_account" class="col-md-4 col-form-label text-md-right">Account type</label>
            <div class="col-md-6">
            <select id="account" name="user_account" class="form-control ">
                <option value="employer">Employer</option>
                <option value="worker">Worker</option>
            </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
            <div class="col-md-6">
            <input id="password" type="password"  required  class="form-control " placeholder="" name="user_password" />
         
            </div>
        </div>
            <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">Confirm assword</label>
            <div class="col-md-6">
            <input id="cfpassword" type="password" required   class="form-control " placeholder="" name="cfuser_password" />
         
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
            <button type="submit" name="registrationbutton" class="btn btn-primary">
            Register
            </button>
            <a href="login.php" class="btn">Login</a>
          
            </div>
        </div>
    </form>
</div>
</div>
</div>
<div class="col-md-3"></div>
</div>
</div>

<?php require_once 'navigation/bottom.php'; ?>