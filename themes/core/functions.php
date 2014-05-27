<?php
/**
* Helpers for the template file.
*/
$ma->data['header'] = '<h1>Header: Mauris</h1>';
if(!isset($ma->data['main'])){
$ma->data['main']   = '<p>Main: Now with a theme engine, Not much more to report for now.</p>';
}
$ma->data['footer'] = '<p>Footer: &copy; Mauris by Fredrik Petersson based on Lydia &copy; Mikael Roos (mos@dbwebb.se)</p>';


/**
* Print debuginformation from the framework.
*/
function get_debug() {
  $ma = CMauris::Instance();
  $html = "<h2>Debuginformation</h2><hr><p>The content of the config array:</p><pre>" . htmlentities(print_r($ma->config, true)) . "</pre>";
  $html .= "<hr><p>The content of the data array:</p><pre>" . htmlentities(print_r($ma->data, true)) . "</pre>";
  $html .= "<hr><p>The content of the request array:</p><pre>" . htmlentities(print_r($ma->request, true)) . "</pre>";
  return $html;
  
  
}