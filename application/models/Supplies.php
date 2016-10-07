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
		array('id' => '1', 'name' => 'flour', 'description' => 'white flour powder', 'receivingNo' => '100', 'receivingUnit' => 'kg', 'receivingCost' => '12.55', 'quantities' => '50',  'where' => '/receiving/1'),
        array('id' => '2', 'name' => 'milk', 'description' => 'Silk, fat:0%', 'receivingNo' => '200', 'receivingUnit' => 'L', 'receivingCost' => '4.25', 'quantities' => '50', 'where' => '/receiving/2'),
        array('id' => '3', 'name' => 'egg', 'description' => 'white and brown', 'receivingNo' => '500', 'receivingUnit' => 'Dozen', 'receivingCost' => '3.25', 'quantities' => '90',  'where' => '/receiving/3'),
        array('id' => '4', 'name' => 'vegetable oil', 'description' => 'pure, natural', 'receivingNo' => '200', 'receivingUnit' => 'L', 'receivingCost' => '8.25', 'quantities' => '98',  'where' => '/receiving/4'),
        array('id' => '5', 'name' => 'vanilla', 'description' => 'Yummy vanilla', 'receivingNo' => '200', 'receivingUnit' => 'ml', 'receivingCost' => '4.25', 'quantities' => '47',  'where' => '/receiving/5'),
        array('id' => '6', 'name' => 'sugar', 'description' => 'So sweet, white, brown', 'receivingNo' => '200', 'receivingUnit' => 'kg', 'receivingCost' => '1.25', 'quantities' => '50',  'where' => '/receiving/6'),
        array('id' => '7', 'name' => 'butter', 'description' => 'Used for bakery, 0% fat.', 'receivingNo' => '300', 'receivingUnit' => 'g', 'receivingCost' => '6.50', 'quantities' => '77',  'where' => '/receiving/7'),
        array('id' => '8', 'name' => 'baking powder', 'description' => 'For bakery,', 'receivingNo' => '100', 'receivingUnit' => 'kg', 'receivingCost' => '2.38', 'quantities' => '20',  'where' => '/receiving/8'),
        array('id' => '9', 'name' => 'baking soda',  'description' => 'For bakery', 'receivingNo' => '100', 'receivingUnit' => 'g', 'receivingCost' => '1.50', 'quantities' => '33',  'where' => '/receiving/9'),
        array('id' => '10','name' => 'lemon', 'description' => 'Big, Yummy', 'receivingNo' => '100', 'receivingUnit' => 'kg', 'receivingCost' => '2.95', 'quantities' => '76',  'where' => '/receiving/10'),

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