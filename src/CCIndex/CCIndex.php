<?php
/**
* Standard controller layout.
* 
* @package MaurisCore
*/
class CCIndex extends CObject implements IController {

  /**
   * Constructor
   */
  public function __construct() { parent::__construct(); }
  

  /**
   * Implementing interface IController. All controllers must have an index action.
   */
  public function Index() {			
    $modules = new CMModules();
    $controllers = $modules->AvailableControllers();
    $this->views->SetTitle('Index');
    $this->views->AddInclude(__DIR__ . '/index.tpl.php', array(
	'phpversion'=>$this->checkphpversion(),
	'link'=>$this->checkhtaccess(),
	'permissions'=>$this->permissions(),
	), 'primary');
    $this->views->AddInclude(__DIR__ . '/sidebar.tpl.php', array('controllers'=>$controllers), 'sidebar');
  }
  
  public function checkphpversion() {
	if (version_compare(phpversion(), "5.2.0", ">=")) { 
  return true; 
} else { 
  return false; 
}   
	  
}

public function checkhtaccess() {
	$url = 'content';
	$file = $this->request->CreateUrl($url);
$file_headers = @get_headers($file);
if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
    $exists = false;
}
else {
    $exists = true;
}  
return $exists;	  
}

 public function permissions() {
	$url = getcwd();
	$url .= '/site/data';
	$perm = decoct(fileperms($url) & 0777);
	return $perm;
}


}