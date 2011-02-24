<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Template extends Kohana_Controller_Template {

	public $template = 'layout';
	public $auto_render = TRUE;

	public $title = 'Je Carbure';
	public $content = '';
	public $keywords = array();
	public $description = '';
	
	public function before() {
		
		parent::before();
		
		if ($this->request !== Request::current()){
			$this->auto_render = FALSE;
		}
		
		if ($this->auto_render){
			// Initialize empty values
  	    	$this->template->title   = '';
  	    	$this->template->content = '';

		}
	}

	public function after() {
		
		$this->template->keywords = implode(' ',$this->keywords);
		$this->template->description = $this->description;
		
		//put only the content into the response
		if( $this->auto_render === false ){
			$this->request->response = $this->template->content;
		}
		
		parent::after();
	}
}
