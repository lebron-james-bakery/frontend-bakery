<?php

defined('BASEPATH') OR exit('No direct script access allowed');
//$uri = $_SERVER["REQUEST_URI"];
//echo (int)substr($uri, 12);
class Recipe extends Application
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
		$this->data['pagebody'] = 'recipe_view';

		// build one item, to pass on to our view
		$record = $this->recipes->get($this->getID($_SERVER["REQUEST_URI"]));
        $this->data = array_merge($this->data, $record);

		$this->render();
	}

	/**
	 * Return the item id 
	 */
	function getID($str){
		return (int)substr($str, 12);
	}
}
