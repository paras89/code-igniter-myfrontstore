<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

    /**
     * Search Results Action.
     */
    public function index()
    {
        $this->load->model('products','',TRUE);
        if(array_key_exists('search',$_GET)){
        $search = trim(strip_tags($_GET['search']));
        }
        else
        {
            $search = '';
        }
        $products = $this->products->getProducts($search);
        $this->load->view('searchresult',array('products' => $products));
    }
}
