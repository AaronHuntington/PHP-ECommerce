<?php

class pagination {

    public $perPage = 3;
    public $middleNumbers;
    public $page;
    public $lastPage;
    public $total_products;

    function start(){
        $this->set_pages();
        $this->middle_numbersHtml();
        $this->products_perPage();
        $this->pagination_numbers();
    }

    function set_pages(){
        if(isset($this->page)){
            $this->page = preg_replace('#[^0-9]#','',$this->page);
        } else {
            $this->page = 1;
        }  

        $this->lastPage = ceil($this->total_products / $this->perPage);
        if($this->page < 1){
            $page = 1;
        } elseif($this->page > $this->lastPage) {
            $this->page = $this->lastPage;
        }
    }

    function show_pagination($query){
        $rows = mysqli_num_rows($query);

        if(isset($_GET['page'])){
        $this->page = preg_replace('#[^0-9]#','',$_GET['page']);
        } else {
            $this->page = 1;
        }

        // $this->perPage;
        
        $lastPage = ceil($rows/$this->perPage);        

        if($this->page < 1){
            $this->page = 1;
        } elseif($this->page > $lastPage) {
            $this->page = $lastPage;
        }
    }

    function middle_numbersHtml(){
        global $database;

        $this->middleNumbers = '';

        $sub1 = $this->page - 1;
        $sub2 = $this->page - 2;
        $add1 = $this->page + 1;
        $add2 = $this->page + 2;

        if($this->page == 1){

            $this->middleNumbers .= '
                <li class="page-item active">
                    <a>
                        '.$this->page.'
                    </a>
                </li>
            ';

            $this->middleNumbers .= '
                <li class="page-item">
                    <a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$add1.'">
                        '.$add1.'
                    </a>
                </li>
            ';
        } elseif($this->page == $this->lastPage) {
            $this->middleNumbers .= '
                <li class="page-item">
                    <a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$sub1.'">
                        '.$sub1.'
                    </a>
                </li>
            ';
            $this->middleNumbers .= '
                <li class="page-item active">
                    <a>
                        '.$this->page.'
                    </a>
                </li>
            ';
        } elseif($this->page > 2 && $this->page < ($this->lastPage - 1)) {

            $this->middleNumbers .= '
                <li class="page-item">
                    <a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$sub2.'">
                        '.$sub2.'
                    </a>
                </li>
            ';
            $this->middleNumbers .= '
                <li class="page-item">
                    <a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$sub1.'">
                        '.$sub1.'
                    </a>
                </li>
            ';
            $this->middleNumbers .= '
                <li class="page-item active">
                    <a>
                        '.$this->page.'
                    </a>
                </li>
            ';
            $this->middleNumbers .= '
                <li class="page-item">
                    <a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$add1.'">
                        '.$add1.'
                    </a>
                </li>
            ';
            $this->middleNumbers .= '
                <li class="page-item">
                    <a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$add2.'">
                        '.$add2.'
                    </a>
                </li>
            ';
        } elseif($this->page > 1 && $this->page < $this->lastPage) {
            $this->middleNumbers .= '
                <li class="page-item">
                    <a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$sub1.'">
                        '.$sub1.'
                    </a>
                </li>
            ';
            $this->middleNumbers .= '
                <li class="page-item active">
                    <a>
                        '.$this->page.'
                    </a>
                </li>
            ';
            $this->middleNumbers .= '
                <li class="page-item">
                    <a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$add1.'">
                        '.$add1.'
                    </a>
                </li>
            ';
        }

        $limit = 'LIMIT '.($this->page-1) * $this->perPage . ',' . $this->perPage;

        $query2 = $database->query("SELECT * FROM products $limit");
        $database->confirm($query2);

        $outputPagination = "";

        // if($lastPage != "1"){
        //     echo "Page $this->page of $lastPage"
        // }

        if($this->page != 1){
            $prev = $this->page - 1;

            $outputPagination .= '
                <li class="page-item">
                    <a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$prev.'">
                        Back
                    </a>
                </li>
            ';
        }
        
        $outputPagination .= $this->middleNumbers;

        if($this->page != $this->lastPage){
            $next = $this->page + 1;

            $outputPagination .= '
                <li class="page-item">
                    <a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$next.'">
                        Next
                    </a>
                </li>
            ';
        }
    }

    function products_perPage(){
        global $database;

        $limit = 'LIMIT '.($this->page-1) * $this->perPage . ',' . $this->perPage;

        $query = $database->query("SELECT * FROM products $limit");
        $database->confirm($query);

        while($row = utility::fetch_array($query)){
            $product_image = utility::display_image($row['product_image']);

$product = <<<DELIMETER

<div class="col-sm-4 col-lg-4 col-md-4">
    <div class="thumbnail">
        <a href="item.php?id={$row["product_id"]}">
            <img style="height: 90px;" src="../resources/{$product_image}" alt="">
        </a>
        <div class="caption">
            <h4 class="pull-right">&#36;{$row['product_price']}</h4>
            <h4><a href="product.html">{$row['product_title']}</a>
            </h4>
            <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
        </div>
        <a class="btn btn-primary" href="../resources/cart.php?add={$row["product_id"]}">Add To Cart</a>
    </div>
</div>

DELIMETER;
            echo $product;
        }

    }

    function pagination_numbers(){

        $outputPagination = "";

        if($this->page != 1){
            $prev = $this->page - 1;

            $outputPagination .= '
                <li class="page-item">
                    <a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$prev.'">
                        Back
                    </a>
                </li>
            ';
        }
        
        $outputPagination .= $this->middleNumbers;

        if($this->page != $this->lastPage){
            $next = $this->page + 1;

            $outputPagination .= '
                <li class="page-item">
                    <a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$next.'">
                        Next
                    </a>
                </li>
            ';
        }
        echo '<div style="clear:both" class="text-center">';
        echo "<ul class='pagination'>{$outputPagination}</ul>";
        echo '</div>';        
    }
}

?>