<?php
	include 'php/util.php';
	print_page_dec(__FILE__);
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
        <h1><?php println(_('Welcome to <span class="white">spencerbartz.com</span>')); ?></h1>
        <p>
        <?php 
        	$desc = _("This site is a compilation of some of my programming projects in PHP, SQL, Java, Javascript, and more to come. " .
        	"Web based projects can be run without installing additional software. Java and Python however require installation of " .
        	"a separate runtime environment. Links to those downloads can be found at the bottom of the page. " .
			"The site itself is written using PHP, JavaScript, and MySQL. " .
			"I changed the original CSS, taken from <a href=\"http://www.styleshout.com\">styleshout.com</a> , to " .
			"meet the aesthetic and functional requirements of this website. <br/>" .
		   "<strong>This site is a work in progress. If something doesn't work right, feel free to report a bug!</strong>");
			
			println($desc);
        ?>
        </p>
        <p class="post-footer align-right"><span class="date"><?php last_updated(__FILE__); ?></span> </p>
      </div>

	<?php
		print_news();	
	?>
      
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
