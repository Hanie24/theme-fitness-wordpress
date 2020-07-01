<?php get_header(); ?>
<main class="container page-fitness section without-sidebar">
    <section class="text-center">
        
        <?php get_template_part('template-parts/template-pages'); ?>

        <?php fitness_list_clases(); ?>

    </section>
</main>

<?php get_footer(); ?>