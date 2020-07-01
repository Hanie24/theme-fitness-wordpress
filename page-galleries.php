<?php 
/*
* Template Name: Template for gallerie
*/

get_header(); ?>

    <main class="container page-fitness section">
        <section class="main-content">
            
            <?php while(have_posts()): the_post(); ?>

                <h1 class="text-center main-text"> <?php the_title(); ?> </h1>

                <?php  
                    $gallery = get_post_gallery( get_the_ID(), false);

                    $gallery_image_ID = explode(',', $gallery['ids']);
                    
                ?>

                <ul class="gallery-image">
                    <?php
                        $i = 1;
                        foreach($gallery_image_ID as $id):
                            $size = ($i == 4 || $i == 6) ? 'portrait' : 'square';
                            $imageThumb = wp_get_attachment_image_src( $id, $size )[0]; 
                            $image = wp_get_attachment_image_src( $id, 'full' )[0];
                        
                    ?>  

                        <li>
                            <a href="<?php echo $image; ?>" data-lightbox='galeria'>
                                <img src="<?php echo $imageThumb; ?>" alt="imagen galeria">
                            </a>
                        </li>
                            
                    <?php $i++; endforeach;?>
                        
                </ul>                

            <?php  endwhile; ?>

        </section>

        <? get_sidebar(); ?>
    </main>

<?php get_footer(); ?>