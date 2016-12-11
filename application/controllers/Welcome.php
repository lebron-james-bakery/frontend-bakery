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
        $rows = array_reverse($rows);
        foreach(array_slice($rows, 2) as $row => $data)
        {
            $row_data = explode(' ', $data);
            // Number of units * price
            if ( ! isset($row_data[1])) {
                $row_data[1] = 0;
            }
            if ( ! isset($row_data[6])) {
                $row_data[6] = 0;
            }
            $totalReceiving += $row_data[1] * $row_data[6];
            $this->data['transactionLogs'] .= nl2br($data . PHP_EOL);
        }
        $this->data['totalReceiving'] = $totalReceiving;

        $this->render();
	}

}