<?php
/**
*   Vocabulary components layout
*   @package wp-theme-base
*/

class modules {
  /**
   * Genereic card post and its variants
   *
   * @param int $post_id
   * @param boolean $show_image
   * @param boolean $is_video
   * @param boolean has_button
   * @param boolean has_content
   * @param string $direction
   * @return string component layout
   */
  static function card_post( $post_id, $show_image = true, $is_video = false, $has_button = true, $has_content = true, $direction = 'horizontal' ) {
    $out .= '<article class="card entry-post '.$direction.'">';
      if ( has_post_thumbnail( $post_id ) && $show_image ) {
        $out .= '<header class="card-image">';
          $out .= '<figure class="image is-4by3">';
            $out .= get_the_post_thumbnail($post_id, 'landscape-medium' );
          $out .= '</figure>';
        $out .= '</header>';
      }
      $button_class = ( $has_button ) ? ' with-button' : '';
      $out .= '<div class="card-content '.$button_class.'">';
        $out .= '<h4 class="card-title"><a href="'.get_permalink( $post_id ).'">'.get_the_title( $post_id ).'</a></h4>';
        if ( !$is_video ) {
          $out .= '<span class="subtitle"> '.get_the_date( 'd F Y', $post_id ).' </span>';
        }
        if ( $has_content ) {
          $the_post = get_post($post_id);
          $out .= '<div class="content">';
              $out .= do_excerpt( $the_post );
          $out .= '</div>';
        }
        $out .= '<a href="#" class="button is-primary">Read more</a>';
      $out .= '</div>';
    $out .= '</article>';

    return $out;
  }
}
