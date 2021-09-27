<?php 
/*
* Show Visits counts  | Site - codematra.com
*/
$visitsCount = get_post_meta($postID, 'visit_counts', true);
if ($visitsCount) {
  echo "Visits: $visitsCount";
} else {
  echo "Visits: 0";
}