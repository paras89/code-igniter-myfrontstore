<?php
/**
 * Created by JetBrains PhpStorm.
 * User: psood
 * Date: 11/7/13
 * Time: 9:55 PM
 * To change this template use File | Settings | File Templates.
 */
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Myapp extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
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

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */