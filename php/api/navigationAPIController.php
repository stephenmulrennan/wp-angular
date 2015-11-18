<?php
  
  require_once(get_template_directory().'/php/menus.php');

  class JSON_API_Navigation_Controller {
    
    public function get_menus() {
      $wp_menus = new WP_REST_Menus();
      
      return $wp_menus->get_menus();
    }
    
    public function get_menu() {
      global $json_api;
      $wp_menus = new WP_REST_Menus();
      $name = $json_api->query->name;
      
      return $wp_menus->get_menu($name);
      
    }
  }
?>