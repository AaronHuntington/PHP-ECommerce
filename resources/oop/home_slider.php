<?php

class home_slider {

    public function __construct(){
        $this->get_active_slide();
        $this->get_slides();
    }

    //5/15/17 - Not using slider_html(), tried to get it to work but no luck. 
    public function slider_html(){
$slider_html = <<< DELIMETER
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      {$this->get_active_slide()}
      {$this->get_slides()}
    </div>
    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
</div>
DELIMETER;
        echo $slider_html;
    } //slider_html()

    public function get_slides(){
        global $database;

        $query = $database->query("SELECT * FROM slides");
        $database->confirm($query);

        while($row = utility::fetch_array($query)){

            $slide_image = display_image($row['slide_image']);

$slides = <<< DELIMETER
<div class="item">
    <img class="slide-image" src="../resources/{$slide_image}" alt="">
</div>
DELIMETER;

            echo $slides;
        }
    }//get_slides()

    public function get_active_slide(){
        global $database;

        $query = $database->query("SELECT * FROM slides ORDER BY slide_id DESC LIMIT 1");
        $database->confirm($query);

        while($row = utility::fetch_array($query)){

            $slide_image = display_image($row['slide_image']);

$slide_active = <<< DELIMETER

<div class="item active">
    <img class="slide-image" src="../resources/{$slide_image}" alt="">
</div>
    

DELIMETER;

            echo $slide_active;
        }
    }//get_active_slide()
}//class home_slider


?>