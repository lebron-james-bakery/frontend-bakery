<?php

class Productions extends MY_Model {
	
	// Constructor
	public function __construct()
	{
		parent::__construct();
	}

	// Join Recipes--recipe_supply--Supplies tables
    // to get one production information	
    function get_one($id)
    {
        $this->db->select('r.id, r.name, r.description, r.price, r.qty, r.picture, s.name as inname, rs.qty as inqty, s.qty_onhand');
		$this->db->from('Recipes r');
		$this->db->join('Recipe_supply rs', 'rs.recipe_id = r.id','left');
		$this->db->join('Supplies s', 's.id = rs.supply_id', 'left');
        $this->db->where('r.id',$id);
		$ingredient = $this->db->get();
        return $ingredient->result();
    }
}
