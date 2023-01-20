<?php
include_once __DIR__."/../include/Database.php";
class Customer{
    private $pdo;
    public function getCustomerList(){
        //1.gET CONNECTION;
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.write sql
        $sql="select * from customers";
        //prepare sql
        $statement=$this->pdo->prepare($sql);
        //excute statement
        $statement->execute();
        //result
        $customers=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $customers;
    }
    public function createCustomer($name,$email,$phone,$address){
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="insert into customers(name,email,phone,address) values(:name,:email,:phone,:address)";
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":name",$name);
        $statement->bindParam(":email",$email);
        $statement->bindParam(":phone",$phone);
        $statement->bindParam(":address",$address);

        if($statement->execute()){
            return true;
        }
        else{
            return false;
        }
    }
    public function get_cus($id){
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.write sql
        $sql="select * from customers where id = :id";
        //prepare sql
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":id",$id);
        $statement->execute();
        //result
        $result=$statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function updateCus($id,$name,$phone,$address,$email){
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="UPDATE `customers` SET `name`=:name,`phone`=:phone,`address`=:address,`email`=:email WHERE id=:id";
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":name",$name);
        $statement->bindParam(":phone",$phone);
        $statement->bindParam(":address",$address);
        $statement->bindParam(":email",$email);
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
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $query = "delete from customers where id = $id";

        $statement = $this->pdo->prepare($query);
        return $statement->execute();
    }

}
?> 