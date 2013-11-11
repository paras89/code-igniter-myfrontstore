<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Viewproduct extends CI_Controller {


    /**
     * Product View Action.
     */
    public function index()
    {
        $this->load->model('products','',TRUE);
        $product= $this->products->loadProduct(trim(strip_tags($_GET['id'])));
        $this->load->view('productview',array('product' => $product));
    }
}

