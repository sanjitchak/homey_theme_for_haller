<?php
global $post, $homey_prefix, $listing_author;
$address = homey_get_listing_data('listing_address');
$price_separator = homey_option('currency_separator');

$is_superhost = $listing_author['is_superhost'];
$listing_price = homey_get_price();
$rating = homey_option('rating');
$total_rating = get_post_meta( $post->ID, 'listing_total_rating', true );
$min_hours = get_post_meta($post->ID, 'homey_min_book_hours', true);
 
$baths          = get_post_meta( get_the_ID(), $homey_prefix.'baths', true );
?>
<div class="title-section">
    <div class="block block-top-title">
        <div class="block-body">
            <?php get_template_part('template-parts/breadcrumb'); ?>
            <h1 class="listing-title">
                <?php the_title(); ?> <?php homey_listing_featured(get_the_ID()); ?>    
                <span class="listing-title" style="  float: left; font-weight: 400; font-size: 14px;"> 
					<?php 	
                    $beds       = homey_get_listing_data('beds');
					echo '<i class="fas fa-users"></i> ' .$beds. " (100%)/".$baths   ." (50%)"?>     
					</span>
            </h1>
         
            <?php if(!empty($address)) { ?>
            <address><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo esc_attr($address); ?></address>
            <?php } ?>
           
            <div class="host-avatar-wrap avatar">
           

                <?php if($is_superhost) { ?>
                <span class="super-host-icon">
                    <i class="fa fa-bookmark"></i>
                   
                </span>
                <?php } ?>
                <?php echo ''.$listing_author['photo'];?>

                

            </div>

            <?php if($rating && ($total_rating != '' && $total_rating != 0 ) ) { ?>
            <div class="list-inline rating hidden-xs">
           
                <?php echo homey_get_review_stars($total_rating, true, true); ?>
            </div>
            <?php } ?>
        </div><!-- block-body -->
    </div><!-- block -->
</div><!-- title-section -->