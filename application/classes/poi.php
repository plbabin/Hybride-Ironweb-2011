<?php defined('SYSPATH') or die('No direct script access.');

class Poi {

	public function select_poi_asjson($id_poi)
	{
	   $results = DB::query(Database::SELECT, "SELECT * FROM poi WHERE id_poi = :id_poi")
	        ->param(':id_poi', $id_poi)->execute();

	   return json_encode($results);
	}
	
	
	/*
	 * $params:	$label
	 * 			$lat
	 * 			$lon
	 */
	public function insert($params)
	{
	   	//$label, $lat, $lon
		$results = DB::query(Database::INSERT, "INSERT INTO poi(label, lat, lon) VALUES (:label, :lat, :lon)")
	   		->param(':label', $params['label'])
	   		->param(':lat', $params['lat'])
	   		->param(':lon', $params['lon'])->execute();
	        
	   return $results; 
	   
	}
	
} // End Track
