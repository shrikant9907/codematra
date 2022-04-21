<!doctype html>
<html <?php language_attributes(); ?>>
<head> 
                
  <title><?php wp_title(); ?></title>
 
  <!-- Required meta tags -->
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="facebook-domain-verification" content="hvn214hz6iiy3uzyxq6dw95l6oftch" />
  
  <!-- Favicon -->
  <link rel='icon' href='<?php echo get_stylesheet_directory_uri(); ?>/images/codematra-favicon.png' type='image/x-icon' />
  <meta name="site-icon" content="<?php echo get_stylesheet_directory_uri(); ?>/images/codematra-favicon.png" />
  <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/codematra-favicon.png" />

  <!-- required Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">

  <!-- Assets CSS -->
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/bootstrap-icons/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fontawesome/css/all.min.css" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/animate/animate.min.css" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/github-hljs.css">
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/components.css" />

  <!-- Theme CSS -->
  <?php $timestamp = date('timestamp'); ?>
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/style.css?ver=<?php echo $timestamp; ?>" />

  <?php wp_head(); ?>

  <!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '558744968667398');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=558744968667398&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

<!-- <script data-ad-client="ca-pub-7518025352548928" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->

</head>

<body <?php body_class(); ?>> 

<?php get_template_part( 'template-parts/header', 'full' ); ?>