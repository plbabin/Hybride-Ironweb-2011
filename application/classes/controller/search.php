<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Search extends Controller_Site {

	public function action_index()
	{
		$this->template->content = View::factory('search');
	}

} // End Welcome
