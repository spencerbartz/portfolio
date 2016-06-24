<?php
		$to = "spencerbartz@gmail.com";
		$usrname = "no name";
		$email = "no email";
		$subject = "no subject";
		$message = "empty";
		
		
		if(isset($_POST["name"]))
		{
			$usrname = $_POST["name"];
		}
		
		
		if(isset($_POST["email"]))
		{
			$email = $_POST["email"];
		}

		if(isset($_POST["subject"]))
		{
			$subject = $_POST["subject"];
		}

		if(isset($_POST["message"]))
		{
			$message = $_POST["message"];
		}
		
	
		$headers = "From:" . $email; //.   'Reply-To: ' . $email . "\r\n" . 'X-Mailer: PHP/' . phpversion();
		
		$ip = "unknown";
		$browser = "unknown";
		$referer = "unknown";
		if(isset($_SERVER['REMOTE_ADDR']))
		{
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		
		if(isset($_SERVER['HTTP_USER_AGENT']))
		{
			$browser = $_SERVER['HTTP_USER_AGENT'];
		}
		
		if(isset($_SERVER['HTTP_REFERER']))
		{
			$referer = $_SERVER['HTTP_REFERER'];
		}
		
		$message = "REFERER : " . $referer . "\n" . $message;
		$message = "BROWSER : " . $browser . "\n" . $message;
		$message = "IP : " . $ip . "\n" . $message;
		$message = "SUBJECT : " . $subject . "\n" . $message;
		$message = "EMAIL : " . $email . "\n" . $message;
		$message = "NAME : " . $usrname . "\n" . $message;
		
		
		if(mail($to, $subject, $message, $headers))
        	{
        		echo "Success";
    
        	}
        	else
        	{
        		echo "Failure";
        	}

?>