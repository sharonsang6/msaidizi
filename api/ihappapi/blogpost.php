<?php
if (isset($_POST['submitblog'])) {
	$blogtitle = strip_tags($_POST['blogtitle']);
	$blogstatement = strip_tags($_POST['blogstatement']);
	$blogimage = $_POST['blogimage'];
	$blogbody = base64_encode($_POST['blogbody']);

	if ($blogtitle == "") { $alert = "Provide title"; }
	elseif ($blogstatement == "") { $alert = "Provide blog statement"; }
	elseif (empty($_FILES['blogimage']['name']) === true) { $error[] = "Provide image!"; }
	elseif ($blogbody == "") { $alert = "Provide blog body"; }
    else
    {
    	$allowed = array('jpg', 'png', 'jpeg', 'gif');
        $file_name = $_FILES['blogimage']['name'];
        @$file_extn = strtolower(end(explode('.', $file_name)));
        $file_tmp = $_FILES['blogimage']['tmp_name'];
        if (in_array($file_extn, $allowed) === true)
        {
            $file_path = 'uploads/blogimages/' . md5(time()) . '.' . $file_extn;
            move_uploaded_file($file_tmp, $file_path);
			try
			{
			if($user->postblog($blogtitle, $blogstatement, $file_path, $blogbody)){  
			    $alert = "Blog posted";
			  }
			}
			catch(PDOException $e)
			{
			$alert = $e->getMessage();
			}
		}
    } 
}	
?>