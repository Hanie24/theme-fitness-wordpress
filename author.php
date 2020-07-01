<?php get_header(); ?>

    <main class="page-fitness section without-sidebar container page-blog">
    <?php  
        $author = get_queried_object();

    ?>
        <h2 class="text-center text-primary">Autor:
            <?php 
                echo $author->data->display_name;
            ?>
        </h2>
        <p class="text-center">
            <?
                echo get_the_author_meta('description', $autor->data->ID);
            ?>
        </p>
        <ul class="list-blog">
            <?php while(have_posts()): the_post(); ?> 
                <?php get_template_part('template-parts/loop', 'blog'); ?>
            <?php endwhile; ?>
        </ul>
    </main>

<?php get_footer(); ?>