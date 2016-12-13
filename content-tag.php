<?php $plasso = get_theme_mod('plasso'); ?>

<div class="grid grid-pad animated fadeInUp delayed_075s">
  <?php while(have_posts()) : the_post(); ?>
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
