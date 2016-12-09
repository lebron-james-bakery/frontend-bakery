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
            ['field'=>'qty', 'label'=>'Quantity in Stock', 'rules'=> 'required|decimal'],
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
            ['field'=>'qty', 'label'=>'Quantity in Stock', 'rules'=> 'required|decimal'],
            ['field'=>'picture', 'label'=>'Picture']
        ];
        return $config;
    }	
}
