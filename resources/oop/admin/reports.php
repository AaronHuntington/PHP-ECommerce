<?php

class reports{

    public function __construct(){
        $this->delete_report();
    }

    public function get_reports(){
        $query = utility::query("SELECT * FROM  reports");
        utility::confirm($query);

        while($row = utility::fetch_array($query)){
$report = <<<DELIMETER
<tr>
    <td>{$row['report_id']}</td>
    <td>{$row['product_id']}</td>
    <td>{$row['order_id']}</td>
    <td>{$row['product_price']}</td>
    <td>{$row['product_title']}</td>
    <td>{$row['product_quantity']}</td>
    <td>    
        <a 
         class="btn btn-danger" 
         href="index.php?reports&del={$row['report_id']}">
            <span class="glyphicon glyphicon-remove">
            </span>
        </a>
    </td>
</tr>
DELIMETER;
            echo $report;
        }
    }//get_reports()

    public function delete_report(){
        if(isset($_GET['del'])){
            $query = utility::query("DELETE FROM reports WHERE report_id = ".utility::escape_string($_GET['del'])."");
            utility::confirm($query);

            utility::set_message("Report Deleted.");
            utility::redirect("index.php?reports");
        }
    }//delete_report()
}//class reports

?>