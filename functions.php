<?php 
  if (false) {
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);	
  }
  
  function getPageTemplate() {
    get_template_directory().'index.php';
  }

  add_filter( "page_template", "getPageTemplate" );

  function addNavigationController($controllers) {
    $controllers[] = 'navigation';
    return $controllers;
  }

  add_filter('json_api_controllers', addNavigationController);

  function setNavigationControllerPath() {
    
    return get_template_directory().'/php/api/navigationAPIController.php';
  }

  add_filter('json_api_navigation_controller_path', setNavigationControllerPath);

  function addJQueryScript() {
    wp_enqueue_script( 'jquery', get_template_directory_uri() .'/js/jquery-2.1.4', array(), '2.1.4', true);	 
  }

  function addBootstrapScript() {
    wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() .'/js/bootstrap.js', array(), '3.3.5', true);	  
  }

  function addAngularScripts() {
    wp_enqueue_script( 'angularjs', get_template_directory_uri() .'/js/angular.js', array(), '1.4.7', true);	
    wp_enqueue_script( 'angularroutejs', get_template_directory_uri() .'/js/angular-route.js', array(), '1.4.7', true);
  }
  
  function addAppScripts() {
    wp_enqueue_script( 'navjs', get_template_directory_uri() .'/js/nav.js', array(), '1.0.0', true);
    wp_enqueue_script( 'appjs', get_template_directory_uri() .'/js/app.js', array(), '1.0.0', true);	
  }

  function addBuiltScript() {
    wp_enqueue_script( 'appjs', get_template_directory_uri() .'/build/js/app.js', array(), '1.0.0', true);	
  }

  function addScripts() {
    addJQueryScript();
    addBootstrapScript();
    addAngularScripts();
    addAppScripts();
  }

  function register_my_menus() {
    register_nav_menus( array(
      'primary' => __( 'Primary Menu', 'WP Mega Menu 1.0' ),
      'sidebar' => __('Sidebar Menu', 'Sidebar manu'),
      'footer' => __('Footer Navigation', 'Footer Navigation')
    ));
  }

  add_action( 'wp_enqueue_scripts', 'addScripts');

  add_action( 'after_setup_theme', 'register_my_menus' );
?>