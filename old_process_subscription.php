<?php
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);

    include_once './app_includes/PHPMailer/POP3.php';
    include_once './app_includes/PHPMailer/SMTP.php';
    include_once './app_includes/PHPMailer/Exception.php';
    include_once './app_includes/PHPMailer/PHPMailer.php';

    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    // validation expected data exists

    if(!isset($_POST['email'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }


    // include_once './app_includes/db_connect.php';

    // $mysqli->query("SET NAMES 'utf8'");
    // $stmt = $mysqli->prepare("INSERT INTO subscribers (date_start, firstname, lastname, email, notes, category, last_modified) VALUES (NOW(),?,?,?,?,?,NOW())") or die(mysqli_error($mysqli));
    // $stmt->bind_param('sssss', $_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['notes'], $_POST['category']) or die(mysqli_error($mysqli));
    // $stmt->execute();
    // $subscriber_id = $mysqli->insert_id;
    // $stmt->close();

    // include_once './app_includes/db_close.php';

    //
    // Send Form Email.
    //
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }

    define(NEWSLETTER_CATEGORY, 3);


    $email_to = "amanda@manhattanmanor.com";
    $email_cc = "amandapilarsmith@icloud.com";
    // $email_to = $_POST['email'];
    $email_subject = "Manhattan Manor - Web Contact";
    $email_from = "info@manhattanmanor.com";
    $email_replyto = $_POST['email'];

    $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
    $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
    $company = isset($_POST['company']) ? $_POST['company'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $eventdate = isset($_POST['eventdate']) ? $_POST['eventdate'] : '';
    $eventtime = isset($_POST['eventtime']) ? $_POST['eventtime'] : '';
    $guests = isset($_POST['guests']) ? $_POST['guests'] : '';
    $eventtype = isset($_POST['eventtype']) ? $_POST['eventtype'] : '';
    $notes = isset($_POST['notes']) ? $_POST['notes'] : '';
    $subscribe = isset($_POST['subscribe']);

    $category = isset($_POST['category']) ? $_POST['category'] : '';

    if ($category == NEWSLETTER_CATEGORY) {
        $email_subject = "MCNYC - Newsletter Subscription";
    }

    // validation correct data
    
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
    
    if(!preg_match($email_exp,$email_replyto)) {
        $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
    }
    
    $string_exp = "/^[A-Za-z .'-]+$/";
    
    // if(!preg_match($string_exp,$firstname)) {
    //     $error_message .= 'The First Name you entered does not appear to be valid.<br />';
    // }
    
    // if(!preg_match($string_exp,$lastname)) {
    //     $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
    // }
    
    // if(strlen($notes) < 2) {
    //     $error_message .= 'The Comments you entered do not appear to be valid.<br />';
    // }
    
    if(strlen($error_message) > 0) {
        died($error_message);
    }
        
    function clean_string($string) {
        $bad = array("content-type","bcc:","to:","cc:","href");
        return str_replace($bad,"",$string);
    }        

    $email_message = '';
    $email_message .= "<table>";
    $email_message .= "<tr><td>First Name&nbsp;</td><td>".clean_string($firstname)."</td></tr>";
    $email_message .= "<tr><td>Last Name&nbsp;</td><td>".clean_string($lastname)."</td></tr>";
    $email_message .= "<tr><td>Company&nbsp;</td><td>".clean_string($company)."</td></tr>";
    $email_message .= "<tr><td>Email&nbsp;</td><td>".clean_string($email_replyto)."</td></tr>";
    $email_message .= "<tr><td>Phone&nbsp;</td><td>".clean_string($phone)."</td></tr>";
    $email_message .= "<tr><td>Event Date&nbsp;</td><td>".clean_string($eventdate)."</td></tr>";
    $email_message .= "<tr><td>Event Time&nbsp;</td><td>".clean_string($eventtime)."</td></tr>";
    $email_message .= "<tr><td>Guests&nbsp;</td><td>".clean_string($guests)."</td></tr>";
    $email_message .= "<tr><td>Event Type&nbsp;</td><td>".clean_string($eventtype)."</td></tr>";
    $email_message .= "<tr><td>Notes&nbsp;</td><td>".clean_string($notes)."</td></tr>";
    $email_message .= '<tr><td>Subscribe&nbsp;</td><td>'.(($subscribe) ? 'Yes' : 'No')."</td></tr>";
    $email_message .= "</table>";

// RECAPTCHA
// Validate recaptcha server-side
$response = $_POST["g_captcha"];
$url = 'https://www.google.com/recaptcha/api/siteverify';
$data = array(
	'secret' => '6Ldo4cMbAAAAAMu5PVHNdfiUwhiSJWoqe7I0xumc',
	'response' => $_POST["g_captcha"]
);
$options = array(
	'http' => array (
		'method' => 'POST',
		'content' => http_build_query($data)
	)
);
$context  = stream_context_create($options);
$verify = file_get_contents($url, false, $context);
$captcha_success=json_decode($verify);
if ($captcha_success->success==false) {
	$passed = "no";
} else if ($captcha_success->success==true) {
	$passed = "yes";
}
// END RECAPTCHA
if ($passed == "yes") {
    if (true) {
        // Use mail() for sending the email.

        // create email headers
        // $headers = 
        //     'From: '.$email_from."\r\n".
        //     'Reply-To: '.$email_replyto."\r\n".
        //     'Content-Type:text/html;charset=utf-8'."\r\n".
        //     'X-Mailer: PHP/'.phpversion();

        $headers = array(
            'From' => $email_from,
            'Reply-To' => $email_replyto,
            'Cc' => $email_cc,
            'Content-Type' => 'text/html;charset=utf-8',
            'X-Mailer' => 'PHP/'.phpversion()
        );

        mail($email_to, $email_subject, $email_message, $headers);

        // header('Location: thankyou.php');

    } else {

        // Use PHPMailer for sending the email.

        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            //$mail->SMTPDebug = 2;                               // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Host = 'cloud.hostnetx.com';                      // Specify main and backup SMTP servers
            $mail->Username = $email_from;                   // SMTP username
            $mail->Password = 'O52APAwo@k99';                         // SMTP password
            //$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
            //$mail->Port = 587;                                    // TCP port to connect to
            //$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            //$mail->Port = 587;                                    // TCP port to connect to
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
    
            //Recipients
            $mail->setFrom($email_from);
            $mail->addAddress($email_to);                          // Name is optional
            $mail->addReplyTo($email_replyto);
            //$mail->addCC('carlosvassallo@gmail.com');
    
            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->CharSet = 'UTF-8';
            $mail->Subject = $email_subject;
            $mail->Body    = $email_message;
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
            $mail->send();

            // header('Location: thankyou.php');
    
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
}

?>
