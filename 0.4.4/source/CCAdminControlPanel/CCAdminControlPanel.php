<?php
// Author: Fredrik Åhman
// Course: PHPMVC @ BTH
// File: CCAdminControlPanel.php
// Desc: Administrator's control panel för administrative management


class CCAdminControlPanel extends CObject implements IController{
	
	// Member variables
	
	/**
	 * Construct destruct
	 */
	public function __construct(){
		parent::__construct();
	}	
	  
	// Methods
	
	/**
	 * Public function Index
	 * Shows user profile information
	 */
	public function Index(){
	  	$this->views->SetTitle("Administrator's Control Panel");
	  }
}
?>