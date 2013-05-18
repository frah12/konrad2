<?php
// Author: Fredrik Åhman
// Course: PHPMVC @ BTH
// File: CMGuestbook.php
// Desc: CCGuestbook converted to Model

/**
 * Module class CMGuestbook
 * Extends CObject
 * Implements IHasSQL
 */

class CMGuestbook extends CObject implements IHasSQL{

	// Member variables

	/**
	 * Construct
	 */
	public function __construct(){
		parent::__construct(); // to get access to $this via CObject
	}
	
	// Methods

	/**
	 * Public function Manage
	 * Used to create a predefined table for guestbook unless it already exists
	 * Parameters: action
	 */
	public function Manage($action=null){
		switch($action){
			case 'install' :
				try{
					$this->db->ExecuteQuery(self::SQL('create table guestbook'));
					return array('success', 'Created database tables unless they existed already.');
				}catch(Exception $e){
					die("$e<br/>Failed to open database: " . $this->config['database'][0]['dsn']);
				}
				break;
			default :
				throw new Exception('Unsupported action for this module.');
				break;
			}
		}
	
	/**
	 * Public static function SQL
	 * Prediefined sql query to create table Guestbook
	 * Parameters: key
	 * Returns: queries[key] (array)
	 */
	public static function SQL($key=null){
		$queries = array(
		'create table guestbook' => "CREATE TABLE IF NOT EXISTS Guestbook(id INTEGER PRIMARY KEY, comment TEXT, posted DATETIME default(datetime('now')));",
		'insert into guestbook' => 'INSERT INTO Guestbook (comment) VALUES (?);',
		'select * from guestbook' => 'SELECT * FROM Guestbook ORDER BY id DESC;',
		'delete from guestbook' => 'DELETE FROM Guestbook;');
		
		if(!isset($queries[$key])){
			throw new Exception("No such SQL query. Key: '{$key}' was not found!");
		}
		return $queries[$key];
	}
	
	/**
	 * Public function Add
	 * Method used to add a comment to the guestbook database
	 * Parameters: comment.
	 */
	public function Add($comment){
		$this->db->ExecuteQuery(self::SQL('insert into guestbook'), array($comment));
		$this->session->AddMessage('success', 'Successfully inserted a new comment');
		
		if($this->db->rowCount() != 1){
			die('Failed to insert comment into guestbook database.');
		}
	}
	
	/**
	 * Public function DeleteAll
	 * Deletes all messages from predefined database tabel guestbook
	 */
	public function DeleteAll(){
		$this->db->ExecuteQuery(self::SQL('delete from guestbook'));
		$this->session->AddMessage('info', 'Removed all comments from database.');
	}
	
	/**
	 * Public function ShowAll
	 * Shows all entries in the predefined guestbook database table
	 */
	public function ShowAll(){
		try{
			$this->db->SetAttributes(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $this->db->SelectAndFetchAll(self::SQL('select * from guestbook'));
		} catch(Exception $e){
			return array();
		}
	}
	
	
}
?>