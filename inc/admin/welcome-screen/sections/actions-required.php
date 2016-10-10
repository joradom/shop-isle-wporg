<?php
/**
 * Actions required
 */
?>

<div id="actions_required" class="shop-isle-tab-pane">

    <h1><?php esc_html_e( 'Keep up with Shop Isle\'s latest news' ,'shop-isle' ); ?></h1>

    <!-- NEWS -->
    <hr />

	<?php
	global $shop_isle_required_actions;

	if( !empty($shop_isle_required_actions) ):

		/* shop_isle_show_required_actions is an array of true/false for each required action that was dismissed */
		$shop_isle_show_required_actions = get_option("shop_isle_show_required_actions");

		foreach( $shop_isle_required_actions as $shop_isle_required_action_key => $shop_isle_required_action_value ):
			if(@$shop_isle_show_required_actions[$shop_isle_required_action_value['id']] === false) continue;
			if(@$shop_isle_required_action_value['check']) continue;
			?>
			<div class="shop-isle-action-required-box">
				<span class="dashicons dashicons-no-alt shop-isle-dismiss-required-action" id="<?php echo $shop_isle_required_action_value['id']; ?>"></span>
				<h4><?php echo $shop_isle_required_action_key + 1; ?>. <?php if( !empty($shop_isle_required_action_value['title']) ): echo $shop_isle_required_action_value['title']; endif; ?></h4>
				<p><?php if( !empty($shop_isle_required_action_value['description']) ): echo $shop_isle_required_action_value['description']; endif; ?></p>
				<?php
					if( !empty($shop_isle_required_action_value['plugin_slug']) ):
						?><p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin='.$shop_isle_required_action_value['plugin_slug'] ), 'install-plugin_'.$shop_isle_required_action_value['plugin_slug'] ) ); ?>" class="button button-primary"><?php if( !empty($shop_isle_required_action_value['title']) ): echo $shop_isle_required_action_value['title']; endif; ?></a></p><?php
					endif;
				?>

				<hr />
			</div>
			<?php
		endforeach;
	endif;

	$nr_actions_required = 0;

	/* get number of required actions */
	if( get_option('shop_isle_show_required_actions') ):
		$shop_isle_show_required_actions = get_option('shop_isle_show_required_actions');
	else:
		$shop_isle_show_required_actions = array();
	endif;

	if( !empty($shop_isle_required_actions) ):
		foreach( $shop_isle_required_actions as $shop_isle_required_action_value ):
			if(( !isset( $shop_isle_required_action_value['check'] ) || ( isset( $shop_isle_required_action_value['check'] ) && ( $shop_isle_required_action_value['check'] == false ) ) ) && ((isset($shop_isle_show_required_actions[$shop_isle_required_action_value['id']]) && ($shop_isle_show_required_actions[$shop_isle_required_action_value['id']] == true)) || !isset($shop_isle_show_required_actions[$shop_isle_required_action_value['id']]) )) :
				$nr_actions_required++;
			endif;
		endforeach;
	endif;

	if( $nr_actions_required == 0 ):
		echo '<p>'.__( 'Hooray! There are no required actions for you right now.','shop-isle' ).'</p>';
	endif;
	?>

</div>