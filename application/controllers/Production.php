<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Production extends Application
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('formfields_helper');
		$this->error_messages = array();
	}

	/**
	 * Controller useed for Production page
	 *
	 * Maps to the following url
	 * 		http://example.com/production
	 */
	public function index()
	{
        // Handle user-role to lock out certain types of users
        $userrole = $this->session->userdata('userrole');
        if ($userrole == 'guest') {
            $message = 'You are not authorized to access this page. Go away';
            $this->data['content'] = $message;
        }

		// this is the view we want shown
		$this->data['pagebody'] = 'production_list';

		// build the list of items, to pass on to our view
		$source = $this->recipes->all();
		$items = array();
		foreach ($source as $record)
		{
			$items[] = array(
				'id' => $record->id,
				'name' => $record->name, 
				'pic' => $record->picture, 
				'desc' => $record->description,
				'price' => $record->price, 
				'qty' => $record->unit);
		}
		$this->data['items'] = $items;

		$this->render();
	}

	function get($id){
		// this is the view we want shown
		$this->data['pagebody'] = 'production_view';

		// build the list of items, to pass on to our view
		$recipe = $this->recipes->get($id);
		$ingredient = $this->recipe_supply->group($id);

		$this->data['id'] = $recipe->id;
		$this->data['pic'] = $recipe->picture;		
		$this->data['name'] = $recipe->name;
		$this->data['desc'] = $recipe->description;
		$this->data['price'] = $recipe->price;
		$this->data['qty'] = $recipe->unit;
		$item = array();
		foreach ($ingredient as $record)
		{
			$item[] = array ('ing_name' => $this->supplies->get($record->supply_id)->name, 
							  'ing_qty' => $record->amount,
							  'ing_onhand' => $this->supplies->get($record->supply_id)->qty_onhand);
		}
		$this->data['ingredient'] = $item;
		$this->data['zcook'] = makeSubmitButton('Cook One', 'Make a new item');
		$this->render();
	}

	function edit($id=null){
		// try the session first
		$recipe = $this->session->userdata('recipe');
		$ingredient = $this->session->userdata('ingredient');
		// if not there, get them from the database
		if (empty($recipe)) {
			$recipe = $this->recipes->get($id);
			$this->session->set_userdata('recipe',$recipe);
		}
		if (empty($ingredient)) {
			$ingredient = $this->recipe_supply->get($id, null);
			$this->session->set_userdata('ingredient',$ingredient);
		}

		// build the list of items, to pass on to our view
		$recipe = $this->recipes->get($id);
		$ingredient = $this->recipe_supply->group($id);

        $this->data['pagebody'] = "administrator_recipe_edit";

		$this->data['id'] = $recipe->id;
		$this->data['pic'] = $recipe->picture;		
		$this->data['name'] = makeTextField('Name', 'name', $recipe->name);
		$this->data['desc'] = makeTextArea('Description', 'description', $recipe->description);
		$this->data['price'] = makeTextField('Price for each', 'price', $recipe->price);
		$this->data['qty'] = makeTextField('Available amount', 'unit', $recipe->unit);
		$ingredients = array();
		foreach ($ingredient as $record)
		{
			$ingredients[] = array ('ing_name' => $this->supplies->get($record->supply_id)->name, 
								'ing_id' => $record->supply_id,
							  	'ing_qty' => $record->amount,
							  	'ing_onhand' => $this->supplies->get($record->supply_id)->qty_onhand);
		}
		$this->data['ingredient'] = $ingredients;
		$this->data['zsubmit'] = makeSubmitButton('Save', 'Save changes');

        $this->render();
	}

	// handle uploaded image, and use its name as the picture name 
	function replace_picture() {    
		$config = [        
			'upload_path' => './public/pix', // relative to front controller        
			'allowed_types' => 'gif|jpg|jpeg|png',        
			'max_size' => 2048, // 100KB should be enough for our graphical menu        
			'max_width' => 1080,        
			'max_height' => 960, // actually, we want exactly 256x256        
			'min_width' => 256,        
			'min_height' => 256, // fixed it        
			'remove_spaces' => TRUE, // eliminate any spaces in the name        
			'overwrite' => TRUE, // overwrite existing image    
		];    
		$this->load->library('upload', $config);   
		 if (!$this->upload->do_upload('changepic')) {        
			 $this->error_messages[] = $this->upload->display_errors();        
			 return NULL;   
		 } else        
		    return $this->upload->data('file_name');
	}

	// Save update into database
	function save() {        

		// check the session first
		$incoming = $this->input->post();
		$recipe = $this->session->userdata('recipe');
		$ingredient = $this->session->userdata('ingredient');

		if(empty($recipe) || empty($ingredient)){
			//include("Administrator.php");
			$this->index();
			return;
		}
		// test return value
		/*if($record == null)
			echo "null";
		else{
			print_r($record);
		}*/		
		foreach(get_object_vars($recipe) as $index => $value){
			if (isset($incoming[$index]))
				$recipe->$index = $incoming[$index];
		}
		$newguy = $_FILES['changepic'];
		if (!empty($newguy['name'])) {
			$record->picture = $this->replace_picture ();
			if ($record->picture != null)
				$_POST['picture'] = $record->picture; // override picture name
		}
		$this->session->set_userdata('recipe',$recipe);
		//print_r($recipe);

		foreach($ingredient as $ing){
			foreach(get_object_vars($ing) as $index => $value){
				if (isset($incoming[$index]))
					$ing->$amount = $incoming[$index];
			}
		}
		$this->session->set_userdata('ingredient',$ingredient);
		//print_r($ingredient);
		

		//update our table, finally!
	    $this->recipes->update($recipe);
		foreach($ingredient as $item){
			//print_r($item);
			$this->recipe_supply->update($item); 
		}
		$this->session->unset_userdata('recipe');
		$this->session->unset_userdata('$ingredient');
		// and redisplay the list
		$this->index();
	}

	function cook($id) {
		$recipe = $this->recipes->get($id);
		$ingredient = $this->recipe_supply->group($id);
		$supplies = array();
		foreach($ingredient as $item){
			$supply = $this->supplies->get($item->supply_id);
			$qty_ing = $item->amount;
			$supply->qty_onhand = $supply->qty_onhand - $qty_ing;
			$supplies[] = $supply;
		}

		$recipe->unit = $recipe->unit + 1;
		$this->recipes->update($recipe);
		foreach($supplies as $item){
			$this->supplies->update($item);
			//print_r($item);
		}
		$this->session->unset_userdata('recipe');
		$this->session->unset_userdata('ingredient');

		$this->index();
	}

	function cancel()
    {
        $this->session->unset_userdata('$recipe');
        $this->session->unset_userdata('$ingredient');
        $this->index();
    }
}
