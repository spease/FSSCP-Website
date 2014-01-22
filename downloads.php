<?php
require_once("scp_internal.php");
scp_startPage("Downloads");

$Downloads = array(
		"FS2NetD Games Viewer" => array(
			"Type" => "Game viewer (Unofficial)",
			"OS" => "Windows",
			"By" => "<a href=\"http://www.hard-light.net/forums/index.php?action=profile;u=1280\">Foxer</a>",
			"Thread" => "http://www.hard-light.net/forums/index.php/topic,49793.0.html",
			"Download" => "http://www.anetchat.prv.pl/freespace",
			"Description" => "The FS2Net Games Viewer allows you to see the current list of games, while chatting with other players in a lobby. Recommended for frequent multiplayer players.",
		),
		"Launcher OS X" => array(
			"Type" => "Launcher (Unofficial)",
			"OS" => "Mac OS X",
			"By" => "<a href=\"http://www.hard-light.net/forums/index.php?action=profile;u=3130\">Soulstorm (HLP)</a>",
			"Thread" => "http://www.hard-light.net/forums/index.php/topic,51391.0.html",
			"Download" => "http://www.hard-light.net/forums/index.php/topic,53835.0.html",
			"Description" => "Launcher OS X is an unofficial Launcher for Mac OS X users. It has many of the same capabilities as the official Windows Launcher.",
		),
		"Yet Another Launcher" => array(
			"Type" => "Launcher (Unofficial)",
			"OS" => "Windows/Linux",
			"By" => "<a href=\"http://www.hard-light.net/forums/index.php?action=profile;u=7275\">Hayner (HLP)</a>",
			"Download" => "http://www.hard-light.net/forums/index.php/topic,53206.0.html",
			"SVN" => "svn://vega.livecd.pl/yal/trunk",
			"Description" => "Yet Another Launcher is an unofficial Launcher for Windows and Linux based on the Qt toolkit. Currently, only the Welcome, Features, and MOD tabs are working.",
		),
		"Maja Express" => array(
			"Type" => "Tool (VP Editor)",
			"OS" => "Windows/Linux/OS X",
			"By" => "<a href=\"about.php?member=WMCoolmon\">WMCoolmon (FSSCP)</a>",
			"Download" => "http://wmc.freespacemods.net/repository/",
			"Description" => "Maja Express is a crossplatform viewer, editor, and creation tool for VP files. It features a preview pane and also has the ability to open ZIP files, import multiple VPs, or export individual folders as VPs.",
		),
		"POFCS2" => array(
			"Type" => "Tool (POF Editor)",
			"OS" => "Windows",
			"By" => "<a href=\"about.php?member=Kazan\">Kazan (FSSCP)</a>",
			"Download" => "http://www.hard-light.net/forums/index.php/topic,53835.0.html",
			"Description" => "POF Constructor Suite is used to convert models from COB format to POF, the format used by Freespace 2 and FS2Open. It also allows you to graphically edit all of the other data associated with a model, including gun/missile points, dockpoints, glowpoints, textures, and so on.",
		),
	);
$CurrentDownload = NULL;
$CurrentDownloadInfo = NULL;
if($_GET['download'])
{	
	foreach($Downloads as $key => $value)
	{
		if($_GET['download'] === $key)
		{
			$CurrentDownload = $key;
			$CurrentDownloadInfo = $value;
			break;
		}
	}
}

if($CurrentDownload)
{
?>
			<div class="newsblock">
				<div class="columntitle">
					<h1><?echo $CurrentDownload?></h1>
				</div>
				<div class="columncontentzone">
					<table>
						<tbody>
<?php
foreach($CurrentDownloadInfo as $key=>$value)
{
	echo("\t\t\t\t\t\t\t<tr>\r\n");
	echo("\t\t\t\t\t\t\t\t<td><b>".$key."</b></td>");
	if(!substr_compare("http://", $value, 0, 7, FALSE))
	{
		echo("<td><a href=\"$value\">".$value."</a></td>\r\n");
	}
	else
	{
		echo("<td>".$value."</td>\r\n");
	}
	echo("\t\t\t\t\t\t\t</tr>\r\n");
}
?>
						</tbody>
					</table>
				</div>
				<div class="columncommentszone">
					<p><a href="downloads.php">&lt;&lt; Return to 'Downloads'</a></p>
				</div>
			</div>
<?php
}
else
{
?>
			<div class="newsblock">
				<div class="columntitle">
					<h1>Downloads</h1>
				</div>
				<div class="columncontentzone">
					<table>
						<thead>
							<tr>
								<th>Name</th><th>Type</th><th>OS</th>
							</tr>
						</thead>
						<tbody>
<?php
foreach($Downloads as $key=>$value)
{
	echo("\t\t\t\t\t\t\t<tr>\r\n");
	echo("\t\t\t\t\t\t\t\t<td><a href=\"downloads.php?download=".$key."\">".$key."</a></td><td>".$value['Type']."</td><td>".$value['OS']."</td>\r\n");
	echo("\t\t\t\t\t\t\t</tr>\r\n");
}
?>
						</tbody>
					</table>
				</div>
				<div class="columncommentszone">
					<p>External links: <a href="http://www.freespacemods.net/download.php">Freespacemods download repository</a></p>
				</div>
			</div>
<?php
}
scp_endPage();
?>