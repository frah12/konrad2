<?php
// Author: Fredrik Åhman
// Course: PHPMVC @ BTH
// File: install.tpl.php
// Desc: View for the module controller
?>
<h1>Installed modules</h1>

<h2>Enable controllers</h2>
<p>Every controller in this package are the foundation for this site's public API (Application protocol interface). Each module can be enabled or disabled in the <code>site/config.php</code> file.</p>

<table>
	<caption>These modules were installed.</caption>
<thead>
  <tr><th>Module</th><th>Result</th></tr>
</thead>
<tbody>
<?php
	foreach($modules as $module){
		echo "<tr><td>", $module['name'], "</td><td><div class='", $module['result'][0], "'>", $module['result'][1], "</div></td></tr>\n";
	}
?>
</tbody>
</table>