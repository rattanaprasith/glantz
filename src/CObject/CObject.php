<?php
/**
* Holding a instance of CGlantz to enable use of $this in subclasses.
*
* @package GlantzCore
*/
class CObject {

<<<<<<< HEAD
        protected $gl;
        protected $config;        
        protected $request;
        protected $data;
        protected $db;
        protected $views;
        protected $session;
        protected $user;
=======
   public $config;
   public $request;
   public $data;
   public $db;
   public $views;
   public $session;
>>>>>>> bcfd18a5f1aeb811cb8a797e779a0c0cde1bfcea

   /**
    * Constructor
    */
<<<<<<< HEAD
   protected function __construct($gl=null) {
     if(!$gl) {
      $gl = CGlantz::Instance();
    }
    $this->ly       = &$gl;
=======
   protected function __construct() {
    $gl = CGlantz::Instance();
>>>>>>> bcfd18a5f1aeb811cb8a797e779a0c0cde1bfcea
    $this->config   = &$gl->config;
    $this->request  = &$gl->request;
    $this->data     = &$gl->data;
    $this->db       = &$gl->db;
    $this->views = &$gl->views;
    $this->session = &$gl->session;
<<<<<<< HEAD
    $this->user     = &$gl->user;
  }
  
    /**
         * Wrapper for same method in CGlantz. See there for documentation.
         */
        protected function RedirectTo($urlOrController=null, $method=null, $arguments=null) {
    $this->ly->RedirectTo($urlOrController, $method, $arguments);
  }


        /**
         * Wrapper for same method in CGlantz. See there for documentation.
         */
        protected function RedirectToController($method=null, $arguments=null) {
    $this->ly->RedirectToController($method, $arguments);
  }


        /**
         * Wrapper for same method in CGlantz. See there for documentation.
         */
        protected function RedirectToControllerMethod($controller=null, $method=null, $arguments=null) {
    $this->ly->RedirectToControllerMethod($controller, $method, $arguments);
  }


       /**
         * Wrapper for same method in CGlantz. See there for documentation.
         */
  protected function AddMessage($type, $message, $alternative=null) {
    return $this->ly->AddMessage($type, $message, $alternative);
  }


        /**
         * Wrapper for same method in CGlantz. See there for documentation.
         */
        protected function CreateUrl($urlOrController=null, $method=null, $arguments=null) {
    return $this->ly->CreateUrl($urlOrController, $method, $arguments);
=======
  }
  
   /**
   * Redirect to another url and store the session
   */
    protected function RedirectTo($url) {
    $gl = CGlantz::Instance();
    if(isset($gl->config['debug']['db-num-queries']) && $gl->config['debug']['db-num-queries'] && isset($gl->db)) {
      $this->session->SetFlash('database_numQueries', $this->db->GetNumQueries());
    }    
    if(isset($gl->config['debug']['db-queries']) && $gl->config['debug']['db-queries'] && isset($gl->db)) {
      $this->session->SetFlash('database_queries', $this->db->GetQueries());
    }    
    if(isset($gl->config['debug']['timer']) && $gl->config['debug']['timer']) {
            $this->session->SetFlash('timer', $gl->timer);
    }    
    $this->session->StoreInSession();
    header('Location: ' . $this->request->CreateUrl($url));
>>>>>>> bcfd18a5f1aeb811cb8a797e779a0c0cde1bfcea
  }

}
