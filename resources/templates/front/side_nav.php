<div class="col-md-3">
    <p class="lead">Shop Name</p>
    <div class="list-group">

        <?php

            get_categories(); 

            // $query = "SELECT * FROM categories";
            // $send_query = mysqli_query($connection, $query);

            // //Checking if the query fails or not. 
            // if(!$send_query){  
            //     die("QUERY FAILED " . mysqli_error($connection));
            // }

            // while($row = mysqli_fetch_array($send_query)){
            //     echo "<a href='' class='list-group-item'>{$row['cat_title']}</a>";
            // }


        ?>


    </div>
</div>