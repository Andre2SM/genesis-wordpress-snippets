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

function as_schema_article_default_image( $data ) {

	$permalink		= get_permalink();
	$language		= str_replace('_', '-', get_locale() );	

	$image_src 		= wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );

	if ( !empty($image_src) && $image_src[1] > 1199 ) {
		
		$image_url		= $image_src[0];
		$image_width	= $image_src[1];
		$image_height	= $image_src[2];

	} else {

		$image_url		= 'IMAGE_URL'; // Replace with your own image url. Image should be at least 1200 pixels wide.
		$image_width	= 'IMAGE_WIDTH';
		$image_height	= 'IMAGE_HEIGHT';

	}
	
	$data['primaryImageOfPage']['type']		= 'ImageObject';
	$data['primaryImageOfPage']['@id']		= $permalink.'#primaryimage';
	$data['primaryImageOfPage']['url']		= $image_url;
	$data['primaryImageOfPage']['inLanguage']	= $language;
	$data['primaryImageOfPage']['width']		= $image_width;
	$data['primaryImageOfPage']['height']		= $image_height;

	return $data;
}
add_filter( 'wpseo_schema_article', 'as_schema_article_default_image' );