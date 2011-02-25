<?php

class Controller_Pages extends Controller_Site {

	public function action_politiques()
	{
		$this->template->content = 'politiques et confidentialité';
	}

	public function action_termes()
	{
		$this->template->content = 'termes d\'utilisation';
	}
	
	public function action_apropos()
	{
		$this->template->content = 'à propos';
	}
	
	public function action_recompenses()
	{
		$this->template->content = 'récompenses (badges)';
	}
	
	public function action_soutenir()
	{
		$this->template->content = 'soutenir (name)';
	}

} // End Pages