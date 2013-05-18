<?php
// Author: Fredrik Åhman
// Course: PHPMVC @ BTH
// File: sidebar.tpl.php
// Desc: Sidebar view for the module controller
?>

<div class='box'>
	<h4>All modules</h4>
	<ul>
		<?php
			foreach($modules as $module){
				echo "<li><a href='", create_url("modules/view/{$module['name']}"), "'>", $module['name'] ,"</a></li>\n";
			}
		?>
	</ul>
</div>

<div class='box'>
	<h4>Konrad's core</h4>
	<ul>
		<?php
			foreach($modules as $module){
				if($module['isKonradCore']){
					echo "<li><a href='", create_url("modules/view/{$module['name']}"), "'>", $module['name'] ,"</a></li>\n";
				}
			}
		?>
	</ul>
</div>

<div class='box'>
	<h4>Konrad's CMF</h4>
	<ul>
	<?php
		foreach($modules as $module){
			if($module['isKonradCMF']){
				echo "<li><a href='", create_url("modules/view/{$module['name']}"), "'>", $module['name'] ,"</a></li>\n";
			}
		}
	?>
	</ul>
</div>

<div class='box'>
	<h4>Models (CMs)</h4>
	<ul>
	<?php
		foreach($modules as $module){
			if($module['isModel']){
				echo "<li><a href='", create_url("modules/view/{$module['name']}"), "'>", $module['name'] ,"</a></li>\n";
			}
		}
	?>
	</ul>
</div>

<div class='box'>
	<h4>Controllers implementing IController</h4>
	<ul>
	<?php
		foreach($modules as $module){
			if($module['isController']){
				echo "<li><a href='", create_url("modules/view/{$module['name']}"), "'>", $module['name'] ,"</a></li>\n";
			}
		}
	?>
	</ul>
</div>

<div class='box'>
	<h4>Implements IHasSQL</h4>
	<ul>
	<?php
		foreach($modules as $module){
			if($module['hasSQL']){
				echo "<li><a href='", create_url("modules/view/{$module['name']}"), "'>", $module['name'] ,"</a></li>\n";
			}
		}
	?>
	</ul>
</div>
<div class='box'>
	<h4>Manageble modules</h4>
	<ul>
	<?php
		foreach($modules as $module){
			if($module['isManageable']){
				echo "<li><a href='", create_url("modules/view/{$module['name']}"), "'>", $module['name'] ,"</a></li>\n";
			}
		}
	?>
	</ul>
</div>
<div class='box'>
	<h4>Other modules</h4>
	<ul>
	<?php
		foreach($modules as $module){
			if(!($module['isController'] || $module['isKonradCore'] || $module['isKonradCMF'])){
				echo "<li><a href='", create_url("modules/view/{$module['name']}"), "'>", $module['name'] ,"</a></li>\n";
			}
		}
	?>
	</ul>
</div>