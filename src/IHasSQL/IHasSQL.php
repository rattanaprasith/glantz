<?php
/**
* Interface for class that interacts with the database to encapsulates all SQL requests.
*
* @package GlantzCore
*/
interface IHasSQL {
  public static function SQL($key=null);
}
