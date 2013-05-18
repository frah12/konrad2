<?php
// Author: Fredrik Åhman
// Course: PHPMVC @ BTH
// File: CCGuestbook.php
// Desc: Guestbook controller for framwork called konrad based literally on Lydia.

/**
 * Controller class CCGuestbook
 * Extends CObject
 * Implements IController
 */

class CCGuestbook extends CObject implements IController{

	// Member variables
	private $guestbookModel;
	
	
	/**
	 * Construct
	 */
	public function __construct(){
		parent::__construct(); // to get access to $this via CObject
		$this->guestbookModel = new CMGuestbook();
	}
	
	// Methods

	/**
	 * Public function Index.
	 * Implenting IController interface
	 */
	public function Index(){
		$this->views->SetTitle('Gästboken');
		$this->views->AddInclude(__DIR__ . '/index.tpl.php',
			array('comments'=>$this->guestbookModel->ShowAll(),
				'formAction'=>$this->request->CreateUrl('', 'handler'),
				));	
	}

	/**
	 * Public function Handler
	 * Handles what to do: add, clear, create.
	 */
	public function Handler(){
		if (isset($_POST['add'])){
			$this->guestbookModel->Add(strip_tags($_POST['comment']));
		} elseif(isset($_POST['clear'])){
			$this->guestbookModel->DeleteAll();
		} elseif(isset($_SESSION['create'])){
			$this->guestbookModel->Init();
		}
		$this->RedirectTo($this->request->CreateUrl($this->request->controller));
	}	
}
?>