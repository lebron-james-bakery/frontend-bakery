<?php
/**
 * Created by PhpStorm.
 * User: gerard
 * Date: 2016-12-04
 * Time: 11:26 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Toggle extends Application {

    public function index()
    {
        $origin = $_SERVER['HTTP_REFERER'];

        $role = $this->session->userdata('userrole');
        if ($role == 'user') {
            $role = 'admin';
        } elseif ($role == 'admin') {
            $role = 'guest';
        } else {
            $role = 'user';
        }
        $this->session->set_userdata('userrole', $role);

        redirect($origin);
    }

}