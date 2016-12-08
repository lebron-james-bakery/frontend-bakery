<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Production extends Application
{

	function __construct()
	{
		parent::__construct();
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

	public function production_one($which){
		// this is the view we want shown
		$this->data['pagebody'] = 'production_view';

		// build the list of items, to pass on to our view
		$item = $this->productions->get_one($which);
		
		$this->data['id'] = $item[0]->id;
		$this->data['pic'] = $item[0]->picture;		
		$this->data['name'] = $item[0]->name;
		$this->data['desc'] = $item[0]->description;
		$this->data['price'] = $item[0]->price;
		$this->data['qty'] = $item[0]->unit;
		$ingredient = array();
		foreach ($item as $record)
		{
			$ingredient[] = array ('ing_name' => $this->supplies->get($record->supply_id)->name, 
							  'ing_qty' => $record->inqty,
							  'ing_onhand' => $this->supplies->get($record->supply_id)->qty_onhand);
		}
		$this->data['ingredient'] = $ingredient;

		$this->render();
	}
}
