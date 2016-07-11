<?php
	// Find out the app root path from any file path
	function get_relative_root_path($file_path)
	{
		//handle both kinds of dir dividers
		$path_parts = explode("\\", $file_path);
	
		if(count($path_parts) == 1)
			$path_parts = explode("/", $file_path);
				
		$config_file = dirname(__FILE__) . "\\config.json";
		$json_obj = json_decode(file_get_contents($config_file), true);
		$root_path = $json_obj["app_info"]["root_path"];
		$relative_path = "";
		
		foreach($path_parts as $part)
		{
			if(!strcmp($part, $root_path))
				break;
			else
			{		
					$relative_path = "../" . $relative_path ;
			}
		}
		
	return $relative_path . "/" . $root_path . "/";
	}
?>