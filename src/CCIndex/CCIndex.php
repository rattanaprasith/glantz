<?php
/**
* Standard controller layout.
* 
* @package GlantzCore
*/
class CCIndex implements IController {

   /**
    * Implementing interface IController. All controllers must have an index action.
    */
   public function Index() {   
      global $gl;
      $gl->data['title'] = "The Index Controller";
   }

}
