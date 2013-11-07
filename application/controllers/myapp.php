<?php

 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Myapp extends CI_Controller {



    public function index()
    {

        $this->load->view('myapp_message');
    }

    public function myaction($param1)
    {
        echo $param1;
        $this->load->view('myapp_message');
    }
}

