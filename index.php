<?php

//
// PHASE: BOOTSTRAP
//
define('MAURIS_INSTALL_PATH', dirname(__FILE__));
define('MAURIS_SITE_PATH', MAURIS_INSTALL_PATH . '/site');

require(MAURIS_INSTALL_PATH.'/src/CMauris/bootstrap.php');

$ma = CMauris::Instance();


//
// PHASE: FRONTCONTROLLER ROUTE
//
$ma->FrontControllerRoute();


//
// PHASE: THEME ENGINE RENDER
//
$ma->ThemeEngineRender();
