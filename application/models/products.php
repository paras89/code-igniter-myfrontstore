<?php


class Products extends CI_Model
{

    function __construct()
    {
// Call the Model constructor
        parent::__construct();
    }

    /**
     * Return product search results for $searchTerm.
     * @param $searchTerm
     * @return array
     */
    function getProducts($searchTerm)
    {
        return $this->_queryProducts($searchTerm);
    }

    /**
     * Load Product by Id.
     * @param $id
     * @return array
     */
    function loadProduct($id)
    {
        $query = $this->db->query("SELECT PD.*, CATA.category_name AS subcategory, CATA.parentcategory_name AS category FROM product_data AS PD
        INNER JOIN category_data AS CATA
        ON CATA.id = PD.subcategory_id
        where PD.id = '$id'
        OR PD.group_id = (SELECT group_id FROM product_data AS PRO where PRO.id = '$id' AND PRO.group_id <> '')");
        foreach ($query->result() as $dataRow) {
            $product[] =  $dataRow;
        }
        return $product;
    }

    /**
     * Query Products for a search term.
     * @param $searchTerm
     * @return array
     */
    protected function _queryProducts($searchTerm)
    {
        $products = array();
        if ($searchTerm = mysql_real_escape_string($searchTerm)) {
            $query = $this->db->query("SELECT * from product_data as Product WHERE Product.product_id = '$searchTerm' OR Product.group_id = '$searchTerm'
                                  OR Product.title = '$searchTerm' OR '$searchTerm' = (SELECT category_name FROM
                                                                               category_data as CAT WHERE CAT.id = Product.category_id )
                                  OR '$searchTerm' IN (SELECT category_name FROM category_data as CAT WHERE CAT.parentcategory_name = '$searchTerm')
                 ");


            foreach ($query->result() as $dataRow) {
                $products[] = $dataRow;
            }
        }
        return $products;
    }


}