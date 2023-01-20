<?php
include_once "controller/category_controller.php";

$catController=new Category_controller();
$id=$_POST['id'];
$result=$catController->deleteCategory($id);
if($result){
    echo "success";
}
else{
    echo "fail";
}
?>