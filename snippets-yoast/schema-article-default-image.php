<?php 

/**
 * Default image in Yoast Article Schema when there is no featured image.
 * 
 * @author Andree Sabas
 * 
 * @param array $data
 * @return array
 * 
 */

function sa_schema_default_article_image( $data ) {	

	$image_src 		= wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );

	if ( empty($image_src) && $image_src[1] < 1199 ) {
		
		$data['image']['type']	= 'imageObject';
		$data['image']['url']	= 'IMAGE_URL';

	}

	return $data;
}
add_filter( 'wpseo_schema_article', 'sa_schema_default_article_image' );