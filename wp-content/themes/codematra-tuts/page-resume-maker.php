<?php
$input = $output  = $rmInvalid = '';
$rmStep         = 1;
$rmTitle        = 'Choose Resume Template';
$rmBtnLabel     = 'Next Step';

if (isset($_GET['step']) && ($_GET['step'] <= 3 )) {
  $rmStep = trim($_GET['step']);

  if ($rmStep == 2) {
    $rmTitle = 'Make A Resume';
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
            <?php if ($rmStep == 1): ?>
            <form class="fui fui1" action="" method="get" enctype="multipart/form-data">
              <input type="hidden" value="<?php echo ($rmStep + 1); ?>" name="step" />
                <!-- Choose Resume Template Start -->
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
                <!-- Choose Resume Template End -->
            
              <div class="cmbende-actions text-center mt_20">
                <button type="submit" class="btn btn-primary btnui3s text-uppercase"><?php echo $rmBtnLabel; ?></button>
              </div>
            </form>   
            <?php endif; ?>
            <?php if ($rmStep == 2): ?>

              <!-- Resume Section Start -->
              <form class="fui fui4 mb_30" action="" method="post" enctype="multipart/form-data">
                <h3 class="f16 mb_10 text-primary text-uppercase font_normal">Section 1: Resume Header</h3>
                <div class="form-row">
                  <div class="col">
                    <div class="form-group">
                      <label>Full Name</label>
                      <input name="fullname" value="" type="text" class="form-control" placeholder="Enter your name.">
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label>Phone</label>
                      <input name="phone" value="" type="text" class="form-control" placeholder="Enter your phone number."> 
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label>Email</label>
                      <input name="email" value="" type="text" class="form-control" placeholder="Enter your email address.">
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col">
                    <div class="form-group">
                      <label>Address</label>
                      <input name="address" value="" type="text" class="form-control" placeholder="Enter your address.">
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col">
                    <div class="form-group">
                      <label>Linkedin Profile</label>
                      <input name="linkedin" value="" type="text" class="form-control" placeholder="">
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label>Github Profile</label>
                      <input name="github" value="" type="text" class="form-control" placeholder="">
                    </div>
                  </div>
                </div>
                <div class="card-actions text-right">
                  <input class="btn btn-secondary btn-sm btnui3s" type="submit" name="submit" value="Save">
                </div>
              </form>
              <!-- Resume Section End -->

              <!-- Experience Section Start -->
              <form class="fui fui4 mb_30" action="" method="post" enctype="multipart/form-data">
                <h3 class="f16 mb_10 text-primary text-uppercase font_normal">Section 2: Work Experience</h3>
                <div class="form-row">
                  <div class="col">
                    <div class="form-group">
                      <label>Company Name</label>
                      <input name="company_name" value="" type="text" class="form-control" placeholder="Enter company name.">
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label>Designation</label>
                      <input name="designation" value="" type="text" class="form-control" placeholder="Enter designation."> 
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col">
                    <div class="form-group">
                      <label>Start From</label>
                      <input name="email" value="" type="text" class="form-control" placeholder="Enter starting date.">
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label>Start End</label>
                      <input name="email" value="" type="text" class="form-control" placeholder="Enter end date.">
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col">
                    <div class="form-group">
                      <label>Work Description</label>
                      <input name="email" value="" type="text" class="form-control" placeholder="Enter your email address.">
                    </div>
                  </div>
                </div>
                <div class="card-actions text-right">
                  <input class="btn btn-secondary btn-sm btnui3s" type="submit" name="submit" value="Save">
                </div>
              </form>
              <!-- Experience Section End -->

              <!-- Qualification Section Start -->
              <form class="fui fui4 mb_30" action="" method="post" enctype="multipart/form-data">
                <h3 class="f16 mb_10 text-primary text-uppercase font_normal">Section 3: Qualification</h3>
                <div class="form-row">
                  <div class="col">
                    <div class="form-group">
                      <label>University / College Name</label>
                      <input name="college_name" value="" type="text" class="form-control" placeholder="Enter company name.">
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label>Degree</label>
                      <input name="degree" value="" type="text" class="form-control" placeholder="Enter designation."> 
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col">
                    <div class="form-group">
                      <label>From</label>
                      <input name="college_from" value="" type="text" class="form-control" placeholder="Enter starting date.">
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label>To</label>
                      <input name="college_to" value="" type="text" class="form-control" placeholder="Enter end date.">
                    </div>
                  </div>
                </div>
                <div class="card-actions text-right">
                  <input class="btn btn-secondary btn-sm btnui3s" type="submit" name="submit" value="Save">
                </div>
              </form>
              <!-- Qualification Section End -->

            <?php endif; ?>
              <?php if ($rmStep == 2): ?>
                <!-- Resume Template 1 Start -->
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
                      <span class="project-name">Project Name<span> - Front End Lead - React JS</span></span>
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
                <!-- Resume Template 1 End -->
              <?php endif; ?>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>
      
<?php get_footer();  