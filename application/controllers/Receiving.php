<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// Menu Model + Crud Controller

class Receiving extends Application
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('formfields_helper');
        $this->error_messages = array();
        $this->load->model('supplies');
    }

	/**
	 * Receiving Page for this controller.
	 *
	 * Maps to the following URL
	 * http://example.com/welcome/receiving
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
        $this->data['pagebody'] = 'receiving_view';
		$this->data['items'] = $this->supplies->all();
		$this->render();
	}
    // Handle an incoming GET ... 	returns a list of ports
    function index_get()
    {
        $this->response($this->supplies->getPorts(), 200);
    }

   function edit($id = null)
    {
        // Handle user-role to lock out certain types of users
        $userrole = $this->session->userdata('userrole');
        if ($userrole == 'guest') {
            $message = 'You are not authorized to access this page. Go away';
            $this->data['content'] = $message;
            $this->render();
            return;
        }

        // try the session first
        $key = $this->session->userdata('key');
        $record = $this->session->userdata('record');


        if(empty($record)){
            $record = $this->supplies->get($id);
            $key = $id;
            $this->session->set_userdata('key',$id);
            $this->session->set_userdata('record',$record);

        }

        //$this->data['content'] = "Looking at " . $key . ': ' . $record->name;
        $this->data['action'] = (empty($key)) ? 'Adding' : 'Editing';
        // build the form fields
       // $this->data['items'] = $this->supplies->get($id);

        // makeTextField (Label, database column name, record to insert)

        $this->data['fid'] = makeLaBel('Item Id', 'id', $record->id);
        $this->data['fname'] = makeLabel('Item Name', 'name', $record->name);
        $this->data['fonhand'] = makeLabel('On Hand amount, units (Kg)', 'qty_onhand', $record->qty_onhand);
        $this->data['freceiving'] = makeTextField('Receiving amount, units(Kg)', 'qty_inventory', $record->qty_inventory);
        $this->data['fprice'] = makeTextField('Price (C$), per unit', 'price', $record->price);


        // show the editing form
        $this->data['pagebody'] = "receiving-edit_view";
        $this->data['zsubmit'] = makeSubmitButton('Save', 'Submit changes');
        $this->show_any_errors();
        $this->render();
    }
    function cancel()
    {
        $this->session->unset_userdata('key');
        $this->session->unset_userdata('record');
        $this->index();
        redirect('/receiving');
    }
    function save() {
        // try the session first
        $key = $this->session->userdata('key');
        $record = $this->session->userdata('record');
        // if not there, nothing is in progress
        if (empty($record)) {
            $this->index();
            return;
        }

        // update our data transfer object
        $incoming = $this->input->post();
        foreach(get_object_vars($record) as $key=> $value)
            if (isset($incoming[$key]))
                $record->$key = $incoming[$key];
        $this->session->set_userdata('record',$record);

        // validate
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->supplies->rules());
        if ($this->form_validation->run() != TRUE)
            $this->error_messages = $this->form_validation->error_array();

        // check menu code for additions
        if ($key == null)
            if ($this->supplies->exists($record->id))
                $this->error_messages[] = 'Duplicate id adding new menu item';

        // save or not
       if (! empty($this->error_messages)) {
            $this->edit();
            return;
        }

        // update our table, finally!
        if ($key == null)
            $this->supplies->add($record);
        else
            $this->supplies->update($record);

        // log transactions
        $string = "Ordered " . $record->qty_inventory . " quantities of " . $record->name . " for " . $record->price . " $ per unit - " . date(DATE_ATOM) . PHP_EOL;
        file_put_contents('../data/buy-logs.txt', $string.PHP_EOL , FILE_APPEND | LOCK_EX);
        $this->load->helper('file');
        $currentTotal = file_get_contents('../data/money.txt');
        $newRunningTotal =  $currentTotal - ($record->price * $record->qty_inventory);
        if ( ! write_file('../data/money.txt', $newRunningTotal))
            $this->error_messages[] = 'Error writing to money.txt';

        // and redisplay the list
        $this->index();
    }

    function show_any_errors() {
        $result = '';
        if (empty($this->error_messages)) {
            $this->data['error_messages'] = '';
            return;
        }
        // add the error messages to a single string with breaks
        foreach($this->error_messages as $onemessage)
            $result .= $onemessage . '<br/>';
        // and wrap these per our view fragment
        $this->data['error_messages'] = $this->parser->parse('mtce-errors',
            ['error_messages' => $result], true);
    }
    function delete() {
        $key = $this->session->userdata('key');
        $record = $this->session->userdata('record');
        // only delete if editing an existing record
        if (! empty($record)) {
            $this->supplies->delete($key);
        }
        $this->index();
    }
    function add() {
        // Handle user-role to lock out certain types of users
        $userrole = $this->session->userdata('userrole');
        if ($userrole == 'guest') {
            $message = 'You are not authorized to access this page. Go away';
            $this->data['content'] = $message;
            $this->render();
            return;
        }

        $key = NULL;
        $record = $this->supplies->create();
        $this->session->set_userdata('key', $key);
        $this->session->set_userdata('record', $record);
        $this->edit();
    }
}