<?php


class Productions extends MY_Model {
	
	// Constructor
	public function __construct()
	{
		parent::__construct();
	}

	// Set rules for production form validation
	function rules() {
        $config = [
            ['field'=>'id'],
            ['field'=>'name', 'rules'=> 'required'],
            ['field'=>'description', 'rules'=> 'required'],
            ['field'=>'price', 'rules'=> 'required|decimal'],
            ['field'=>'unit', 'rules'=> 'required|int'],
			['field'=>'picture', 'rules'=> 'required'],
        ];
        return $config;
    }

	// Join Recipes--recipe_supply--Supplies tables
    // to get one production information	
    function get_one($id)
    {
		// Get date from table that joined Recipes and Recipe_supply tables. 
        $this->db->select('r.id, r.name, r.description, r.price, r.unit, r.picture, rs.supply_id, rs.amount as inqty');
		$this->db->from('Recipes r');
		$this->db->join('Recipe_supply rs', 'rs.recipe_id = r.id','left');
        $this->db->where('r.id',$id);
		$ingredient = $this->db->get();

        return $ingredient->result();
    }
}
