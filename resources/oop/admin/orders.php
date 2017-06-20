<?php

class orders {
    protected static $db_table = "order";
    protected static $db_table_fields = array('order_id','order_amount','order_transaction','order_status','order_currency');
    public $order_id;
    public $order_amount;
    public $orderT_transaction;
    public $order_status; 
    public $order_currency; 

//////////////
    



/////////////





    public function __construct(){
        $this->delete_order();
    }

    public function display_orders(){
        $query = utility::query("SELECT * FROM orders");
        utility::confirm($query);

        while($row = utility::fetch_array($query)){

$orders = <<<DELIMETER
<tr>    
    <td>{$row['order_id']}</td>
    <td>{$row['order_amount']}</td>
    <td>{$row['order_transaction']}</td>
    <td>{$row['order_currency']}</td>
    <td>{$row['order_status']}</td>
    <td>    
        <a 
         class="btn btn-danger" 
         href="index.php?orders&del={$row['order_id']}">
            <span class="glyphicon glyphicon-remove">
            </span>
        </a>
    </td>
</tr>
DELIMETER;

        echo $orders;
        } //While Loop
    }//display_orders()

    public function delete_order(){
        if(isset($_GET['del'])){
            $query = utility::query("DELETE FROM orders WHERE order_id = ".utility::escape_string($_GET['del'])."");
            utility::confirm($query);

            utility::set_message("Order Deleted.");
            utility::redirect("index.php?orders");
        } 
    }



}//class orders

?>