<?php

//* Retrieve all products without missing focus keyphrase
function yoast_missing_focus_keyphrase( $atts, $content = null ) {

    $a = shortcode_atts( array (
        'posts_per_page' => 1,
        'paged'=> 1
    ), $atts );

    ob_start();

    $args = array(
        'post_type'             => array( 'product' ),
        'posts_per_page'        => $a['posts_per_page'],
        'paged'                 => $a['paged'],
        'meta_query'            => array(
            array(
                'key'     => '_yoast_wpseo_focuskw',
                'compare' => 'NOT EXISTS',
            ),
        ),
    );

    $query = new WP_Query( $args );

    if ( $query->have_posts() ) {

        ?>

        <table>
            <thead>
                <tr>
                <th>Page Title</th>
                <th>URL</th>
                <th>Creation date</th>
                </tr>
            </thead>
            <tbody>
        <?php

        while ( $query->have_posts() ) {  

            $query->the_post();

            ?> 

            <tr>
                <td><?php echo the_title(); ?></td>
                <td><a href="<?php echo the_permalink(); ?>"><?php echo the_permalink();?></a></td>
                <td><?php echo the_date(); ?></td>
            </tr>

            <?php
        }
        ?>

            </tbody>
        </table>

        <?php        
    } else {
        // no posts found
    }
    /* Restore original Post Data */
    wp_reset_postdata();

    $content = ob_get_contents();	
    ob_end_clean();	

    return $content; 

}
add_shortcode( 'missing_focus_keyphrase', 'yoast_missing_focus_keyphrase' );