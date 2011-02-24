<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller_Site {

	public function action_index()
	{
		$this->template->content = 'mycontent';
	}

} // End Welcome
