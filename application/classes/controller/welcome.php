<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller_Site {

	public function action_index()
	{
	    //exemple1a
	    $results = DB::query(Database::SELECT, "SELECT * FROM test")->execute();
	    
	    foreach($results as $row){
	        var_dump($row);
	    }
	    echo '<br>';
	    
	    //exemple1b
	    $results = DB::select('*')->from('test')->execute();
	    
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
		$this->template->content = 'mycontent';
	}

} // End Welcome
