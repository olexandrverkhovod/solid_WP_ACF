<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package solid
 */

$hero_title    = get_field('hero__title', 'options');
$hero_text     = get_field('hero__text', 'options');
$hero_buttons  = get_field('hero__buttons', 'options');
$future_items  = get_field('future_item', 'options');
$pricing_title = get_field('pricing_title', 'options');
$pricing_text  = get_field('pricing_text', 'options');
$pricing_table = get_field('pricing_table', 'options');
$cta_title     = get_field('cta_title', 'options');
$cta_button    = get_field('cta_button', 'options');
$footer_copy   = get_field('footer_copy', 'options');
$footer_social = get_field('footer_social', 'options');

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>

<body <?php body_class(['is-boxed', 'has-animations']); ?>>
	<?php wp_body_open(); ?>
	<div class="body-wrap">
		<header class="site-header">
			<div class="container">
				<div class="site-header-inner">
					<div class="brand header-brand">
						<h1 class="m-0">
							<a href="#">
								<img class="header-logo-image" src="<?= get_template_directory_uri(); ?>/assets/images/logo.svg" alt="Logo">
							</a>
						</h1>
					</div>
				</div>
			</div>
		</header>

		<main>
			<?php if ($hero_title || $hero_text || $hero_buttons) : ?>
				<section class="hero">
					<div class="container">
						<div class="hero-inner">
							<div class="hero-copy">
								<?php if ($hero_title) : ?>
									<h1 class="hero-title mt-0"><?= $hero_title; ?></h1>
								<?php endif;
								if ($hero_text) : ?>
									<p class="hero-paragraph"><?= $hero_text; ?></p>
								<?php endif;
								if ($hero_buttons) : ?>
									<div class="hero-cta">
										<?php
										foreach ($hero_buttons as $btn) :
											$class = $btn['class'];
											$link = $btn['link'];
											$text = $btn['text'];
										?>
											<a class="button <?= $class; ?>" href="<?= $link; ?>"><?= $text ?></a>
										<?php endforeach; ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="hero-figure anime-element">
								<svg class="placeholder" width="528" height="396" viewBox="0 0 528 396">
									<rect width="528" height="396" style="fill:transparent;" />
								</svg>
								<div class="hero-figure-box hero-figure-box-01" data-rotation="45deg"></div>
								<div class="hero-figure-box hero-figure-box-02" data-rotation="-45deg"></div>
								<div class="hero-figure-box hero-figure-box-03" data-rotation="0deg"></div>
								<div class="hero-figure-box hero-figure-box-04" data-rotation="-135deg"></div>
								<div class="hero-figure-box hero-figure-box-05"></div>
								<div class="hero-figure-box hero-figure-box-06"></div>
								<div class="hero-figure-box hero-figure-box-07"></div>
								<div class="hero-figure-box hero-figure-box-08" data-rotation="-22deg"></div>
								<div class="hero-figure-box hero-figure-box-09" data-rotation="-52deg"></div>
								<div class="hero-figure-box hero-figure-box-10" data-rotation="-50deg"></div>
							</div>
						</div>
					</div>
				</section>
			<?php endif;
			if ($future_items) : ?>
				<section class="features section">
					<div class="container">
						<div class="features-inner section-inner has-bottom-divider">
							<div class="features-wrap">
								<?php
								for ($i = 0; $i < count($future_items); $i++) :
									$title = $future_items[$i]['title'];
									$text = $future_items[$i]['text'];
								?>
									<div class="feature text-center is-revealing">
										<div class="feature-inner">
											<div class="feature-icon">
												<img src="<?= get_template_directory_uri(); ?>/assets/images/feature-icon-0<?= ($i % 6) + 1 ?>.svg" alt="Feature 0<?= ($i % 6) + 1 ?>">
											</div>
											<?php if ($title) : ?>
												<h4 class="feature-title mt-24"><?= $title; ?></h4>
											<?php endif;
											if ($text) : ?>
												<p class="text-sm mb-0"><?= $text; ?></p>
											<?php endif; ?>
										</div>
									</div>
								<?php endfor; ?>
							</div>
						</div>
					</div>
				</section>
			<?php
			endif;
			if ($pricing_title || $pricing_text || $pricing_table) :
			?>
				<section class="pricing section">
					<div class="container-sm">
						<div class="pricing-inner section-inner">
							<?php if ($pricing_title || $pricing_text) : ?>
								<div class="pricing-header text-center">
									<?php if ($pricing_title) : ?>
										<h2 class="section-title mt-0"><?= $pricing_title; ?></h2>
									<?php endif;
									if ($pricing_text) : ?>
										<p class="section-paragraph mb-0"><?= $pricing_text; ?></p>
									<?php endif; ?>
								</div>
							<?php endif;
							if ($pricing_table) : ?>
								<div class="pricing-tables-wrap">
									<?php foreach ($pricing_table as $table) :
										$price  = $table['price'];
										$title  = $table['title'];
										$list   = $table['list'];
										$button = $table['button'];
									?>
										<div class="pricing-table">
											<div class="pricing-table-inner is-revealing">
												<div class="pricing-table-main">
													<?php if ($price) : ?>
														<div class="pricing-table-header pb-24">
															<div class="pricing-table-price"><span class="pricing-table-price-currency h2"><?= $price['currency']; ?></span><span class="pricing-table-price-amount h1"><?= $price['cost']; ?></span><span class="text-xs">/<?= $price['time']; ?></span></div>
														</div>
													<?php endif;
													if ($title) : ?>
														<div class="pricing-table-features-title text-xs pt-24 pb-24"><?= $title; ?></div>
													<?php endif;
													if ($list) : ?>
														<ul class="pricing-table-features list-reset text-xs" style="margin-left: 0;">
															<?php foreach ($list as $item) :
																$item = $item['item'];
															?>
																<li>
																	<span><?= $item; ?></span>
																</li>
															<?php endforeach; ?>
														</ul>
													<?php endif; ?>
												</div>
												<?php if ($button) : ?>
													<div class="pricing-table-cta mb-8">
														<a class="button button-primary button-shadow button-block" href="<?= $button['link']; ?>"><?= $button['text']; ?></a>
													</div>
												<?php endif; ?>
											</div>
										</div>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</section>
			<?php endif;
			if ($cta_title || $cta_button) : ?>
				<section class="cta section">
					<div class="container">
						<div class="cta-inner section-inner">
							<h3 class="section-title mt-0"><?= $cta_title; ?></h3>
							<div class="cta-cta">
								<a class="button button-primary button-wide-mobile" href="<?= $cta_button['link']; ?>"><?= $cta_button['text']; ?></a>
							</div>
						</div>
					</div>
				</section>
			<?php endif; ?>
		</main>

		<footer class="site-footer">
			<div class="container">
				<div class="site-footer-inner">
					<div class="brand footer-brand">
						<a href="#">
							<img class="header-logo-image" src="<?= get_template_directory_uri(); ?>/assets/images/logo.svg" alt="Logo">
						</a>
					</div>
					<?php
					wp_nav_menu(array(
						'container'  => false,
						'menu_class' => 'footer-links list-reset',
					));
					?>
					<ul class="footer-social-links list-reset">
						<?php foreach ($footer_social as $social) :
							$link = $social['link'];
							$icon = $social['icon'];
						?>
							<li>
								<a href="<?= $link; ?>">
									<span class="screen-reader-text"><?= $icon; ?></span>
									<?php
									switch ($icon) {
										case 'Facebook':
									?>
											<svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
												<path d="M6.023 16L6 9H3V6h3V4c0-2.7 1.672-4 4.08-4 1.153 0 2.144.086 2.433.124v2.821h-1.67c-1.31 0-1.563.623-1.563 1.536V6H13l-1 3H9.28v7H6.023z" fill="#0270D7" />
											</svg>
										<?php
											break;
										case 'Twitter':
										?>
											<svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
												<path d="M16 3c-.6.3-1.2.4-1.9.5.7-.4 1.2-1 1.4-1.8-.6.4-1.3.6-2.1.8-.6-.6-1.5-1-2.4-1-1.7 0-3.2 1.5-3.2 3.3 0 .3 0 .5.1.7-2.7-.1-5.2-1.4-6.8-3.4-.3.5-.4 1-.4 1.7 0 1.1.6 2.1 1.5 2.7-.5 0-1-.2-1.5-.4C.7 7.7 1.8 9 3.3 9.3c-.3.1-.6.1-.9.1-.2 0-.4 0-.6-.1.4 1.3 1.6 2.3 3.1 2.3-1.1.9-2.5 1.4-4.1 1.4H0c1.5.9 3.2 1.5 5 1.5 6 0 9.3-5 9.3-9.3v-.4C15 4.3 15.6 3.7 16 3z" fill="#0270D7" />
											</svg>
										<?php
											break;
										case 'Google':
										?>
											<svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
												<path d="M7.9 7v2.4H12c-.2 1-1.2 3-4 3-2.4 0-4.3-2-4.3-4.4 0-2.4 2-4.4 4.3-4.4 1.4 0 2.3.6 2.8 1.1l1.9-1.8C11.5 1.7 9.9 1 8 1 4.1 1 1 4.1 1 8s3.1 7 7 7c4 0 6.7-2.8 6.7-6.8 0-.5 0-.8-.1-1.2H7.9z" fill="#0270D7" />
											</svg>
									<?php
											break;
									}
									?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
					<?php if ($footer_copy) : ?>
						<div class="footer-copyright"><?= $footer_copy; ?></div>
					<?php endif; ?>
				</div>
			</div>
		</footer>
	</div>
	<?php wp_footer(); ?>
</body>

</html>