<?php

function fitness_list_clases($quantity = -1) { ?>
    
    <ul class="list-class">

        <?php 
        
            $args = $arrayName = array(
                'post_type' => 'fitness_clases',
                'posts_per_page' => $quantity
            );
            $clases = new WP_Query($args);
            while( $clases->have_posts()): $clases->the_post();
        
        ?>

        <li class="card gradient">
            <?php the_post_thumbnail('medium2'); ?>
            <div class="content-card">
                <a href="<?php the_permalink(); ?>">
                    <h3> <?php the_title(); ?> </h3>
                </a>
                
                <?php 
                    $hour_init = get_field('hora_de_inicio');
                    $hour_end = get_field('hora_fin');
                ?>
                
                <p><?php the_field('dias_de_la_clase'); ?> - <?php echo $hour_init . " a " . $hour_end; ?></p>
                
            </div>
        </li>

        <?php  endwhile; wp_reset_postdata(); ?>

    </ul>

<?php
}
