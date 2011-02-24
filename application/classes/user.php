<?php defined('SYSPATH') or die('No direct script access.');

class User {

	public function select_all()
	{
	    $results = DB::query(Database::SELECT, "SELECT * FROM user")->execute();
	    return $results;
	}
	
	
	public function select_by_email($email)
	{
	   $results = DB::query(Database::SELECT, "SELECT * FROM user WHERE email=:email")
	        ->param(':email', $email)->execute();
	        
	    return $results;
	}
	
	
	public function insert($params)
	{
		try
		{
			$results = DB::query(Database::INSERT, "INSERT INTO user(fullname, password, gender, email, alert_flag) VALUES (:fullname, :password, :gender, :email, :alert_flag)")
	   		->param(':fullname', $params['fullname'])
	   		->param(':password', $params['password'])
	   		->param(':gender', $params['gender'])
	   		->param(':email', $params['email'])
	   		->param(':alert_flag', $params['alert_flag'])->execute();
	   		
    	}
		catch (Exception $e)
		{
			//echo $e->getCode();
			//Todo: Faire un update si le record existe deja
			$results = null;
			//die('Database error occured');
		}

	      
	   return $results; 
	   
	}
	
	public function update($params)
	{
	   $results = DB::query(Database::UPDATE, "UPDATE user set fullname = :fullname, password = :password, gender = :gender, alert_flag = :alert_flag WHERE email =  :email")
	   		->param(':fullname', $params['fullname'])
	   		->param(':password', $params['password'])
	   		->param(':gender', $params['gender'])
	   		->param(':email', $params['email'])
	   		->param(':alert_flag', $params['alert_flag'])->execute();

	   //return 1 for succes, 0 for fail
	   return $results; 
	   
	}
	
	
} // End Track
