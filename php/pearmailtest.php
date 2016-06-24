<?php

include('Mail.php');
include ('Mail/mime.php');

/*
$recipients = 'spencerbartz@gmail.com';

$headers['From'] = 'automailer@spencerbartz.com';
$headers['To'] = 'spencerbartz@gmail.com';
$headers['Subject'] = 'Sending test message using Pear'; 

$body = 'HORRIE';

$params['sendmail_path'] = '/usr/sbin/sendmail -t -i';

$mail =& Mail::factory('mail', $params);

$result = $mail->send($recipients, $headers, $body);
echo "THE RESULT!!!! <br/>";
var_dump($result);

echo "blah!!!! <br/>";
*/



$text = 'Text version of email';
$html = '<html><body><h1><font color="red">HTML version of email</font></body></html>';
$file = 'workspace.zip';
$crlf = "\n";

$hdrs = array(
              'From'    => 'automailer@spencerbartz.com',
              'Subject' => 'TESTING MIME',
              'Content-Type' => 'multipart/mixed'
              //'Content-Type' => 'text/html'
              );

$mime = new Mail_mime(array('eol' => $crlf));
echo "blah!!!! <br/>";
$mime->setTXTBody($text);
$mime->setHTMLBody($html);
$mime->addAttachment($file, 'application/octet-stream');
$body = "";
$body = $mime->get();
$hdrs = $mime->headers($hdrs);
echo "blah!!!! <br/>";

$params['sendmail_path'] = '/usr/sbin/sendmail -t -i';
$mail =& Mail::factory('mail', $params);
$result2 = $mail->send('spencerbartz@gmail.com', $hdrs, $body);
echo "THE RESULT2!!!! <br/>";
var_dump($result2);
?>