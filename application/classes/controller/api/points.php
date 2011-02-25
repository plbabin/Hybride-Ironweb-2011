<?php 
class Controller_Api_Points extends Controller {

    public function action_get()
    {
        if(!isset($_GET['since'])){
            $_GET['since'] = time();
        	
        }
        
        $datetime = $_GET['since'];
        $phpdate = date('Y-m-d H:i:s', $datetime );
        $tracklist = new Track;
        $liste = $tracklist->select_by_datetime($phpdate);
    	//foreach($liste as $row){
	    //    var_dump($row);
	    //}
        //points consist of lat, lng, id
        echo Json::get(array('since' => time(), 'points' => $liste ));
        
        exit;
    }

} // End Points