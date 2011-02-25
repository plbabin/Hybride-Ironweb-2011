<?php defined('SYSPATH') or die('No direct script access.');

class Origin {

	public function select_all()
	{
	    $results = DB::query(Database::SELECT, "SELECT * FROM origine")
	    	->execute();
	    
	    return $results;
	}
	
	
	public function select_byname($name)
	{
	   $results = DB::query(Database::SELECT, "SELECT * FROM origine WHERE name=:name")
	        ->param(':name', $name)->execute();
	        
	    return $results;
	}
	
	public function select_random()
	{
	   $results = DB::query(Database::SELECT, "SELECT * FROM origine ORDER BY RAND() LIMIT 1")->execute();
	        
	    return $results;
	}
	
	public function update_random_date()
	{
	   $results = DB::query(Database::UPDATE, "UPDATE origine set register_date = ? where name = ")
	        ->param(':name', $name)->execute();
	        
	    return $results;
	}
	
} // End Origin
