<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Search extends Controller_Site {

	public function action_index()
	{
		//get the event list
		$conn = mysql_connect('localhost', 'hybrideteam', 'QW12er34') or die ('Error connecting to mysql:' . mysql_error());
		$this->template->home = true;
		$this->template->content = View::factory('home');
	}
	
	public function action_event(){
		
		//get the tracks for this event
		Request::current()->param('id');
		$this->template->home = false;
		$this->template->content = View::factory('event');
	}

} // End Welcome
