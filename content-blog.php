<div class="site-content">
	<div class="content">
  	<div class="entry-content animated fadeInUp delayed_05s">
			<?php
		    query_posts(array(
	        'post_type' => 'post',
	        'showposts' => 100
		    ));
			?>
	    <?php while(have_posts()) : the_post(); ?>
	    <div class="blog-post">
		  	<a href="<?php the_permalink(); ?>">
					<h1 class="title"><?php the_title(); ?></h1>
				</a>

				<?php the_content(); ?>
			</div>
	  	<?php endwhile; ?>
			<?php wp_reset_query(); ?>
  	</div>

  	<div class="sidebar animated fadeInUp delayed_075s">
			<ul>
				<?php
			    query_posts(array(
		        'post_type' => 'post',
		        'showposts' => 100
			    ));
				?>
	      <?php while(have_posts()) : the_post(); ?>
				<li>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</li>
	    	<?php endwhile; ?>
				<?php wp_reset_query(); ?>
			</ul>
  	</div>
	</div>
</div>
