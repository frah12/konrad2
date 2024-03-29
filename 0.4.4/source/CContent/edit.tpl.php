<?php
// Author: Fredrik Åhman
// Course: PHPMVC @ BTH
// File: edit.tpl.php
// Desc: Template form to edit content.

	if($contents['created']){
		echo "<h1>Edit Content</h1>";
		echo "<p>Edit and save content, or delete.</p>";
	}else{
		echo "<h1>Create Content</h1>";
		echo "<p>Create new content. (Available filters: plain, bbcode, htmlpurify.)</p>";
	}
	
	echo $form->GetHTML(array('class'=>'content-edit'));

	echo "<p class='smaller-text'><em>";
	
	if($contents['created']){
		echo "This content were created by ", $contents['owner'], " at: ", $contents['created'], ".";
	}else{
		echo "Content not yet created.";
	}
	
	if(isset($contents['updated'])){
		echo "Last updated at ", $contents['updated'], ".";
	}
	
	echo "</em></p>";
	
	echo "<p><a href='", create_url('content'), "'>View all content</a></p>";
?>