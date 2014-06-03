<?php
/**
* Site configuration, this file is changed by user per site.
*
*/

/*
* Set level of error reporting
*/
error_reporting(-1);
ini_set('display_errors', 1);



/**
* Set what to show as debug or developer information in the get_debug() theme helper.
*/
$ma->config['debug']['mauris'] = true;
$ma->config['debug']['session'] = true;
$ma->config['debug']['timer'] = false;
$ma->config['debug']['db-num-queries'] = true;
$ma->config['debug']['db-queries'] = true;


/**
* Set database(s).
*/
$ma->config['database'][0]['dsn'] = 'sqlite:' . MAURIS_SITE_PATH . '/data/.ht.sqlite';


/**
* What type of urls should be used?
* 
* default      = 0      => index.php/controller/method/arg1/arg2/arg3
* clean        = 1      => controller/method/arg1/arg2/arg3
* querystring  = 2      => index.php?q=controller/method/arg1/arg2/arg3
*/
$ma->config['url_type'] = 1;


/**
* Set a base_url to use another than the default calculated
*/
$ma->config['base_url'] = null;


/*
* Define session name
*/
$ma->config['session_name'] = preg_replace('/[:\.\/-_]/', '', $_SERVER["SERVER_NAME"]);
$ma->config['session_key']  = 'mauris';


/*
* Define server timezone
*/
$ma->config['timezone'] = 'Europe/Stockholm';


/*
* Define internal character encoding
*/
$ma->config['character_encoding'] = 'UTF-8';


/*
* Define language
*/
$ma->config['language'] = 'en';


/**
* Define the controllers, their classname and enable/disable them.
*
* The array-key is matched against the url, for example: 
* the url 'developer/dump' would instantiate the controller with the key "developer", that is 
* CCDeveloper and call the method "dump" in that class. This process is managed in:
* $ma->FrontControllerRoute();
* which is called in the frontcontroller phase from index.php.
*/
$ma->config['controllers'] = array(
  'index'     => array('enabled' => true,'class' => 'CCIndex'),
  'developer' => array('enabled' => true,'class' => 'CCDeveloper'),
  'guestbook' => array('enabled' => true,'class' => 'CCGuestbook'),
  'user'      => array('enabled' => true,'class' => 'CCUser'),
  'acp'       => array('enabled' => true,'class' => 'CCAdminControlPanel'),
  'content'   => array('enabled' => true,'class' => 'CCContent'),
  'blog'      => array('enabled' => true,'class' => 'CCBlog'),
  'page'      => array('enabled' => true,'class' => 'CCPage'),
  'theme'     => array('enabled' => true,'class' => 'CCTheme'),
  'module'     => array('enabled' => true,'class' => 'CCModules'),
  'my'        => array('enabled' => true,'class' => 'CCMycontroller'),
);

/**
* Define a routing table for urls.
*
* Route custom urls to a defined controller/method/arguments
*/
$ma->config['routing'] = array(
  'home' => array('enabled' => true, 'url' => 'index/index'),
);



/**
  * Define menus.
  *
  * Create hardcoded menus and map them to a theme region through $ly->config['theme'].
  */
 $ma->config['menus'] = array(
   'navbar' => array(
     'home'      => array('label'=>'Home', 'url'=>'home'),
     'modules'   => array('label'=>'Modules', 'url'=>'module'),
     'content'   => array('label'=>'Content', 'url'=>'content'),
     'guestbook' => array('label'=>'Guestbook', 'url'=>'guestbook'),
     'blog'      => array('label'=>'Blog', 'url'=>'blog'),
	 ),
   	'my-navbar' => array(
     'home'      => array('label'=>'About Me', 'url'=>'my'),
     'blog'      => array('label'=>'My Blog', 'url'=>'my/blog'),
     'guestbook' => array('label'=>'Guestbook', 'url'=>'my/guestbook'),
   ),
 );

/**
* Settings for the theme.
*/
$ma->config['theme'] = array(
  'path'            => 'site/themes/mytheme',
  // 'path'            => 'themes/grid',
   'parent'          => 'themes/grid',
   'stylesheet'      => 'style.css',
   'template_file'   => 'index.tpl.php',
   'regions' => array('navbar', 'flash','featured-first','featured-middle','featured-last',
      'primary','sidebar','triptych-first','triptych-middle','triptych-last',
      'footer-column-one','footer-column-two','footer-column-three','footer-column-four',
      'footer',
    ),
  'menu_to_region' => array('my-navbar'=>'navbar'), 
  'data' => array(
    'header' => 'Mauris',
    'slogan' => 'A complex way to make it simple',
    'favicon' => 'logo.png',
    'logo' => 'logo.png',
    'logo_width'  => 80,
    'logo_height' => 80,
    'footer' => '<p>Mauris &copy; by Fredrik Peterson based on Lydia &copy; by Mikael Roos (mos@dbwebb.se)</p>',
  ),
);

/**
* How to hash password of new users, choose from: plain, md5salt, md5, sha1salt, sha1.
*/
$ma->config['hashing_algorithm'] = 'sha1salt';


/**
* Allow or disallow creation of new user accounts.
*/
$ma->config['create_new_users'] = true;




