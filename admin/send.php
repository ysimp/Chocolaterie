        <!--=============================================================================================================== -->
        <!--========================== page :  SCRIPT ENVOYER UN  EMAIL       ========================= -->
        <!--========================== parametre :  email destination , object et le message   ================= --> 
        <!--========================== traitement  :  bibliotheque PHPMAILER   ========== -->  
        <!--==========================  appeler fonction sendmail  :       ======= -->                          
        <!-- =============================================================================================================== --> 


<?php

	require_once('phpMailer/PHPMailerAutoload.php');

	function sendmail($email,$object,$message){

		$mail = new PHPMailer;
		$mail->isSMTP();                                   // Set mailer to use SMTP
		$mail->SMTPAuth=true;                             // Enable SMTP authentication re

		$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->Port = '465';                                    // TCP port to connect to

		$mail->isHTML();                                  // Set email format to HTML

		$mail->Username = 'abdrahmane.elmahjoub@gmail.com';        //  a modifier : ton compte gmail 
		$mail->Password = 'M2233a9115';                           // a modifier :  gmail  password


		$mail->setFrom('abdrahmane.elmahjoub@gmail.com');  // emetteur 

		$mail->Subject =$object ;   /*'Here is the subject'*/
		$mail->Body    = $message; /* message */

		$mail->addAddress($email);    //mahjoubwel@gmail.com           // email candidat

		//$mail->SMTPDebug = 2;

		if(!$mail->send()) {
		    echo 'Message could not be sent.';
		    echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
		     
		}
	}
?>