<?php
// Author: Fredrik Åhman
// Course: PHPMVC @ BTH
// File: CMModules.php
// Desc: The model for managing the core package's modules


class CMModules extends CObject{

	// Member variables
	private $konradCoreModules=array('CKonrad', 'CDatabase', 'CRequest', 'CViewContainer', 'CSession', 'CObject');
	private $konradCMFModules=array('CForm', 'CCPage', 'CCBlog', 'CMUser', 'CCUser', 'CMContent', 'CContent', 'CFormUserLogin', 'CFormUserProfile', 'CFormUserCreate', 'CFormContent', 'CHTMLPurifier');

	/**
	 * Construct
	 */
	public function __construct() {
		parent::__construct();
	}

	// Methods
	
	/**
	 * Public function Install
	 * Installs modules
	 * Returns: installed (array of installed modules)
	 */
	public function Install(){
		$allModules=$this->ReadAndAnalyse();
		
		// This makes CMUser installs first due to other classes uses it. Using anonymous function
		uksort($allModules, function($a, $b){
			return ($a == 'CMUser' ? -1 : ($b == 'CMUser' ? 1 : 0));
			}
		);
		
		$installed=array();
		foreach($allModules as $module){
			if($module['isManageable']){
				$className=$module['name'];
				$rc= new ReflectionClass($className);
				$object= $rc->newInstance();
				$method= $rc->getMethod('Manage');
				$installed[$className]['name']    = $className;
				$installed[$className]['result']  = $method->invoke($object, 'install');
			}
		}
		return $installed;
	}
	
	/**
	 * Public function AvailableControllers
	 * Shows available controllers
	 * Returns: items (array of all controllers)
	 */
	public function AvailableControllers(){
		$items=array();
		
		foreach($this->config['controllers'] as $key=>$choice){
			if($choice['enabled']){
				$rc=new ReflectionClass($choice['class']);
				$items[$key]=array();
				$methods=$rc->getMethods(ReflectionMethod::IS_PUBLIC);
				foreach($methods as $method){
					if($method->name != '__construct' AND $method->name != '__destruct' AND $method->name != 'Index'){
						$items[$key][]=mb_strtolower($method->name);
					}
				}
				sort($items[$key], SORT_LOCALE_STRING);
			}
		}
		ksort($items, SORT_LOCALE_STRING);
		return $items;
	}
	
	/**
	 * Public function ReadAndAnalyse
	 * Checks to see if predefined modules are available
	 * Returns: modules (array)
	 */
	public function ReadAndAnalyse(){
		$source = KONRAD_INSTALL_PATH . '/source';
		
		if(!$dir = dir($source)){
			throw new Exception('Could not open the directory.');
		}
		
		$modules = array();
		while (($module = $dir->read()) !== false){
			if(is_dir("$source/$module")){
				if(class_exists($module)){
					$rc = new ReflectionClass($module);
					$modules[$module]['name']=$rc->name;
					$modules[$module]['interface']=$rc->getInterfaceNames();
					$modules[$module]['isController']=$rc->implementsInterface('IController');
					$modules[$module]['isModel']=preg_match('/^CM[A-Z]/', $rc->name);
					$modules[$module]['hasSQL']=$rc->implementsInterface('IHasSQL');
					$modules[$module]['isManageable']=$rc->implementsInterface('IModule');
					$modules[$module]['isKonradCore']=in_array($rc->name, array(
						'CKonrad',
						'CDatabase',
						'CRequest',
						'CViewContainer',
						'CSession',
						'CObject'));
					$modules[$module]['isKonradCMF']=in_array($rc->name, array(
						'CForm',
						'CCPage',
						'CCBlog',
						'CMUser',
						'CCUser',
						'CMContent',
						'CContent',
						'CFormUserLogin',
						'CFormUserProfile',
						'CFormUserCreate',
						'CFormContent',
						'CHTMLPurifier'));
				}
			}
		}
		$dir->close();
		ksort($modules, SORT_LOCALE_STRING);
		
		return $modules;
	}

	/**
	 * Public function GetDetailsOfModules
	 * Fetches details of a module
	 * Parameters: module
	 * Returns: details (array)
	 */
	private function GetDetailsOfModule($module){
		$details = array();
		if(class_exists($module)){
			$rc = new ReflectionClass($module);
			$details['name']=$rc->name;
			$details['filename']=$rc->getFileName();
			$details['doccomment']=$rc->getDocComment();
			$details['interface']=$rc->getInterfaceNames();
			$details['isController']=$rc->implementsInterface('IController');
			$details['isModel']=preg_match('/^CM[A-Z]/', $rc->name);
			$details['hasSQL']=$rc->implementsInterface('IHasSQL');
			$details['isManageable']=$rc->implementsInterface('IModule');
			$details['isKonradCore']=in_array($rc->name, $this->konradCoreModules);
			$details['isKonradCMF']=in_array($rc->name, $this->konradCMFModules);
			$details['publicMethods']=$rc->getMethods(ReflectionMethod::IS_PUBLIC);
			$details['protectedMethods']=$rc->getMethods(ReflectionMethod::IS_PROTECTED);
			$details['privateMethods']=$rc->getMethods(ReflectionMethod::IS_PRIVATE);
			$details['staticMethods']=$rc->getMethods(ReflectionMethod::IS_STATIC);
		}
		
		return $details;
	}
	
	/**
	 * Public function GetDetailsOfModuleMethods
	 * Fetches details of methods of a module
	 * Parameters: module
	 * Returns: methods (array)
	 */
	private function GetDetailsOfModuleMethods($module){
		$methods = array();
		if(class_exists($module)){
		$rc = new ReflectionClass($module);
		$classMethods = $rc->getMethods();
			foreach($classMethods as $val){
				$methodName = $val->name;
				$rm = $rc->GetMethod($methodName);
				$methods[$methodName]['name']=$rm->getName();
				$methods[$methodName]['doccomment']=$rm->getDocComment();
				$methods[$methodName]['startline']=$rm->getStartLine();
				$methods[$methodName]['endline']=$rm->getEndLine();
				$methods[$methodName]['isPublic']=$rm->isPublic();
				$methods[$methodName]['isProtected']=$rm->isProtected();
				$methods[$methodName]['isPrivate']=$rm->isPrivate();
				$methods[$methodName]['isStatic']=$rm->isStatic();
			}
		}
	
		ksort($methods, SORT_LOCALE_STRING);
	
		return $methods;
	}

	/**
	 * Public function ReadAndAnalyseModule
	 * Fetches details of a specified module
	 * Parameters: module
	 * Returns: details.
	 */
	public function ReadAndAnalyseModule($module){
		$details=$this->GetDetailsOfModule($module);
		$details['methods']=$this->GetDetailsOfModuleMethods($module);
		return $details;
	}
} 
?>