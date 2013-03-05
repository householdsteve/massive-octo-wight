<?php
/*
Template Name: Full Width Page
*/
?>

<?php get_header(); ?>
			
			<div id="content" class="clearfix row-fluid">
			
				<div id="main" class="span12 clearfix" role="main">

				     <?php $loop = new WP_Query( array( 'post_type' => 'folder', 'posts_per_page' => 10 ) ); ?>

          <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

              <?php the_title( '<h2 class="entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>' ); ?>

                  <?php
                    if(get_field('press_books')): ?>
                    <div class="royalSlider rsDefault">
                    	<?php while(has_sub_field('press_books')): ?>
                        <div class="rsContent">
                                <img class="rsImg" src="<?php the_sub_field('cover') ?>" alt="press book" />
                                <div class="rsTmb">
                                  
                                  <a href="<?php the_sub_field('flipdocs_link'); ?>" target="_blank">
                                    <img src="<?php the_sub_field('cover') ?>" alt="" width="60" height="136" />
                                  </a>
                                  
                                </div>
                            </div>
                    		  

                    	<?php endwhile; ?>
                      </div>
                    <?php endif; ?>


          <?php endwhile; ?>
			
				</div> <!-- end #main -->
    
				<?php //get_sidebar(); // sidebar 1 ?>
    
			</div> <!-- end #content -->

<?php get_footer(); ?>