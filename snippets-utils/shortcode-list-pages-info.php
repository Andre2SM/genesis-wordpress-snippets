<?php

function lt_list_pages_info( $atts, $content = null ) {

    ob_start();

    $the_query = new WP_Query( array( 		
        'post_type' 		=> 'page',
		'post_status'		=> 'publish'
    ) );
    ?>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Permalink</th>
                <th>Last modified date</th>
            </tr>
        </thead>
        <tbody>           
        
    <?php
    if( $the_query->have_posts() ) :
        while( $the_query->have_posts() ): $the_query->the_post(); ?>        

            <tr>
                <td><?php the_title();?></td>
                <td><?php echo esc_url( post_permalink() ); ?></td>
                <td><?php the_modified_date(); ?></td>
            </tr>

        <?php endwhile;
        wp_reset_postdata();
    endif;

    ?>

        </tbody>
    </table>

    <?php

    $content = ob_get_contents();
	ob_end_clean();
	return $content; 

}

add_shortcode( 'list_pages_info' , 'lt_list_pages_info');