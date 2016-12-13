<div class="site-content">
	<div class="content">
    <?php while(have_posts()) : the_post(); ?>
  	<div class="product-images animated fadeInUp delayed_05s">
      <?php $images = get_field('product_images'); ?>
      <?php if($images): ?>
      <?php foreach($images as $image): ?>
      <img src="<?php echo $image['url']; ?>">
      <?php endforeach; ?>
      <?php endif; ?>
  	</div>

  	<div class="product-info animated fadeInUp delayed_075s">
  		<h1><?php the_title(); ?></h1>
  		<p><?php the_field('product_description'); ?></p>
  		<a class="btn plo-button" href="https://plasso.co/s/<?php the_field('product_space_id'); ?>">Buy Now - <?php the_field('product_price'); ?></a>

			<div class="product-data">
  			<p>File Type: <strong><?php the_field('product_type'); ?></strong></p>
  			<p>File Size: <strong><?php the_field('product_size'); ?></strong></p>
  			<p>Date: <strong><?php the_date(); ?></strong></p>
  			<?php echo get_the_tag_list('<p>Taged: ',', ','</p>'); ?>
  		</div>
  	</div>
    <?php endwhile; ?>
	</div>
</div>
