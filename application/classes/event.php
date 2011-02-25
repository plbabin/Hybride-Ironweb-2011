<?php defined('SYSPATH') or die('No direct script access.');

class Event {

	public function select_all()
	{
	    $results = DB::query(Database::SELECT, "SELECT * FROM event")
	    	->execute();
	    
	    return $results;
	}
	
	
	public function select_by_idevent($id_event)
	{
	   $results = DB::query(Database::SELECT, "SELECT * FROM event WHERE event_id=:id_event")
	        ->param(':id_event', $id_event)->execute();
	        
	    return $results;
	}
	
	
	public function insert($params)
	{
		try
		{
			$results = DB::query(Database::INSERT, "INSERT INTO event(name, lat, lon, date) VALUES (:name, :lat, :lon, :date)")
	   		->param(':name', $params['name'])
	   		->param(':lat', $params['lat'])
	   		->param(':lon', $params['lon'])
	   		->param(':date', $params['date'])->execute();	
    	}
		catch (Exception $e)
		{
			
			//Todo: Faire un update si le record existe deja
			die('Database error occured');
		}
  
	   return $results; 
	   
	}
	
} // End Track
