<?php
/**
 * Sidebar setup for footer full.
 *
 * @package techmix_review
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'techmix_review_container_type' );
$options = get_option( 'techmix_review' );
?>

	<!-- ******************* The Footer Full-width Widget Area ******************* -->

	<div class="wrapper" id="wrapper-footer-full">

		<div class="<?php echo esc_attr( $container ); ?>" id="footer-full-content" tabindex="-1">

			<div class="row">
				<?php 
					$footer_contact = $options['footer_contact'];
					if ($footer_contact) :
						foreach ($footer_contact as $contact) :
				?>
				<div class="col-12 col-md-3">
					<div class="footer-widget">
						<div class="footer_logo">
							<a href="<?php echo home_url('/')?>"><img src="<?php echo esc_url($contact['f_logo']); ?>" alt=""></a>
						</div>
						<ul>
							<li><span>Phone: </span><?php echo $contact['number']?></li>
							<li><span>Email: </span><?php echo $contact['email']?></li>
						</ul>
					</div>
				</div>
				
					<?php endforeach;endif; ?>

				<div class="col-12 col-md-3">
					<div class="footer-widget">
						<h3 class="footer-widget-title">Popular Categories</h3>
						<?php $footer_menus_id = $options['category_menu'];
							if ($footer_menus_id) {
								?>
								<ul>
								<?php
								$menu = wp_get_nav_menu_items($footer_menus_id);
								foreach ($menu as $menu_item) {
									?>
										<li><a href="<?php echo $menu_item->url; ?>"><?php echo $menu_item->title; ?></a></li>
									<?php
								} ?>
								</ul>
								<?php 
							}
						?>
					</div>
				</div>
				
				<div class="col-12 col-md-3">
					<div class="footer-widget">
						<h3 class="footer-widget-title">Important Links</h3>
						<?php $footer_menus_id = $options['links_menu'];
							if ($footer_menus_id) {
								?>
								<ul>
								<?php
								$menu = wp_get_nav_menu_items($footer_menus_id);
								foreach ($menu as $menu_item) {
									?>
										<li><a href="<?php echo $menu_item->url; ?>"><?php echo $menu_item->title; ?></a></li>
									<?php
								} ?>
								</ul>
								<?php 
							}
						?>
					</div>
				</div>
				
				<div class="col-12 col-md-3">
					<div class="footer-widget">
						<h3 class="footer-widget-title">Help Menu</h3>
						<?php $footer_menus_id = $options['help_menu'];
							if ($footer_menus_id) {
								?>
								<ul>
								<?php
								$menu = wp_get_nav_menu_items($footer_menus_id);
								foreach ($menu as $menu_item) {
									?>
										<li><a href="<?php echo $menu_item->url; ?>"><?php echo $menu_item->title; ?></a></li>
									<?php
								} ?>
								</ul>
								<?php 
							}
						?>
						<ul class="footer-social">
							<li><a href=""><i class=""></i></a></li>
						</ul>
					</div>
				</div>
				
			</div>

		</div>

	</div><!-- #wrapper-footer-full -->
