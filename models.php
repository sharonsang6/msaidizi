<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "msaidizi";

	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	try 
	{
	    $users_sql = "CREATE TABLE users (
		    user_id INT(50) AUTO_INCREMENT PRIMARY KEY,
		    public_id INT(30) NOT NULL,
		    user_name VARCHAR(30) NOT NULL,
		    user_email VARCHAR(100) NOT NULL,
		    user_password TEXT NOT NULL,
		    premium BOOLEAN DEFAULT false NOT NULL,
		    pesapal_transaction_tracking_id VARCHAR(50)  NULL,
		    pesapal_merchant_reference VARCHAR(50)  NULL,
		    admin BOOLEAN DEFAULT false NOT NULL,
		    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL
	    )";

	    $conn->exec($users_sql);
	}
		catch(PDOException $e)
	{
		echo $users_sql . "<br>" . $e->getMessage();
	}


	try 
	{
	    $profile_sql = "CREATE TABLE profile (
		    profile_id INT(50) AUTO_INCREMENT PRIMARY KEY,
		    public_id INT(50) NOT NULL,
		    first_name VARCHAR(30) NOT NULL,
		    middle_name VARCHAR(30) NOT NULL,
		    last_name VARCHAR(30) NOT NULL,
		    country VARCHAR(30) NOT NULL,
		    town VARCHAR(30) NOT NULL,
		    phonenumber VARCHAR(30) NOT NULL,
		    profileimage TEXT  NULL,
		    idimage TEXT   NULL,
			allrating INT(5) DEFAULT 0 NOT NULL,
		    profile_reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL
	    )";

	    $conn->exec($profile_sql);
	}
		catch(PDOException $e)
	{
		echo $profile_sql . "<br>" . $e->getMessage();
	}

	try 
	{
	    $services_sql = "CREATE TABLE services (
		    services_id INT(50) AUTO_INCREMENT PRIMARY KEY,
		    public_id INT(50) NOT NULL,
		    typeofworker VARCHAR(100) NOT NULL,
			job VARCHAR(100) NOT NULL,
			experiance INT(10) NOT NULL,
			town VARCHAR(100) NOT NULL,
			description TEXT NOT NULL,
			cost INT(30) NOT NULL,
		    services_reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL
	    )";

	    $conn->exec($services_sql);
	}
		catch(PDOException $e)
	{
		echo $services_sql . "<br>" . $e->getMessage();
	}

	try 
	{
	    $offers_sql = "CREATE TABLE offers (
		    offers_id INT(50) AUTO_INCREMENT PRIMARY KEY,
		    public_id INT(50) NOT NULL,
			worker_id INT(50) NOT NULL,
			start_date VARCHAR(100) NOT NULL,
			duration INT(10) NOT NULL,
			rating INT(10) DEFAULT 0 NOT NULL,
			totalpay INT(50) DEFAULT 0 NOT NULL,
			comment TEXT NULL,
			status BOOLEAN DEFAULT false NOT NULL,
		    offers_reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL
	    )";

	    $conn->exec($offers_sql);
	}
		catch(PDOException $e)
	{
		echo $offers_sql . "<br>" . $e->getMessage();
	}

$conn = null;
?>