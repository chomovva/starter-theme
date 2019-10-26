<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };


if ( have_posts() ) {

  echo '<h1>' . single_post_title( '', false ) . '</h1>';
  starter\the_breadcrumb();
  while ( have_posts() ) {
    the_post();
    echo '<div class="content">'; the_content(); echo '</div>';
    starter\the_pager();
    if ( comments_open( get_the_ID() ) ) comments_template();
  }

}