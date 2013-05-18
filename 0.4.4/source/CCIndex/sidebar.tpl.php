<?php
// Author: Fredrik Åhman
// Course: PHPMVC @ BTH
// File: index.tpl.php
// Desc: View for the Index controller
?>
<div class='box'>
	<h4>Controllers and methods</h4>
	<p>Enable and disable controllers in
<code>site/config.php</code>.</p>

<ul>
<?php
	foreach($controllers as $key => $val){	
		echo "<li><a href='", create_url($key), "'>", $key, "</a></li>";
		if(!empty($val)){
			echo "<ul>";
			foreach($val as $method){
				echo "<li><a href='", create_url($key, $method), "'>", $method, "</a></li>";
			}
			echo "</ul>";
		}
	}
?>
</ul>

</div>