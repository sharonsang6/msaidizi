<?php
// error_reporting (0);
require_once('database/dbconfig.php');

class USER
{

	private $conn;

	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }

	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}

	public function register($public_id, $user_name, $user_email, $user_password, $user_account)
	{

		try
		{
			$new_password = password_hash($user_password, PASSWORD_DEFAULT);

			$stmt = $this->conn->prepare("INSERT INTO users(public_id, user_name, user_email, user_password, user_account)VALUES(:public_id, :user_name, :user_email, :user_password, :user_account)");

			$stmt->bindparam(":public_id", $public_id);
			$stmt->bindparam(":user_name", $user_name);
			$stmt->bindparam(":user_email", $user_email);
			$stmt->bindparam(":user_password", $new_password);
			$stmt->bindparam(":user_account", $user_account);
			$stmt->execute();

			return $stmt;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
			public function postjob($public_id, $job_type, $type_of_worker, $your_location, $salary, $worker_experience, $tribe,$job_description, $your_file)
	{
		try
		{
			$stmt = $this->conn->prepare("INSERT INTO jobs(public_id, job_type, type_of_worker, your_location, salary,  worker_experience, tribe, job_description, your_file)
			 VALUES(:public_id, :job_type, :type_of_worker, :your_location, :salary, :worker_experience, :tribe,:job_description,  :your_file)");

			$stmt->bindparam(":public_id", $public_id);
			$stmt->bindparam(":job_type", $job_type);
			$stmt->bindparam(":type_of_worker", $type_of_worker);
			$stmt->bindparam(":your_location", $your_location);
			$stmt->bindparam(":salary", $salary);
			$stmt->bindparam(":worker_experience", $worker_experience);
			$stmt->bindparam(":tribe", $tribe);
			$stmt->bindparam(":job_description", $job_description);
			$stmt->bindparam(":your_file", $your_file);

			$stmt->execute();

			return $stmt;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	public function sendmessage($name, $email, $subject, $message)
	{

		try
		{
			$stmt = $this->conn->prepare("INSERT INTO messages(name, email, subject, message) VALUES(:name, :email, :subject, :message)");

			$stmt->bindparam(":name", $name);
			$stmt->bindparam(":email", $email);
			$stmt->bindparam(":subject", $subject);
			$stmt->bindparam(":message", $message);
			
			$stmt->execute();

			return $stmt;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	public function makeapplicationoffet($services_id, $public_id, $worker_id, $start_date, $duration)
	{
		try
		{
			$stmt = $this->conn->prepare("INSERT INTO offers(services_id, public_id, worker_id, start_date, duration)VALUES(:services_id, :public_id, :worker_id, :start_date, :duration)");

			$stmt->bindparam(":services_id", $services_id);
			$stmt->bindparam(":public_id", $public_id);
			$stmt->bindparam(":worker_id", $worker_id);
			$stmt->bindparam(":start_date", $start_date);
			$stmt->bindparam(":duration", $duration);
			$stmt->execute();

			return $stmt;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	public function sendemail($public_id, $email)
	{

		try
		{
			$stmt = $this->conn->prepare("INSERT INTO subscriptions(public_id, email) VALUES(:public_id, :email)");

			$stmt->bindparam(":public_id", $public_id);
			$stmt->bindparam(":email", $email);
					
			$stmt->execute();

			return $stmt;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	public function post_user_profile($public_id, $first_name, $middle_name, $last_name,$national_id, $gender, $tribe, $country, $town, $phonenumber, $profileimage)
	{

		try
		{
			$stmt = $this->conn->prepare("INSERT INTO profile(public_id, first_name, middle_name, last_name,national_id,gender, tribe,country, town, phonenumber, profileimage) VALUES(:public_id, :first_name, :middle_name, :last_name,:national_id, :gender, :tribe,:country, :town, :phonenumber, :profileimage)");

			$stmt->bindparam(":public_id", $public_id);
			$stmt->bindparam(":first_name", $first_name);
			$stmt->bindparam(":middle_name", $middle_name);
			$stmt->bindparam(":last_name", $last_name);
			$stmt->bindparam(":national_id", $national_id);
			$stmt->bindparam(":gender", $gender);
			$stmt->bindparam(":tribe", $tribe);
			$stmt->bindparam(":country", $country);
			$stmt->bindparam(":town", $town);
			$stmt->bindparam(":phonenumber", $phonenumber);
			$stmt->bindparam(":profileimage", $profileimage);
			$stmt->execute();

			return $stmt;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public function update_user_profile($public_id, $first_name, $middle_name, $last_name, $national_id, $gender, $tribe, $country, $town, $phonenumber, $profileimage)
	{
		try
		{
			$stmt = $this->conn->prepare("UPDATE `profile` SET `public_id`=:public_id, `first_name`=:first_name, `middle_name`=:middle_name, `last_name`=:last_name, `national_id`=:national_id, `gender`=:gender, `tribe`=:tribe, `country`=:country, `town`=:town, `phonenumber`=:phonenumber, `profileimage`=:profileimage WHERE public_id=$public_id ");

			$stmt->bindparam(":public_id", $public_id);
			$stmt->bindparam(":first_name", $first_name);
			$stmt->bindparam(":middle_name", $middle_name);
			$stmt->bindparam(":last_name", $last_name);
			$stmt->bindparam(":national_id", $national_id);
			$stmt->bindparam(":gender", $gender);
			$stmt->bindparam(":tribe", $tribe);
			$stmt->bindparam(":country", $country);
			$stmt->bindparam(":town", $town);
			$stmt->bindparam(":phonenumber", $phonenumber);
			$stmt->bindparam(":profileimage", $profileimage);
			$stmt->execute();

			return $stmt;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	public function postserviceproduct($public_id, $typeofworker, $job, $experience, $town, $description, $cost)
	{
		try
		{
			$stmt = $this->conn->prepare("INSERT INTO services(public_id, typeofworker, job, experience, town, description, cost) VALUES(:public_id, :typeofworker, :job, :experience, :town, :description, :cost)");

			$stmt->bindparam(":public_id", $public_id);
			$stmt->bindparam(":typeofworker", $typeofworker);
			$stmt->bindparam(":job", $job);
			$stmt->bindparam(":experience", $experience);
			$stmt->bindparam(":town", $town);
			$stmt->bindparam(":description", $description);
			$stmt->bindparam(":cost", $cost);
			$stmt->execute();

			return $stmt;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	
	public function postsubs($public_id, $pesapal_transaction_tracking_id, $pesapal_merchant_reference, $amount)
	{
		try
		{
			$stmt = $this->conn->prepare("INSERT INTO subscription($public_id, $pesapal_transaction_tracking_id, $pesapal_merchant_reference, $amount) VALUES(:public_id, :pesapal_transaction_tracking_id, :pesapal_merchant_reference, :amount)");

			$stmt->bindparam(":public_id", $public_id);
			$stmt->bindparam(":pesapal_transaction_tracking_id", $pesapal_transaction_tracking_id);
			$stmt->bindparam(":pesapal_merchant_reference", $pesapal_merchant_reference);
			$stmt->bindparam(":amount", $amount);
			$stmt->execute();

			return $stmt;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public function doLogin($user_email, $user_password)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT public_id, user_email, user_password,userStatus FROM users WHERE user_email=:user_email ");
			$stmt->execute(array(':user_email'=>$user_email));	
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

			if($stmt->rowCount() == 1){

				if($userRow['userStatus'] == 1){
					if(password_verify($user_password, $userRow['user_password']))
					{				
						$_SESSION['user_session'] = $userRow['public_id'];
						return true;
					}
					else{
						return false;
					}
				}else if($userRow['userStatus'] == 0){
					return false;
				}
				
					
			}

		}
		catch(PDOException $e)
		{
			//echo $e->getMessage();
		}
	}

	public function is_loggedin()
	{
		if(isset($_SESSION['user_session']))
		{
			return true;
		}
	}

	public function redirect($url)
	{
		header("Location: $url");
	}

	public function doLogout()
	{
		session_destroy();
		unset($_SESSION['user_session']);
		return true;
	}
}
?>
