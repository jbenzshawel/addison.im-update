<?php      
/**
 * Email script form addison.im
 * Author: Addison Benzshawel
 */
ini_set('display_errors', 'On');

require_once 'vendor/swiftmailer/swiftmailer/lib/swift_required.php';


function verify_inputs_and_send($i_name, $i_email, $i_message){
    $name = ( isset($i_name) ) ? htmlspecialchars($i_name, ENT_QUOTES) : false;
    $email = ( filter_var($i_email, FILTER_VALIDATE_EMAIL) ) ? htmlspecialchars($i_email, ENT_QUOTES) : false;
    $message = (isset($i_message) ) ? htmlspecialchars($i_message, ENT_QUOTES) : false;
    // if valid input send email
    if(!$email or !$name or !$message){
        return array('result' => 'invalid params', 'status' => FALSE);
    } else {
        $email_result = send_contact_email($name, $email, $message);
        return array('result' => $email_result["result"], 
                        'status' => strpos($email_result["result"], "Thanks") !== false, 
                        'exception' => $email_result["exception"]);
    }
} 

function send_contact_email($name, $email, $message){
    $date = date('l jS \of F Y h:i:s A');
    $htmlMessage = '<html>'.
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
    // create swift message
    $message = Swift_Message::newInstance()
    ->setSubject("Question from $name on addison.im Contact Form")
    ->setFrom(array('donotreply@addison.im' => 'Do not reply'))
    ->setTo(array('jbenzshawel@gmail.com'))
    ->setBody($htmlMessage, 'text/html');
    // configure smtp
    $transport = Swift_SmtpTransport::newInstance('localhost', 587);
    $mailer = Swift_Mailer::newInstance($transport);
    $exception = false;
    $errorMessage = "";
    $emailResult = 0;
    // try and send message 
    try {
        // send returns number of messages sent 
        $emaiResult = $mailer->send($message);        
    } catch (Exception $ex) {
        $exception = true;
        $errorMessage = 'Caught exception: ' .  $ex->getMessage();
    }
    $arrayRtn = array("exception" => "");
    if($emailResult > 0 && !$exception){
        $arrayRtn["result"] = "Thanks! Your message has been sent.";
    } else {
        $arrayRtn["result"] = "Error: Something went wrong";
        $arrayRtn["exception"] = $errorMessage;
    }
    return $arrayRtn;
}

// return results for ajax request  
if(!empty($_POST)) {
    $emailResult = verify_inputs_and_send($_POST['name'], $_POST['email'], $_POST['message']);            
    if (isset($emailResult)) {
        echo json_encode($emailResult);
    } else { // end if !empty($_POST)
        echo json_encode(array("result" => "Error: Something went wrong", 
                                "exception" => "Empty function result", 
                                "status" => false));
    } // end else 
}  