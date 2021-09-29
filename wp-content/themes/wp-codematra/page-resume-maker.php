<?php
$input = $output  = $rmInvalid = '';
$rmStep         = 1;
$rmTitle        = 'Choose Resume Template';
$rmBtnLabel     = 'Next Step';

if (isset($_GET['step']) && ($_GET['step'] <= 3 )) {
  $rmStep = trim($_GET['step']);

  if ($rmStep == 2) {
    $rmTitle = 'Resume Template';
  }

  if ($rmStep == 3) {
    $rmTitle = 'Preview and Download';
    $rmBtnLabel = 'Download Resume';
  }
}

get_header(); 
?> 
 
<section class="page-section bg-light">
  <h1 class="text-center bg-primary mb_30 text-white ptb_40 f30 lh32">
    <?php the_title(); ?>
  </h1>
  <div class="container">
    <div class="row">

      <div class="col-12"> 
        <div class="cm-base64-ende">

          <div class="steps-ui">
            <div class="sline"></div> 
            <a href="<?php echo site_url('resume-maker/?step=1'); ?>" class="step <?php echo ($rmStep==1) ? 'active' : ''; ?>">
              <span class="snumbers">1</span> 
              <span class="slabel">Choose Resume Template</span>
            </a>
            <a class="step <?php echo ($rmStep==2) ? 'active' : ''; ?>">
              <span class="snumbers">2</span> 
              <span class="slabel">Add Details</span>
            </a>
            <a class="step <?php echo ($rmStep==3) ? 'active' : ''; ?>">
              <span class="snumbers">3</span> 
              <span class="slabel">Download Resume</span>
            </a>
          </div>

          <div class="card cui1 step-form-ui">
            <div class="card-title text-primary text-center mbi_30"><?php echo $rmTitle; ?></div>
            <form class="fui fui1" action="" method="get" enctype="multipart/form-data">
              <input type="hidden" value="<?php echo ($rmStep + 1); ?>" name="step" />
              <?php if ($rmStep == 1): ?>
                <div class="row rm-choose-row">
                  <div class="col-12 col-sm-6 col-md-4">
                    <div class="form-group selected">
                      <label for="rmtemplate1">
                        <img class="rmthumb r_0" src="<?php echo get_stylesheet_directory_uri(); ?>/images/placeholder_500x400.jpg" alt="Resume" />
                        <span class="rmlabel">Resume 1</span>
                      </label>
                      <input class="invisible" id="rmtemplate1" type="radio" value="1" required="required" name="rmtemplate" />
                    </div>
                  </div>
                  <div class="col-12 col-sm-6 col-md-4">
                    <div class="form-group">
                      <label for="rmtemplate2">
                        <img class="rmthumb" src="<?php echo get_stylesheet_directory_uri(); ?>/images/placeholder_500x400.jpg" alt="Resume" />
                        <span class="rmlabel">Resume 2</span>
                      </label>
                      <input class="invisible" id="rmtemplate2" type="radio" value="2" required="required" name="rmtemplate" />
                    </div>
                  </div>
                  <div class="col-12 col-sm-6 col-md-4">
                    <div class="form-group">
                      <label for="rmtemplate3">
                        <img class="rmthumb r_0" src="<?php echo get_stylesheet_directory_uri(); ?>/images/placeholder_500x400.jpg" alt="Resume" />
                        <span class="rmlabel">Resume 3</span>
                      </label>
                      <input class="invisible" id="rmtemplate3" type="radio" value="3" required="required" name="rmtemplate" />
                    </div>
                  </div>
                </div>
              <?php endif; ?>
              <?php if ($rmStep == 2): ?>
                <div class="rm-doc-ui rm-template-1">

                  <div class="rm-block1">
                    <div class="rm-name">Your Name</div>
                    <div class="rmb1-list">
                      <span class="rmb1-item">Indore, Madhya Pradesh, India</span> ● 
                      <span class="rmb1-item">9876543210</span> ● 
                      <span class="rmb1-item">resume@example.com</span> ● 
                      <span class="rmb1-item"><a href="#">Linkedin</a></span> ● 
                      <span class="rmb1-item"><a href="#">Github</a></span>
                    </div>
                    <div class="rmb1-text">Sr. Software Developer with 7+ Years of Experience in Web Design and Development.</div>
                  </div>

                  <div class="rm-block2 rm-section">
                    <div class="rms-heading">WORK EXPERIENCE</div>
                    <div class="rmb2-exp">
                      <div class="d-flex justify-content-between">
                        <span class="rmb2-company">Company Name, Pvt Ltd <span>- Senior Software Developer</span></span>
                        <span class="rmb2-company-date">Oct 2018 - Apr 2021 (2+ Years)</span>
                      </div>
                      <ul class="rmb2-list">
                        <li class="rmb2l-item">Lorem ipsum dolor sit amet consectetur adipisicing sitatibus.</li>
                        <li class="rmb2l-item">Lorem ipsum dolor sit amet consectetur adipisicing sitatibus.</li>
                      </ul>
                    </div>
                    <div class="rmb2-exp">
                      <div class="d-flex justify-content-between">
                        <span class="rmb2-company">Company Name, Pvt Ltd <span>- Senior Software Developer</span></span>
                        <span class="rmb2-company-date">Oct 2018 - Apr 2021 (2+ Years)</span>
                      </div>
                      <ul class="rmb2-list">
                        <li class="rmb2l-item">Lorem ipsum dolor sit amet consectetur adipisicing sitatibus.</li>
                        <li class="rmb2l-item">Lorem ipsum dolor sit amet consectetur adipisicing sitatibus.</li>
                      </ul>
                    </div>
                  </div>

                  <div class="rm-block3 rm-section">
                    <div class="rms-heading">QUALIFICATION</div>
                    <div class="rmb2-qua">
                      <span class="rmb2-company">University or college </span>
                      <div class="d-flex justify-content-between">
                        <span class="rmb2-company"><span>Bachelor of Engineering, Computer Science    |   72.8% aggregate</span></span>
                        <span class="rmb2-company-date">Oct 2018 - Apr 2021 (2+ Years)</span>
                      </div>
                    </div>
                  </div>

                  <div class="rm-block4 rm-section">
                    <div class="rms-heading">TECHNICAL SKILLS</div>
                    <div class="rmb4-skills">
                      <span class="rmb4-name">Web Design </span>
                      <div class="rmb4-skill-lists">
                        HTML, CSS, jQuery, JSON, JavaScript, Bootstrap, Media Query, Basics of Photoshop
                      </div>
                    </div>
                  </div>

                  <div class="rm-block5 rm-section">
                    <div class="rms-heading">PROJECTS</div>
                    <div class="project-item">
                      <span class="project-name">Project Name<span>- Front End Lead - React JS</span></span>
                      <div class="project-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum, voluptates fugiat pariatur porro voluptate itaque veniam quaerat, ipsa explicabo sapiente nihil sunt rerum laborum amet nisi, reprehenderit harum odit deserunt.</div>
                    </div>
                  </div>

                  <div class="rm-block6 rm-section">
                    <div class="rms-heading">PERSONAL DETAILS</div>
                    <div class="personal-details">
                       <span class="personal-label">Father’s Name:</span><span class="personal-value">Mr. Fathers Name</span>
                    </div>
                  </div>

                  <div class="rm-block7 rm-section">
                    <div class="rms-heading">DECLARATION</div>
                    <div class="rmb2-qua">
                      Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sunt aliquam voluptates fuga eum, alias velit nulla totam culpa nesciunt eos quod molestias praesentium sapiente dolorem ea facere nihil nostrum officiis!
                    </div>
                  </div>

                </div>
              <?php endif; ?>
              <div class="cmbende-actions text-center mt_20">
                <button type="submit" class="btn btn-primary btnui3s text-uppercase"><?php echo $rmBtnLabel; ?></button>
              </div>
            </form>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>
      
<?php get_footer();  