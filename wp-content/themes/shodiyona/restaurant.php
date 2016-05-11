<?php
/*
Template Name: Restaurants
*/
query_posts( array('posts_per_page' =>2, 'post_type' => 'restaurant') );
get_template_part('content', 'category');
?>