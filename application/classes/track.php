<?php defined('SYSPATH') or die('No direct script access.');

class Track {

	public function select_all()
	{
	    $results = DB::query(Database::SELECT, "SELECT * FROM track")->execute();
	    return $results;
	}
	

	//type C, P, statut Open(O), CLose(C)
	public function insert($params)
	{
	
	   $results = DB::query(Database::INSERT, "INSERT INTO track(start_poi, end_poi, start_datetime, return_datetime, deadline_delay, run_type, run_status, creation_datetime, close_datetime) VALUES (:start_poi, :end_poi, :start_datetime, :return_datetime, :deadline_delay, :run_type, :run_status, :creation_datetime, :close_datetime)")
	   		->param(':start_poi', $params['start_poi'])
	   		->param(':end_poi', $params['end_poi'])
	   		->param(':start_datetime', $params['start_datetime'])
	   		->param(':return_datetime', $params['return_datetime'])
	   		->param(':deadline_delay', $params['deadline_delay'])
	   		->param(':run_type', $params['run_type'])
	   		->param(':run_status', $params['run_status'])
	   		->param(':creation_datetime', $params['creation_datetime'])
	   		->param(':close_datetime', $params['close_datetime'])->execute();
	        
	   return $results; 
	   
	}
	
} // End Track
