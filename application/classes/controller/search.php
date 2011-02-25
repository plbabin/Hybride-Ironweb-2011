<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Search extends Controller_Site {

	public function action_index()
	{
		//get the event list
		
		$event = new Event();
		$eventsList = $event->select_all();
		
		$this->template->home = true;
		$this->template->content = View::factory('home');
		$this->template->content->eventsList = $eventsList;
	}
	
	public function action_event(){
		
		
		//get the tracks for this event
		Request::current()->param('id');
		
		$track = new Track();
		$trackList = $track->select_by_idevent(Request::current()->param('id'));
		
		$this->template->home = false;
		$this->template->content = View::factory('event');
		$this->template->content->trackList = $trackList;
	}

} // End Welcome
