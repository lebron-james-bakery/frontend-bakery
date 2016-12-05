<?php

class Recipes extends My_Model {
	
	// Constructor
	public function __construct()
	{
		parent::__construct();
	}

	// Join Recipes--recipe_supply--Supplies tables
    // to get production information	
	function get_all()
	{
		$this->db->select('Recipes.*, Supplies.id, Supply.name, Supply.qty_onhand');
		$this->db->from('Recipes r');
		$this->db->join('Recipe_supply rs', 'rs.recipe_id = r.id','left');
		$this->db->join('Supplies s', 's.id = rs.supply_id', 'left');
		$query = $query->db->get();
        return $query->result();
	}

    function get_one($id)
    {
        $this->db->select('Recipes.*, Supplies.id, Supply.name, Supply.qty_onhand');
		$this->db->from('Recipes r');
		$this->db->join('Recipe_supply rs', 'rs.recipe_id = r.id','left');
		$this->db->join('Supplies s', 's.id = rs.supply_id', 'left');
        $this->db->where($id);
		$query = $query->db->get();
        return $query->result();
    }
}
