<?php
	include '../php/util.php';
	include 'newsutil.php';
	printPageDec(__FILE__);
?>

<title><?php echo _("Spencer Bartz - Portfolio Website"); ?></title>
<script type="text/javascript">
	function deleteWarning(postid)
	{
		if(confirm("Are you sure you want to delete post: " + postid + "?"))
		{
			window.location.replace("newsadmin.php?deleteid=" + postid);
		}
	}
</script>
</head>

	<div id="overlay"></div>
	
	<!-- header starts here -->
	<div id="header">
		<div id="header-content">
		<?php printHeader(__FILE__); ?>
		</div>
	</div>
	
<!-- navigation starts here -->
<div id="nav-wrap">
	<div id="nav">
		<?php printNav(__FILE__); ?>
	</div>
</div>

<!-- content-wrap starts here -->
<div id="content-wrap">
	<div id="content">
    	<!-- Right side search box area -->
    	<div id="sidebar">
      		<div class="sep"></div>
    	</div>
    
    	<!-- Left Side (Main Content)-->
    	<div id="main">
      		<div class="box">
      			<?php processParams(); ?>
      			<h1><?php echo _('Welcome to <span class="white">News Admin</span>'); ?></h1>
      			<?php currentlyEditing(); ?>
      			<?php deletePost(); ?>
        		<p>
            		<form action="newsadmin.php" method="post">
                		<textarea style="width: 550px; height: 300px" name="posttext"><?php newsPostText(); ?></textarea><br />
                		<input type="hidden" name="postid" value="<?php newsPostId(); ?>" />
                		<input type="submit" value="submit"/>
           			</form>
           			
					<table>
						<th class="first">ID</th>
						<th>Time Stamp</th>
						<th>Preview</th>
						<th>Action</th>
						<tr class="row-a">
							<td>N/A</td><td>N/A</td><td><a href="newsadmin.php">CREATE NEW NEWS STORY</a></td><td>N/A</td>
						</tr>
						<?php printNewsLinks(); ?>
					</table>	
        		</p>
      		</div>
    	</div>
	</div>
</div>

<div id="footer-wrap">
	<div id="footer-columns"><?php printFooter(__FILE__); ?></div>
</div>

</body>
</html>
