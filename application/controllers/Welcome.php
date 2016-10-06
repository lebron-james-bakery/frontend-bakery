<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application
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
		$this->data['pagebody'] = 'homepage_view';

		// build the list of items, to pass on to our view
		$source = $this->bakery->all();
		$items = array ();
		foreach ($source as $record)
		{
			$items[] = array ('who' => $record['who'], 'pic' => $record['pic'], 'href' => $record['where'], 'what' => $record['what']);
		}
		$this->data['items'] = $items;

		$this->render();
	}

}
