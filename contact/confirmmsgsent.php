<?php
	include '../util/util.php';
	print_page_dec(__FILE__);
?>

<title><?php echo _("Spencer Bartz - Portfolio Website"); ?></title>
</head>
<body>
<!-- header starts here -->
<div id="header">
  <div id="header-content">
  <?php
  	print_header(__FILE__);
  ?>
  </div>
</div>
<!-- navigation starts here -->
<div id="nav-wrap">
  <div id="nav">
<?php
	print_nav(__FILE__);
?>
  </div>
</div>
<!-- content-wrap starts here -->
<div id="content-wrap">
  <div id="content">

      <!-- Right side search box area -->
    <div id="sidebar" >
      <div class="sidebox" id="searchbox">
	<?php print_search_box(__FILE__) ?>
      </div>
      <div class="sep"></div>
    </div>
    
    <!-- Left Side (Main Content)-->
    <div id="main">
      <div class="box">
        <h1><?php echo _('Welcome to <span class="white">spencerbartz.com</span>'); ?></h1>
        <p>
        <?php 
//http://element-80.com/2010/11/php-tutorial-how-to-sanitize-form-data/#sthash.s1fuFP0L.dpuf
function check_input($data) 
{
	$mysqli =  get_mysqli_connection("forumdb");
	$dataforumdb = trim($data); 
	$data = stripslashes($data); 
	$data = htmlspecialchars($data); 
	$data = $mysqli->real_escape_string($data);
	return $data; 
}
        	$to = "spencerbartz@gmail.com";
        	$keys = array("name", "email", "subject", "message", "userresult");
        	
        	//Make sure contents of msg are not empty (i.e. a request was made to this page without posting the form)
        	for($i = 0; $i < count($keys); $i++)
        	{
        		if(isset($_POST[ $keys[$i] ] ))
        		{
        			eval('$' . $keys[$i] . ' = ' . 'check_input($_POST["' . $keys[$i] . '"]);');
				}
				else
				{
					echo _('ERROR: No input provided');
					echo _('<meta HTTP-EQUIV="refresh" content="0; url=http://www.spencerbartz.com/contact/contactresume.php">');
					die();
				}
        	}
		
		if($_POST["result"] !== $_POST["userresult"])
		{
			echo _('ERROR: Incorrect input');
			echo _('<meta HTTP-EQUIV="refresh" content="2; url=http://www.spencerbartz.com/contact/contactresume.php">');
			die();
		}
		
		$headers = "From:" . "automailer@spencerbartz.com";
		$ip = $_SERVER["REMOTE_ADDR"];
		$browser = $_SERVER["HTTP_USER_AGENT"];
		$referer = $_SERVER["HTTP_REFERER"];
		
		//If the text message checkbox was checked, send the message to my phone as well.
		if(isset($_POST["txtmsg"]))
			$to .= ",8058862293@txt.att.net";
		
		if ($referer == "")
			$referer = "NONE";
		
		$message = "EMAIL: " . $email . "\n" . "NAME: " . $name . "\n" . "IP: " . $ip . "\n" . "BROWSER: " . $browser . "\n" . "REFERER: " . $referer . "\n" . "MESSAGE BODY:\n" . $message;
		
		if(mail($to, $subject, $message, $headers))
        	{
        		echo _("<strong>Message sent successfully!</strong><br/>");
        		echo _("<strong>Redirecting...</strong><br/>");
        		echo _('<meta HTTP-EQUIV="refresh" content="2; url=http://www.spencerbartz.com/contact/contactresume.php">');
        	}
        	else
        	{
        		echo _("<strong>Failed to send message.</strong><br/>");
        	}
        ?>
        </p>
        <p>
        </p>
        <p class="post-footer align-right"><span class="date"><?php last_updated(__FILE__); ?></span></p>
      </div>
    </div>

    <!-- content-wrap ends here -->
  </div>
</div>
<!-- footer starts here-->
<div id="footer-wrap">
  <div id="footer-columns">
  	<?php
  		print_footer(__FILE__);
  	?>
  </div>
  <!-- footer ends-->
</div>
</body>
</html>
