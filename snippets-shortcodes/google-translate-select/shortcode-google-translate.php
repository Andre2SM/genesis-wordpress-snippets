<?php

function shortcode_google_translate( $atts, $content = null ) {

    wp_register_script('sast-google-translate', get_stylesheet_directory_uri().'/dist/js/google-translate.js', array('jquery'), SA_BLOCK_CHILD_THEME_VERSION, true );

    $array = array(
        'target_url' => get_permalink(),
    );

    var_dump($array);
    
    wp_localize_script( 'sast-google-translate', 'translate_object', $array );
    wp_enqueue_script('sast-google-translate');

        ob_start(); ?>
        <div class="google-translate__wrapper">
            <label class="screen-reader-text" for="google-translate">Select your language</label>
            <select class="google-translate" name="google-translate" id="google-translate">
                <option value="" disabled selected>EN</option>
                <option value="es">ES</option>
                <option value="fr">FR</option>
            </select>
        </div>
        <?php
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
}
add_shortcode( 'google_translate', 'shortcode_google_translate' );