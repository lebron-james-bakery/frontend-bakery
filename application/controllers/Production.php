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
