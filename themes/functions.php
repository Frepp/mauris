<?php
/**
* Helpers for theming, available for all themes in their template files and functions.php.
* This file is included right before the themes own functions.php
*/

/**
 * Print debuginformation from the framework.
 */
function get_debug() {
  // Only if debug is wanted.
  $ma = CMauris::Instance();  
  if(empty($ma->config['debug'])) {
    return;
  }
  
  // Get the debug output
  $html = null;
  if(isset($ma->config['debug']['db-num-queries']) && $ma->config['debug']['db-num-queries'] && isset($ma->db)) {
    $flash = $ma->session->GetFlash('database_numQueries');
    $flash = $flash ? "$flash + " : null;
    $html .= "<p>Database made $flash" . $ma->db->GetNumQueries() . " queries.</p>";
  }    
  if(isset($ma->config['debug']['db-queries']) && $ma->config['debug']['db-queries'] && isset($ma->db)) {
    $flash = $ma->session->GetFlash('database_queries');
    $queries = $ma->db->GetQueries();
    if($flash) {
      $queries = array_merge($flash, $queries);
    }
    $html .= "<p>Database made the following queries.</p><pre>" . implode('<br/><br/>', $queries) . "</pre>";
  }    
  if(isset($ma->config['debug']['timer']) && $ma->config['debug']['timer']) {
    $html .= "<p>Page was loaded in " . round(microtime(true) - $ma->timer['first'], 5)*1000 . " msecs.</p>";
  }    
  if(isset($ma->config['debug']['mauris']) && $ma->config['debug']['mauris']) {
    $html .= "<hr><h3>Debuginformation</h3><p>The content of CMauris:</p><pre>" . htmlent(print_r($ma, true)) . "</pre>";
  }    
  if(isset($ma->config['debug']['session']) && $ma->config['debug']['session']) {
    $html .= "<hr><h3>SESSION</h3><p>The content of CMauris->session:</p><pre>" . htmlent(print_r($ma->session, true)) . "</pre>";
    $html .= "<p>The content of \$_SESSION:</p><pre>" . htmlent(print_r($_SESSION, true)) . "</pre>";
  }    
  return $html;
}

/**
* Get messages stored in flash-session.
*/
function get_messages_from_session() {
  $messages = CMauris::Instance()->session->GetMessages();
  $html = null;
  if(!empty($messages)) {
    foreach($messages as $val) {
      $valid = array('info', 'notice', 'success', 'warning', 'error', 'alert');
      $class = (in_array($val['type'], $valid)) ? $val['type'] : 'info';
      $html .= "<div class='$class'>{$val['message']}</div>\n";
    }
  }
  return $html;
}

/**
* Create a url by prepending the base_url.
*/
function base_url($url) {
  return CMauris::Instance()->request->base_url . trim($url, '/');
}

/**
* Return the current url.
*/
function current_url() {
  return CMauris::Instance()->request->current_url;
}

/**
* Render all views.
*/
function render_views() {
  return CMauris::Instance()->views->Render();
}
