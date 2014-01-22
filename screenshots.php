<?php
require_once("scp_internal.php");
scp_startPage("Screenshots");
$Mods=array();

//*****CONSTANTS
//Source dir, includes "/"
$SourceDir = "scn/";

//Does not include "." from extension
$ThumbSuffix = "_tn";

//*****LOAD ALL MODS
$dir_scn=@opendir($SourceDir);
if($dir_scn !== FALSE)
{
	rewinddir($dir_scn);
	while(($dir_mod = readdir($dir_scn)) !== FALSE)
	{
		if($dir_mod != "." && $dir_mod != ".." && is_dir($SourceDir.$dir_mod))
		{
			$Mods[$dir_mod] = array();
		}
	}
	closedir($dir_scn);
}

//*****LOAD ALL POSSIBLE SCREENS
if(count($Mods) > 0)
{
	//Sort mods
	ksort($Mods);
	
	//Load 'em
	foreach($Mods as $key=>$value)
	{
		if(isset($_GET['gallery']) && $_GET['gallery'] != $key)
			continue;
			
		$dir_mod = @opendir($SourceDir.$key);
		if($dir_mod !== FALSE)
		{
			rewinddir($dir_mod);
			while(($dir_file = readdir($dir_mod)) !== FALSE)
			{
				$ext = strtolower(substr($dir_file,-4));
				if($dir_file != "." && $dir_file != ".." && is_file($SourceDir.$key."/".$dir_file) && ($ext == ".gif" || $ext == ".jpg" || $ext == ".jpeg" || $ext == ".png"))
				{
					$Mods[$key][$dir_file] = $dir_file;
				}
			}
		}
		closedir($dir_mod);
	}
	
	//*****PROCESS
	//1) Sort alphabetically
	//2) Look for images w/o thumbnails
	//2a) Create a thumbnail
	//2b) If thumbnail creation failed, delete the entry
	//3) Delete thumbnail entry for images with thumbnails
	foreach($Mods as $modname=>$modfiles)
	{
		if(count($modfiles))
		{
			//Sort alphabetically
			ksort($modfiles);
			reset($modfiles);
			
			while(($big = current($modfiles)) !== FALSE)
			{
				$bigkey = key($modfiles);
				$bigext = strrchr($big, ".");
				$small = next($modfiles);
				$smallkey = key($modfiles);
				$smallthumbpos = strripos($small, $ThumbSuffix);
				$cmp1 = substr($big, 0, -strlen($bigext));
				$cmp2 = substr($small, 0, $smallthumbpos);
				if($smallthumbpos === FALSE || $cmp1 != $cmp2)
				{
					//The next image does not agree with this one - ie no thumbnail.
					//Try to create one
					$fixed = FALSE;
					if(stristr($big, $ThumbSuffix.".") === FALSE)
					{
						$src = FALSE;
						$bigextcase = strtolower($bigext);
						
						//Create source image
						if($bigextcase == ".gif")
						{
							$src = @imagecreatefromgif($SourceDir.$modname."/".$big);
						}
						else if($bigextcase == ".jpg" || $bigextcase == ".jpeg")
						{
							$src = @imagecreatefromjpeg($SourceDir.$modname."/".$big);
						}
						else if($bigextcase == ".png")
						{
							$src = @imagecreatefrompng($SourceDir.$modname."/".$big);
						}
						
						if($src != FALSE)
						{
							//Get image info
							//newwidth and newheight are maximums
							$newwidth=200;
							$newheight=150;
							list($width,$height)=getimagesize($SourceDir.$modname."/".$big);
							if($width > $height)
							{
								$newheight=($height/$width)*$newwidth;
							}
							else
							{
								$newwidth=($width/$height)*$newheight;
							}
							
							//Create dest image
							$dst=imagecreatetruecolor($newwidth,$newheight);
							
							if($dst != FALSE)
							{
								//Scale it
								if(imagecopyresampled($dst,$src,0,0,0,0,$newwidth,$newheight,$width,$height))
								{
									$smallname = substr($big, 0, -strlen($bigext)).$ThumbSuffix.".jpg";
									$filename = $SourceDir.$modname."/".$smallname;
									if(imagejpeg($dst,$filename,40))
									{
										$Mods[$modname][$bigkey] = $smallname;
										$fixed = TRUE;
									}
								}
							}
						}
					}
					if(!$fixed)
					{
						//Failed at creating a thumbnail
						unset($Mods[$modname][$bigkey]);
					}
				}
				else
				{
					//A thumbnail exists
					$Mods[$modname][$bigkey] = $small;
					next($modfiles);
					unset($Mods[$modname][$smallkey]);
				}
			}
		}
	}
	
	//By this point, we have an array of mods,
	//each of which is an array of images,
	//whose values are their thumbnail
	//"Mod" => array(
	//		"Image"=>"Thumbnail",
	//);
	
	//*****OUTPUT EVERYTHING
	if(isset($_GET['all']) || isset($_GET['gallery']))
	{
		foreach($Mods as $mod=>$screens)
		{
			if(count($screens) < 1)
				continue;
			
			echo("\t\t\t<div class=\"newsblock\">\r\n");
			echo("\t\t\t\t<div class=\"columntitle\">\r\n");
			echo("\t\t\t\t\t<h1>".$mod."</h1>\r\n");
			echo("\t\t\t\t</div>\r\n");
			echo("\t\t\t\t<div class=\"columncontentzone\">\r\n");
			$i = 0;
			foreach($screens as $screenshot=>$thumbnail)
			{
				if($i == 0)
				{
					echo("\t\t\t\t\t");
				}
				echo("<a href=\"".$SourceDir.$mod."/".$screenshot."\"><img src=\"".$SourceDir.$mod."/".$thumbnail."\" alt=\"".$screenshot."\"></img></a>");
				
				$i++;
				/*
				if($i == 4)
				{
					echo("<br />\r\n");
					$i = 0;
				}*/
			}
			echo("\r\n");
			echo("\t\t\t\t</div>\r\n");
			if(isset($_GET['gallery']))
			{
				echo("\t\t\t\t<div class=\"columncommentszone\">\r\n");
				echo("\t\t\t\t\t<p><a href=\"screenshots.php\">&lt;&lt; Return to 'Screenshots'</a></p>\r\n");
				echo("\t\t\t</div>\r\n");
			}
			echo("\t\t\t</div>\r\n");
		}
	}
	else
	{
?>
			<div class="newsblock">
				<div class="columntitle">
					<h1>Screenshot Galleries</h1>
				</div>
				<div class="columncontentzone">
<?php
		foreach($Mods as $mod=>$screens)
		{
			$screenshot=array_rand($screens);
			$thumbnail=$screens[$screenshot];
			echo("\t\t\t\t\t\t\t<div class=\"galleryitem\">\r\n");
			echo("\t\t\t\t\t\t\t\t<p class=\"galleryimage\"><a href=\"screenshots.php?gallery=".$mod."\"><img src=\"".$SourceDir.$mod."/".$thumbnail."\" alt=\"".$mod."\"></img></a></p>\r\n");
			echo("\t\t\t\t\t\t\t\t<p class=\"gallerycaption\"><em><a href=\"screenshots.php?gallery=".$mod."\">".$mod."</a> (".count($screens).")</em></p>\r\n");
			echo("\t\t\t\t\t\t\t</div>\r\n");
		}
?>
				<p>You can also <a href="screenshots.php?all">View all the galleries at once</a></p>
				</div>
				<div class="columncommentszone">
					<p>External links: <a href="http://www.hard-light.net/forums/index.php/topic,25406.0.html">Screenshots thread</a> | <a href="http://fs2source.warpcore.org/wmcscreenies/">Older screenshot repository</a></p>
				</div>
			</div>
<?php
	}
}
else
{
?>
			<div class="newsblock">
				<div class="columntitle">
					<h1>Screenshots</h1>
				</div>
				<div class="columncontentzone">
					<p>No screenshots have been uploaded at this time.</p>
				</div>
				<div class="columncommentszone">
					<p>External links: <a href="http://www.hard-light.net/forums/index.php/topic,25406.0.html">Screenshots thread</a> | <a href="http://fs2source.warpcore.org/wmcscreenies/">Older screenshot repository</a>
				</div>
			</div>
<?php
}
scp_endPage();
?>