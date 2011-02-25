<?php 
class Controller_Api_Points extends Controller {

    public function action_get()
    {
        if(!isset($_GET['since'])){
            $_GET['since'] = time();
        }
        
        
        //points consist of lat, lng, id
        echo Json::get(array('since' => time(), 'points' => array() ));
        
        exit;
    }

} // End Points