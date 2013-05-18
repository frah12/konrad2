<?php
// Author: Fredrik Åhman
// Course: PHPMVC @ BTH
// File: index.tpl.php
// Desc: A template index for viewing page type content


if($contents['id']){
	echo "<h2>", htmlent($contents['title']) , "</h2>";
	echo "<p>", $contents->GetFilteredData() , "</p>";
	echo "<p><a href='", create_url("content/edit/{$contents['id']}"), "'>edit</a> | <a href='", create_url('content'), "'>view all</a></p>";
	}else{
		echo "<p>404: No such page exists.</p>";
	}
?>