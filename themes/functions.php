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
  $gl = CGlantz::Instance();  
  if(empty($gl->config['debug'])) {
    return;
  }
  
  // Get the debug output
 $html = null;
  if(isset($gl->config['debug']['db-num-queries']) && $gl->config['debug']['db-num-queries'] && isset($gl->db)) {
    $flash = $gl->session->GetFlash('database_numQueries');
    $flash = $flash ? "$flash + " : null;
    $html .= "<p>Database made $flash" . $gl->db->GetNumQueries() . " queries.</p>";
  }
  if(isset($gl->config['debug']['db-queries']) && $gl->config['debug']['db-queries'] && isset($gl->db)) {
    $flash = $gl->session->GetFlash('database_queries');
    $queries = $gl->db->GetQueries();
    if($flash) {
      $queries = array_merge($flash, $queries);
    }
    $html .= "<p>Database made the following queries.</p><pre>" . implode('<br/><br/>', $queries) . "</pre>";
  }
  if(isset($gl->config['debug']['timer']) && $gl->config['debug']['timer']) {
    $html .= "<p>Page was loaded in " . round(microtime(true) - $gl->timer['first'], 5)*1000 . " msecs.</p>";
  }
  if(isset($gl->config['debug']['glantz']) && $gl->config['debug']['glantz']) {
    $html .= "<hr><h3>Debuginformation</h3><p>The content of CGlantz:</p><pre>" . htmlent(print_r($gl, true)) . "</pre>";
  }
  if(isset($gl->config['debug']['session']) && $gl->config['debug']['session']) {
    $html .= "<hr><h3>SESSION</h3><p>The content of CGlantz->session:</p><pre>" . htmlent(print_r($gl->session, true)) . "</pre>";
    $html .= "<p>The content of \$_SESSION:</p><pre>" . htmlent(print_r($_SESSION, true)) . "</pre>";
  }
  return $html;
    
}

/**
* Get messages stored in flash-session.
*/
function get_messages_from_session() {
  $messages = CGlantz::Instance()->session->GetMessages();
  $html = null;
  if(!empty($messages)) {
    foreach($messages as $val) {
      $valid = array('info', 'notice', 'success', 'warning', 'error', 'alert');
      $class = (in_array($val['type'], $valid)) ? $val['type'] : 'info';
      $html .= "<div class='$class'>{$val['message']}</div>\n";
    }
  }
}
/**
* Create a url by prepending the base_url.
*/
function base_url($url) {
  return CGlantz::Instance()->request->base_url . trim($url, '/');
}

/**
 * Return the current url.
 */
function current_url() {
  return CGlantz::Instance()->request->current_url;
}

/**
* Prepend the theme_url, which is the url to the current theme directory.
*/
function theme_url($url) {
  $gl = CGlantz::Instance();
  return "{$gl->request->base_url}themes/{$gl->config['theme']['name']}/{$url}";
}

/**
* Render all views.
*/
function render_views() {
  return CGlantz::Instance()->views->Render();
}
