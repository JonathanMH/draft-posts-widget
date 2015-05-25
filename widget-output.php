<?php
echo $before_widget;

if(isset($instance['title'])){
  echo $before_title;
  echo $instance['title'];
  echo $after_title;
}


// Beiträge mit Status "ausstehender Review" ausgeben
// pending = "ausstehender Review"
// future = "geplant"
// draft = Entwurf
function get_future_posts($limit = 5)
{
    $future_posts = get_posts('numberposts=' . $limit . '&post_status=draft&order=ASC');
    $output = '';
    foreach($future_posts as $post)
    {
        $output .= '<li>' . $post->post_title . '</li>';
    }
    return $output ? '<ul>' . $output . '</ul>' : $output;
}
if($future_posts = get_future_posts(5))
{
    echo $future_posts;
}
echo $after_widget;
?>
