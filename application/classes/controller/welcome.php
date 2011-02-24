<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller_Site {

	public function action_index()
	{

		//Todo: gŽrŽr si user existe deja
		$user = new User;
		$params = array("fullname" => "Simon Pierre", "password" => "***", "gender" => "F", "email" => "pp@ff", "alert_flag" => true);
		$records = $user->insert($params);
		
		$params = array("fullname" => "Simon Pierre2", "password" => "***", "gender" => "M", "email" => "pp@ff", "alert_flag" => true);
		$records = $user->update($params);
		
		
		$records = $user->select_all();
	    foreach($records as $row){
	        var_dump($row);
	    }
	    
		$track = new Track;
		$records = $track->select_all();
	 	foreach($records as $row){
	        var_dump($row);
	    }
	    
	    $mysqldate  = "2011-03-24 15:12:12";
	    //
	    $phpdate = date('Y-m-d H:i:s', strtotime($mysqldate) );
		//$phpdate = strtotime( $mysqldate );

	    $params = array("start_poi" => 1, 
	    				"end_poi" => 2, 
	    				"start_datetime" =>  $phpdate,
	    				"return_datetime" => $phpdate,
	    				"deadline_delay" => 2,
	    				"run_type" => "C",
	    				"run_status" => "O",
	    				"creation_datetime" => $phpdate,
	    				"close_datetime" => $phpdate);
	    $records = $track->insert($params);
	    
		$poi = new Poi;
		//Simuler la rŽcetion des parametres
		//Todo: Problme d'accents
		$params = array("label" => "ColisŽ3", "lat" => 46.3, "lon" => -72.5);
		$records = $poi->insert($params);
		
		$records = $poi->select_poi_asjson(1);
		echo '<br>poi(json):' . $records;
		
		//$records = $poi->select_poi_asjson(1);
		//foreach($records as $row){
	    //    var_dump($row);
	   	//}
	    
		//exit('user constructor<br>');
		//$user = new User;
	 	//$records = $user->insert('Martin Ouellet','blabla','M','geomartino@gmail.com', 'true');
		//echo 'test_inservar_dump($records);
		
		
	    
		//$records = $user->select_one('plbabin');
	    //foreach($records as $row){
	    //    var_dump($row);
	    //}
		
		
	    /*
		//exemple1a
	    $results = DB::query(Database::SELECT, "SELECT * FROM user")->execute();
	    
	    foreach($results as $row){
	        var_dump($row);
	    }
	    echo '<br>';
	    
	    //exemple1b
	    $results = DB::select('*')->from('user')->execute();
	    
	    foreach($results as $row){
	        var_dump($row);
	    }
	    echo '<br>';
	    
	    //exemple2a
	    $results = DB::query(Database::SELECT, "SELECT * FROM test WHERE id=:id")
	        ->param(':id', 1)->execute();
	    
	    foreach($results as $row){
	        var_dump($row);
	    }
	    echo '<br>';
	    
	    //exemple2b
	    $results = DB::select('*')->from('test')->where('id', '=', 1)->execute();
	    
	    foreach($results as $row){
	        var_dump($row);
	    }
	    */
		//$this->template->content = 'mycontent';
	}

} // End Welcome
