<?php
require_once("scp_internal.php");
scp_startPage("Mods");

$Mods = array(
	"The Babylon Project" => array(
		"Type" => "Standalone",
		"Status" => "Release",
		"Lead" => "<a href=\"http://www.hard-light.net/forums/index.php?action=profile;u=43\">IPAndrews (HLP)</a>",
		"Website" => "http://babylon.hard-light.net/",
		"Forums" => "http://www.hard-light.net/forums/index.php/board,105.0.html",
		"Download" => "http://babylon.hard-light.net/official_downloads.php",
		"Description" => "The Babylon Project is a well-known Total Conversion (standalone) mod based on the Babylon 5 universe.",
		),
	"Beyond the Red Line" => array(
		"Type" => "Standalone",
		"Status" => "Release (Demo)",
		"Lead" => "<a href=\"http://www.game-warden.com/forum/member.php?find=lastposter&f=37\">Omniscaper (GWF)</a>",
		"Website" => "http://www.game-warden.com/bsg/",
		"Forums" => "http://www.game-warden.com/forum/forumdisplay.php?f=36",
		"Download" => "http://www.game-warden.com/bsg/downloads.html",
		"Description" => "Beyond the Red Line is a Total Conversion based on the Battlestar Galactica universe. Notably, it was featured in Popular Science's \"How 2.0\" to build a homebrew flight simulator.",
		),
	"Wing Commander Saga" => array(
		"Type" => "Standalone",
		"Status" => "Release (Demo)",
		"Lead" => "<a href=\"http://www.hard-light.net/forums/index.php?action=profile;u=639\">Tolwyn (HLP)</a>",
		"Website" => "http://www.wcsaga.com/",
		"Forums" => "http://www.hard-light.net/forums/index.php/board,46.0.html",
		"Download" => "http://www.wcsaga.com/content/view/23/46/",
		"Description" => "Wing Commander Saga is another TC mod based on the Wing Commander universe. It features several user-made cutscenes and has released a prologue and two tech demos.",
		),
	"FSPort" => array(
		"Type" => "Mod",
		"Status" => "Release",
		"Lead" => "<a href=\"http://www.hard-light.net/forums/index.php?action=profile;u=510\">Galemp (HLP)</a>",
		"Website" => "http://fsport.hard-light.net/website/",
		"Forums" => "http://www.hard-light.net/forums/index.php/board,39.0.html",
		"Download" => "http://fsport.hard-light.net/website/downloads.html",
		"Description" => "FSPort is a port of the Freespace 1 campaign to the Freespace 2/FS2Open engine. It now includes missions from the FS1 expansion pack, Silent Threat, as well as graphical improvements on the original media using FS2Open.",
		),
	"Inferno" => array(
		"Type" => "Mod",
		"Status" => "Release (R1)",
		"Lead" => "<a href=\"http://www.hard-light.net/forums/index.php?action=profile;u=78\">Woomeister (HLP)</a>",
		"Website" => "http://inferno.hard-light.net/",
		"Forums" => "http://www.hard-light.net/forums/index.php/board,20.0.html",
		"Download" => "http://inferno.hard-light.net/R1.htm",
		"Description" => "Inferno is one of the oldest, largest mods for Freespace 2. Although R1 does not fully take advantage of the SCP graphical abilities, it features a considerable number of new ships and weapons, as well as a full campaign.",
		),
	"Nukemod" => array(
		"Type" => "Mod",
		"Status" => "In-progress",
		"Lead" => "<a href=\"http://www.hard-light.net/forums/index.php?action=profile;u=766\">Nuke (HLP)</a>",
		"Website" => "http://www.game-warden.com/nukemod-cos",
		"Description" => "Nukemod is an experimental mod by Nuke that takes advantage of several improvements of the SCP. It is still unreleased.",
		),
	);

$CurrentMod = NULL;
$CurrentModInfo = NULL;
if($_GET['mod'])
{	
	foreach($Mods as $key => $value)
	{
		if($_GET['mod'] === $key)
		{
			$CurrentMod = $key;
			$CurrentModInfo = $value;
			break;
		}
	}
}

if($CurrentMod)
{
?>
			<div class="newsblock">
				<div class="columntitle">
					<h1><?echo $CurrentMod?></h1>
				</div>
				<div class="columncontentzone">
					<table>
						<tbody>
<?php
foreach($CurrentModInfo as $key=>$value)
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
					<p><a href="mods.php">&lt;&lt; Return to 'Mods'</a></p>
				</div>
			</div>
<?php
}
else
{
	foreach($Mods as $key=>$value)
	{
		echo("\t\t\t<div class=\"newsblock\">\r\n");
		echo("\t\t\t\t<div class=\"columntitle\">\r\n");
		echo("\t\t\t\t\t<h1><a href=\"mods.php?mod=$key\">".$key."</a></h1>\r\n");
		echo("\t\t\t\t</div>\r\n");
		
		echo("\t\t\t\t<div class=\"columncontentzone\">\r\n");
		echo("\t\t\t\t\t<p>".$value['Description']."</p>\r\n");
		echo("\t\t\t\t</div>\r\n");
		
		echo("\t\t\t\t<div class=\"columncommentszone\">\r\n");
		echo("\t\t\t\t\t<p>".$key.": | ");
		if(isset($value['Website']))
		{
			echo("<a href=\"".$value['Website']."\">Home</a> | ");
		}
		if(isset($value['Forums']))
		{
			echo("<a href=\"".$value['Forums']."\">Forums</a> | ");
		}
		if(isset($value['Download']))
		{
			echo("<a href=\"".$value['Download']."\">Download</a> |");
		}
		echo("</p>\r\n");
		echo("\t\t\t\t</div>\r\n");
		echo("\t\t\t</div>\r\n");
	}
}
scp_endPage();
?>