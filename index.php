<?php
	include 'php/util.php';
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
        <h1><?php echo _('Welcome to <span class="white">spencerbartz.com</span>'); ?></h1>
        <p>
        <?php 
        	echo _("This site is a compilation of some of my programming projects in PHP, SQL, Java, Javascript, and more to come. "); 
        	echo _("Web based projects can be run without installing additional software. Java however requires installation of ");
        	echo _("a separate runtime environment. Links to those downloads can be found at the bottom of the page. ");
		echo _("The site itself is written in PHP with a MySQL database for the back end, and Javascript/AJAX, CSS3, and a peppering of JQuery ");
		echo _("for the front end. (While I do like to write my JS from scratch, browser compatibility eventually becomes quite a time burglar). ");
		echo _('The original CSS template was taken from <a href="http://www.styleshout.com">www.styleshout.com</a> and has been altered to ');
		echo _("meet the aesthetic and functional requirements of this website.");
		echo _("<br/>");
		echo _('<strong>NOTE: The site is a work in progress. If something doesn\'t work right, feel free to contact me.</strong>');
        ?>
        </p>
        <p class="post-footer align-right"><span class="date"><?php lastUpdated(__FILE__); ?></span> </p>
      </div>

	<?php
		printNews();	
	?>
      
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
