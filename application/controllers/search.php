<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

    /**
     * Search Results Action.
     */
    public function index()
    {
        $this->load->model('products','',TRUE);
        $products = $this->products->getProducts(trim(strip_tags($_GET['search'])));
        $this->load->view('searchresult',array('products' => $products));
    }
}
