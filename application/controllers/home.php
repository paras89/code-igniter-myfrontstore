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
        $data['searchbox'] = $this->load->view('searchbox', NULL, TRUE);

        $this->load->view('home', $data);
    }
}

