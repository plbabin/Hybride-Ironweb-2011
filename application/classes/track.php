<?php defined('SYSPATH') or die('No direct script access.');


class Track {


//pour fin de tests, retourne une track seulement

public function select_dummy()

{

    $results = DB::query(Database::SELECT, "SELECT id_track,origin_lat,origin_lon FROM track WHERE id_track = 15")->execute();

    return $results;

}

//retourne une liste de track en fonction d'une date (juste ce qui a changé depuis le dernier refresh de la carte)

public function select_by_datetime($track_date, $bbox)

{

$sql = "SELECT id_track as id,origin_lat as lat,origin_lon as lng,track_status as status FROM track WHERE track_date > '" . $track_date . "'" . 

" and origin_lon > " . $bbox['sw_lng'] . 

" and origin_lon < " . $bbox['ne_lng'] .

" and origin_lat > " . $bbox['sw_lat'] .

" and origin_lat < " . $bbox['ne_lat'] . ' LIMIT 0,250';

   

$results = DB::query(Database::SELECT, $sql)->execute();

       

    return $results;

}

//retourne une liste de track en fonction d'un event

public function select_by_idevent($id_event, $bbox = false)

{

$sql = "SELECT id_track as id,origin_lat as lat,origin_lon as lng,track_status as status FROM track WHERE id_event = " . $id_event ." LIMIT 0,25";

//" and origin_lon > " . $bbox['sw_lng'] . 

// " and origin_lon < " . $bbox['ne_lng'] .

// " and origin_lat > " . $bbox['sw_lat'] .

// " and origin_lat < " . $bbox['ne_lat'];

   

$results = DB::query(Database::SELECT, $sql)->execute();

       

    return $results;

}

//Insérer une nouvelle trak, par défaut avec un timestamp et le statut à 'O' pour 'Open'

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
