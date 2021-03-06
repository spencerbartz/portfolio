<?php
	include '../../util/util.php';
	include 'sbutil.php';
	print_page_dec(__FILE__);
?>

<title><?php echo _("Spencer Bartz - Portfolio Website"); ?></title>
<?php sbIncludes(); ?>
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
    <div id="sidebar" >
      <div class="sep"></div>
    </div>
    
    <!-- Left Side (Main Content)-->
    <div id="main">
      <div class="box">
        <div style="float:left"><h1><?php echo _('Welcome to <span class="white">The Family Tree Photo Database</span>'); ?></h1></div>
         	<div class="dropdown" style="clear:both"><?php $curDB = getCurDB();printMenu($_SERVER['PHP_SELF'], $curDB); ?></div>
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
        <p class="post-footer align-right" style="clear:both"><span class="date"><?php last_updated(__FILE__); ?></span></p>
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
