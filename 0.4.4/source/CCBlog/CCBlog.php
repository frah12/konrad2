<?php
// Author: Fredrik Åhman
// Course: PHPMVC @ BTH
// File: CCBlog.php
// Desc: A controller clas for a blog

/**
 * Controller class Blog. Used to display content by post.
 */

class CCBlog extends CObject implements IController{

	// Member variables
	
	/**
	 * Construct
	 */
	public function __construct(){
		parent::__construct();
	}
	
	// Methods 
	
	/**
	 * Public function Index. Implements IController
	 * Display all content of post-type.
	 */
	public function Index(){
		$content = new CMContent();
		
		$this->views->SetTitle('The Blog');
		$this->views->AddInclude(__DIR__ . '/index.tpl.php', array('contents'=>$content->ListAll(array('type'=>'post', 'order-by'=>'title', 'order-order'=>'DESC'))));
 	}
}
?>