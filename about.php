<?php
require_once("scp_internal.php");
scp_startPage("About Us");

$Members = array(
		"taylor"=> array(
			"Position"=>"Co-Lead",
			"Project"=>"Graphics/Portability",
			"ICQ"=>"10816532",
			"AIM"=>"TaylorRi",
			"Profile"=>"<a href=\"http://www.hard-light.net/forums/index.php?action=profile;u=1252\">HLP</a>",
			"Website"=>"http://www.icculus.org/~taylor",
			"Bio"=>"As well as assuming co-lead responsibilities for the SCP, taylor is bugfixing madness. He's responsible for the integration of OpenGL into the code, the ability to run FS2_Open under OS X and Linux, OpenAL support, Theora cutscene support, pilot file updates, Fs2NetD (multiplayer), and much more."
		),
		"Goober5000"=> array(
			"Position"=>"Co-Lead",
			"Project"=>"FRED",
			"ICQ"=>"300647025",
			"Profile"=>"<a href=\"http://www.hard-light.net/forums/index.php?action=profile;u=561\">HLP</a>",
			"Bio"=>"Goober5000 is co-lead of the SCP, as well as one of the administrators of Hard Light Productions. He is credited with multiple-ship-docking, the FRED voice acting manager, numerous SEXPs, and more. He is also involved in a number of campaigns, such as <a href=\"mods.php?mod=FSPort\">FSPort</a>."
		),
		"karajorma"=> array(
			"Position"=>"Senior Programmer",
			"Project"=>"FRED/networking",
			"Profile"=>"<a href=\"http://www.hard-light.net/forums/index.php?action=profile;u=340\">HLP</a>, <a href=\"http://www.game-warden.com/forum/member.php?find=lastposter&t=2822\">GWF</a>",
			"Website"=>"<a href=\"http://homepage.ntlworld.com/karajorma/FAQ/intro.html\">The Freespace Oracle (FAQ)</a>",
			"Bio"=>"Karajorma is the most well-known FREDder, who more recently began coding for the SCP. He is chiefly responsible for stabilizing the networking code, and for adding various SEXPs and bugfixes to the code. His FAQ is an excellent source of information for using the Source Code Project, although somewhat outdated."
		),
		"Kazan"=> array(
			"Position"=>"Senior Programmer",
			"Project"=>"PCS2",
			"ICQ"=>"28119425",
			"Profile"=>"<a href=\"http://www.hard-light.net/forums/index.php?action=profile;u=30\">HLP</a>",
			"Website"=>"<a href=\"http://alliance.sourceforge.net\">Alliance Productions</a>",
			"Bio"=>"Kazan is known as one of the oldest active coders in the community. His first contribution was the POF Constructor Suite, which is used to import models into Freespace 2. With the release of the source code, he went on to code the original Fs2NetD server. He is also responsible for the autopilot code used in Wing Commander Saga. His current project is POF Constructor Suite 2, am improved version of the original."
		),
		"phreak"=> array(
			"Position"=>"Senior Programmer",
			"Project"=>"SEXPs/Radar",
			"ICQ"=>"30791501",
			"AIM"=>"phreakSCP",
			"Profile"=>"<a href=\"http://www.hard-light.net/forums/index.php?action=profile;u=31\">HLP</a>",
			"Bio"=>"phreak is responsible for various new SEXPs, as well as the new orb radar."
		),
		"WMCoolmon"=> array(
			"Position"=>"Senior Programmer",
			"Project"=>"Scripting",
			"ICQ"=>"15386986",
			"Profile"=>"<a href=\"http://www.hard-light.net/forums/index.php?action=profile;u=374\">HLP</a>",
			"Website"=>"http://wmc.freespacemods.net/",
			"Bio"=>"WMCoolmon is one of the original members of the FSSCP. He is currently responsible for the Lua scripting system, as well as the camera system. His other contributions include modular tables, the Lab, and various SEXPs.",
		),
		"Backslash"=> array(
			"Position"=>"Programmer",
			"Project"=>"Gameplay/Physics",
			"ICQ"=>"36582751",
			"Profile"=>"<a href=\"http://www.hard-light.net/forums/index.php?action=profile;u=3503\">HLP</a>",
			"Bio"=>"Backslash is a newer programmer, who has very quickly made his mark on the project with a number of improvements for the HUD and Physics.",
		),
		"chief1983"=> array(
			"Position"=>"Programmer",
			"Project"=>"--",
			"ICQ"=>"31389683",
			"AIM"=>"chief83",
			"MSN"=>"chief1983@yahoo.com",
			"YIM"=>"chief1983",
			"Profile"=>"<a href=\"http://www.hard-light.net/forums/index.php?action=profile;u=5478\">HLP</a>",
			"Bio"=>"chief1983 is an enigma, wrapped in mystery.",
		),
		"Swifty"=> array(
			"Position"=>"Programmer",
			"Project"=>"BtRL",
			"Profile"=>"<a href=\"http://www.hard-light.net/forums/index.php?action=profile;u=6728\">HLP</a>, <a href=\"http://www.game-warden.com/forum/member.php?u=3360\">GWF</a>",
			"Bio"=>"Swifty is the lead coder for Beyond the Red Line. He is responsible for the FSSCP TrackIR implementation, and is currently working on upgrading the explosion effects and sound systems.",
		),
		"Turey"=> array(
			"Position"=>"Programmer",
			"Project"=>"Installer",
			"AIM"=>"tureyhall",
			"Website"=>"http://www.fsoinstaller.com/",
			"Profile"=>"<a href=\"http://www.hard-light.net/forums/index.php?action=profile;u=3428\">HLP</a>",
			"Bio"=>"Turey is responsible for the FS2Open installer. He has since joined the FSSCP and works on other things.",
		),
		"Wanderer"=> array(
			"Position"=>"Programmer",
			"Project"=>"Gameplay/Documentation",
			"Profile"=>"<a href=\"http://www.hard-light.net/forums/index.php?action=profile;u=2625\">HLP</a>",
			"Bio"=>"Wanderer is one of the most active contributors to the FSWiki, and is also one of the well-known Lua scripters in the community.",
		),
		"Pyro MX"=> array(
			"Position"=>"Webmaster",
			"Project"=>"Upcoming website",
			"Website"=>"http://pmxa.spouing.com/",
			"Profile"=>"<a href=\"http://www.hard-light.net/forums/index.php?action=profile;u=2395\">HLP</a>",
			"Bio"=>"Pyro MX is responsible for creating and designing the upcoming website. He will play a bigger role in the things to come.",
		),
		"mrduckman"=> array(
			"Position"=>"Web guru",
			"Project"=>"Upcoming website",
			"Profile"=>"<a href=\"http://www.hard-light.net/forums/index.php?action=profile;u=1788\">HLP</a>",
			"Bio"=>"mrduckman is currently in charge of the PHP backend for the upcoming website.",
		),
		"Bobboau"=> array(
			"Position"=>"(Retired) Programmer",
			"Project"=>"--",
			"ICQ"=>"125414203",
			"Profile"=>"<a href=\"http://www.hard-light.net/forums/index.php?action=profile;u=57\">HLP</a>",
			"Bio"=>"Bobboau was one of the original coders for the FSSCP, and introduced features such as glow maps, glow points, and engine trails. He has also worked on POF Constructor Suite 2. He is also known for his modding skills, and is responsible for the high-poly Hercules fighter included in the MediaVPs.",
		),
		"Inquisitor"=> array(
			"Position"=>"(Retired) Lead",
			"Project"=>"--",
			"ICQ"=>"37097749",
			"AIM"=>"ETGardner",
			"MSN"=>"edgardner@maxgaming.net",
			"YIM"=>"irobot_99",
			"Profile"=>"<a href=\"http://www.hard-light.net/forums/index.php?action=profile;u=374\">HLP</a>",
			"Website"=>"http://www.shatteredstar.org",
			"Bio"=>"Inquisitor was the original project lead, and the chief organizer behind the formation of the FSSCP.",
		),
	);
$CurrentMember = NULL;
$CurrentMemberInfo = NULL;
if($_GET['member'])
{	
	foreach($Members as $key => $value)
	{
		if($_GET['member'] === $key)
		{
			$CurrentMember = $key;
			$CurrentMemberInfo = $value;
			break;
		}
	}
}

if($CurrentMember)
{
?>
			<div class="newsblock">
				<div class="columntitle">
					<h1><?echo $CurrentMember?></h1>
				</div>
				<div class="columncontentzone">
					<table>
						<tbody>
<?php
foreach($CurrentMemberInfo as $key=>$value)
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
					<p><a href="about.php">&lt;&lt; Return to 'About Us'</a></p>
				</div>
			</div>
<?php
}
else
{
?>
			<div class="newsblock">
				<div class="columntitle">
					<h1>About Us</h1>
				</div>
				<div class="columncontentzone">
					<table>
						<thead>
							<tr>
								<th>Team member</th><th>Position</th><th>Project</th>
							</tr>
						</thead>
						<tbody>
<?php
foreach($Members as $key=>$value)
{
	echo("\t\t\t\t\t\t\t<tr>\r\n");
	echo("\t\t\t\t\t\t\t\t<td><a href=\"about.php?member=".$key."\">".$key."</a></td><td>".$value['Position']."</td><td>".$value['Project']."</td>\r\n");
	echo("\t\t\t\t\t\t\t</tr>\r\n");
}
?>
						</tbody>
					</table>
				</div>
			</div>
<?php
}
scp_endPage();
?>