<?php $plasso = get_theme_mod('plasso'); ?>

<?php

// Intro: Get the book intro if it’s toggled.
if($plasso['intro_toggle'] == true) {

?>
<div class="intro animated fadeInDown">
	<div class="content animated fadeInUp delayed_05s">
    <?php if(!empty($plasso['intro_title'])) { ?>
    <h2><?php echo $plasso['intro_title']; ?></h2>
    <?php } ?>

		<hr/>

    <?php if(!empty($plasso['intro_tagline'])) { ?>
    <h5><?php echo $plasso['intro_tagline']; ?></h5>
    <?php } ?>
	</div>
</div>
<?php } ?>

<?php

// Products: Get all the products.
$get_products = new WP_Query(array('post_type' => 'products', 'posts_per_page' => -1));

?>
<div class="grid grid-pad animated fadeInUp delayed_075s">
  <?php while ($get_products->have_posts()) : $get_products->the_post(); ?>
	<div class="col-1-3">
  	<a href="<?php the_permalink(); ?>">
  		<div class="product">
        <div class="product-image" style="background-image: url(<?php the_field('product_image'); ?>);">
        </div>

    		<div class="product-text">
    			<h4><?php the_title(); ?></h4>
    			<p><?php the_field('product_excerpt'); ?></p>
    			<div class="product-meta">
    				<div class="price"><?php the_field('product_price'); ?></div>
    				<div class="category"><?php the_field('product_type'); ?></div>
    			</div>
    		</div>
  		</div>
  	</a>
	</div>
  <?php endwhile; ?>
</div>
<?php wp_reset_query(); ?>
