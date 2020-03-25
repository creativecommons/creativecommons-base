<?php
/**
*   Vocabulary components layout
*   @package wp-theme-base
*/

class modules {
  /**
   * Genereic card post and its variants
   *
   * @param [int] $post_id
   * @param boolean $show_image
   * @param boolean $is_video
   * @param string $direction
   * @return void
   */
  static function card_post( $post_id, $show_image = true, $is_video = false, $direction = 'horizontal' ) {
    $out .= '<article class="card entry-post '.$direction.'">';
      if ( has_post_thumbnail( $post_id ) && $show_image ) {
        $out .= '<header class="card-image">';
          $out .= '<figure class="image is-4by3">';
            $out .= get_the_post_thumbnail($post_id, 'landscape-medium' );
          $out .= '</figure>';
        $out .= '</header>';
      }
      $out .= '<div class="card-content with-button">';
          $out .= '<h4 class="card-title"><a href="'.get_permalink( $post_id ).'">'.get_the_title( $post_id ).'</a></h4>';
          if ( !$is_video ) {
            $out .= '<span class="subtitle"> '.get_the_date( 'd F Y', $post_id ).' </span>';
          }
          $out .= '<div class="content">';
              $out .= do_excerpt();
          $out .= '</div>';
          $out .= '<a href="#" class="button is-primary">Read more</a>';
      $out .= '</div>';
    $out .= '</article>';
  }
}