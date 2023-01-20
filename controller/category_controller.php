<?php
    include_once __DIR__."/../model/category.php";
    class Category_controller extends Category{
        public function getCategories(){
            $categories=$this->getCategoriesLists();
            return $categories;
        }
        public function addCategory($name,$parents){
            $result=$this->addCat($name,$parents);
            return $result;
        }
        public function get_category($id){
            $result=$this->getCat($id);
            return $result;
        }
        public function deleteCategory($id){
            $result = $this->delete($id);

            return $result;
        }
        public function updateCategory($id,$name,$parents){
            $result=$this->updateCat($id,$name,$parents);
            return $result;
        }
        public function getCategoriesPages($page){
            return $this->get_category_pages($page);
        }
    }
?>