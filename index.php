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

  var $plugin_path;
  var $typ; // post type
  var $state; // draft, pending, scheduled
  var $amount; // integer

  function PostDraftWidget() {
    // initialize the widget
    parent::WP_Widget(
      'PostDraftWidget'
      , 'Post Draft Widget'
      , array(
        'description' => 'Display your upcoming and drafted posts.'
      )
    );

    // set the variable of the theme path
    $this->plugin_path = plugin_dir_path('index.php');
  }

  function form($instance){
    $defaults = array();
    $defaults['title'] = 'Upcoming Posts';
    $instance = wp_parse_args( (array) $instance, $defaults );
    $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'text_domain' );
    ?>
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
    </p>
    <?php
  }

  function widget($args, $instance){
    extract($args, EXTR_SKIP);
    require_once('widget-output.php');
  }

  function update($new_instance, $old_instance){
    $instance = array();
    $instance = $old_instance;
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    return $new_instance;
  }

  function get_posts($type, $amount){

  }

}
}

add_action('widgets_init', 'post_draft_widgets');

function post_draft_widgets(){
  register_widget('PostDraftWidget');
}

?>
