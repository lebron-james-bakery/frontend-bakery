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
		array('id' => '1', 'name' => 'flour', 'description' => 'white flour powder', 'receiving' => '100', 'Unit' => 'kg', 'Cost' => '12.55', 'stocking' => '350', 'quantities' => '50',  'where' => '/receiving/1'),
        array('id' => '2', 'name' => 'milk', 'description' => 'Silk, fat:0%', 'receiving' => '200', 'gUnit' => 'L', 'Cost' => '4.25', 'stocking' => '258', 'quantities' => '50', 'where' => '/receiving/2'),
        array('id' => '3', 'name' => 'egg', 'description' => 'white and brown', 'receiving' => '500', 'Unit' => 'Dozen', 'Cost' => '3.25', 'stocking' => '159', 'quantities' => '90',  'where' => '/receiving/3'),
        array('id' => '4', 'name' => 'vegetable oil', 'description' => 'pure, natural', 'receiving' => '200', 'Unit' => 'L', 'Cost' => '8.25', 'stocking' => '360', 'quantities' => '98',  'where' => '/receiving/4'),
        array('id' => '5', 'name' => 'vanilla', 'description' => 'Yummy vanilla', 'receiving' => '200', 'Unit' => 'ml', 'Cost' => '4.25', 'stocking' => '88', 'quantities' => '47',  'where' => '/receiving/5'),
        array('id' => '6', 'name' => 'sugar', 'description' => 'So sweet, white, brown', 'receiving' => '200', 'Unit' => 'kg', 'Cost' => '1.25', 'stocking' => '100', 'quantities' => '50',  'where' => '/receiving/6'),
        array('id' => '7', 'name' => 'butter', 'description' => 'Used for bakery, 0% fat.', 'receiving' => '300', 'Unit' => 'g', 'Cost' => '6.50', 'stocking' => '29', 'quantities' => '77',  'where' => '/receiving/7'),
        array('id' => '8', 'name' => 'baking powder', 'description' => 'For bakery,', 'receiving' => '100', 'Unit' => 'kg', 'Cost' => '2.38', 'stocking' => '66', 'quantities' => '20',  'where' => '/receiving/8'),
        array('id' => '9', 'name' => 'baking soda',  'description' => 'For bakery', 'receiving' => '100', 'Unit' => 'g', 'Cost' => '1.50', 'stocking' => '90', 'quantities' => '33',  'where' => '/receiving/9'),
        array('id' => '10','name' => 'lemon', 'description' => 'Big, Yummy', 'receiving' => '100', 'Unit' => 'kg', 'Cost' => '2.95', 'stocking' => '77', 'quantities' => '76',  'where' => '/receiving/10'),

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