<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Receiving extends Application
{

	/**
	 * Receiving Page for this controller.
	 *
	 * Maps to the following URL
	 * http://example.com/welcome/receiving
	 */
	public function index()
	{
		// this is the view we want shown
		$this->data['pagebody'] = 'receiving_view';

		// build the list of items, to pass on to our view
		$source = $this->supplies->all();
		$items = array ();
		foreach ($source as $record)
		{
			$items[] = array ('name' => $record['name'], 'receiving' => $record['receiving'],  'href' => $record['where']);
		}
		$this->data['items'] = $items;

		$this->render();
	}

}