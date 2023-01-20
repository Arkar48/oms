<?php
include_once __DIR__. "/../model/customer.php";
class CustomerController extends Customer{
    public function getCustomers(){
        $customers=$this->getCustomerList();
        return $customers;
    }
    public function addCustomer($name,$email,$phone,$address){
        $result = $this->createCustomer($name, $email, $phone,$address);
        return $result;
    }
    public function get_customer($id){
        $result=$this->get_cus($id);
        return $result;
    }
    public function deleteCustomer($id){
        try{
            $result=$this->delete($id);
            return $result;
        }
        catch(PDOException $e){
            return false;
        }
    }
    public function updateCustomer($id,$name,$phone,$address,$email){
        $result=$this->updateCus($id,$name,$phone,$address,$email);
        return $result;
    }
}

?>