<!-- Header Start -->
<header id="main_header" class="header site-header sticky">
    <div class="container">
      <div class="row no-gutters">
        <div class="col-12 col-md-3 col-xl-3">  
          <div class="site_logo with_image">
            <a title="Code Matra" class="logo_link" href="<?php echo site_url('/'); ?>">
              <img class="max_h_45 logo_image img-fluid"  src="<?php echo get_stylesheet_directory_uri(); ?>/images/site-logo.png" alt="" />
            </a>
          </div>
        </div>
        <div class="col-12 col-md-9 col-xl-9">
          <nav class="navbar navbar-expand-lg">
            <span class="d-lg-none hamburger toggleMenu collapsed" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="bar bar1"></span>
              <span class="bar bar2"></span>
              <span class="bar bar3"></span>
            </span>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <form class="cbody fui mr_10 search-form fui1 w-100" action="<?php echo site_url(); ?>" method="get" enctype="multipart/form-data" autocomplete="off">
                <div class="search-box w-100">
                  <input value="<?php echo $_GET['s']; ?>" name="s" type="text" class="form-control w-100" required="required" placeholder="What do you want to learn?">
                  <button type="submit" class="btn">
                    <i class="bi bi-search"></i>
                  </button>
                </div> 
              </form>
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo site_url('/'); ?>"><i class="f16 mr_5 bi bi-house-door"></i> Home</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link text-dark dropdown-toggle" href="javascript:void('0');">Learn</a>
                  <div class="dropdown-menu ddmfull"> 
                    <div class="container">
                    <div class="row">
                      <div class="col-12 col-lg-3">
                        <div class="card cui1"> 
                          <h4 class="ncheading">Learn To Code</h4>
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
                                    echo '<a class="ahpri" href="'.$term_link.'">'. esc_html( $cat->name ) .'</a>';
                                }
                              }
                            } 
                            ?> 
                        </div>
                      </div>
                      <div class="col-12 col-lg-3">
                        <div class="card cui1"> 
                          <h4 class="ncheading">Programs for Practice</h4>
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
                                        echo '<a class="ahpri" href="'.$term_link.'">'. esc_html( $category->name ) .'</a>';
                                    }
                                }
                            } 
                            ?> 
                        </div>
                      </div>
                      <div class="col-12 col-lg-3">
                        <div class="card cui1"> 
                          <h4 class="ncheading">MCQs - Test your skills</h4>
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
                                        echo '<a class="ahpri" href="'.$term_link.'">'. esc_html( $category->name ) .'</a>';
                                    }
                                }
                            } 
                            ?> 
                        </div>
                      </div>
                      <div class="col-12 col-lg-3">
                        <div class="card cui1"> 
                          <h4 class="ncheading">Interview Questions</h4>
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
                                        echo '<a class="ahpri" href="'.$term_link.'">'. esc_html( $category->name ) .'</a>';
                                    }
                                }
                            } 
                          ?> 
                        </div>
                      </div>
                      
                    </div>
                    </div>
                  </div>
                </li>
         
                <li class="nav-item dropdown">
                  <a class="nav-link text-dark dropdown-toggle" href="javascript:void('0');">Free Templates</a>
                  <div class="dropdown-menu"> 
                    <a class="dropdown-item" href="<?php echo site_url('/templates/cm-blog-bootstrap/'); ?>">Blog Template</a>
                    <a class="dropdown-item" href="<?php echo site_url('/templates/portfolio-template/'); ?>">Portfolio Template <span class="badge badge-secondary r_0 ">New!</span></a>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link text-dark dropdown-toggle" href="javascript:void('0');">Projects</a>
                  <div class="dropdown-menu"> 
                    <a class="dropdown-item" href="<?php echo site_url('/write-a-program-to-create-a-simple-calculator-using-php/'); ?>">Simple Calculator</a>
                    <a class="dropdown-item" href="<?php echo site_url('/learn-to-create-a-simple-contact-book-project-in-php/'); ?>">Basic Contact Book<span class="badge badge-secondary r_0 ">New!</span></a>
                    <!-- <a class="dropdown-item disabled" href="#<?php //echo site_url('/templates/simple-contact-book/'); ?>">Portfolio<span class="badge badge-secondary r_0 ">Coming Soon!</span></a> -->
                    <!-- <a class="dropdown-item disabled" href="#<?php //echo site_url('/templates/simple-contact-book/'); ?>">Chat App<span class="badge badge-secondary r_0 ">Coming Soon!</span></a> -->
                    <!-- <a class="dropdown-item disabled" href="#<?php //echo site_url('/templates/simple-contact-book/'); ?>">Quiz App<span class="badge badge-secondary r_0 ">Coming Soon!</span></a> -->
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
                  </div>
                </li>
                <!-- <li class="nav-item dropdown">
                  <a class="nav-link text-dark dropdown-toggle" title="Offers and Deals" href="javascript:void('0');">Deals <span class="badge badge-secondary r_0 "></a>
                  <div class="dropdown-menu deals-dropdown"> 
                    <a class="dropdown-item" href="<?php //echo site_url('/deals/cheap-web-hosting/'); ?>">Cheap Web Hosting</a>
                    <a class="dropdown-item" href="<?php //echo site_url('/deals/best-wordpress-theme/'); ?>">Best WordPress Theme</a>
                  </div>
                </li> -->
              </ul>
              
            </div>
          </nav>
        </div>
      </div>
    </div>

</header>  
<!-- Header End -->