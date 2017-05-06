<?php

/**
 *  Template Name: Builder
 *
 *
*/


 get_header(); ?>

<main class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php while ( have_posts() ): the_post(); ?>
                    <article id="entry-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
                        <h1 class="section-title">
                            <?php the_title(); ?>
                        </h1>

                        <?php if ( has_post_thumbnail() && get_post_meta( get_the_ID(), 'brittany_hide_featured', true ) != 1 ) : ?>
                            <div class="entry-thumb">
                                <a class="ci-lightbox" href="<?php echo esc_url( brittany_get_image_src( get_post_thumbnail_id(), 'large' ) ); ?>">
                                    <?php the_post_thumbnail(); ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <div class="entry-content">
                            <?php the_content(); ?>
                            <?php wp_link_pages(); ?>
                        </div>

                        <?php if ( get_theme_mod( 'page_signature', 1 ) ) {
                            get_template_part( 'part-signature' );
                        } ?>

                        <?php if ( get_theme_mod( 'page_social_sharing', 1 ) ): ?>
                            <div class="row-table">
                                <div class="row-table-right">
                                    <?php get_template_part( 'part-social-sharing' ); ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php comments_template(); ?>
                    </article>
                <?php endwhile; ?>
            </div>

            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div>

            <?php get_template_part( 'part-prefooter' ); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
