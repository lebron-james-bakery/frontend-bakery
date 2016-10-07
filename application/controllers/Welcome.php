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

		// THIS IS AN EXAMPLE
		$source = $this->logs->all();
		$items = array ();
		foreach ($source as $record)
		{
			$items[] = array ('who' => $record['who'], 'pic' => $record['pic'], 'href' => $record['where'], 'what' => $record['what']);
		}
		$this->data['items'] = $items;
        // END OF EXAMPLE

        // build the list of recipes, to pass on to our homepage_view
        $source2 = $this->recipes->all();
        $recipes = array ();
        foreach ($source2 as $record)
        {
            $recipes[] = array ('name' => $record['name'], 'pic' => $record['pic'], 'href' => $record['where'], 'ingredients' => $record['ingredients']);
        }
        $this->data['recipes'] = $recipes;




		$this->render();
	}

}