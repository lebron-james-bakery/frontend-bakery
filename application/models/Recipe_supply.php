<?php
/**
 * Recipe_supply model supports the production controllor 
 *
 */
class Recipe_supply extends MY_Model2 {

	/** 
     * Constructor: set table, key1, key2 used for this model 
     */
	public function __construct()
	{
		parent::__construct('Recipe_supply', 'recipe_id', 'supply_id');
	}

    /**
     * Set rules used for form validation
     */
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

    /**
     * Update function
     *     @param type $record
     */
    function update($record){
        $this->db->set('amount', $record->amount);
		$this->db->where('recipe_id', $record->recipe_id);
		$this->db->where('supply_id', $record->supply_id);
		$object = $this->db->update('Recipe_supply');
    }
}
