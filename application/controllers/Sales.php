<?php
/**
 * Created by PhpStorm.
 * User: kwanc
 * Date: 2016-10-05
 * Time: 3:41 PM
 */
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
        // Handle user-role to lock out certain types of users
        $userrole = $this->session->userdata('userrole');
        if ($userrole != 'admin') {
            $message = 'You are not authorized to access this page. Go away';
            $this->data['content'] = $message;
        }

        // this is the view we want shown
        $this->data['pagebody'] = 'sales_view';

        // build the list of items, to pass on to our view
        $source = $this->stock->all();
        $items = array ();
        foreach ($source as $record)
        {
            $items[] = array ('name' => $record['name'], 'pic' => $record['pic'], 'href' => $record['where'],'price' => $record['price'], 'description' => $record['description']);
        }
        $this->data['items'] = $items;

        $this->render();
    }

}