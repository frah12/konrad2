<?php 
// Author: Fredrik Åhman
// Course: PHPMVC @ BTH
// File:view.tpl.php
// Desc: View for the module controller

if(!is_array($module)){
	echo "<p>404. So such module.</p>";
}else{
	echo "<h1>Module: ", $module['name'], "</h1>";
	echo "<h2>Description</h2>";
	echo "<!-- <p>File: <code>", $module['filename'], "</code></p> -->";
	echo "<p>", nl2br($module['doccomment']), "</p>";
	
	
echo<<<EOD
<h2>Details</h2>
<table>
<caption>Details of module.</caption>
<thead><tr><th>Characteristics</th><th>Applies to module</th></tr></thead>
<tbody>
EOD;
	echo "<tr><td>Part of Konrad's Core modules</td>";
	echo "<td>", $module['isKonradCore']?'Yes':'No',  "</td></tr>";
	
	echo "<tr><td>Part of Konrad's CMF modules</td>";
	echo "<td>", $module['isKonradCMF']?'Yes':'No', "</td></tr>";
	
	echo "<tr>";
	echo "<td>Implements interface(s)</td>";
	echo "<td>", empty($module['interface'])?'No':implode(', ', $module['interface']), "</td>";
	echo "</tr>";
	
	echo "<tr><td>Controller</td>";
	echo "<td>", $module['isController']?'Yes':'No', "</td>";
	echo "</tr>";
	
	echo "<tr><td>Model</td>";
	echo "<td>",  $module['isModel']?'Yes':'No', "</td></tr>";
	
	echo "<tr><td>Has SQL</td>";
	echo "<td>", $module['hasSQL']?'Yes':'No', "</td></tr>";
	
	echo "<tr><td>Manageable as a module</td>";
	echo "<td>", $module['isManageable']?'Yes':'No', "</td></tr>";
	echo "</tbody></table>";

	if(!empty($module['publicMethods'])){
		echo "<h2>Public methods</h2>";
		foreach($module['methods'] as $method){
			if($method['isPublic']){
				echo "<h3>", $method['name'], "</h3>";
				echo "<p>", nl2br($method['doccomment']), "</p>";
				echo "<p>Implemented through lines: ", $method['startline'], " - ", $method['endline'], ".</p>";
			}
		}
	}

	if(!empty($module['protectedMethods'])){
		echo "<h2>Protected methods</h2>";
		foreach($module['methods'] as $method){
			if($method['isProtected']){
				echo "<h3>", $method['name'], "</h3>";
				echo "<p>", nl2br($method['doccomment']), "</p>";
				echo "<p>Implemented through lines: ", $method['startline'], " - ", $method['endline'], ".</p>";
			}
		}
	}

	if(!empty($module['privateMethods'])){
		echo "<h2>Private methods</h2>";
		foreach($module['methods'] as $method){
			if($method['isPrivate']){
				echo "<h3>", $method['name'], "</h3>";
				echo "<p>", nl2br($method['doccomment']), "</p>";
				echo "<p>Implemented through lines: ", $method['startline'], " - ", $method['endline'], ".</p>";
			}
		}
	}
	
	if(!empty($module['staticMethods'])){
		echo "<h2>Static methods</h2>";
		foreach($module['methods'] as $method){
			if($method['isStatic']){
				echo "<h3>", $method['name'], "</h3>";
				echo "<p>", nl2br($method['doccomment']), "</p>";
				echo "<p>Implemented through lines: ", $method['startline'], " - ", $method['endline'], ".</p>";
			}
		}
	}
}
?>