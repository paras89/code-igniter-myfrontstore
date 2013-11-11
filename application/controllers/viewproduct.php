<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Viewproduct extends CI_Controller {


    public function index()
    {
        $this->load->model('products','',TRUE);
        $product= $this->products->loadProduct(trim(strip_tags($_GET['id'])));
        $this->load->view('productview',array('product' => $product));
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */