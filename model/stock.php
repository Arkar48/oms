<?php
include_once __DIR__."/../include/Database.php";
class Stocks{
    private $pdo;
    public function get_stocks(){
        $this->pdo = Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="SELECT SUM(stocks.quantity) as total_qty,products.name,product_id
        from stocks JOIN products
        WHERE products.id=stocks.product_id
        GROUP BY products.name";

        $statement=$this->pdo->prepare($sql);
        $statement->execute();
        $stocks=$statement->fetchALL(PDO::FETCH_ASSOC);
        return $stocks;
    }

    public function get_history_stocks($id){
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="SELECT * FROM `stocks` WHERE product_id=:id";
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(':id',$id);
        $statement->execute();
        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function get_selling_price(){
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="SELECT * 
        FROM prices";
        $statement=$this->pdo->prepare($sql);
        $statement->execute();
        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}

?>