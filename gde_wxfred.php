<?php
require_once("scp_internal.php");
scp_startPage("How to Get Started with wxFRED");
?>
			<div class="newsblock">
				<div class="columntitle">
					<h1>How to Get Started with wxFRED</h1>
				</div>
				<div class="columncontentzone">
					<p>By <a href="about.php?member=Goober5000">Goober5000</a></p>
					
					<p><em>Editor's note: At the time of this writing, wxFRED has not been actively developed for quite awhile, so this guide may be out of date.</em></p>
					
					<ol>
						<li><p>Download and install the <a href="http://www.wxwidgets.org/">wxWidgets</a> package.  I used the latest official stable release, version 2.6.0.  Install it in a location without spaces, such as C:/wxWindows-2.6.0.  You should be able to use version 2.4.2, but you'll need to fiddle with the project file a bit.  I recommend 2.6.0.</p></li>
						<li><p>Create the environment variable WXWIN and set it to the install location.  The slashes in the path must be forward slashes.  In Win9x and ME, edit autoexec.bat, add the variable to the current variable list, and reboot (but do step 3 before rebooting).  In WinNT, 2000, and XP, open the System applet in the Control Panel, click the Advanced tab, click Environment Variables, and add it with the dialog - no reboot is required.</p></li>
						<li><p>Create the environment variable WXRC and set it to the wxRC executable directory.  WxRC won't exist yet, but it will be found at $(WXWIN)/contrib/utils/wxrc/Release for 2.4.2 and $(WXWIN)/utils/wxrc/vc_msw for 2.6.0.  This assumes you're compiling with Visual Studio, but other compilers will put wxrc.exe in similar locations.</p></li>
						<li><p>Open MSVC, find the wxWidgets workspace in /src, and use Batch Build to build all (and only) the Win32 Debug and Win32 Release configurations.</p></li>
						<li><p>
							<ol>
								<lh>For wxWidgets 2.4.2</lh>
								<li><p>Go to contrib/src/xrc and build the XRC library.  This is not part of the core codebase as of 2.4.2 - it wasn't integrated until 2.5.3.  It's needed for XRC resource support.</p></li>
								<li><p>Go to contrib/utils/wxrc and build wxRC.</p></li>
							</ol>
							<ol>
								<lh>For wxWidgets 2.6.0</lh>
								<li><p>Open MSVC, find the wx workspace in /build/msw, and use Batch Build to build all (and only) the Win32 Debug and Win32 Release configurations.</p></li>
								<li><p>Go to utils/wxrc and build wxRC.</p></li>
							</ol>
						</p></li>
						<li><p>Verify that you can run wxRC by going to the command prompt, typing "cd\" followed by "cd %WXRC%", and executing wxrc.exe.  It won't do anything, but it should run properly.  If you get "file not found", there's something wrong with your WXRC path.</p></li>
						<li><p>Run a CVS update to get the latest stuff in the fs2_open directory.  Make sure you select the "Create new directories" option.</p></li>
						<li><p>If you're using 2.4.2, you'll have to edit the library list.  First remove the wxbase*.lib and wxmsw*.lib files.  Remove the wx prefix from the remaining wx*.lib files.  Remove [wx]expat.lib.  Then add wxmsw.lib and wxxrc.lib.</p></li>
						<li><p>Build and run!</p></li>
					</ol>
					<p>After configuring everything, I recommend you read up on wxWidgets.  The <a href="http://wxwidgets.org/docs/">site documentation</a> and <a href="http://www.google.com/search?q=wxwidgets">Google</a> are good places to start.</p>
					<p>For more information, see the <a href="http://www.hard-light.net/forums/index.php/topic,32815.0.html">original thread on HLP</a> (SCP Members only).</p>
				</div>
				<div class="columncommentszone">
					<p><a href="guides.php"><< Back to 'Guides'</a></p>
				</div>
			</div>
<?php
scp_endPage();
?>