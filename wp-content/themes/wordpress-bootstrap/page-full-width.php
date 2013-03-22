<?php
/*
Template Name: Full Width Page
*/
?>

<?php get_header(); ?>

			
			<div id="content" class="clearfix row-fluid">
			
				<div id="main" class="span12 clearfix" role="main">

				     <?php $loop = new WP_Query( array( 'post_type' => 'folder', 'posts_per_page' => 10 ) ); 
				     
				     $count = 0;
				     $totalposts = $loop->post_count;
				     
				     ?>

          <?php while ( $loop->have_posts() ) : $loop->the_post();
          
          	
		  ?>
          
          
<div class= "clearfix mensolaa">
	<div class="centrall">


	<?php the_post_thumbnail( 'wpbs-featured' ); ?>
							
		<div class="homese">
			<h2 class="single-title" itemprop="homese" style="position: absolute; margin-top: -80px !important;">
				<a href="<?php echo get_permalink()?>">
					<span class="mesehome">
						<?php
							$d = explode("-",get_field('folder_month'));
							$fixed = mktime(0,0,0,$d[1],$d[2],$d[0]);
							$mese = date ("F", $fixed);
							$mesetest = date ("n", $fixed);							
							if (($mesetest == 12) || ($count == 0)) {
								echo date("Y", $fixed); 
							}
						
						?>
					</span><span class="annohome">
					<?php echo strtoupper($mese); 
						$count++;
					?>
					</span>
				</a>
			</h2>
		</div>




<!-- 
              <?php the_title( '<h2 class="entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark" >', '</a></h2>' ); ?>
 -->




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
	</div>
</div>
                    <?php endif; ?>


          <?php endwhile; ?>
			
				</div> <!-- end #main -->
    
				<?php //get_sidebar(); // sidebar 1 ?>
    
			</div> <!-- end #content -->

<?php get_footer(); ?>