<?php
 /*
 * Posts Meta Box
 */
add_action( 'add_meta_boxes', 'featured_meta_box' );
function featured_meta_box(){
  add_meta_box( 'featured-box', 'Featured Post', 'featured_meta_box_cb', 'post', 'side', 'high');
}
 
function featured_meta_box_cb($post){

  $values = get_post_meta( $post->ID, 'featured', true );
  $value = isset( $values ) ? esc_attr( $values ) : "";
  $html .= '<input min="0" max="1" type="number" name="featured" value="'.$value.'" />';          

echo $html;
  
}


/*
 * Save Post Meta Fields Value
 */
add_action( 'save_post', 'featured_save_meta' );
function featured_save_meta($post_id){   
  if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
  if( !current_user_can( 'edit_post' ) ) return;
  
  if(isset( $_POST['featured'] ) ) {
    update_post_meta( $post_id, 'featured', $_POST['featured']);
  }  
  
}  