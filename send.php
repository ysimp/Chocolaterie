<?php
	require_once('phpMailer/PHPMailerAutoload.php');

	function sendmail($nom,$email,$object,$message){

		$mail = new PHPMailer;
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->SMTPAuth=true;                             // Enable SMTP authentication re

		$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->Port = '465';                                    // TCP port to connect to

		$mail->isHTML();                                  // Set email format to HTML

		$mail->Username = 'abdrahmane.elmahjoub@gmail.com';                 //  a modifier : ton compte gmail le compte  
		$mail->Password = 'M2233a9115';                           // a modifier :  gmail  password


		$mail->setFrom('abdrahmane.elmahjoub@gmail.com');

		$mail->Subject =$object ;   /*'Here is the subject'*/
		$mail->Body    = 'Ce message a ete envoye par'.$nom.'/br'.' d\'addresse mail :'.$email.'/br'.'Contenu :'.$message;

		$mail->addAddress('yaya.simpara.5@gmail.com');    //mahjoubwel@gmail.com           // Le Compte du secretaire celui qui recevera le mail a prendre dans la base de donnees

		//$mail->SMTPDebug = 2;



		if(!$mail->send()) {
		    echo 'Message could not be sent.';
		    echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
		    echo 'Message has been sent';
		}
	}
?>