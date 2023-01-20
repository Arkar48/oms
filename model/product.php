<?php
include_once __DIR__."/../include/Database.php";

class Products{
    private $pdo;
    public function getProductsLists(){
        //1.gET CONNECTION;
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.write sql
        $sql="select * from products";
        //prepare sql
        $statement=$this->pdo->prepare($sql);
        //excute statement
        $statement->execute();
        //result
        $products=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    public function add_products($name,$categories,$model,$brand,$color,$shape){
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="insert into products(name,category_id,model,brand,color,shape) values(:name,:categories,:model,:brand,:color,:shape)";
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":name",$name);
        $statement->bindParam(":categories",$categories);
        $statement->bindParam(":brand",$brand);
        //$statement->bindParam(":price",$price);
        $statement->bindParam(":model",$model);
        $statement->bindParam(":color",$color);
        $statement->bindParam(":shape",$shape);

        if($statement->execute()){
            return true;
        }
        else{
            return false;
        }
    }
    public function get_pro($id){
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.write sql
        $sql="select * from products where id=:id";
        //prepare sql
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":id",$id);
        //excute statement
        $statement->execute();
        //result
        $products=$statement->fetch(PDO::FETCH_ASSOC);
        return $products;
    }
    public function update_products($id,$name,$categories,$model,$brand,$color,$shape){
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="UPDATE `products` SET `category_id`=:categories,`name`=:name,`model`=:model,`brand`=:brand,`color`=:color,`shape`=:shape WHERE id=:id";
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":name",$name);
        $statement->bindParam(":categories",$categories);
        //$statement->bindParam(":price",$price);
        $statement->bindParam(":model",$model);
        $statement->bindParam(":brand",$brand);
        $statement->bindParam(":color",$color);
        $statement->bindParam(":shape",$shape);
        $statement->bindParam(':id',$id);

        if($statement->execute()){
            return true;
        }
        else{
            return false;
        }
    }
    
    public function delete($id){
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "delete from products where id = $id";

        $statement = $this->pdo->prepare($query);

        if($statement->execute()){
            return true;
        }
        else{
            return false;
        }

    }
}   
?>