<?php
	include '../php/util.php';
	$curLang = "en";
	if(isSet($_GET["locale"]))
		$curLang = "jp";
	
	if(strcmp($curLang, "jp") === 0)
		changeLanguage();
		
	printPageDec(__FILE__);
?>

<title><?php echo _("Spencer Bartz - Portfolio Website"); ?></title>
</head>

<?php
	//Check to see if this page is being searched for a string.
	//If so, call the js highlighting function after page loads.
	if(isset($_GET['searchstr']))
		echo '<body onload="selectSearchWords(\'' . $_GET['searchstr'] . '\')">';
	else
		echo '<body>';
?>
	<div id="overlay"></div>
<!-- header starts here -->
<div id="header">
  <div id="header-content">
  <?php
  	printHeader(__FILE__);
  ?>
  </div>
</div>
<!-- navigation starts here -->
<div id="nav-wrap">
  <div id="nav">
<?php
	printNav(__FILE__);
?>
  </div>
</div>
<!-- content-wrap starts here -->
<div id="content-wrap">
  <div id="content">
  
    <!-- Right side search box area -->
    <div id="sidebar" >
      <div class="sidebox" id="searchbox">
	<?php printSearchBox(__FILE__) ?>
      </div>
      <div class="sep"></div>
    </div>
    
    <!-- Left Side (Main Content)-->
    <div id="main">
      <div class="box">
        <h1>Java Application <span class="white">Projects</span></h1>
        <p>
        <?php
		echo _('This page contains links downloads for Desktop Applications I have created in the Java programming language. ');
		echo _('To run them you will first need to download the corresponding .jar file, and you will need the <a href="https://java.com/getjava">JRE</a> installed. ');
		echo _('If your system is configured correcty you will only need to double click the .jar file to make the application run. Otherwise you may open a command prompt ');
		echo _('and run the application using the following method from the command line: $java -jar filename.jar');
	?>
        </p>
        <p class="post-footer align-right"><span class="date"><?php lastUpdated(__FILE__); ?></span></p>
      </div>
      
      
      <div class="box">
        <h1>Latest <span class="white">Projects</span></h1>
	<?php
		printProjectLinks();
	?>
      </div>
      <br />
    </div>
    <!-- content-wrap ends here -->
  </div>
</div>

<!-- footer starts here-->
<div id="footer-wrap">
  <div id="footer-columns">
	<?php
		printFooter(__FILE__);
	?>
  </div>
  <!-- footer ends-->
</div>
</body>
</html>
