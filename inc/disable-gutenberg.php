<?php

// Disable Gutenberg

/**
 * Templates and Page IDs without editor
 *
 */
function ea_disable_editor( $id = false ) {
 
     $excluded_templates = array(
         'page-templates/page-home.php',
         '', // This will catch pages with the default template
     );
 
     $excluded_ids = array(
         // get_option( 'page_on_front' )
     );
 
     if( empty( $id ) )
         return false;
 
     $id = intval( $id );
     $template = get_page_template_slug( $id );
 
     return in_array( $id, $excluded_ids ) || in_array( $template, $excluded_templates );
 }
 
 add_action( 'admin_init', function() {
     if ( isset($_GET['post']) || isset($_POST['post_ID']) ) {
         $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
         if ( ea_disable_editor( $post_id ) ) {
             remove_post_type_support( 'page', 'editor' );
         }
     }
 });

