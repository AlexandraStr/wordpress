<?php
function simple_news_loop() {
	$img_options = get_option( 'simple_news_settings' );

echo '<li><a href="' . get_the_permalink() . '">';

if ( has_post_thumbnail() ) :
	echo '<div class="simple-news-img-con">';
		if ( 0 == $img_options['simple_news_select_field_0'] ) {
		 the_post_thumbnail('news_plugin_small', array('class' => 'sn-img-small'));
		 }

		 if ( 1 == $img_options['simple_news_select_field_0'] ) {
		 the_post_thumbnail('news_plugin_small', array('class' => 'sn-img-small'));
		 }

		 if ( 2 == $img_options['simple_news_select_field_0'] ) {
		 the_post_thumbnail('news_plugin_medium', array('class' => 'sn-img-medium'));
		 }

		 if ( 3 == $img_options['simple_news_select_field_0'] ) {
		 the_post_thumbnail('news_plugin_large', array('class' => 'sn-img-large'));
		 }

		 if ( 4 == $img_options['simple_news_select_field_0'] ) {
		the_post_thumbnail('news_plugin_full', array('class' => 'sn-img-full'));
		 }
	echo '</div>';
endif;

echo '<div class="sumple-news-text-con">';
echo '<h8>' . get_the_title() . '</h8></a>';
echo '<div class="simple_news_date">' . get_the_date() . '</div>';
the_excerpt();
echo '</div>';
echo '</li>';

}