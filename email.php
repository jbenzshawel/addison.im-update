<?php      
/**
 * Email script form addison.im
 * Author: Addison Benzshawel
 */

function verify_inputs_and_send($i_name, $i_email, $i_message){
    $name = ( isset($i_name) ) ? htmlspecialchars($i_name, ENT_QUOTES) : false;
    $email = ( filter_var($i_email, FILTER_VALIDATE_EMAIL) ) ? htmlspecialchars($i_email, ENT_QUOTES) : false;
    $message = (isset($i_message) ) ? htmlspecialchars($i_message, ENT_QUOTES) : false;
    // if valid input send email
    if(!$email or !$name or !$message){
        return array('result' => 'invalid params', 'status' => FALSE);
    } else {
        $email_result = send_contact_email($name, $email, $message);
        return array('result' => $email_result, 'status' => TRUE);
    }
} 

function send_contact_email($name, $email, $message){
        $date = date('l jS \of F Y h:i:s A');
        $subject = "Question from $name on addison.im Contact Form";
        $backup_email = "jbenzshawel@gmail.com";
        $html_message = '<html>'.
                                        '<head>' .
                                        '<title>addison.im Question</title>' .
                                        '</head>'.
                                        '<body>'.
                                        '<h1>New email from addison.im Contact Form!</h1>'.
                                        "<p>$date</p>".
                                        "<p> $message</p>" .
                                        "<p>From,<br/><br/>$name<br/>".
                                        '<a href="mailto:' . $email . '">' . $email . '</a></p>' .
                                        '</body>'.
                                        '</html>';
        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Send email
        $to_recipients = "$backup_email";
        $email_result = mail($to_recipients, $subject, $html_message, $headers);
        if($email_result){
                return "Thanks! Your message has been sent.";
        } else {
                return "Error: Something went wrong";
        }
}

// return results for ajax request  
if(!empty($_POST)) {
    $emailResult = verify_inputs_and_send($_POST['name'], $_POST['email'], $_POST['message']);            
    if (isset($emailResult)) {
        echo json_encode($emailResult);
    }
}  