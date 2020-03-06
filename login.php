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
            <div class="col-md-3">
                    
            </div>
            <div class="col-md-6">
                <div class="card logincard">
                <div class="card-header loginheader">Login</div>
                <div class="card-body">
                <form method="POST" >
                    <div class="form-group row">
                        <label for="username" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                        <div class="col-md-6">
                        <input id="user_email" type="email" class="form-control " name="user_email" required />
                        </div>
                    </div>
                    <!-- <div class="form-group row">
                        <label for="account" class="col-md-4 col-form-label text-md-right">Account type</label>
                        <div class="col-md-6">
                        <select id="account" name="uer_account">
                            <option>Employer</option>
                            <option>Worker</option>
                        </select>
                        </div>
                        </div> -->
                    <div class="form-group row">
                        <label for="user_password" class="col-md-4 col-form-label text-md-right">Password</label>
                        <div class="col-md-6">
                        <input id="user_password" type="password" class="form-control" name="user_password" />
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                        <button type="submit" name="loginbutton" class="btn btn-primary">
                        Login
                        </button>
                        <a class="btn btn-link" href="reset_password.php">
                        Forgot Your Password?
                        </a>
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