<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {


    public function index()
    {
        $this->load->model('products','',TRUE);
        $products = $this->products->getProducts(trim(strip_tags($_GET['search'])));
        $this->load->view('searchresult',array('products' => $products));
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */