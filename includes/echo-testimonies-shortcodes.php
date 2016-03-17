<?php

/*----------------------------------------------------------------------------*/
/* Testimonies process shortcode
/*----------------------------------------------------------------------------*/

add_shortcode( 'echo_testimonies_section', 'echo_testimonies_section', 10 );

function echo_testimonies_section( $atts ) {

    extract( shortcode_atts( array(
        'heading' => '',
        'count' => '',
    ), $atts) );

    $count = (empty($count)) ? 4 : esc_html($count);

    $output = '<h1>' . esc_html( $heading ) . '</h1>';

    $testimonies = get_testimonies($count);

    $output .= '<div class="testimony-wrapper">';

        foreach($testimonies as $testimony):
            $output .= '<div class="testimony">
                <p>' . $testimony["testimony"] . '</p>
                <p>' . $testimony["name"] . '</p>
            </div>';
        endforeach;

    $output .= '</div>';

    return $output;

}