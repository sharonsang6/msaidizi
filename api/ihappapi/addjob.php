<?php


	if (isset($_POST['submitjob'])) {
		$job_type = trim(htmlspecialchars($_POST['job_type']));
		$type_of_worker = trim(htmlspecialchars($_POST['type_of_worker']));
		$your_location = trim(htmlspecialchars($_POST['your_location']));
		$salary = trim(htmlspecialchars($_POST['salary']));
		$worker_experience = trim(htmlspecialchars($_POST['worker_experience']));
		$tribe = trim(htmlspecialchars($_POST['tribe']));
	    $job_description = trim(htmlspecialchars($_POST['job_description']));
        $your_file = $_POST['your_file'];



        $allowed = array('pdf', 'docx');
        $file_name = $_FILES['your_file']['name'];
        @$file_extn = strtolower(end(explode('.', $file_name)));
        $file_tmp = $_FILES['your_file']['tmp_name'];
        if (in_array($file_extn, $allowed) === true){
			$file_path = 'uploads/documents' . md5(time()) . '.' . $file_extn;
            move_uploaded_file($file_tmp, $file_path);
		} 
		
		try {
			if($user->postjob($public_id, $job_type, $type_of_worker, $your_location, $salary, $worker_experience, $tribe, $job_description, $file_path)){  
				$alert = "job posted";
			}
		}
		catch(PDOException $e){
			$alert = $e->getMessage();
		}
		
		


	}
?>