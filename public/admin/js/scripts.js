$(document).ready(function(){
    $(".image_container, 
      .del_seoHeader, 
      .del_product").click(function(){

        var user_input;

        location.reload();
        return user_input = confirm("Are you sure you want to delete this slide?");
    });
});