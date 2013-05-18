<?php
// Author: Fredrik Åhman
// Course: PHPMVC @ BTH
// File: index.tpl.php
// Desc: A template file for seperating  the html code for the guestbook.
?>
<h1>Gästboken</h1>
<hr>
<form action='<?php echo $formAction?>' method='post'>
	<fieldset>
		<legend>Skriv in en kommentar</legend>
		<p>
			<label for='kommentar'>Kommentar: </label>
		</p>
		<p>
			<textarea id='kommentar' name='comment' rows='4' cols='32'></textarea>
		</p>
		<p>
			<input style='display:none;' type='text' name='email' value=''>
		</p>
		<p>
			<input type='submit' name='add' value='Skicka'> |
			<input type='submit' name='clear' value='Rensa'>
		</p>
		<p>
			<label for='skapa'>Skapa tabell (om den inte redan finns): </label>
			<input type='submit' id='skapa' name='create' value='Skapa'>
		</p>
	</fieldset>
	<fieldset>
		<legend>Message: </legend>
		<p><?php echo get_messages_from_session(); ?></p>
	</fieldset>
</form>


<h3>Comments</h3>
<?php
	foreach($comments as $comment){
		echo "<div style='background-color:#555FFF; border: 1px solid; margin-bottom: 1em; padding: 1em;'>";
		echo "<p>Posted at: {$comment['posted']}</p>";
		echo "<p>" . htmlentities($comment['comment']) . "</p>";
		echo "</div>\n";
	}
?>