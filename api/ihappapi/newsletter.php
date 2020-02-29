
<?php
    if (isset($_POST['subscribetonewsletter'])) {
        $email = trim(strip_tags($_POST['e-mail']));
        $company = "sharonsang6@gmail.com";
        $message="I have subscribed to your newsletter";

        ini_set('SMTP', 'smtp.mailgun.org');
        $to = $company;
        $from = $email;
        $headers = "From : " . $from;
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        $message = $message;
        
        try {
            if(mail($to,$message,$headers)){
            $alert = "Email sent";          
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        


    }
?>