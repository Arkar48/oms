<?php
include_once  __DIR__."/../model/product.php";
class ProductController extends Products{
    public function getProducts(){
        $products=$this->getProductsLists();
        return $products;
    }
    public function addProducts($name,$categories,$model,$brand,$color,$shape){
        $results=$this->add_products($name,$categories,$model,$brand,$color,$shape);
        return $results;
    }
    public function getCategoriesLists(){
        $results=$this->get_category();
        return $results;
    }
    public function get_product($id){
        $result=$this->get_pro($id);
        return $result;
    }
    public function updateProducts($id,$name,$categories,$model,$brand,$color,$shape){
        $result=$this->update_products($id,$name,$categories,$model,$brand,$color,$shape);
        return $result;
    }
    public function deleteProduct($id){
            $result = $this->delete($id);
            return $result;
    }
}
?>