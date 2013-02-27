<?php get_header(); ?>
			
			<div id="content" class="clearfix row-fluid">
	
<div class= "clearfix mensola">
	<div class="central">
			
				<div id="main" class="span8 clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					  	
          			<?php
          			// global $post;
          			//                 $theid = get_the_ID();
          			//                 $tester[0] = "$theid";
          			//                 $ins = serialize($tester);
          			//                 //echo $ins;
          			//                 $fivesdrafts = $wpdb->get_results( 
          			//                   "
          			//                   SELECT * 
          			//                   FROM $wpdb->postmeta
          			//                   WHERE meta_value = '$ins'
          			//                   "
          			//                 );
          			// 
          			//                 foreach ( $fivesdrafts as $fivesdraft ) 
          			//                                      {
          			//                                        $my_query = query_posts('post_id='.$fivesdraft->post_id.'8&post_type=press-book');
          			//                                        
          			//                                        foreach ($my_query as $post) {
          			//                                           //setup_postdata($post);
          			//                                           //the_title();
          			//                                           //the_content();
          			//                                           //print_r($post);
          			//                                        }
          			//                                     }
                //print_r($fivesdrafts)
                
                /*
                						*  Query posts for a relationship value.
                						*  This method uses the meta_query LIKE to match the string "123" to the database value a:1:{i:0;s:3:"123";} (serialized array)
                						*/

                						$doctors = get_posts(array(
                							'post_type' => 'press-book',
                							'meta_query' => array(
                								array(
                									'key' => 'linked_folder', // name of custom field
                									'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
                									'compare' => 'LIKE'
                								)
                							)
                						));

                						?>
                						<?php if( $doctors ): ?>
                							<ul>
                							<?php foreach( $doctors as $doctor ): ?>
                								<?php 

                								$photo = get_field('photo', $doctor->ID);

                								?>
                								<li>
                									<a href="<?php echo get_permalink( $doctor->ID ); ?>">
                										<img src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['alt']; ?>" width="30" />
                										<?php echo get_the_title( $doctor->ID ); ?>
                									</a>
                								</li>
                							<?php endforeach; ?>
                							</ul>
                						<?php endif; ?>
                						
            
                             <?php

                  					  // $rows = get_field('press_books');
                  					  //                             if($rows)
                  					  //                             {
                  					  //                               echo '<ul>';
                  					  // 
                  					  //                               foreach($rows as $row)
                  					  //                               {
                  					  //                                 echo '<li>sub_field_1 = ' . $row['cover'] . ', sub_field_2 = ' . $row['flipdocs_link'] .', etc</li>';
                  					  //                               }
                  					  // 
                  					  //                               echo '</ul>';
                  					  //                             }
                              
                              
                              if(get_field('press_books')): ?>

                              	<?php while(has_sub_field('press_books')): ?>

                              		  <a href="<?php the_sub_field('flipdocs_link'); ?>"><img src="<?php the_sub_field('cover') ?>" alt="" width="120" /></a>

                              	<?php endwhile; ?>

                              <?php endif; ?>
          			
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
						<header>
						
							<?php the_post_thumbnail( 'wpbs-featured' ); ?>
							
							<div class="page-header"><h1 class="single-title" itemprop="headline"><?php the_title(); ?></h1></div>
							
							<p class="meta"><?php _e("Posted", "bonestheme"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_date(); ?></time> <?php _e("by", "bonestheme"); ?> <?php the_author_posts_link(); ?> <span class="amp">&</span> <?php _e("filed under", "bonestheme"); ?> <?php the_category(', '); ?>.</p>
						
						</header> <!-- end article header -->
					
						<section class="post_content clearfix" itemprop="articleBody">
						
							
							<?php wp_link_pages(); ?>
					
						</section> <!-- end article section -->
						
						<footer>
			
							<?php the_tags('<p class="tags"><span class="tags-title">' . __("Tags","bonestheme") . ':</span> ', ' ', '</p>'); ?>
							
							<?php 
							// only show edit button if user has permission to edit posts
							if( $user_level > 0 ) { 
							?>
							<a href="<?php echo get_edit_post_link(); ?>" class="btn btn-success edit-post"><i class="icon-pencil icon-white"></i> <?php _e("Edit post","bonestheme"); ?></a>
							<?php } ?>
							
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->
					
					
					
					<?php endwhile; ?>			
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h1><?php _e("Not Found", "bonestheme"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("Sorry, but the requested resource was not found on this site.", "bonestheme"); ?></p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
					
	</div>
</div>

			
				</div> <!-- end #main -->
    
				