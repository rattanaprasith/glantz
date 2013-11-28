<?php
//
// PHASE: BOOTSTRAP
//
define('GLANTZ_INSTALL_PATH', dirname(__FILE__));
define('GLANTZ_SITE_PATH', GLANTZ_INSTALL_PATH . '/site');

require(GLANTZ_INSTALL_PATH.'/src/CGlantz/bootstrap.php');

$glantz = CGlantz::Instance();

//
// PHASE: FRONTCONTROLLER ROUTE
//
$gl->FrontControllerRoute();

//
// PHASE: THEME ENGINE RENDER
//
$gl->ThemeEngineRender();
