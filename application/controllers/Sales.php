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
        $this->data['items'] = '';
        foreach($this->recipes->all() as $menuitem) {
           $this->data['items'] .= $this->parser->parse('sales-order_view',$menuitem,true);
        }
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

    public function checkout() 
    {
        $orders = new Orders($this->session->userdata('orders'));
        // ignore invalid requests
        /*if (! $orders->validate())
            redirect('/Sales');*/

        $orders->save();
        $this->session->unset_userdata('orders');

        // Calculate store's running total
        $this->load->helper('file');
        $currentTotal = file_get_contents('../data/money.txt');
        $newRunningTotal = $orders->total() + $currentTotal;
        if ( ! write_file('../data/money.txt', $newRunningTotal))
        {
            echo 'Unable to write the file';
        }
        // Todo: Need to update records
        //$this->supplies->update($record);

        redirect('/Sales');

    }

    public function examine($which)
     {
        $orders = new Orders ('../data/order' . $which . '.xml');
        $stuff = $orders->receipt($which);
        $this->data['content'] = $this->parsedown->parse($stuff);
        $this->render();
    }
}