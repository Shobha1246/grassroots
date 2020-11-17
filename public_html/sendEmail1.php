<?php


// if(!isset($_SESSION)) {
//     session_start();
// }

require_once './PHPMailer-master/class.phpmailer.php';
require_once './PHPMailer-master/class.smtp.php';

// unset($_SESSION['error1']);

	$name =$_POST['txtname'];

	$phone=$_POST['txtphone'];

	$email  =$_POST['txtemail'];

    $message1=$_POST['txtmessage1'];
    
   // $encrypted = $_POST['txtencryptedCode'];


	sendMyEmail($name, $phone, $email, $message1);          



function sendMyEmail($name, $phone, $email, $message1)
{    
    // echo " Inside Send Email Function";
   // $encrypted = $_SESSION['encrypted'];
    $encrypted = "1";
   
    if($encrypted == "1") //"5sagas$#672hhj*&h248844^")
    {        
        // EMail Communication 
   
        $mail = new PHPMailer;

        $mail->isSMTP();               // Set mailer to use SMTP

    //    echo "Here";
    
        // $mail->Host = 'mail.grassrootsbpo.in';
        // $mail->Host = '182.73.236.52';   // Specify main and backup SMTP servers
        
        $mail->Host = 'mail.grassrootsbpo.in';
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'webrequest@grassrootsbpo.in';                 // SMTP username
        $mail->Password = 'W$b%$@u#$1';   
        $mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl' also accepted
        $mail->Port = '465';
        
        $mail->From = 'webrequest@grassrootsbpo.in';
        $mail->FromName = 'Grassroots Website Request';
//               
   //     $mail->SMTPDebug = 4;
        
        $mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
			)
		);
        
        //Set who the message is to be sent from
          
//        $mail->setFrom('lennarcrm@grassrootsbpo.com', 'Lennar CRM');
//
//        //Set an alternative reply-to address
//        $mail->addReplyTo('lennarcrm@grassrootsbpo.com', 'Lennar CRM');

        //Set who the message is to be sent to
        
        $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
        $mail->isHTML(true);                                  // Set email format to HTML

        
		
		$email1 = "abhay@grassrootsbpo.com";
        $name1 = "Abhay";
    //    $mail->addCC('avinash.raina@grassrootsbpo.com');
          
        $mail->addAddress($email1,$name1);

        $mail->addReplyTo('webrequest@grassrootsbpo.in', 'Grassroots Website Request');
        
        
        // $mail->addCC('info@grassrootsbpo.com');
        // $mail->addCC('deepak.kesari@grassrootsbpo.com');
        // $mail->addCC('veema.t@grassrootsbpo.in');
		// $mail->addCC('vinston@grassrootsbpo.com');
		// $mail->addCC('abhay@grassrootsbpo.com');
        
               
       

        $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Grassroots Website Request from '.$name;
		
		$message = '<html><body> Dear Team, <br>Please action the new Website Request. Details as below:<br><br>';
			$message .= '<table rules="all" style="border-color: #666;" cellpadding="5">';
			$message .= "<tr style='background: #eee;'><td><strong>Full Name</strong> </td><td>" . $name. "</td></tr>";
			$message .= "<tr><td><strong>Email ID</strong> </td><td>" . $email . "</td></tr>";
			$message .= "<tr><td><strong>Phone Number</strong> </td><td>" . $phone . "</td></tr>";
			$message .= "<tr><td><strong>Message</strong> </td><td>" .$message1 . "</td></tr>";
			$message .= "</table>";
			$message .= "</body></html>";
		
		$mail->Body    = $message;

        if(!$mail->send()) {
			echo "Mailer Error: " . $mail->ErrorInfo;
			echo "<br><br><a href='./'>Back to Grassroots BPO Website</a>";
			 // header('Location: index.html');
        } 
        else 
        {
			header('Location: ./');
        }
    }
}

?>