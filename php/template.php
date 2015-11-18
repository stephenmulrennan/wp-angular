<?php
  
  if (isset($_GET['page'])) {
    $page_slug = $_GET['page'];
    
   if ($wp_query) {
     echo "query";
   }
   else {
     echo "No Query";
   }
  }
?>