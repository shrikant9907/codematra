<?php get_header(); ?> 
<h1 class="text-center mb_0 text-secondary border-top ptb_40 mont_serrat f30 lh32"><?php the_title(); ?></h1>
<section class="common-section-ui page-breadcrumb border-top border-bottom pti_10 pbi_10">
  <div class="container">
    <p class="text-muted f14 m-0">
      <a class="tdn text-secondary" href="<?php echo site_url(); ?>" class="text-muted">Home</a> / 
      <a class="tdn text-secondary" href="<?php echo site_url('/programs-category/javascript/'); ?>" class="text-muted">JavaScript</a> / 
      <?php the_title(); ?>
    </p>
  </div>
</section> 
 <section class="common-section-ui pb_60">
    <div class="container">
      <div class="row">

        <div class="col-12 col-md-8">
    
         <div id="basics" class="card cui2 p_10 mb_20 jsbasics">
            <div class="card-header">
              <h3 class='card-title text-primary m-0'>1. Basics of JavaScript</h3>
            </div>
            <div class="card-body">
              <strong>External JavaScript File</strong>
              <?php echo do_shortcode('[CodeBlockFile mode="html" file="javascript/cheatsheet/externalfile.html"][/CodeBlockFile]'); ?>
              <strong>Embed JavaScript</strong>
              <?php echo do_shortcode('[CodeBlockFile mode="html" file="javascript/cheatsheet/embedjavascript.html"][/CodeBlockFile]'); ?>
              <strong>Single Line Comment</strong>
              <?php echo do_shortcode('[CodeBlockFile mode="javascript" file="javascript/cheatsheet/single-line-comment.js"][/CodeBlockFile]'); ?>
              <strong>Multi Line Comment</strong>
              <?php echo do_shortcode('[CodeBlockFile mode="javascript" file="javascript/cheatsheet/multi-line-comment.js"][/CodeBlockFile]'); ?>
              <strong>Clear Console</strong>
              <?php echo do_shortcode('[CodeBlockFile mode="javascript" file="javascript/cheatsheet/clearconsole.js"][/CodeBlockFile]'); ?>
              <strong>Print in Console</strong>
              <?php echo do_shortcode('[CodeBlockFile mode="javascript" file="javascript/cheatsheet/consolelog.js"][/CodeBlockFile]'); ?>
              <strong>Alert</strong>
              <?php echo do_shortcode('[CodeBlockFile mode="javascript" file="javascript/cheatsheet/consolelog.js"][/CodeBlockFile]'); ?>
            </div>
          </div>
    
          <div id="datatypes" class="card cui2 p_10 mb_20 jsdatatypes">
            <div class="card-header">
              <h3 class='card-title text-primary m-0'>2. Data Types</h3>
            </div>
            <div class="card-body">
              <strong>String</strong>
              <?php echo do_shortcode('[CodeBlockFile mode="javascript" file="javascript/cheatsheet/datatypes/string.js"][/CodeBlockFile]'); ?>
              <strong>Integer</strong>
              <?php echo do_shortcode('[CodeBlockFile mode="javascript" file="javascript/cheatsheet/datatypes/integer.js"][/CodeBlockFile]'); ?>
              <strong>Boolean (true/false)</strong>
              <?php echo do_shortcode('[CodeBlockFile mode="javascript" file="javascript/cheatsheet/datatypes/boolean.js"][/CodeBlockFile]'); ?>
              <strong>Object</strong>
              <?php echo do_shortcode('[CodeBlockFile mode="javascript" file="javascript/cheatsheet/datatypes/object.js"][/CodeBlockFile]'); ?>
              <strong>Array</strong>
              <?php echo do_shortcode('[CodeBlockFile mode="javascript" file="javascript/cheatsheet/datatypes/array.js"][/CodeBlockFile]'); ?>
            </div>
          </div>
    
          <div id="loops" class="card cui2 p_10 mb_20 jsloops">
            <div class="card-header">
              <h3 class='card-title text-primary m-0'>3. Loops</h3>
            </div>
            <div class="card-body">
              <strong>For Loop</strong>
              <?php echo do_shortcode('[CodeBlockFile mode="javascript" file="javascript/cheatsheet/forloop.js"][/CodeBlockFile]'); ?>
              <strong>For Loop with Object</strong>
              <?php echo do_shortcode('[CodeBlockFile mode="javascript" file="javascript/cheatsheet/forloopobject.js"][/CodeBlockFile]'); ?>
              <strong>For Loop with Break</strong>
              <?php echo do_shortcode('[CodeBlockFile mode="javascript" file="javascript/cheatsheet/forloopbreak.js"][/CodeBlockFile]'); ?>
              <strong>For Loop with Continue</strong>
              <?php echo do_shortcode('[CodeBlockFile mode="javascript" file="javascript/cheatsheet/forloopcontinue.js"][/CodeBlockFile]'); ?>
              <!-- <strong>While Loop</strong> -->
              <!-- <?php echo do_shortcode('[CodeBlockFile mode="javascript" file="javascript/cheatsheet/whileloop.js"][/CodeBlockFile]'); ?> -->
              <!-- <strong>Do While Loop</strong> -->
              <!-- <?php echo do_shortcode('[CodeBlockFile mode="javascript" file="javascript/cheatsheet/dowhileloop.js"][/CodeBlockFile]'); ?> -->
            </div>
          </div>

          <div id="functions" class="card cui2 p_10 mb_20 jsfunctions">
            <div class="card-header">
              <h3 class='card-title text-primary m-0'>4. Functions</h3>
            </div>
            <div class="card-body">
              <strong>Create a Function</strong>
              <?php echo do_shortcode('[CodeBlockFile mode="javascript" file="javascript/cheatsheet/create-function.js"][/CodeBlockFile]'); ?>
              <strong>Create a Function - Example</strong>
              <?php echo do_shortcode('[CodeBlockFile mode="javascript" file="javascript/cheatsheet/create-function-example.js"][/CodeBlockFile]'); ?>
              <strong>Arrow Function</strong>
              <?php echo do_shortcode('[CodeBlockFile mode="javascript" file="javascript/cheatsheet/create-arrow-function.js"][/CodeBlockFile]'); ?>
              <strong>Arrow Function - Example</strong>
              <?php echo do_shortcode('[CodeBlockFile mode="javascript" file="javascript/cheatsheet/create-arrow-function-example.js"][/CodeBlockFile]'); ?>
            </div>
          </div>
          
          <div id="arrays" class="card cui2 p_10 jsarray">
            <div class="card-header">
              <h3 class='card-title text-primary m-0'>5. Array</h3>
            </div>
            <div class="card-body">
              <strong>For Loop</strong>
              <?php echo do_shortcode('[CodeBlockFile mode="javascript" file="javascript/cheatsheet/datatypes/string.js"][/CodeBlockFile]'); ?>
            </div>
          </div>

          <div id="conditions" class="card cui2 p_10 jsarray">
            <div class="card-header">
              <h3 class='card-title text-primary m-0'>6. Conditions</h3>
            </div>
            <div class="card-body">
              <strong>For Loop</strong>
              <?php echo do_shortcode('[CodeBlockFile mode="javascript" file="javascript/cheatsheet/datatypes/string.js"][/CodeBlockFile]'); ?>
            </div>
          </div>

          <div id="events" class="card cui2 p_10 jsarray">
            <div class="card-header">
              <h3 class='card-title text-primary m-0'>7. Events</h3>
            </div>
            <div class="card-body">
              <strong>For Loop</strong>
              <?php echo do_shortcode('[CodeBlockFile mode="javascript" file="javascript/cheatsheet/forloop.js"][/CodeBlockFile]'); ?>
            </div>
          </div>

        </div>

        <div class="col-12 col-md-4 relative">
          <div class="card cui1 noshadow mb_20 r_0" >
              <div class="card-header bg-secondary">
                <h3 class='card-title text-white m-0'>JavaScript Topics</h3>
              </div>
              <div class="card-body">
              <ul class="listing type3">
                <li class="list-item">
                  <a class="text-secondary" href="#basics">Basics</a>
                </li>
                <li class="list-item">
                  <a class="text-secondary" href="#datatypes">Data Types</a>
                </li>
                <li class="list-item">
                  <a class="text-secondary" href="#loops">Loops</a>
                </li>
                <li class="list-item">
                  <a class="text-secondary" href="#arrays">Arrays</a>
                </li>
                <li class="list-item">
                  <a class="text-secondary" href="#object">Objects</a>
                </li>
                <li class="list-item">
                  <a class="text-secondary" href="#conditions">Condition</a>
                </li>
                <li class="list-item">
                  <a class="text-secondary" href="#events">Events</a>
                </li>
              </ul>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
      
<?php get_footer();  