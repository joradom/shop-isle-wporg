<?php
/**
 * Changelog
 */

$shop_isle = wp_get_theme( 'shop-isle' );

?>
<div class="shop-isle-tab-pane" id="changelog">

	<div class="shop-isle-pane-center">
	
		<h1>Shop Isle <?php if( !empty($shop_isle['Version']) ): ?> <sup id="shop-isle-theme-version"><?php echo esc_attr( $shop_isle['Version'] ); ?> </sup><?php endif; ?></h1>

	</div>

	<?php
	WP_Filesystem();
	global $wp_filesystem;
	$shop_isle_changelog = $wp_filesystem->get_contents( get_template_directory().'/CHANGELOG.md' );
	$shop_isle_changelog_lines = explode(PHP_EOL, $shop_isle_changelog);
	foreach($shop_isle_changelog_lines as $shop_isle_changelog_line){
		if(substr( $shop_isle_changelog_line, 0, 3 ) === "###"){
			echo '<hr /><h1>'.substr($shop_isle_changelog_line,3).'</h1>';
		} else {
			echo $shop_isle_changelog_line.'<br/>';
		}
	}

	?>
	
</div>
