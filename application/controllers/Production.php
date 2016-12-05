<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Production extends Application
{

	function __construct()
	{
		parent::__construct();
	}

	/**
	 * Controller useed for Production page
	 *
	 * Maps to the following Curl
	 * 		http://example.com/production
	 */
	public function index()
	{
		$role = $this->session->userdata('userrole');
		if ($role != 'admin'){
			$message = 'You are not a authorized to access this page!';
            	$this->data['content'] = $message;
			$this->render();
			return;
		}
		// this is the view we want shown
		$this->data['pagebody'] = 'production_view';

		// build the list of items, to pass on to our view
		$source = $this->recipes->all();
		$items = array ();
		foreach ($source as $record)
		{
			$items[] = array ('name' => $record['name'], 'pic' => $record['pic'], 'href' => $record['where']);
		}
		$this->data['items'] = $items;

		$this->render();
	}

	public function production_list(){
		$role = $this->session->userdata('userrole');
		if ($role != 'admin'){
			$message = 'You are not a authorized to access this page!';
            	$this->data['content'] = $message;
			$this->render();
			return;
		}
		// this is the view we want shown
		$this->data['pagebody'] = 'production_view';

		// build the list of items, to pass on to our view
		$source = $this->recipes->all();
		$items = array ();
		foreach ($source as $record)
		{
			$items[] = array ('name' => $record['name'], 'pic' => $record['pic'], 'href' => $record['where']);
		}
		$this->data['items'] = $items;

		$this->render();
	}
}
