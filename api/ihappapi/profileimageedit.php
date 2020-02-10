<?php
if (isset($_POST['update_image'])) {
    $idimage = @$_POST['idimage'];

    $allowed = array('jpg', 'png', 'jpeg', 'gif');
    $file_name = $_FILES['idimage']['name'];
    @$file_extn = strtolower(end(explode('.', $file_name)));
    $file_tmp = $_FILES['idimage']['tmp_name'];
    if (in_array($file_extn, $allowed) === true)
    {
        $file_path = 'uploads/documents/' . md5(time()) . '.' . $file_extn;
        move_uploaded_file($file_tmp, $file_path);
    	try
        {
        	// unlink('$removeidimage');
        	$stmt = $auth_user->runQuery(" UPDATE `profile` SET `idimage`=:idimage WHERE public_id=$public_id ");
			$stmt->bindparam(":idimage", $file_path); 
			$alert = "Identification document uploaded";
			$stmt->execute();

			return $stmt;
        }
        catch(PDOException $e)
        {
            $alert = $e->getMessage();
    	}
    }
}
?>