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

	// public function user_cv_first_post($public_id, $user_cv)
	// {

	// 	try
	// 	{
	// 		$stmt = $this->conn->prepare("INSERT INTO cv(public_id, user_cv)VALUES(:public_id, :user_cv)");

	// 		$stmt->bindparam(":public_id", $public_id);
	// 		$stmt->bindparam(":user_cv", $user_cv);
	// 		$stmt->execute();

	// 		return $stmt;
	// 	}
	// 	catch(PDOException $e)
	// 	{
	// 		//echo $e->getMessage();
	// 	}
	// }

	// public function user_cv_update($public_id, $user_cv)
	// {
	// 	try
	// 	{
	// 		$stmt = $this->conn->prepare("UPDATE `cv` SET `user_cv`=:user_cv WHERE public_id=$public_id ");

	// 		$stmt->bindparam(":user_cv", $user_cv);
	// 		$stmt->execute();

	// 		return $stmt;
	// 	}
	// 	catch(PDOException $e)
	// 	{
	// 		$alert = $e->getMessage();
	// 	}
	// }

	// public function sendmessage($name, $email, $phone, $subject, $complete_message)
	// {

	// 	try
	// 	{
	// 		$stmt = $this->conn->prepare("INSERT INTO client_messages(name, email, phone, subject, complete_message)VALUES(:name, :email, :phone, :subject, :complete_message)");

	// 		$stmt->bindparam(":name", $name);
	// 		$stmt->bindparam(":email", $email);
	// 		$stmt->bindparam(":phone", $phone);
	// 		$stmt->bindparam(":subject", $subject);
	// 		$stmt->bindparam(":complete_message", $complete_message);
	// 		$stmt->execute();

	// 		return $stmt;
	// 	}
	// 	catch(PDOException $e)
	// 	{
	// 		//echo $e->getMessage();
	// 	}
	// }

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

	// public function rejectjobapplication($user_email, $offer_type, $start_date, $status)
	// {

	// 	try
	// 	{
	// 		$stmt = $this->conn->prepare("INSERT INTO offers(user_email, offer_type, start_date, status)VALUES(:user_email, :offer_type, :start_date, :status)");

	// 		$stmt->bindparam(":user_email", $user_email);
	// 		$stmt->bindparam(":offer_type", $offer_type);
	// 		$stmt->bindparam(":start_date", $start_date);
	// 		$stmt->bindparam(":status", $status);
	// 		$stmt->execute();

	// 		return $stmt;
	// 	}
	// 	catch(PDOException $e)
	// 	{
	// 		echo $e->getMessage();
	// 	}
	// }

	// public function postblog($blogtitle, $blogstatement, $blogimage, $blogbody)
	// {

	// 	try
	// 	{
	// 		$stmt = $this->conn->prepare("INSERT INTO blog(blogtitle, blogstatement, blogimage, blogbody)VALUES(:blogtitle, :blogstatement, :blogimage, :blogbody)");

	// 		$stmt->bindparam(":blogtitle", $blogtitle);
	// 		$stmt->bindparam(":blogstatement", $blogstatement);
	// 		$stmt->bindparam(":blogimage", $blogimage);
	// 		$stmt->bindparam(":blogbody", $blogbody);
	// 		$stmt->execute();

	// 		return $stmt;
	// 	}
	// 	catch(PDOException $e)
	// 	{
	// 		echo $e->getMessage();
	// 	}
	// }

	// public function submittedcomments($blog_id, $blogcomment)
	// {

	// 	try
	// 	{
	// 		$stmt = $this->conn->prepare("INSERT INTO blog_comments(blog_id, blogcomment)VALUES(:blog_id, :blogcomment)");

	// 		$stmt->bindparam(":blog_id", $blog_id);
	// 		$stmt->bindparam(":blogcomment", $blogcomment);
	// 		$stmt->execute();

	// 		return $stmt;
	// 	}
	// 	catch(PDOException $e)
	// 	{
	// 		echo $e->getMessage();
	// 	}
	// }















	// public function postproperty($gandertech_property_public_id, $gandertech_public_id, $gandertech_property_name, $gandertech_property_type, $gandertech_property_country, $gandertech_property_location)
	// {

	// 	try
	// 	{
	// 		$stmt = $this->conn->prepare("INSERT INTO gandertech_property(gandertech_property_public_id, gandertech_public_id, gandertech_property_name, gandertech_property_type, gandertech_property_country, gandertech_property_location) VALUES(:gandertech_property_public_id, :gandertech_public_id, :gandertech_property_name, :gandertech_property_type, :gandertech_property_country, :gandertech_property_location)");

	// 		$stmt->bindparam(":gandertech_property_public_id", $gandertech_property_public_id);
	// 		$stmt->bindparam(":gandertech_public_id", $gandertech_public_id);
	// 		$stmt->bindparam(":gandertech_property_name", $gandertech_property_name);
	// 		$stmt->bindparam(":gandertech_property_type", $gandertech_property_type);
	// 		$stmt->bindparam(":gandertech_property_country", $gandertech_property_country);
	// 		$stmt->bindparam(":gandertech_property_location", $gandertech_property_location);
	// 		$stmt->execute();

	// 		return $stmt;
	// 	}
	// 	catch(PDOException $e)
	// 	{
	// 		//echo $e->getMessage();
	// 	}
	// }

	// public function postpropertyrooms($gandertech_property_public_id, $gandertech_property_block, $gandertech_property_block_type, $gandertech_property_rent_price, $gandertech_property_block_security_deposit, $gandertech_property_block_contractual_period, $gandertech_property_block_beds, $gandertech_property_block_baths, $gandertech_property_block_terms, $gandertech_property_block_description, $gandertech_property_block_image)
	// {

	// 	try
	// 	{
	// 		$stmt = $this->conn->prepare("INSERT INTO gandertech_property_rooms(gandertech_property_public_id, gandertech_property_block, gandertech_property_block_type, gandertech_property_rent_price, gandertech_property_block_security_deposit, gandertech_property_block_contractual_period, gandertech_property_block_beds, gandertech_property_block_baths, gandertech_property_block_terms, gandertech_property_block_description, gandertech_property_block_image) VALUES(:gandertech_property_public_id, :gandertech_property_block, :gandertech_property_block_type, :gandertech_property_rent_price, :gandertech_property_block_security_deposit, :gandertech_property_block_contractual_period, :gandertech_property_block_beds, :gandertech_property_block_baths, :gandertech_property_block_terms, :gandertech_property_block_description, :gandertech_property_block_image)");

	// 		$stmt->bindparam(":gandertech_property_public_id", $gandertech_property_public_id);
	// 		$stmt->bindparam(":gandertech_property_block", $gandertech_property_block);
	// 		$stmt->bindparam(":gandertech_property_block_type", $gandertech_property_block_type);
	// 		$stmt->bindparam(":gandertech_property_rent_price", $gandertech_property_rent_price);
	// 		$stmt->bindparam(":gandertech_property_block_security_deposit", $gandertech_property_block_security_deposit);
	// 		$stmt->bindparam(":gandertech_property_block_contractual_period", $gandertech_property_block_contractual_period);
	// 		$stmt->bindparam(":gandertech_property_block_beds", $gandertech_property_block_beds);
	// 		$stmt->bindparam(":gandertech_property_block_baths", $gandertech_property_block_baths);
	// 		$stmt->bindparam(":gandertech_property_block_terms", $gandertech_property_block_terms);
	// 		$stmt->bindparam(":gandertech_property_block_description", $gandertech_property_block_description);
	// 		$stmt->bindparam(":gandertech_property_block_image", $gandertech_property_block_image);

	// 		$stmt->execute();

	// 		return $stmt;
	// 	}
	// 	catch(PDOException $e)
	// 	{
	// 		//echo $e->getMessage();
	// 	}
	// }

	// public function setupbusiness($gandertech_businesses_pulic_id, $gandertech_public_id, $gandertech_business_name, $gandertech_business_currency, $gandertech_business_country, $gandertech_business_location)
	// {

	// 	try
	// 	{
	// 		$stmt = $this->conn->prepare("INSERT INTO gandertech_businesses(gandertech_businesses_pulic_id, gandertech_public_id, gandertech_business_name, gandertech_business_currency, gandertech_business_country, gandertech_business_location) VALUES(:gandertech_businesses_pulic_id, :gandertech_public_id, :gandertech_business_name, :gandertech_business_currency, :gandertech_business_country, :gandertech_business_location)");

	// 		$stmt->bindparam(":gandertech_businesses_pulic_id", $gandertech_businesses_pulic_id);
	// 		$stmt->bindparam(":gandertech_public_id", $gandertech_public_id);
	// 		$stmt->bindparam(":gandertech_business_name", $gandertech_business_name);
	// 		$stmt->bindparam(":gandertech_business_currency", $gandertech_business_currency);
	// 		$stmt->bindparam(":gandertech_business_country", $gandertech_business_country);
	// 		$stmt->bindparam(":gandertech_business_location", $gandertech_business_location);
	// 		$stmt->execute();

	// 		return $stmt;
	// 	}
	// 	catch(PDOException $e)
	// 	{
	// 		//echo $e->getMessage();
	// 	}
	// }

	// public function postproduct($gandertech_businesses_pulic_id, $gandertech_public_id, $gandertech_business_product_name, $gandertech_business_product_price, $gandertech_business_product_discount, $gandertech_business_product_display_price, $gandertech_product_category, $gandertech_product_image, $gandertech_product_details)
	// {

	// 	try
	// 	{
	// 		$stmt = $this->conn->prepare("INSERT INTO gandertech_businesses_products(gandertech_businesses_pulic_id, gandertech_public_id, gandertech_business_product_name, gandertech_business_product_price, gandertech_business_product_discount, gandertech_business_product_display_price, gandertech_product_category, gandertech_product_image, gandertech_product_details) VALUES(:gandertech_businesses_pulic_id, :gandertech_public_id, :gandertech_business_product_name, :gandertech_business_product_price, :gandertech_business_product_discount, :gandertech_business_product_display_price, :gandertech_product_category, :gandertech_product_image, :gandertech_product_details)");

	// 		$stmt->bindparam(":gandertech_businesses_pulic_id", $gandertech_businesses_pulic_id);
	// 		$stmt->bindparam(":gandertech_public_id", $gandertech_public_id);
	// 		$stmt->bindparam(":gandertech_business_product_name", $gandertech_business_product_name);
	// 		$stmt->bindparam(":gandertech_business_product_price", $gandertech_business_product_price);
	// 		$stmt->bindparam(":gandertech_business_product_discount", $gandertech_business_product_discount);
	// 		$stmt->bindparam(":gandertech_business_product_display_price", $gandertech_business_product_display_price);
	// 		$stmt->bindparam(":gandertech_product_category", $gandertech_product_category);
	// 		$stmt->bindparam(":gandertech_product_image", $gandertech_product_image);
	// 		$stmt->bindparam(":gandertech_product_details", $gandertech_product_details);
	// 		$stmt->execute();

	// 		return $stmt;
	// 	}
	// 	catch(PDOException $e)
	// 	{
	// 		//echo $e->getMessage();
	// 	}
	// }
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
	public function post_user_profile($public_id, $first_name, $middle_name, $last_name,$national_id, $country, $town, $phonenumber, $profileimage)
	{

		try
		{
			$stmt = $this->conn->prepare("INSERT INTO profile(public_id, first_name, middle_name, last_name,national_id, country, town, phonenumber, profileimage) VALUES(:public_id, :first_name, :middle_name, :last_name,:national_id, :country, :town, :phonenumber, :profileimage)");

			$stmt->bindparam(":public_id", $public_id);
			$stmt->bindparam(":first_name", $first_name);
			$stmt->bindparam(":middle_name", $middle_name);
			$stmt->bindparam(":last_name", $last_name);
			$stmt->bindparam(":national_id", $national_id);
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

	public function update_user_profile($public_id, $first_name, $middle_name, $last_name, $country, $town, $phonenumber, $profileimage)
	{
		try
		{
			$stmt = $this->conn->prepare("UPDATE `profile` SET `public_id`=:public_id, `first_name`=:first_name, `middle_name`=:middle_name, `last_name`=:last_name, `country`=:country, `town`=:town, `phonenumber`=:phonenumber, `profileimage`=:profileimage WHERE public_id=$public_id ");

			$stmt->bindparam(":public_id", $public_id);
			$stmt->bindparam(":first_name", $first_name);
			$stmt->bindparam(":middle_name", $middle_name);
			$stmt->bindparam(":last_name", $last_name);
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

	public function postserviceproduct($public_id, $typeofworker, $job, $experiance, $town, $description, $cost)
	{
		try
		{
			$stmt = $this->conn->prepare("INSERT INTO services(public_id, typeofworker, job, experiance, town, description, cost) VALUES(:public_id, :typeofworker, :job, :experiance, :town, :description, :cost)");

			$stmt->bindparam(":public_id", $public_id);
			$stmt->bindparam(":typeofworker", $typeofworker);
			$stmt->bindparam(":job", $job);
			$stmt->bindparam(":experiance", $experiance);
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

	

	public function doLogin($user_email, $user_password)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT public_id, user_email, user_password FROM users WHERE user_email=:user_email ");
			$stmt->execute(array(':user_email'=>$user_email));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1)
			{
				if(password_verify($user_password, $userRow['user_password']))
				{
					$_SESSION['user_session'] = $userRow['public_id'];
					return true;
				}
				else
				{
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
