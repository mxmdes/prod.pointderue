<?php
/**
 * The Inset Bottom Sidebar
 * @package flat-responsive
 * @since 1.0.0
 */

if ( ! is_active_sidebar( 'insetbottom' ) ) {
	return;
}
?>

<div class="fr_widget_inset_bottom">
    <div class="container">
        <div class="row">
           	<div class="col-md-12">
           		<?php dynamic_sidebar( 'insetbottom' ); ?>
        	</div>
        </div>
    </div>
</div>