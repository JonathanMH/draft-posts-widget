<?php
/*
	Plugin Name: Post Draft Widget
	Plugin URI: http://jonathanmh.com/
	Description: Plugin for displaying post drafts as a list
	Author: Jonathan M. Hethey
	Version: 0.1
	Author URI: http://jonathanmh.com
*/

global $wp_version;
if((float)$wp_version >= 2.8){
class PostDraftWidget extends WP_Widget {

  function PostDraftWidget() {
    parent::WP_Widget(
      'PostDraftWidget'
      , 'Post Draft Widget'
      , array(
        'description' => 'Display your upcoming and drafted posts.'
      )
    );
  }

  function form($instance){
    require_once('widget-form.php');
  }

  function widget($args, $instance){
    extract($args, EXTR_SKIP);
    require_once('widget-output.php');
  }

  function update($new_instance, $old_instance){
    $instance = $old_instance;
    return $instance;
  }
}
}

add_action('widgets_init', 'post_draft_widgets');

function post_draft_widgets(){
  register_widget('PostDraftWidget');
}

?>
