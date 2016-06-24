<?php
    $filename = "mate.png";
    $file_size = filesize($filename);
    $handle = fopen($filename, "r");
    $content = fread($handle, $file_size);
    fclose($handle);
    $content = chunk_split(base64_encode($content));

    // a random hash will be necessary to send mixed content
    $separator = md5(time());

    // carriage return type (we use a PHP end of line constant)
    $eol = PHP_EOL;

    // main header (multipart mandatory)
    $headers = "From: name <test@test.com>" . $eol;
    $headers .= "MIME-Version: 1.0" . $eol;
    $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol . $eol;
    $headers .= "Content-Transfer-Encoding: 7bit" . $eol;
    $headers .= "This is a MIME encoded message." . $eol . $eol;

    // message
    $headers .= "--" . $separator . $eol;
    $headers .= "Content-Type: text/plain; charset=\"iso-8859-1\"" . $eol;
    $headers .= "Content-Transfer-Encoding: 8bit" . $eol . $eol;
    $headers .= $message . $eol . $eol;

    // attachment
    $headers .= "--" . $separator . $eol;
    $headers .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"" . $eol;
    $headers .= "Content-Transfer-Encoding: base64" . $eol;
    $headers .= "Content-Disposition: attachment" . $eol . $eol;
    $headers .= $content . $eol . $eol;
    $headers .= "--" . $separator . "--";

    //SEND Mail
     if (mail("spencerbartz@gmail.com", "attachment test", "", $headers)) {
        echo "mail send ... OK"; // or use booleans here
      } else {
        echo "mail send ... ERROR!";
      }
?>