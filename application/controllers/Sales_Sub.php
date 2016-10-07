<?php
/**
 * Created by PhpStorm.
 * User: kwanc
 * Date: 2016-10-07
 * Time: 10:51 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property  data
 */
class Sales_Sub extends Application
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
        $this->data['pagebody'] = 'Salesmenu';

        // build the list of items, to pass on to our view
        $record = $this->stock->get($this->getID($_SERVER["REQUEST_URI"]));
        $this->data = array_merge($this->data, $record);

        $this->render();
    }
    function getID($str)
    {
        return (int)substr($str, 7);
    }

}