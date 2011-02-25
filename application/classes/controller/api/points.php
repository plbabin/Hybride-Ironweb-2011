<?php 

//date_default_timezone_set('America/Montreal');
class Controller_Api_Points extends Controller {


    public function action_get()

    {

    //dŽsactivŽ, sera jamais vide selon plbabin

        if(!isset($_GET['since'])){

            $_GET['since'] = time() - 80000;

        }

     

        if(!isset($_GET['sw_lng'])){

            $_GET['sw_lng'] = -72;

        }

        

    if(!isset($_GET['sw_lat'])){

            $_GET['sw_lat'] = 46;

        }

        

    if(!isset($_GET['ne_lng'])){

            $_GET['sw_lng'] = -71;

        }

        

    if(!isset($_GET['ne_lat'])){

            $_GET['sw_lat'] = 47;

        }

        

        // rŽcupŽrer le bbox de la map en cours

        $bbox = array('sw_lng' => $_GET['sw_lng'], 

          'sw_lat' => $_GET['sw_lat'], 

          'ne_lng' => $_GET['ne_lng'],

          'ne_lat' => $_GET['ne_lat']);

        

        //enlever 1 sec, nous on aimes la prŽcision

        $datetime = $_GET['since'] - 60;

        $phpdate = date('Y-m-d H:i:s', $datetime );

        $tracklist = new Track;

        //appel la classe qui parle au modle

        

        $liste = $tracklist->select_by_datetime($phpdate, $bbox);

    	$totalObj = array();
		foreach($liste as $element){
			$totalObj[] = $element;
		}

        $time = array();

        if (count($liste) > 0){

        $time = time(); 

        }

        //points consist of lat, lng, id

        echo Json::get(array('since' => time(), 'points' => $totalObj ));

        

        exit;

    }


} // End Points
