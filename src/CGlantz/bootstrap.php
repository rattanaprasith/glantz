<?php
/**
* Bootstrapping, setting up and loading the core.
*
* @package GlantzCore
*/

/**
* Enable auto-load of class declarations.
*/
function autoload($aClassName) {
  $classFile = "/src/{$aClassName}/{$aClassName}.php";
   $file1 = GLANTZ_SITE_PATH . $classFile;
   $file2 = GLANTZ_INSTALL_PATH . $classFile;
   if(is_file($file1)) {
      require_once($file1);
   } elseif(is_file($file2)) {
      require_once($file2);
   }
}
spl_autoload_register('autoload');
