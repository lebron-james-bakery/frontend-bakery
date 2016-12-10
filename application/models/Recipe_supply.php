<?php

class Recipe_supply extends MY_Model2 {

	// Constructor
	public function __construct()
	{
		parent::__construct('Recipe_supply', 'recipe_id', 'supply_id');
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

    function update($record){
        $this->db->set('amount', $record->amount);
		$this->db->where('recipe_id', $record->recipe_id);
		$this->db->where('supply_id', $record->supply_id);
		$object = $this->db->update('Recipe_supply');
    }
}
