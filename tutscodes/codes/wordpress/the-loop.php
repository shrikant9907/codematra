<?php
/* 
* This is The Loop in WordPress | Site - codematra.com
*/

if(have_posts):
	while(have_posts()):
		the_post();

		// Content Block ........
		
	endwhile;
endif;