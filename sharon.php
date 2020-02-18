public function postjob($public_id, $job_type, $type_of_worker, $your_location, $salary, $worker_experience, $job_description,$tribe, $language, $your_file)
	{
		try
		{
			$stmt = $this->conn->prepare("INSERT INTO jobs(public_id, job_type, type_of_worker, your_location, salary,job_description, worker_experience, tribe, language, worker_experience, your_file) VALUES(:public_id, :job_type, :type_of_worker, :your_location, :salary, :job_description, :tribe, :language, :worker_experience, :your_file)");

			$stmt->bindparam(":public_id", $public_id);
			$stmt->bindparam(":job_type", $job_type);
			$stmt->bindparam(":type_of_worker", $type_of_worker);
			$stmt->bindparam(":your_location", $your_location);
			$stmt->bindparam(":salary", $salary);
			$stmt->bindparam(":job_description", $job_description);
			$stmt->bindparam(":worker_experience", $worker_experience);
			$stmt->bindparam(":tribe", $tribe);
			$stmt->bindparam(":language", $language);
			$stmt->bindparam(":your_file", $your_file);

			$stmt->execute();

			return $stmt;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
