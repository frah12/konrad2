<?php
// Author: Fredrik Åhman
// Course: PHPMVC @ BTH
// File: index.tpl.php
// Desc: View for the module controller
?>
<h1>Module manager</h1>
<p>A list of all available modules in this package with information to manage them all. All modules resides in <code>source</code>-directory.</p>

<h2>Enabled controllers</h2>
<p>Every controller in this package are the foundation for this site's public API (Application protocol interface). Each module can be enabled or disabled in the <code>site/config.php</code> file.</p>


<ul>
<?php
	foreach($controllers as $controller=>$choice){
		echo "<li><a href='". create_url($controller) . "'>{$controller}</a></li>\n";
		
		if(!empty($choice)){
			echo "<ul>";
			foreach($choice as $method){
				echo "<li><a href='". create_url($controller, $method) . "'>{$method}</a></li>\n";
			}
			echo "</ul>";
		}
	}
?>
</ul>