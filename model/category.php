<?php
include_once __DIR__."/../include/Database.php";
class Category{
    private $pdo;
    public function getCategoriesLists(){
        //1.gET CONNECTION;
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.write sql
        $sql="select * from categories";
        //prepare sql
        $statement=$this->pdo->prepare($sql);
        //excute statement
        $statement->execute();
        //result
        $results=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    public function addCat($name,$parents){
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="insert into categories(name,parent) values(:name,:parent)";
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":name",$name);
        $statement->bindParam(":parent",$parents);

        if($statement->execute()){
            return true;
        }
        else{
            return false;
        }
    }
    public function getCat($id){
        //1.gET CONNECTION;
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.write sql
        $sql="select * from categories where id = :id";
        //prepare sql
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":id",$id);
        $statement->execute();
        //result
        $result=$statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function delete($id){
        try{
            $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "delete from categories where id = :id";
        
        $sql = "select * from categories where parent=:id";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(":id",$id);

        $statement1=$this->pdo->prepare($sql);
        $statement1->bindParam(":id",$id);
        $statement1->execute();

        $child=$statement1->fetchAll(PDO::FETCH_ASSOC);
        if(count($child)>0){
            return false;
        }
        else{
            return $statement->execute();
        }
        }
        catch(PDOException $e){
            return false;
        }

    }
    public function updateCat($id,$name,$parents){
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="UPDATE `categories` SET `name`=:name,`parent`=:parent WHERE id=:id";
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":name",$name);
        $statement->bindParam(":parent",$parents);
        $statement->bindParam(':id',$id);

        if($statement->execute()){
            return true;
        }
        else{
            return false;
        }
    }
    public function get_category_pages($page){

        $items_per_page=5;
        $offset=($page-1)*$items_per_page;
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.write sql
        $sql="select * from categories limit $offset,$items_per_page";
        //prepare sql
        $statement=$this->pdo->prepare($sql);
        $statement->execute();
        //result
        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}

?>