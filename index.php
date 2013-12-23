<?php
//
// PHASE: BOOTSTRAP
//
define('GLANTZ_INSTALL_PATH', dirname(__FILE__));
define('GLANTZ_SITE_PATH', GLANTZ_INSTALL_PATH . '/site');

require(GLANTZ_INSTALL_PATH.'/src/bootstrap.php');

$gl = CGlantz::Instance();

//
// PHASE: FRONTCONTROLLER ROUTE
//
$gl->FrontControllerRoute();

//
// PHASE: THEME ENGINE RENDER
//
$gl->ThemeEngineRender();
