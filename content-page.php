<?php $plasso = get_theme_mod('plasso'); ?>

<div class="site-content">
	<div class="content">
    	<div class="entry-content animated fadeInUp delayed_05s">
            <?php while(have_posts()) : the_post(); ?>
            <div class="blog-post">
    			<h1 class="title"><?php the_title(); ?></h1>
    			<?php the_content(); ?>
			</div>
    		<?php endwhile; ?>
    	</div>

    	<div class="sidebar animated fadeInUp delayed_075s">
            <?php if(!empty($plasso['intro_title'])) { ?>
            <h2><?php echo $plasso['intro_title']; ?></h2>
            <?php } ?>

            <?php if(!empty($plasso['intro_tagline'])) { ?>
            <p><?php echo $plasso['intro_tagline']; ?></p>
            <?php } ?>
    	</div>
	</div>
</div>
