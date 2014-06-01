<?php
/**
* Holding a instance of CMauris to enable use of $this in subclasses.
*
* @package MaurisCore
*/
class CObject {

	/**
	 * Members
	 */
   public $config;
   public $request;
   public $data;
   public $db;
   public $views;
   public $session;
   public $user;
   

  /**
   * Constructor, can be instantiated by sending in the $ma reference.
   */
  protected function __construct($ma=null) {
    if(!$ma) {
      $ma = CMauris::Instance();
    } 
    $this->config   = &$ma->config;
    $this->request  = &$ma->request;
    $this->data     = &$ma->data;
    $this->db       = &$ma->db;
    $this->views    = &$ma->views;
    $this->session  = &$ma->session;
    $this->user     = &$ma->user;
  }
  
  	
	/**
	 * Redirect to another url and store the session
	 * @param $url string the relative url or the controller
 	 * @param $method string the method to use, $url is then the controller or empty for current controller
 	 * @param $arguments string the extra arguments to send to the method
	 */
	protected function RedirectTo($urlOrController=null, $method=null, $arguments=null) {
    $ma = CMauris::Instance();
    if(isset($ma->config['debug']['db-num-queries']) && $this->config['debug']['db-num-queries'] && isset($this->db)) {
      $this->session->SetFlash('database_numQueries', $this->db->GetNumQueries());
    }    
    if(isset($this->config['debug']['db-queries']) && $this->config['debug']['db-queries'] && isset($this->db)) {
      $this->session->SetFlash('database_queries', $this->db->GetQueries());
    }    
    if(isset($this->config['debug']['timer']) && $this->config['debug']['timer']) {
	    $this->session->SetFlash('timer', $ma->timer);
    }    
    $this->session->StoreInSession();
    header('Location: ' . $this->request->CreateUrl($urlOrController, $method, $arguments));
  }
  
  
  	/**
	 * Redirect to a method within the current controller. Defaults to index-method. Uses RedirectTo().
	 *
	 * @param string method name the method, default is index method.
	 * @param $arguments string the extra arguments to send to the method
	 */
	protected function RedirectToController($method=null, $arguments=null) {
    $this->RedirectTo($this->request->controller, $method, $arguments);
  }


	/**
	 * Redirect to a controller and method. Uses RedirectTo().
	 *
	 * @param string controller name the controller or null for current controller.
	 * @param string method name the method, default is current method.
	 * @param $arguments string the extra arguments to send to the method
	 */
	protected function RedirectToControllerMethod($controller=null, $method=null, $arguments=null) {
	  $controller = is_null($controller) ? $this->request->controller : null;
	  $method = is_null($method) ? $this->request->method : null;	  
    $this->RedirectTo($this->request->CreateUrl($controller, $method, $arguments));
  }
  

	/**
	 * Save a message in the session. Uses $this->session->AddMessage()
	 *
   * @param $type string the type of message, for example: notice, info, success, warning, error.
   * @param $message string the message.
   */
  protected function AddMessage($type, $message, $alternative=null) {
    if($type === false) {
      $type = 'error';
      $message = $alternative;
    } else if($type === true) {
      $type = 'success';
    }
    $this->session->AddMessage($type, $message);
  }


	/**
	 * Create an url. Uses $this->request->CreateUrl()
	 *
	 * @param $urlOrController string the relative url or the controller
	 * @param $method string the method to use, $url is then the controller or empty for current
	 * @param $arguments string the extra arguments to send to the method
	 */
	protected function CreateUrl($urlOrController=null, $method=null, $arguments=null) {
    return $this->request->CreateUrl($urlOrController, $method, $arguments);
  }


}