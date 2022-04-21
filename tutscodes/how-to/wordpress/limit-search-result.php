<?php
/*
* Limit the search result to specified post types | Site - codematra.com
*/
add_filter('pre_get_posts','searchfilter');
function searchfilter($query) {
  if ($query->is_search && !is_admin() ) {
    $query->set('post_type', array('faqs'));
  }
	return $query;
}