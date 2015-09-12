<?php

# request sent using HTTP_X_REQUESTED_WITH
if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) ){
	if (isset($_POST['name']) AND isset($_POST['email']) AND isset($_POST['message']) AND isset($_POST['phone'])) {
		$to = 'foto@olganoga.com';

		$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
		$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $phone = filter_var($_POST['phone'], FILTER_SANITIZE_EMAIL);
		$subject = 'Nowa wiadomość';
		$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
		$sent = email($to, $email, $name, $subject, $message);
		email($to, $email, $name, $subject, $message);
        
        echo $sent;
        if ($sent) {
			echo 'Wiadomość wysłana!';
		} else {
			echo 'Wystąpił błąd podczas wysyłania';
            echo "Do ".$to."<br />";
            echo "Imie: ".$name."<br />";
            echo "Email: ".$email."<br />";
            echo "Numer ".$phone."<br />";
            echo "Temat: ".$subject."<br />";
            echo "Wiadomość: ".$message."<br />";
            echo "Sent: ".$sent."<br />";
		}
	}
	else {
		echo 'Wszystkie pola są wymagane :\)';
	}
	return;
}

/**
 * email function
 *
 * @return bool | void
 **/
function email($to, $from_mail, $from_name, $subject, $message){
	$header = array();
	$header[] = "MIME-Version: 1.0";
	$header[] = "From: {$from_name}<{$from_mail}>";
	/* Set message content type HTML*/
	$header[] = "Content-type:text/html; charset=iso-8859-1";
	$header[] = "Content-Transfer-Encoding: 7bit";
	if( mail($to, $subject, $message, implode("\r\n", $header)) ) return true; 
}
?>