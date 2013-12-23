<?php
/**
* Holding a instance of CGlantz to enable use of $this in subclasses.
*
* @package GlantzCore
*/
class CObject {

   public $config;
   public $request;
   public $data;
   public $db;
   public $views;
   public $session;

   /**
    * Constructor
    */
   protected function __construct() {
    $gl = CGlantz::Instance();
    $this->config   = &$gl->config;
    $this->request  = &$gl->request;
    $this->data     = &$gl->data;
    $this->db       = &$gl->db;
    $this->views = &$gl->views;
    $this->session = &$gl->session;
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
  }

}
