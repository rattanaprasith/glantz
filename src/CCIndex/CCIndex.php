<?php
/**
* Standard controller layout.
* 
* @package GlantzCore
*/
class CCIndex extends CObject implements IController {
<<<<<<< HEAD
   /**
   * Constructor
   */
  public function __construct() { parent::__construct(); }
  
=======
   /**
* Constructor
*/
  public function __construct() {
    parent::__construct();
  }
  
   /**
    * Implementing interface IController. All controllers must have an index action.
    */
   public function Index() {        
    $this->Menu();
        }
        
        /**
         * Create a method that shows the menu, same for all methods
         */
        private function Menu() {        
                $menu = array(
                 'index', 'index/index', 'developer', 'developer/index', 'developer/links',
                 'developer/display-object', 'guestbook',
                );
                
                $html = null;
                foreach($menu as $val) {
                 $html .= "<li><a href='" . $this->request->CreateUrl($val) . "'>$val</a>";
                }
                
                $this->data['title'] = "The Index Controller";
                $this->data['main'] = <<<EOD
<h1>The Index Controller</h1>
<p>This is what you can do for now:</p>
<ul>
$html
</ul>
EOD;
  }
>>>>>>> bcfd18a5f1aeb811cb8a797e779a0c0cde1bfcea

  /**
   * Implementing interface IController. All controllers must have an index action.
   */
  public function Index() {                        
    $modules = new CMModules();
    $controllers = $modules->AvailableControllers();
    $this->views->SetTitle('Index')
                ->AddInclude(__DIR__ . '/index.tpl.php', array(), 'primary')
                ->AddInclude(__DIR__ . '/sidebar.tpl.php', array('controllers'=>$controllers), 'sidebar');
  }
}
