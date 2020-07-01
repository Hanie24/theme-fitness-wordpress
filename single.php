<?php get_header(); ?>

    <main class="container page-fitness section with-sidebar">
        <div class="main-content">
            <?php while(have_posts()): the_post(); ?>

                <h2 class="text-primary"> <?php the_title(); ?> </h2>
                <?php the_post_thumbnail('blog', array('class' => 'outstanding-img')); ?>
                <p> <?php the_content( ); ?> </p>

            <?php  endwhile; ?>
        </div>
        <?php get_sidebar(); ?>
    </main>

<?php get_footer(); ?>
