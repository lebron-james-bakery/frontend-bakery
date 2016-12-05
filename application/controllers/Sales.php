<?php

//defined('BASEPATH') OR exit('No direct script access allowed');

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
        if ($this->session->has_userdata('orders'))
            $this->keep_shopping();
        else $this->summarize();

        /*$stuff = file_get_contents('../data/receipt.md');
        $this->data['order'] = $this->parsedown->parse($stuff);
        $this->data['pagebody'] = 'sales_view';
		$this->data['items'] = $this->recipes->all();
		$this->render('template');*/
    }

    public function summarize() 
    {
        $this->data['pagebody'] = 'summary';
        $this->render('template');  // use the default template
    }

    public function neworder() 
    {
        // create a new order if needed
        if (! $this->session->has_userdata('orders')) {
            $orders = new Orders();
            $this->session->set_userdata('orders', (array) $orders);
        }

        $this->keep_shopping();
    }

    public function keep_shopping() 
    {
        $orders = new Orders($this->session->userdata('orders'));
        $stuff = $orders->receipt();
        $this->data['receipt'] = $this->parsedown->parse($stuff);
        $this->data['content'] = '';
        $this->data['items'] = $this->recipes->all();
        // $this->data['recipes'] = '';
        $count = 1;
        $chunk = 'recipes' . $count;
        foreach($this->recipes->all() as $menuitem) {
           $this->data[$chunk] .= $this->parser->parse('menuitem-shop',$menuitem,true);
        }
        $count++;
        $this->render('sales_view'); 
	}

    public function add($what) 
    {
        $orders = new Orders($this->session->userdata('orders'));
        $orders->additem($what);
        $this->keep_shopping();
        $this->session->set_userdata('orders',(array)$orders);
        redirect('/Sales');
    }

    public function cancel() 
    {
        // Drop any order in progress
        if ($this->session->has_userdata('orders')) {
            $this->session->unset_userdata('orders');
        }

        $this->index();
    }

}