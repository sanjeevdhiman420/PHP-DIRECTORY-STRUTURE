<?php
/**
 * Get Header Template
 */
function get_header(){
  require_once __DIR__.'../../../header.php';
}
/**
 * Get Footer Template
 */
function get_footer(){
    require_once __DIR__.'../../../footer.php';
  }
  /**
 * Get Footer Template
 */
function get_connection(){
    require_once __DIR__.'../../../env/connection.php';
  }
    /**
 * Get Bootstrap app Template
 */
function get_app(){
    require_once __DIR__.'./../../bootstrap/app.php';
   
  }

/**
 * Get action  Template exist
 */
function get_action($action){
    $actions = __DIR__.'./../core/actions/'. $action.'.php';
    if(has_action($actions)){
        return realpath($actions);
    }
    else {
        return __DIR__.'./../core/actions/fallbacks.php';
    }
  }
        /**
 * Check action  Template exist
 */
function has_action($actions){
    return file_exists($actions);
  }
?>