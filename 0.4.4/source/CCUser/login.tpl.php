<?php
// Author: Fredrik Åhman
// Course: PHPMVC @ BTH
// File: login.tpl.php
// Desc: A login form to login
?>
<h1>Login</h1>
<p>Login or create a new account.</p>
<?php
	echo $login_form->GetHTML(array('start'));
	
	echo "<fieldset>";
	/*echo $login_form['acronym']->GetHTML();
	echo $login_form['password']->GetHTML();
	echo $login_form['login']->GetHTML();
	*/
	if($allow_create_user){
		echo "<p class='form-action-link'><a href='" . $create_user_url . "' title='Create new  account'>Create account</a></p>";
	}
	
	echo "</fieldset></form>";
?>