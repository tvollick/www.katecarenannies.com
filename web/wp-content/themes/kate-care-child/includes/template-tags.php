<?php

if ( !function_exists('kc_header_featured_content')) : 
	function kc_header_featured_content () {

        if( get_post_format() === 'video' ) {
            $post = get_post( get_the_ID() );
            remove_filter( 'the_content', 'wpautop' );
           ?>
                <div class="video-wrapper">
                    <?php echo apply_filters( 'the_content', $post->post_content ); ?>
                </div>
            <?php
        }
        elseif( get_post_format() === 'gallery' ) {
            ?>
            <div class="gallery-slider">
                <?php
                $gallery = get_post_gallery_images( get_the_ID() );

                foreach ( $gallery as $key => $src ):
                    ?>
                    <div class="gallery-item">
                        <div class="fade-in-img">
                            <img src="<?php echo $src;?>" data-src="<?php echo $src;?>" alt="">
                            <noscript>
                                <img src="<?php echo $src;?>" alt="">
                            </noscript>
                        </div><!--.fade-in-img-->
                    </div><!--.gallery-item-->
                    <?php
                endforeach;
                ?>
            </div><!--.gallery-slider-->
            <?php
        }
        elseif( post_password_required() || is_attachment() || ! has_post_thumbnail() || ! get_theme_mod( 'vct_overall_site_featured_image', true ) ) {
            return;
        }
        else {
            ?>
            <div class="page-hero-banner" style="background-image: url(<?php the_post_thumbnail_url() ?>)">
                <div class="page-title-wrapper ">
                    <div class="container">
                        <h1 class="page-title"><?php the_title() ?> </h1>
                    </div>
                </div>
            </div>

            <?php
        }

	}

endif; 



?>