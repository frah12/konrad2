<?php
// Author: Fredrik Åhman
// Course: PHPMVC @ BTH
// File: index.tpl.php
// Desc: A template view if user login succes or fail, if true show profile info
?>
<h1>User Controller Index</h1>
<p>Controller to manage user's login, logout, view and edit profile.</p>
	<ul>
<?php
	echo "<li><a href='" . create_url("user/init") . "'>Init database, create tables and create default admin user</a>";
?>
	</ul>
<!--
<p>Older stuff.</p>
<ul>
<?php
/*	echo "<li><a href=" . create_url(null, 'init') . ">Initialize the database, and create tables and a default administrator</a>\n";
	echo "<li><a href=" . create_url(null, 'login', 'root/root') . ">Login as root:root (should work)</a></li>\n";
	echo "<li><a href=" . create_url(null, 'login', 'root@foobar.bth.se/root') . ">Login as root@foobar.bth.se:root (should work??)</a>\n";
	echo "<li><a href=" . create_url(null, 'login', 'doe/doe') . ">Login as doe:doe (should work??)</a>\n";
	echo "<li><a href=" . create_url(null, 'login', 'admin/root') . ">Login as admin:root (should fail, wrong acronym)</a></li>\n";
	echo "<li><a href=" . create_url(null, 'login', 'root/admin') . ">Login as admin:root (should fail, wrong password)</a></li>\n";
	echo "<li><a href=" . create_url(null, 'login', 'admin@dbwebb.se/root') . ">Login as admin@student.bth.se:root (should fail, wrong email)</a></li>\n";
	echo "<li><a href=" . create_url(null, 'logout') . ">Logout</a></li>\n";
*/
?>
</ul>
-->