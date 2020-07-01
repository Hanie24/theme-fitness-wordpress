<?php get_header('front'); ?>

    <section class="welcome text-center section">
        <h2 class="text-primary"><?php the_field('header_welcome'); ?></h2>
        <p><?php the_field('text_welcome'); ?></p>
    </section>

    <div class="section-area">
        <ul class="content-area">
            <li class="area">
                <?php
                    $area1 = get_field('area1');
                    $image = wp_get_attachment_image_src($area1['area_image'], 'medium2')[0];
                ?>
                <img src="<? echo esc_attr($image); ?>" />
                <p><?php echo esc_html($area1['area_text']); ?></p>
            </li>
            <li class="area">
                <?php
                    $area2 = get_field('area2');
                    $image = wp_get_attachment_image_src($area2['area_image'], 'medium2')[0];
                ?>
                <img src="<? echo esc_attr($image); ?>" />
                <p><?php echo esc_html($area2['area_text']); ?></p>
            </li>
            <li class="area">
                <?php
                    $area3 = get_field('area3');
                    $image = wp_get_attachment_image_src($area3['area_image'], 'medium2')[0];
                ?>
                <img src="<? echo esc_attr($image); ?>" />
                <p><?php echo esc_html($area3['area_text']); ?></p>
            </li>
            <li class="area">
                <?php
                    $area4 = get_field('area4');
                    $image = wp_get_attachment_image_src($area4['area_image'], 'medium2')[0];
                ?>
                <img src="<? echo esc_attr($image); ?>" />
                <p><?php echo esc_html($area4['area_text']); ?></p>
            </li>
        </ul>
    </div>

    <section class="class">
        <div class="container section">
            <h2 class="text-center text-primary">Nuestras clases</h2>
            <?php fitness_list_clases(4); ?>
            <div class="content-button">
                <a href="<?php echo esc_url(get_permalink(get_page_by_title('Nuestras Clases'))); ?>"
                class="button button-primary">
                    Ver todas las clases
                </a>
            </div>
        </div>
    </section>

    <section class="instructors">
        <div class="container section">
            <h2 class="text-center text-primary">Nuestros instructores</h2>
            <p class="text-center">Instructores profesionale que te ayudaran a cumplir tu objetivos</p>
            
            <ul class="trainers-list">
                <?php 
                    $args = array(
                        'post_type' => 'instructores',
                        'posts_per_page' => 30
                    );
                    $instructors = new WP_Query($args);
                    while($instructors->have_posts()):$instructors->the_post();
                ?>

                <li class="instructor">
                    <?php the_post_thumbnail('medium2'); ?>
                    <div class="cont text-center">
                        <h3><?php the_title(); ?></h3>
                        <p> <?php the_content(); ?></p>

                        <div class="specialty">
                            <?php 
                                $esp = get_field('especialidad');
                                foreach($esp as $e): ?>
                                    <span class="label"><?php echo esc_html($e); ?></span>
                            <? endforeach; ?>
                        </div>

                    </div>

                </li>

                <?php endwhile; wp_reset_postdata(); ?>
            </ul>
        </div>
    </section>

    <section class="testimonials">
        <h2 class="text-center text-white">Testimoniales</h2>
        <div class="contetn-testimonial">
            <ul class="list-testimonial">
                <?php
                    $args = array(
                        'post_type' => 'testimoniales',
                        'posts_per_page' => 10
                    );
                    $testimonial = new WP_Query($args);
                    while($testimonial->have_posts()):$testimonial->the_post();
                ?>
                <li class="testimonial">
                    <blockquote>
                        <?php the_content(); ?>
                    </blockquote>
                    <footer class="testimonial-footer">
                        <?php the_post_thumbnail('thumbnail'); ?>
                        <p><?php the_title(); ?></p>
                    </footer>
                </li>

                <?php endwhile; wp_reset_postdata(); ?>
            </ul>
        </div>
    </section>

    <section class="blog container section">
        <h2 class="text-center text-primary">Nuestro Blog</h2>
        <p class="text-center">Aprende tips de nuestros instructores expertos</p>
        <ul class="list-blog">
            <?php 
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 4
                );
                $blog = new WP_Query($args);
                while($blog->have_posts()): $blog->the_post();
        
                get_template_part('template-parts/loop', 'blog'); 

                endwhile; wp_reset_postdata(); 
            ?>
        </ul>
    </section>

<?php get_footer(); ?>