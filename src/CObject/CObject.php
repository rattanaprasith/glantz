<?php
/**
* Holding a instance of CGlantz to enable use of $this in subclasses.
*
* @package GlantzCore
*/
class CObject {

        protected $gl;
        protected $config;        
        protected $request;
        protected $data;
        protected $db;
        protected $views;
        protected $session;
        protected $user;

   /**
    * Constructor
    */
   protected function __construct($gl=null) {
     if(!$gl) {
      $gl = CGlantz::Instance();
    }
    $this->ly       = &$gl;
    $this->config   = &$gl->config;
    $this->request  = &$gl->request;
    $this->data     = &$gl->data;
    $this->db       = &$gl->db;
    $this->views = &$gl->views;
    $this->session = &$gl->session;
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
  }

}

