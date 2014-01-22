<?php
function scp_startPage($n_pageName)
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <title>Freespace Source Code Project - <?php echo $n_pageName?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="KEYWORDS" content="freespace,source code project,scp,hard light,hard light productions" />
  <link rel="stylesheet" type="text/css" href="css/mainstyle.css" />
</head>

<body>
<div id="globalcontainer">
<div id="header">
	<div id="banner"><img src="img/img_fstitle.png" alt="Freespace 2 Source Code Project" /></div>
	<img src="img/img_headseparator.gif" alt="Section separator" class="separator"/>
	<p><a href="bnr_installer.php">Automated installer</a></p>
	<img src="img/img_headseparator.gif" alt="Section separator" class="separator"/>
	<p>Current FS2Open Version: <a href="bnr_fs2open.php">3.6.9</a></p>
	<img src="img/img_headseparator.gif" alt="Section separator" class="separator"/>
	<p>Current MediaVP Version: <a href="bnr_mediavp.php">3.6.8 Zeta</a></p>
	<img src="img/img_headseparator.gif" alt="Section separator" class="separator"/>
	<p>Current Launcher Version: <a href="bnr_launcher.php">5.5d</a></p>
	<img src="img/img_headseparator.gif" alt="Section separator" class="separator"/>
	<p><a href="bnr_recentbuilds.php">Recent Builds</a></p>
	<img src="img/img_headseparator.gif" alt="Section separator" class="separator"/>
</div>
	<div id="content">
		<div id="centercolumn">
<?php
}

function scp_endPage()
{
//WMC - IE6 may not like the internal links
?>
		</div>

		<div id="leftcolumn">
			<ul class="sections">
				<li><a href=".">Home / News</a></li>
				<li><a href="screenshots.php">Screenshots</a></li>
				<li><a href="guides.php">Guides</a></li>
				<li><a href="mods.php">Mods</a></li>
				<li><a href="http://www.hard-light.net/forums/index.php/board,50.0.html">Forums</a></li>
				<li><a href="links.php">Links</a></li>
				<li><a href="downloads.php">Downloads</a></li>
				<li><a href="about.php">About us</a></li>
			</ul>
			<br />
			<h2>External Links</h2>
			<ul class="quicklinks">
				<li><a href="http://www.hard-light.net/wiki/index.php/Getting_Started%28Main%29">Getting Started</a></li>
				<li><a href="http://www.game-warden.com/forum/showthread.php?t=267">FS2NetD (Multiplayer) FAQ</a></li>
			</ul>
		</div>
	</div>
</div>
</body>

</html>
<?php
}
?>