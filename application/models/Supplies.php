<?php

/**
 * This is a "CMS" model for quotes, but with bogus hard-coded data,
 * so that we don't have to worry about any database setup.
 * This would be considered a "mock database" model.
 *
 * @author Gerard
 */
define('REST_SERVER', 'http://backend.local');      // the REST server host
define('REST_PORT', $_SERVER['SERVER_PORT']);       // the port you are running the server on

class Supplies extends MY_Model {
    // Constructor
     function __construct()
    {
        parent::__construct();
        //*** Explicitly load the REST libraries.
        $this->load->library(['curl', 'format', 'rest']);
    }
    /**
     * Returns all the ports from the xml file
     * @return the ports
     */
    function getPorts()
    {
        $ports = array();
        foreach ($this->xml->ports->children() as $port)
        {
            $ports[(string) $port['code']] = $port->__toString();
        }
        return $ports;
    }
    function rules() {
        $config = [
            ['field'=>'id', 'label'=>'Menu code'],
            ['field'=>'name', 'label'=>'Item name'],
            ['field'=>'qty_onhand', 'label'=>'Item onhand'],
            ['field'=>'qty_inventory', 'label'=>'Item stock', 'rules'=> 'required|decimal'],
            ['field'=>'price', 'label'=>'Price'],
        ];
        return $config;
    }

    function adminSupplyRules() {
        $config = [
            ['field'=>'id', 'label'=>'Menu code'],
            ['field'=>'name', 'label'=>'Item name','rules'=> 'required'],
            ['field'=>'qty_onhand', 'label'=>'Item onhand','rules'=> 'decimal'],
            ['field'=>'qty_inventory', 'label'=>'Item stock', 'rules'=> 'required|decimal'],
            ['field'=>'price', 'label'=>'Price'],
        ];
        return $config;
    }
    // Return all records as an array of objects
    function all()
    {
        $this->rest->initialize(array('server' => REST_SERVER));
        $this->rest->option(CURLOPT_PORT, REST_PORT);
        return $this->rest->get('/maintenance');
    }
    // Retrieve an existing DB record as an object
    function get($key, $key2 = null)
    {
        $this->rest->initialize(array('server' => REST_SERVER));
        $this->rest->option(CURLOPT_PORT, REST_PORT);
        return $this->rest->get('/maintenance/item/id/' . $key);
    }
    // Create a new data object.
    // Only use this method if intending to create an empty record and then
    // populate it.
    function create()
    {
        $names = ['id','name','qty_onhand','qty_inventory','price'];
        $object = new StdClass;
        foreach ($names as $name)
            $object->$name = "";
        return $object;
    }
    // Delete a record from the DB
    function delete($key, $key2 = null)
    {
        $this->rest->initialize(array('server' => REST_SERVER));
        $this->rest->option(CURLOPT_PORT, REST_PORT);
        return $this->rest->delete('/maintenance/item/id/' . $key);
    }
    // Determine if a key exists
    function exists($key, $key2 = null)
    {
        $this->rest->initialize(array('server' => REST_SERVER));
        $this->rest->option(CURLOPT_PORT, REST_PORT);
        $result = $this->rest->get('/maintenance/item/id/' . $key);
        return ! empty($result);
    }
    // Update a record in the DB
    function update($record)
    {
        $this->rest->initialize(array('server' => REST_SERVER));
        $this->rest->option(CURLOPT_PORT, REST_PORT);

        $retrieved = $this->rest->put('/maintenance/item/id/' . $record->id, json_encode($record));
        //var_dump($retrieved); die;
    }

    // Add a record to the DB
    function add($record)
    {
        $this->rest->initialize(array('server' => REST_SERVER));
        $this->rest->option(CURLOPT_PORT, REST_PORT);
        $retrieved =  $this->rest->post('/maintenance/item/id/' . $record->id, $record);
    }
}
