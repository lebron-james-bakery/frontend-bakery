<?php
class Orders extends CI_Model {

    // constructor
    function __construct($state=null) 
    {
        parent::__construct();
        if (is_array($state)) {
            foreach($state as $key => $value)
                $this->$key = $value;
        } else {
            $this->number = 0;
            $this->datetime = null;
            $this->items = array();
        }
    }

    public function addItem($which=null) 
    {
        // ignore empty requests
        if ($which == null) return;

        // add the menu item code to our order if not already there
        if (!isset($this->items[$which]))
            $this->items[$which] = 1;
        else {
            // increment the order quantity
            $this->items[$which]++;
        }
    }

    public function receipt() 
    {
        $total = 0;
        $result = $this->data['pagetitle'] . '  ' . PHP_EOL;
        $result .= date(DATE_ATOM) . PHP_EOL;
        $result .= PHP_EOL . 'Your Order:'. PHP_EOL . PHP_EOL;
        foreach($this->items as $key => $value) {
            $recipes = $this->recipes->get($key);
            $result .= '- ' . $value . ' ' . $recipes->name . PHP_EOL;
            $total += $value * $recipes->price;
        }
        $result .= PHP_EOL . 'Total: $' . number_format($total, 2) . PHP_EOL;
        return $result;
    }

    // test for at least one menu item in each category
    public function validate() 
    {
        // assume no items in each category
        foreach($this->recipes->all() as $id => $recipes)
            $found[$recipess->id] = false;
        // what do we have?
        foreach($this->items as $code => $item) {
            $menuitem = $this->recipes->get($code);
            $found[$menuitem->recipes] = true; 
        }
        // if any categories are empty, the order is not valid
        foreach($found as $cat => $ok)
            if (! $ok) return false;
        // phew - the order is good
        return true;
    }

}