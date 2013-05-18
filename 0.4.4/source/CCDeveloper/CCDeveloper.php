<?php
// Author: Fredrik Åhman
// Course: PHPMVC @ BTH
// File: CCDeveloper.php
// Desc: Controller for developmen and testing.

class CCDeveloper extends CObject implements IController {

	// Member variables
	
	// Construct
	public function __construct(){
		parent::__construct(); // parent is CObject
	}

// implement interface IController
	public function Index(){
		$this->Menu();
	}

// Create links in the supported way

public function Links(){
	$this->Menu();
	
	//$ko= CKonrad::Instance(); // Since CObject now use $this instead
	
	$url="developer/links";
	
	$current = $this->request->CreateUrl($url);
	
	$this->request->cleanUrl = false;
	$this->request->querystringUrl = false;
	
	$default = $this->request->CreateUrl($url);
	
	$this->request->cleanUrl = true;
	$clean = $this->request->CreateUrl($url);
	
	$this->request->cleanUrl = false;
	$this->request->querystringUrl = true;
	$querystring = $this->request->CreateUrl($url);
	
$this->data['main'] .=<<<EOD
<h2>CRequest::CreateUrl()</h2>
<p>Here is a list of urls using the above method with different settings. Every link leadning to the same page.</p>
<ul>
<li><a href='$current'>Current setting</a></li>
<li><a href='$default'>Default url</a></li>
<li><a href='$clean'>Defined as Clean url</a></li>
<li><a href='$querystring'>Querystring Url</a></li>
</ul>
<p>Enables various and flexible url-strategies.</p>
EOD;
}

// Create method that shows the menu, the same for all methods.

public function Menu(){
	$menu = array('developer','developer/index','developer/links');	
	$html = null;
	
	foreach($menu as $choice){
		$html .="<li><a href='" . $this->request->CreateUrl($choice) . "'>" . $choice . "</a></li>";
	}
	
	$this->data['title'] = "Developer controller";
$this->data['main'] =<<<EOD
<h1>The developer controller</h1>
<p>This is what I did now:</p>
<ul>
{$html}
</ul>
EOD;
}

	public function DisplayObject(){
		$this->Menu();
		$this->data['main'] .=<<<EOD
<h2>Showing content from CDeveloper</h2>
<p>Here's the content of the controller--including properties from CObject which holds access to common resources.</p>
EOD;
		$this->data['main'] .= "<pre>" . htmlentities(print_r($this, true)) . "</pre>";
	}

}
?>