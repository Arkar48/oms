<?php
include_once __DIR__."/../model/stock.php";
class StockController extends Stocks{
    public function getStocks(){
        $result=$this->get_stocks();
        return $result;
    }

    public function getHistoryStocks($id){
        return $this->get_history_stocks($id);
    }
    public function getSellingprice(){
        return $this->get_selling_price();
    }
}
?>