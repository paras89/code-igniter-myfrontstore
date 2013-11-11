<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {


    /**
     * Home page action.
     */
    public function index()
    {

        $this->load->model('initializer','',TRUE);
        // Initialize app.
        $this->initializer->initialize();
        $this->load->view('home');
    }
}

