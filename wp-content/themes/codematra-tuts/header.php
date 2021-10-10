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
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Lato+Sans&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@700&display=swap" rel="stylesheet">

  <!-- required CSS -->
  <?php $timestamp = date('timestamp'); ?>
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/github-hljs.css">
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/all.min.css" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/slick.css" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/slick-theme.css" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/components.css" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/utils.css" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/style.css?ver=<?php echo $timestamp; ?>" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/wp-styles.css?ver=<?php echo $timestamp; ?>" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/responsive.css?ver=<?php echo $timestamp; ?>" /> 

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

<script data-ad-client="ca-pub-7518025352548928" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

</head>

<body <?php body_class(); ?>> 

<!-- Header Start -->
<header id="main_header" class="header sticky text-uppercase">
    <div class="container">
      <div class="row no-gutters">
        <div class="col-12 col-md-3 col-xl-2"> 
          <div class="site_logo with_image">
            <a title="Code Matra" class="logo_link" href="<?php echo site_url('/'); ?>">
              <img class="logo_image img-fluid"  src="<?php echo get_stylesheet_directory_uri(); ?>/images/site-logo.png" alt="" />
            </a>
          </div>
        </div>
        <div class="col-12 col-md-9 col-xl-10">
          <nav class="navbar navbar-expand-lg">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"> 
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a title="Home" class="nav-link text-dark" href="<?php echo site_url('/'); ?>"><i class="text-primary f20 fas fa-home"></i></a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link text-dark dropdown-toggle" href="javascript:void('0');">How to Code</a>
                  <div class="dropdown-menu"> 
                    <?php   
                      // Post Tags
                      $categories = get_categories( array(
                              'hide_empty' => true,
                              'order' => 'asc',
                              'orderby' => 'name'
                          )
                      );
                    
                      if ( !empty($categories) ) {  
                          foreach( $categories as $cat ) { 
                          $term_link = get_term_link( $cat );
                              if(($cat->parent == 0) && ($cat->slug != 'uncategorized') && ($cat->slug != 'projects')) {
                                  echo '<a class="dropdown-item" href="'.$term_link.'">'. esc_html( $cat->name ) .'</a>';
                              }
                          }
                      } 
                      ?> 
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link text-dark dropdown-toggle" href="javascript:void('0');">Programs</a>
                  <div class="dropdown-menu"> 
                  <?php   
                    // Post Tags
                    $taxonomies = get_terms( array(
                            'taxonomy' => 'programs-category', 
                            'hide_empty' => true,
                            'parent'=>0,
                            'order' => 'asc',
                            'orderby' => 'name'
                        )
                    );

                    if ( !empty($taxonomies) ) { 
                        foreach( $taxonomies as $category ) { 
                        $term_link = get_term_link( $category );
                            if($category->parent == 0) {
                                echo '<a class="dropdown-item" href="'.$term_link.'">'. esc_html( $category->name ) .'</a>';
                            }
                        }
                    } 
                    ?> 
                  </div>
                </li>
                <!-- <li class="nav-item">
                  <a class="nav-link text-dark" href="<?php echo site_url('/quizzes'); ?>">Quizzes</a>
                </li> -->
                <li class="nav-item dropdown">
                  <a class="nav-link text-dark dropdown-toggle" href="javascript:void('0');">MCQs</a>
                  <div class="dropdown-menu"> 
                  <?php   
                    // Post Tags
                    $taxonomies = get_terms( array(
                            'taxonomy' => 'mcqs-category', 
                            'hide_empty' => true,
                            'parent'=> 0,
                            'order' => 'asc',
                            'orderby' => 'name'
                        )
                    );

                    if ( !empty($taxonomies) ) { 
                        foreach( $taxonomies as $category ) { 
                        $term_link = get_term_link( $category );
                            if($category->parent == 0) {
                                echo '<a class="dropdown-item" href="'.$term_link.'">'. esc_html( $category->name ) .'</a>';
                            }
                        }
                    } 
                    ?> 
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link text-dark dropdown-toggle" href="javascript:void('0');">Interview</a>
                  <div class="dropdown-menu"> 
                  <?php   
                    // Post Tags
                    $taxonomies = get_terms( array(
                            'taxonomy' => 'interview-questions-category', 
                            'hide_empty' => true,
                            'parent'=> 0,
                            'order' => 'asc',
                            'orderby' => 'name'
                        )
                    );

                    if ( !empty($taxonomies) ) { 
                        foreach( $taxonomies as $category ) { 
                        $term_link = get_term_link( $category );
                            if($category->parent == 0) {
                                echo '<a class="dropdown-item" href="'.$term_link.'">'. esc_html( $category->name ) .'</a>';
                            }
                        }
                    } 
                    ?> 
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link text-dark dropdown-toggle" href="javascript:void('0');">Templates</a>
                  <div class="dropdown-menu"> 
                    <a class="dropdown-item" href="<?php echo site_url('/templates/cm-blog-bootstrap/'); ?>">CM Blog Template <span class="badge badge-secondary r_0 ">New!</span></a>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link text-dark dropdown-toggle" href="javascript:void('0');">Projects</a>
                  <div class="dropdown-menu"> 
                    <a class="dropdown-item" href="<?php echo site_url('/write-a-program-to-create-a-simple-calculator-using-php/'); ?>">Simple Calculator</a>
                    <a class="dropdown-item" href="<?php echo site_url('/learn-to-create-a-simple-contact-book-project-in-php/'); ?>">Basic Contact Book<span class="badge badge-secondary r_0 ">New!</span></a>
                    <a class="dropdown-item disabled" href="#<?php //echo site_url('/templates/simple-contact-book/'); ?>">Portfolio<span class="badge badge-secondary r_0 ">Coming Soon!</span></a>
                    <a class="dropdown-item disabled" href="#<?php //echo site_url('/templates/simple-contact-book/'); ?>">Chat App<span class="badge badge-secondary r_0 ">Coming Soon!</span></a>
                    <a class="dropdown-item disabled" href="#<?php //echo site_url('/templates/simple-contact-book/'); ?>">Quiz App<span class="badge badge-secondary r_0 ">Coming Soon!</span></a>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link text-dark dropdown-toggle" href="javascript:void('0');">Tools</a>
                  <div class="dropdown-menu"> 
                    <a class="dropdown-item" href="<?php echo site_url('/base64-encode-and-decode/'); ?>">Base64 Encoder</a>
                    <a class="dropdown-item" href="<?php echo site_url('/base64-encode-and-decode/?tool=decode'); ?>">Base64 Decoder</a>
                    <a class="dropdown-item" href="<?php echo site_url('/list-to-array-Converter/'); ?>">List to Array</a>
                    <a class="dropdown-item" href="<?php echo site_url('/list-to-html-list-Converter/'); ?>">List to HTML List</a>
                    <a class="dropdown-item" href="<?php echo site_url('/minify-css/'); ?>">Minify CSS</a>
                    <a class="dropdown-item" href="<?php echo site_url('/minify-html/'); ?>">Minify HTML</a>
                    <a class="dropdown-item" href="<?php echo site_url('/minify-js/'); ?>">Minify JS</a>
                    <a class="dropdown-item" href="<?php echo site_url('/excel-to-array-Converter/'); ?>">Excel To Array</a>
                    <a class="dropdown-item" href="<?php echo site_url('/excel-to-json-Converter/'); ?>">Excel To JSON</a>
                    <a class="dropdown-item" href="<?php echo site_url('/excel-to-xml-Converter/'); ?>">Excel To XML</a>
                    <a class="dropdown-item disabled" href="<?php echo site_url('/resume-maker/'); ?>">Resume Maker <span class="badge badge-secondary r_0 ">Coming Soon!</span></a>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link text-dark dropdown-toggle" title="Offers and Deals" href="javascript:void('0');">Deals <span class="badge badge-secondary r_0 "></a>
                  <div class="dropdown-menu deals-dropdown"> 
                    <a class="dropdown-item" href="<?php echo site_url('/deals/cheap-web-hosting/'); ?>">Cheap Web Hosting</a>
                    <a class="dropdown-item" href="<?php echo site_url('/deals/best-wordpress-theme/'); ?>">Best WordPress Theme</a>
                  </div>
                </li>
                <li class="nav-item dropdown search-dropdown">
                  <a href="javascript:void('0');" class="nav-link text-dark dropdown-toggle search-trigger"><i class="fa fa-search f18 text-secondary" aria-hidden="true"></i></a>
                  <div class="dropdown-menu px_0"> 
                    <form class="cbody fui fui1 search-box max_w_100p" action="<?php echo site_url(); ?>" method="get" enctype="multipart/form-data" autocomplete="off">
                      <div class="search-box">
                        <input value="<?php echo $_GET['s']; ?>" name="s" type="text" class="form-control w_300" required="required" placeholder="Search...">
                        <button type="submit" class="btn btn-sm btn-primary btnui1"><i class="fa fa-search" aria-hidden="true"></i></button>
                      </div> 
                    </form>
                  </div>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>

</header>  
<!-- Header End -->