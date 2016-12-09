<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application
{

	function __construct()
	{
		parent::__construct();
	}

	/**
	 * Homepage for our app
	 */
	public function index()
	{
        // Handle user-role to lock out certain types of users
        $userrole = $this->session->userdata('userrole');
        if ($userrole == 'guest') {
            $message = 'You are not authorized to access this page. Go away';
            $this->data['content'] = $message;
            $this->render();
            return;
        }

		// this is the view we want shown
		$this->data['pagebody'] = 'homepage_view';

        // identify all of the order files
        $this->load->helper('directory');
        $candidates = directory_map('../data/');
        $parms = array();
        foreach ($candidates as $filename) {
            if (substr($filename,0,5) == 'order') {
                // restore that order object
                $orders = new Orders ('../data/' . $filename);
                // setup view parameters
                $parms[] = array(
                    'number' => $orders->number,
                    'datetime' => $orders->datetime,
                    'total' => $orders->total()
                );
            }
        }
        $this->data['Orders'] = $parms;

        // this is an example
		$source = $this->logs->all();
		$items = array ();
		foreach ($source as $record)
		{
			$items[] = array ('who' => $record['who'], 'pic' => $record['pic'], 'href' => $record['where'], 'what' => $record['what']);
		}
		$this->data['items'] = $items;
        // end of example


        // build the list of recipes, to pass on to our homepage_view
        /*

         $recipe_source = $this->recipes->all();
        $recipes = array ();
        foreach ($recipe_source as $record)
        {
            $recipes[] = array ('id' => $record['id'],'name' => $record['name'], 'pic' => $record['pic'], 'href' => $record['where'], 'ingredients' => $record['ingredients'],'ingredientAmount' => count($record['ingredients'], COUNT_RECURSIVE));
        }
        $this->data['recipes'] = $recipes;

        // build the list of stocks, to pass on to our homepage_view
        $stock_source = $this->stock->all();
        $stocks = array ();
        $total_stock_price = array ();
        $total_stock_order = array ();
        foreach ($stock_source as $record)
        {
            $stocks[] = array ('id' => $record['id'],'name' => $record['name'], 'pic' => $record['pic'], 'href' => $record['where'], 'price' => $record['price'], 'order' => $record['order'],'description' => $record['description']);
            array_push($total_stock_price, $record['price']);
            array_push($total_stock_order, $record['order']);
        }
        $this->data['stocks'] = $stocks;
        $this->data['total_stock_price'] = array_sum($total_stock_price);
        $this->data['average_stock_price'] = array_sum($total_stock_price) / count($stocks);
        $this->data['total_stock_order'] = array_sum($total_stock_order);

        // build the list of supplies, to pass on to our homepage_view
       /* $supply_source = $this->supplies->all();
        $supplies = array ();
        $total_supply_quantities = array ();
        $total_supply_Cost = array ();
        $total_supply_receiving = array ();
        $total_supply_stocking = array ();

        foreach ($supply_source as $record)
        {
            $supplies[] = array ('id' => $record['id'],'name' => $record['name'], 'href' => $record['where'],'Cost' => $record['Cost'],'quantities' => $record['quantities'],'stocking' => $record['stocking'], 'Unit' => $record['Unit'], 'receiving' => $record['receiving'],'description' => $record['description']);
            array_push($total_supply_stocking, $record['stocking']);
            array_push($total_supply_quantities, $record['quantities']);
            array_push($total_supply_Cost, $record['Cost']);
            array_push($total_supply_receiving, $record['receiving']);
        }
        $this->data['supplies'] = $supplies;
        $this->data['total_supply_quantities'] = array_sum($total_supply_quantities);
        $this->data['total_supply_Cost'] = array_sum($total_supply_Cost);
        $this->data['average_supply_Cost'] = array_sum($total_supply_Cost) / count($supplies);
        $this->data['total_supply_receiving'] = array_sum($total_supply_receiving);
        $this->data['total_supply_stocking'] = array_sum($total_supply_stocking);
*/
        // Caculate total store money
        $this->load->helper('file');
        $totalMoney = file_get_contents('../data/money.txt');
        $this->data['totalMoney'] = $totalMoney;

        // Calculate total sales based on XML receipts
        $this->load->helper('directory');
        $candidates = directory_map('../data/');
        $totalSales = 0;
        foreach ($candidates as $filename) {
            if (substr($filename,0,5) == 'order') {
                // restore that order object
                $orders = new Orders ('../data/' . $filename);
                $totalSales += $orders->total();
            }
        }
        $this->data['totalSales'] = $totalSales;

        // Calculate total ingredients used up
        $totalIngredientsConsumed = 0;
        foreach ($candidates as $filename) {
            if (substr($filename,0,5) == 'order') {
                // restore that order object
                $orders = new Orders ('../data/' . $filename);
                $totalIngredientsConsumed += $orders->totalCostToProduce();
            }
        }
        $this->data['totalIngredientsConsumed'] = $totalIngredientsConsumed;

        // Caculate total spent on inventory
        $totalReceiving = 0;
        $buylogstxtfile = file_get_contents('../data/buy-logs.txt');
        $this->data['transactionLogs'] = " ";

        $rows = explode("\n", $buylogstxtfile);
        foreach($rows as $row => $data)
        {
            $row_data = explode(' ', $data);
            // Number of units * price
            if ( ! isset($row_data[1])) {
                $row_data[1] = 0;
            }
            if ( ! isset($row_data[6])) {
                $row_data[6] = 0;
            }
            $totalReceiving += $row_data[6];
            $this->data['transactionLogs'] .= nl2br($data . PHP_EOL);
        }
        $this->data['totalReceiving'] = $totalReceiving;

        $this->render();
	}

}