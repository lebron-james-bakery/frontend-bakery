<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Production extends Application
{

	function __construct()
	{
		parent::__construct();
	}

	/**
	 * Homepage for our app
	 */
	public function index()
	{
        // Handle user-role to lock out certain types of users
        $userrole = $this->session->userdata('userrole');
        if ($userrole != 'admin') {
            $message = 'You are not authorized to access this page. Go away';
            $this->data['content'] = $message;
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
