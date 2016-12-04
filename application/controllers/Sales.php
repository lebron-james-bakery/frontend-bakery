<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends Application
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
        // this is the view we want shown
        $this->data['pagebody'] = 'sales_view';
        // connect to database table
		$this->data['items'] = $this->recipes->all();
		$this->render();
    }

}