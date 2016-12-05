<?php

class Recipes extends MY_Model {

	// Constructor
	public function __construct()
	{
		parent::__construct();
	}

	// retrieve a single quote
	/*public function get($which)
	{
		// iterate over the data until we find the one we want
		foreach ($this->recipe as $record)
			if ($record['id'] == $which)
				return $record;
		return null;
	}

	// retrieve all of the quotes
	public function all()
	{
		return $this->recipe;
	}

	// convert: */
}
