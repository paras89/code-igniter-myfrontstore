<?php

class Initializer extends CI_Model
{

    function __construct()
    {
// Call the Model constructor
        parent::__construct();
    }

    /**
     * Check if the application is installed.
     * @return bool
     */
    protected function _isInstalled()
    {
        $counts = $this->db->query("SELECT count(*) AS COUNT
                               FROM information_schema.tables
                               WHERE table_schema = 'mystorefront_codei'
                               AND table_name = 'product_data'");


        foreach ($counts->result() as $count) {
            if ($count->COUNT < 1) {
                return false;
            }
        }
        return true;
    }

    /**
     * Check installation, if not installed, install it.
     */
    function initialize()
    {
        if (!$this->_isInstalled()) {
            $this->_install();
        }
        return;
    }

    /**
     * Setup Categories and Products.
     */
    protected function _install()
    {
        $this->_installTables();
        $query = $this->db->query("SELECT * from movie_data");
        $this->_saveCategories($query);
        $this->_saveProducts($query);
    }

    /**
     * Setup database Tables.
     */
    protected function _installTables()
    {
        // Create product data table.
        $this->db->query("CREATE TABLE `mystorefront_codei`.`product_data`(
                         `id` BIGINT NOT NULL AUTO_INCREMENT,
                         `product_id` VARCHAR(256) NOT NULL COMMENT 'Product Id',
                         `group_id` VARCHAR(256) DEFAULT 'NULL' COMMENT 'Group ID',
                         `title` VARCHAR(256) COMMENT 'Title',
                         `store` VARCHAR(256) COMMENT 'Store',
                         `price` FLOAT COMMENT 'Price',
                         `shipping_duration` SMALLINT COMMENT 'Shipping Duration',
                         `category_id` INT COMMENT 'Category Id',
                         `subcategory_id` INT COMMENT 'Subcategory Id',
                          PRIMARY KEY (`id`, `product_id`)
                          );
                         ");

        $this->db->query("CREATE TABLE `mystorefront_codei`.`category_Data`(
                          `id` INT NOT NULL AUTO_INCREMENT,
                          `category_name` VARCHAR(256) NOT NULL,
                          `parentcategory_name` VARCHAR(256),
                          PRIMARY KEY (`id`)
                          );");

        $this->db->query("ALTER TABLE product_data
                        ADD FOREIGN KEY (category_id)
                         REFERENCES category_data(id)");

    }

    /**
     * Setup Categories.
     * @param $query
     */
    protected function _saveCategories($query)
    {

        foreach ($query->result() as $dataRow) {

            $category = $dataRow->Category;
            $subCategory = $dataRow->SubCategory;
            if (!$this->_checkCategoryExists($category)) {
                $this->db->query("INSERT INTO category_data VALUES (DEFAULT,'$category', NULL)");

            }
            if (!$this->_checkSubCategoryExists($category, $subCategory)) {
                $this->db->query("INSERT INTO category_data VALUES (DEFAULT,'$subCategory', '$category')");
            }

        }

        return;

    }

    /**
     * Check if a category is already setup.
     * @param $category
     * @return bool
     */
    protected function _checkCategoryExists($category)
    {
        $counts = $this->db->query("SELECT COUNT(*) as COUNT FROM category_data WHERE category_name = '$category'");
        foreach ($counts->result() as $count) {
            if ($count->COUNT < 1) {
                return false;
            }
        }
        return true;
    }

    /**
     * Check if a sub category already exists with the exact category tree.
     * @param $category
     * @param $subCategory
     * @return bool
     */
    protected function _checkSubCategoryExists($category, $subCategory)
    {
        $counts = $this->db->query("SELECT COUNT(*) AS COUNT FROM category_data WHERE category_name = '$subCategory' AND parentcategory_name = '$category'");
        foreach ($counts->result() as $count) {
            if ($count->COUNT < 1) {
                return false;
            }
        }
        return true;
    }

    /**
     * Set up products.
     * @param $query
     */
    protected function _saveProducts($query)
    {
        foreach ($query->result() as $dataRow) {
            $productId = $dataRow->ProductId;
            $title = $dataRow->MovieTitle;
            $groupId = $dataRow->GroupId;
            $store = $dataRow->Store;
            $category = $dataRow->Category;
            $price = $dataRow->Price;
            $shippingDuration = $dataRow->ShippingDuration;
            $subCategory = $dataRow->SubCategory;

            $this->db->query("INSERT IGNORE INTO product_data VALUES (DEFAULT,'$productId','$groupId','$title','$store','$price',
                             '$shippingDuration', (SELECT id from category_data where category_name = '$category'),
                             (SELECT id from category_data where category_name = '$subCategory' AND parentcategory_name = '$category'))");

        }
        return;

    }


}