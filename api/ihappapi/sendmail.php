<?php
    if (isset($_POST['mailsend'])) {
        $name = trim(strip_tags($_POST['name']));
        $email = trim(strip_tags($_POST['email']));
        $Subject = trim(strip_tags($_POST['subject']));
        $message = trim(strip_tags($_POST['message']));
        $company = "sharonsang6@gmail.com";


        ini_set('SMTP', 'smtp.mailgun.org');
        $to = $company;
        $from = $email;
        $subject = $Subject;
        $headers = "From : " . $from;
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        $message = $message;
        
        try {
            if(mail($to,$subject,$message,$headers)){
            $alert = "Email sent";          
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        


    }
?>