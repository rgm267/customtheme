<?php

$posts_query = new WP_Query( array( 'post_type' => 'post','posts_per_page' => -1 ) );

if ( $posts_query->have_posts() ) {
    echo '<ul>';
    while ( $posts_query->have_posts() ) {
        $posts_query->the_post();
        echo '<li>' . get_the_title() . '</li>';
        echo '<p>' . get_the_content() . '</p>';
    }
    echo '</ul>';

    /* Restore original Post Data */
    wp_reset_postdata();

}