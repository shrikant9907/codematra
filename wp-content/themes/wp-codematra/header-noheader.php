<!doctype html>
<html <?php language_attributes(); ?>>
<head> 
                
  <title><?php wp_title(); ?></title>
 
  <!-- Required meta tags -->
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Favicon -->
  <link rel='icon' href='<?php echo get_stylesheet_directory_uri(); ?>/images/codematra-favicon.png' type='image/x-icon' />
  <meta name="site-icon" content="<?php echo get_stylesheet_directory_uri(); ?>/images/codematra-favicon.png" />
  <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/codematra-favicon.png" />

  <!-- required Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Lato+Sans&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@700&display=swap" rel="stylesheet">

  <!-- required CSS -->
  <?php $timestamp = date('timestamp'); ?>
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/bootstrap.min.css?ver=<?php echo $timestamp; ?>" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/all.min.css" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/slick.css" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/slick-theme.css" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/components.css" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/utils.css?ver=<?php echo $timestamp; ?>" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/style.css?ver=<?php echo $timestamp; ?>" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/wp-styles.css?ver=<?php echo $timestamp; ?>" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/responsive.css?ver=<?php echo $timestamp; ?>" /> 
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/codemirror.css?ver=<?php echo $timestamp; ?>">

  <?php wp_head(); ?>
</head>

<body <?php body_class( ' pti_0'); ?>> 

<!-- Header Start -->
<header class="header-2 py_5">
  <div class="container">
    <div class="row">
      <div class="col-12"> 
        <a class="tdn f18 text-primary" href="javascript:void('0');" onclick="history.back();"> <i class="fas fa-angle-left"></i> Back</a>
      </div>
    </div>
  </div>
</header>  
<!-- Header End -->