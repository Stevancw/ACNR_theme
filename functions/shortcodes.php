<?php
//ONE HALF
function one_half_shortcode( $atts, $content = null ) {
   return '<div class="sixcol">' . do_shortcode($content) . '</div>';
}
add_shortcode( 'one_half', 'one_half_shortcode' );

//ONE HALF LAST
function one_half_last_shortcode( $atts, $content = null ) {
   return '<div class="sixcol last">' . do_shortcode($content) . '</div>';
}
add_shortcode( 'one_half_last', 'one_half_last_shortcode' );

//ONE THIRD
function one_third_shortcode( $atts, $content = null ) {
   return '<div class="fourcol">' . do_shortcode($content) . '</div>';
}
add_shortcode( 'one_third', 'one_third_shortcode' );

//ONE THIRD LAST
function one_third_last_shortcode( $atts, $content = null ) {
   return '<div class="fourcol last">' . do_shortcode($content) . '</div>';
}
add_shortcode( 'one_third_last', 'one_third_last_shortcode' );

//TWO THIRDS
function two_thirds_shortcode( $atts, $content = null ) {
   return '<div class="eightcol">' . do_shortcode($content) . '</div>';
}
add_shortcode( 'two_thirds', 'two_thirds_shortcode' );

//TWO THIRDS LAST
function two_thirds_last_shortcode( $atts, $content = null ) {
   return '<div class="eightcol last">' . do_shortcode($content) . '</div>';
}
add_shortcode( 'two_thirds_last', 'two_thirds_last_shortcode' );

//ONE FOURTH
function one_fourth_shortcode( $atts, $content = null ) {
   return '<div class="threecol">' . do_shortcode($content) . '</div>';
}
add_shortcode( 'one_quarter', 'one_fourth_shortcode' );

//ONE FOURTH LAST
function one_fourth_last_shortcode( $atts, $content = null ) {
   return '<div class="threecol last">' . do_shortcode($content) . '</div>';
}
add_shortcode( 'one_quarter_last', 'one_fourth_last_shortcode' );

//THREE FOURTHS
function three_fourths_shortcode( $atts, $content = null ) {
   return '<div class="ninecol">' . do_shortcode($content) . '</div>';
}
add_shortcode( 'three_quarters', 'three_fourths_shortcode' );               

//THREE FOURTHS LAST
function three_fourths_last_shortcode( $atts, $content = null ) {
   return '<div class="ninecol last">' . do_shortcode($content) . '</div>';
}
add_shortcode( 'three_quarters_last', 'three_fourths_last_shortcode' );

//CLEAR
function clear_shortcode( $atts, $content = null ) {
   return '<div class="clear">' . do_shortcode($content) . '</div>';
}
add_shortcode( 'clear', 'clear_shortcode' );


//TINTED BOXES
function box_shortcode( $atts, $content = null ) {
   return '<div class="tinted">' . do_shortcode($content) . '</div>';
}
add_shortcode( 'box', 'box_shortcode' );
?>
