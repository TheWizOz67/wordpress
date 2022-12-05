<?php
/**
 * Enqueue styles only on their page
 * Style file name needs to match the pagename global variable of that page in order to load!
 *
 */

function loadTheScripts(){
    global $pagename;

    $style_uri           = get_template_directory_uri().'/assets/css/templates/'.$pagename.'.min.css';
    $def_style_uri       = get_template_directory_uri().'/assets/css/templates/default.min.css';

    $style_path          = dirname(__FILE__, 2).'/assets/css/templates/'.$pagename.'.min.css';

    // load style if exists, if not load the default
    if(file_exists($style_path)){
        wp_enqueue_style( $pagename.'-template-style', $style_uri);
    }
    else{
        wp_enqueue_style( $pagename.'-template-default', $def_style_uri);
    }

}
add_action('wp_enqueue_scripts', 'loadTheScripts');