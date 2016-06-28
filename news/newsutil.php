<?php
	$postid = "";
	$posttext = "";

	function print_news_links()
	{
		include 'dbconnect.php';
    	$mysqli = get_mysqli_connection("newsdb");	
		$res = $mysqli->query("select id, dateposted, substring(posttext, 1, 100) as preview from posts");
    	
    		if(!$res)
    			return false;
        
    		if($res->num_rows > 0)
    		{
    			while($row = $res->fetch_assoc())
    			{
    				echo '<tr class="row-a"><td class="first"><a href="newsadmin.php?postid=' .  $row["id"] . '">' . $row["id"] . '</a></td><td><a href="newsadmin.php?postid=' .  $row["id"] . '">' . $row["dateposted"] . "</a></td><td>" . $row["preview"] . '...</td><td><a href="newsadmin.php?postid='. $row["id"] . '">Edit</a> / <a href="#" onclick="deleteWarning(' . $row["id"] . ');">Delete</a></td></tr>'; 
			}
		}
	}
	
	function delete_post()
	{
		if(isset($_GET["deleteid"]))
		{
			include 'dbconnect.php';
			
			$sql = "delete from posts where id=" . $_GET["deleteid"];
			$res = $mysqli->query($sql);

			if($res)
			{
				echo "<h3>Deleted post: " . $_GET["deleteid"] . "</h3>";
			}
			else
			{
				die("failed to delete post");
			}
		}
	}
	
	function currently_editing()
	{	
		if($GLOBALS["postid"] !== "")
		{
			echo "<h3>Currently Editing Post id: " . $GLOBALS["postid"] . "</h3>";
		}
		else if($GLOBALS["posttext"])
		{
			echo "<h3>New Post Created!</h3>";
		}
		else
		{
			echo "<h3>New News Story</h3>";
		}
	}

	function process_params()
	{
		include 'dbconnect.php';
		$sql = "";
		if(isset($_POST["posttext"]) )
		{
			if(isset($_POST["postid"]))
			{
				if(is_int($postid = filter_input(INPUT_POST, 'postid', FILTER_VALIDATE_INT))) 
				{		
					//update existing post
					$sql = "update posts set dateposted=dateposted, posttext='" . $_POST["posttext"] . "' where id=" . $_POST["postid"];
					$res = $mysqli->query($sql);

					if($res)
					{
						$GLOBALS["posttext"] = $_POST["posttext"];
						$GLOBALS["postid"] = $_POST["postid"];
					}
					else
					{
						die("failed to update post");
					}
				}
				else
				{
					//insert new post
					$sql = "insert into posts values(NULL, '" . $_POST["posttext"] . "', NOW(), '')";
					$res = $mysqli->query($sql );

					if($res)
					{
						$GLOBALS["posttext"] =  $_POST["posttext"];
						$sql = "select max(id) as postid from posts";
						$res = $mysqli->query($sql );
						$row = $res->fetch_assoc();
						$GLOBALS["postid"] = $row["postid"];
					}
					else
					{
						die("failed to insert post");
					}
				}
			}
		}
		else if(isset($_GET["postid"]))
		{
			//edit existing post
			$sql = "select id, posttext from posts where id=" . $_GET["postid"];
			$res = $mysqli->query($sql);

			if($res)
			{
				$row = $res->fetch_assoc();
				$GLOBALS["posttext"] =  $row["posttext"];
				$GLOBALS["postid"] = $row["id"];
			}
			else
			{
				die("failed to load text for editing");
			}
		}		
	}
	
	function news_post_text()
	{
		echo $GLOBALS["posttext"];
	}
	
	function news_post_Id()
	{
		echo $GLOBALS["postid"];
	}
?>