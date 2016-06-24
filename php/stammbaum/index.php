<?php
	include '../util.php';
	include 'sbutil.php';
	$curLang = "en";
	if(isSet($_GET["locale"]))
		$curLang = "jp";
	
	if(strcmp($curLang, "jp") === 0)
		changeLanguage();
		
	printPageDec(__FILE__);
?>

<title><?php echo _("Spencer Bartz - Portfolio Website"); ?></title>
<?php sbIncludes(); ?>
</head>
<body>
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
    <div id="sidebar" >
      <div class="sep"></div>
      <div class="sidebox">
         <?php
         	$curDB = getCurDB();
         	echo '<div class="dropdown">';
         	printMenu($_SERVER['PHP_SELF'], $curDB);
        	echo '</div>';
        ?>
      </div>
      <div class="sidebox">
      </div>
    </div>
    
    <!-- Left Side (Main Content)-->
    <div id="main">
    
      <div class="box">
        <div style="float:left"><h1><?php echo _('Welcome to Stammbaum: <span class="white">The Family Tree Database</span>'); ?></h1></div>
        	<?php 
        		if(isset($_GET["lineselect"]))
        		{
        			echo "<script type=\"text/javascript\">playSound('sounds/bwip.mp3');</script>";
        			echo '<div class="familynameselect" style="clear:both;float:left"><strong>Family Line: ';
        		}
        		else
        			echo '</br><div class="familyname" style="clear:both;float:left">Family Line: ';
        		
        		if($curDB !== "none")
        		{
        			echo $curDB;
        			echo "</strong></div><br/><br/><br/>";
        			echo '<div class="blurb" style="clear:left;float:left">';
				echo '<strong>Info:</strong><br/>You have selected the <strong>' . $curDB . '</strong> family line. Use the menu on the right to <br/>' . 
				'manage photos and family member entries for the ' . $curDB . ' family.';
        			echo '</div>';
        		}
        		else
        		{
        			echo "None Selected";
        			echo "</div>";
        			echo '<div class="blurb" style="clear:left;float:left">';
				echo 'Use the menu on the right hand side to select a family line and get started!';
        			echo '</div>';
        		}
        		
        		if(isset($_GET["lineselect"]))
        			echo "</strong>";
        	?>
        	<br/>
        <p class="post-footer align-right" style="clear:both"><span class="date"><?php lastUpdated(__FILE__); ?></span></p>
      </div>
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
