<?php

function your_dashboard_widget() {
?>
<h3>Hello WordPress user!</h3>
<p>Fill this with HTML or PHP.</p>
<?php
};
function add_your_dashboard_widget() {
       wp_add_dashboard_widget( 'your_dashboard_widget', __( 'Widget Title!' ), 'your_dashboard_widget' );
}
      add_action('wp_dashboard_setup', 'add_your_dashboard_widget' );
