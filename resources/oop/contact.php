<?php

class contact {

    public $to = "YOUR_EMAIL@gmail.com";
    public $from_name;
    public $subject;
    public $email;
    public $message; 

    function __construct(){
        if(isset($_POST['submit'])){
            $this->from_name  = $_POST['name'];
            $this->subject    = $_POST['subject'];
            $this->email      = $_POST['email'];
            $this->message    = $_POST['message'];
            
            $this->send_message();
        }
    }

    function send_message(){
        $to         = $this->to;
        $subject    = $this->subject;
        $message    = $this->message;
        $from_name  = $this->from_name;
        $email      = $this->email;

        $headers = "From: {$from_name} {$email}";

        $result = mail($to, $subject, $message, $headers);

        if(!$result){
            set_message("Sorry we could not send your message.");
            redirect("contact.php");
        } else {
            set_message("Your message has been sent.");
        }
    }
}





?>