<?php
  $path = $_SERVER['DOCUMENT_ROOT'].'/wp-load.php';
  
  require_once ($path);
  
  if (isset($_GET['page'])) {
    $page = get_page_by_path($_GET['page']);
    $template = get_post_meta( $page->ID, '_wp_page_template', true );
    
    include ( '../'.$template );
  }
  else if (isset($_GET['template'])) {
    $template = $_GET['template'];
    include ( '../page-templates/'.$template.'.php' );
  }
  
?>