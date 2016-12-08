<?php

class Recipes extends MY_Model {

	// Constructor
	public function __construct()
	{
		parent::__construct();
	}

    function rules() {
        $config = [
            ['field'=>'id', 'label'=>'Menu code'],
            ['field'=>'name', 'label'=>'Item name','rules'=> 'required'],
            ['field'=>'description', 'label'=>'Description'],
            ['field'=>'price', 'label'=>'Price'],
            ['field'=>'unit', 'label'=>'Quantity in Stock', 'rules'=> 'required|decimal'],
            ['field'=>'picture', 'label'=>'Picture']
        ];
        return $config;
    }

    function adminRecipeRules() {
        $config = [
            ['field'=>'id', 'label'=>'Menu code'],
            ['field'=>'name', 'label'=>'Item name','rules'=> 'required'],
            ['field'=>'description', 'label'=>'Description'],
            ['field'=>'price', 'label'=>'Price'],
            ['field'=>'unit', 'label'=>'Quantity in Stock', 'rules'=> 'required|decimal'],
            ['field'=>'picture', 'label'=>'Picture']
        ];
        return $config;
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
