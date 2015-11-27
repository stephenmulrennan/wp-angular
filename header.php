<!DOCTYPE html>
<html ng-app="myApp">

<head>
  <meta charset="utf-8">
  <base href="/">
  
  <title ng-bind="pageTitle"></title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">

  <script type="text/javascript">
    window.themeUrl = "<?php echo get_template_directory_uri();?>";
  </script>
  <?php wp_head(); ?>
</head>

<body>
  <div id="wrap">
    <div id="header">
      <div class="container">
        <header class="row" id="pageHeader">
          <div class="col-md-6">
            <div id="logo">
              <a href="<?php echo site_url();?>" title="McIntyre O'Brien Solicitors">
                <img class="img-responsive" src="<?php bloginfo('template_directory');?>/images/title_new.png" />
              </a>
            </div>
          </div>
          <div class="col-md-4 col-md-offset-2 visible-md visible-lg">
            <div class="row contact-info">
              <div class="col-md-4">
                <div class="row">
                  <?php echo get_option('contact_address_line1');?>
                </div>
                <div class="row">
                  <?php echo get_option('contact_address_line2');?>
                </div>
                <div class="row">
                  <?php echo get_option('contact_address_line3');?>
                </div>
              </div>
              <div class="col-md-8">
                <div class="row">
                  <div class="col-md-3">Phone:</div>
                  <div class="col-md-9">
                    <?php echo get_option('contact_phone');?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">Fax:</div>
                  <div class="col-md-9">
                    <?php echo get_option('contact_fax');?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">Email:</div>
                  <div class="col-md-9">
                    <a href="mailto:<?php echo get_option('contact_email');?>">
                      <?php echo get_option('contact_email');?>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </header>
      </div>
      <nav class="navbar navbar-default" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          
          <!-- sm-menu is defined as an angular directive which loads templates/menu.html -->
          <div class="collapse navbar-collapse sm-menu" id="bs-navbar"></div>
          
          <ul class="nav navbar-nav navbar-right">
            <li>
              <button type="button" data-target="#callbackModal" data-toggle="modal" class="btn">
                <span class="glyphicon glyphicon-earphone"></span> Request a Callback
              </button>
            </li>
          </ul>
        </div>
      </nav>
      <div class="container visible-xs">
        <div class="row">
          <div class="col-xs-12 callme">
            <a href='tel://<?php echo get_option(' contact_phone_url ');?>' class="btn"><span class="glyphicon glyphicon-earphone"></span> Call Now</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Callback Modal Div -->
    <!-- Modal -->
    
      <div class="container">