<?php while(have_posts()): the_post(); ?>

    <h1 class="text-center main-text"> <?php the_title(); ?> </h1>

    <?php the_post_thumbnail('blog', array('class' => 'outstanding-img')); ?>

    <?php  
    
        // Revisa si el custom post type es igual a clases
        if(get_post_type() === 'fitness_clases'){ 
            $hour_init = get_field('hora_de_inicio');
            $hour_end = get_field('hora_fin');
    ?>
                
            <p class="info-class"><?php the_field('dias_de_la_clase'); ?> - <?php echo $hour_init . " a " . $hour_end; ?></p>
    <?php } ?>

    <p> <?php the_content( ); ?> </p>

<?php  endwhile; ?>