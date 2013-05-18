<?php
// Author: Fredrik Åhman
// Course: PHPMVC @ BTH
// File: CCPage.php
// Desc: A controller to manage content of page type

/**
 * Controller class CCPage is used to manage content by page
 */


class CCPage extends CObject implements IController{

	// Member variables
	
	/**
	 * Construct
	 */
	public function __construct(){
		parent::__construct();
	}
 
	// Methods
	
	/**
	 * Public function Index.
	 * Implementation of IController.
	 * List all content in content table.
	 */
	public function Index(){
		$content = new CMContent();
		$this->views->SetTitle('Empty page');
		$this->views->AddInclude(__DIR__ . '/index.tpl.php', array('contents'=>null));
    }
	/**
	 * Public function View
	 * View content by page.
	 * Parameters: id
	 */
	public function View($id=null){
		$content = new CMContent($id);
		$this->views->SetTitle('Page: '. htmlEnt($content['title']));
		$this->views->AddInclude(__DIR__ . '/index.tpl.php', array('contents'=>$content));
    }
    
}
?>