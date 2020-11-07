<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package techmix_review
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'techmix_review_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<?php $options = get_option( 'techmix_review' );?>
<header class="tmxr_header_area">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="tmxr_inner_header tmxr_flex">
					<div class="logo-area">
					<?php 
						$want_logo = $options['_want_logo'];
						$image = $options['logo'];
						$logo_text = $options['logo_text'];
						if ($want_logo == true) :
							?>
							<a href="<?php echo esc_url(site_url('/')) ?>"><img src="<?php echo esc_url($image); ?>" alt=""></a>
							<?php else:  ?>
								<a href="<?php echo esc_url(site_url('/')) ?>"><h3><?php echo esc_attr($logo_text); ?></h3></a>
							<?php endif; ?>
					</div>
					<div class="menu-area">
						<?php wp_nav_menu( [
							'theme_location'  => 'primary',
							'container_class' => 'tmxr-navbar',
							'container_id'    => 'tmxr-navbar',
							'menu_class'      => 'tmxr-menu',
							'menu_id'         => 'tmxr-menu',
						] ); ?>
					</div>
					<div class="search-login-control">
						<ul>
							<li>
								<form action="" method="post" id="header-search-form">
									<div class="form-group">
										<input type="text" name="s" id="search" placeholder="search here..">
										<span class="search-icon"><i class="fas fa-search"></i></span>
									</div>
								</form>
							</li>
							<?php if (is_user_logged_in()) :?>
								<li><a href="<?php echo wp_logout_url(home_url()); ?>">Logout</a></li>
							<?php else :?>
							<li><a href="<?php echo site_url( '/' )?>login">Login</a></li>
							<li><a href="<?php echo site_url( '/' )?>register">Register</a></li>
							<?php endif; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>