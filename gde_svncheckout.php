<?php
require_once("scp_internal.php");
scp_startPage("Checking Out SVN");
?>
			<div class="newsblock">
				<div class="columntitle">
					<h1>Checking Out SVN</h1>
				</div>
				<div class="columncontentzone">
					<p>By <a href="about.php?member=karajorma">karajorma</a></p>
					<ul>
						<lh>SVN Info</lh>
						<li>URL: svn://svn.icculus.org/fs2open/trunk/fs2open</li>
					</ul>
					
					<ol>
						<lh>For Windows:</lh>
						<li>Go to the <a href="http://tortoisesvn.tigris.org/">Tortoise SVN homepage</a> and download the latest version</li>
						<li>Install it, and restart your PC when asked.</li>
						<li>Make a new folder on your hard drive where you'd like to install the code. You'll need at least 1GB of space per checkout instance, depending on how you build the code.</li>
						<li>Open the folder and right-click in it and choose "SVN Checkout" from the list that appears. <br /><a href="img/gde_svncheckout_1.jpg"><img src="img/gde_svncheckout_1tn.jpg"></img></a></li>
						<li>A new window will open. Copy and paste svn://svn.icculus.org/fs2open/trunk/fs2open" into the URL repository. The window should look something like this: <br /><img src="img/gde_svncheckout_2.jpg"></img></li>
						<li>Press OK to begin downloading from the repository. It shouldn't take long if you have a fast connection.</li>
					<p>For more information, see the <a href="http://www.hard-light.net/forums/index.php/topic,52845.0.html">original thread on HLP</a>.</p>
				</div>
				<div class="columncommentszone">
					<p><a href="guides.php"><< Back to 'Guides'</a></p>
				</div>
			</div>
<?php
scp_endPage();
?>