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
        <h1><?php echo _('Python <span class="white">Projects</span>'); ?></h1>
        <p>
        <?php
                $desc = 'This page contains links to some projects I have created in Python. ' .
                'I learned Python while working at Novacoast in 2007 and came to respect the ' .
                'great power it can deliver in application programming. Although great web ' .
                'frameworks like Django for python do exist, unfortunately installing them on my hosting ' .
                'would require I upgrade to a dedicated server. So for now these projects will be ' .
                'desktop / command line applications';
		
                echo $desc
        ?>
        </p>
        <p class="post-footer align-right"><span class="date"><?php lastUpdated(__FILE__); ?></span> </p>
      </div>
      
      <div class="box">
        <h1><?php echo _('Latest <span class="white">Projects</span>'); ?></h1>
        <?php 
        	printProjectLinks(); 
        ?>
      </div>
      <br/>
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
