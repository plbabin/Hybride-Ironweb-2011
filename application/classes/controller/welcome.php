<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller_Site {

	public function action_index()
	{

		// Ajouter une track avec un code postal au hasars associŽ avec l'ŽvŽnement 1
		/*
		$origin = new Origin;
		$records = $origin->select_random();
		
		$code_postal = $records[0]["name"];
		$origin_lat = $records[0]["lat"];
		$origin_lon = $records[0]["lon"];
		
		$id_event = 1;
		$track_type = 'P'; //ou 'P' pour passager
		
		$track = new Track;
		$params = array("origin_lat" => $origin_lat, "origin_lon" => $origin_lon, "id_event" => $id_event, "track_type" => $track_type);
		$records = $track->insert($params);
		*/
		
		// Obtenir tous les users
		/*
		$user = new User;
		$records = $user->select_all();
		foreach($records as $row){
	        var_dump($row);
	    }
	    */
		
		//$params = array("origin_lat" => 46.8543, "origin_lon" => -71.2433, "id_event" => 1);
		//$records = $track->insert($params);
		
		//foreach($records as $row){
	    //    var_dump($row);
	    //}
		//$now = date("Y-m-d H:i:s A", time());
	    //$phpdate = date('Y-m-d H:i:s', strtotime($now) );
		//$phpdate = $now;
		
	    //$track = new Track;
		//$records = $track->select_dummy();
		//foreach($records as $row){
	    //    var_dump($row);
	    //}
		//$params = array("origin_lat" => 46.7678, "origin_lon" => -71.3216, "id_event" => 1);
		//$records = $track->insert($params);
		//$params = array("origin_lat" => 46.8543, "origin_lon" => -71.2433, "id_event" => 1);
		//$records = $track->insert($params);
		
		
		// Inserer un evenement
		$event = new Event;
		//$date = new DataTime('24-02-2011');
		$date = date('Y-m-d', strtotime('2011-02-24'));
		$params = array("name" => "Web ˆ QuŽbec (WAQ)", "lat" => 46.814464, "lon" => -71.224564, "date" => "$date");
		$records = $event->insert($params);
	
		
	    /*
		$origin = new Origin;
		$name = 'G1X2G7';
		$records = $origin->select_byname($name);
		foreach($records as $row){
	        var_dump($row);
	    }
	
		$records = $origin->select_all();
		foreach($records as $row){
	        var_dump($row);
	    }
	    */
		
		$this->template->content = 'mycontent';
	}

} // End Welcome
