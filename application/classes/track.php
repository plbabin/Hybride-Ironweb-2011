<?php defined('SYSPATH') or die('No direct script access.');

class Track {

	public function select_dummy()
	{
	    $results = DB::query(Database::SELECT, "SELECT id_track,origin_lat,origin_lon FROM track WHERE id_track = 15")->execute();
	    return $results;
	}
	
	public function select_by_datetime($track_date)
	{
		$sql = "SELECT id_track,origin_lat,origin_lon FROM track WHERE track_date > '" . $track_date . "'";
	    //echo $sql;
		$results = DB::query(Database::SELECT, $sql)->execute();
	        //->param(':track_date', $track_date)->execute();
	    return $results;
	}
	

	//type C, P, statut Open(O), CLose(C)
	public function insert($params)
	{
	
	   $results = DB::query(Database::INSERT, "INSERT INTO track(origin_lat, origin_lon, id_event, track_date, track_type, track_status) VALUES (:origin_lat, :origin_lon, :id_event, :track_date, :track_type, :track_status)")
	   		->param(':origin_lat', $params['origin_lat'])
	   		->param(':origin_lon', $params['origin_lon'])
	   		->param(':id_event', $params['id_event'])
	   		->param(':track_date', date("Y-m-d H:i:s A", time()))
	   		->param(':track_type', $params['track_type'])
	   		->param(':track_status', 'O')->execute();
	        
	   return $results; 
	   
	}
	
} // End Track
