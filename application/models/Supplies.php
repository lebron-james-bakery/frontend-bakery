<?php

/**
 * This is a "CMS" model for quotes, but with bogus hard-coded data,
 * so that we don't have to worry about any database setup.
 * This would be considered a "mock database" model.
 *
 * @author Gerard
 */
class Supplies extends CI_Model {

	// The data comes from http://www.quotery.com/top-100-funny-quotes-of-all-time/?PageSpeed=noscript
	var $data = array(
		array('id' => '1', 'name' => 'flour', 'unit' => '100'),
        array('id' => '2', 'name' => 'milk', 'unit' => '200'),
        array('id' => '3', 'name' => 'egg', 'unit' => '1000'),
        array('id' => '4', 'name' => 'vegetable oil', 'unit' => '60'),
        array('id' => '5', 'name' => 'vanilla', 'unit' => '150'),
        array('id' => '6', 'name' => 'sugar', 'unit' => '300'),
        array('id' => '7', 'name' => 'butter', 'unit' => '200'),
        array('id' => '8', 'name' => 'baking powder', 'unit' => '200'),
        array('id' => '9', 'name' => 'baking soda', 'unit' => '150'),
        array('id' => '9', 'name' => 'lemon', 'unit' => '80'),

	);

	// Constructor
	public function __construct()
	{
		parent::__construct();
	}

	// retrieve a single quote
	public function get($which)
	{
		// iterate over the data until we find the one we want
		foreach ($this->data as $record)
			if ($record['id'] == $which)
				return $record;
		return null;
	}

	// retrieve all of the quotes
	public function all()
	{
		return $this->data;
	}

}