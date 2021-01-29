<?php
class CC_Blocks {
	private static $instance;

	private function __construct() {
		$this->block_actions();
	}
	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			$c              = __CLASS__;
			self::$instance = new $c();
		}
		return self::$instance;
	}
	public function __clone() {
		trigger_error( 'Clone is not allowed.', E_USER_ERROR );
	}
	public function block_actions() {
		/**
		 * Register styles for core/image block
		 */
		register_block_style(
			'core/image',
			array(
				'name'         => 'img-metadata',
				'label'        => __( 'Attribution' ),
				'inline_style' => '.wp-block-image.is-style-attribution',
			)
		);
		register_block_style(
			'core/image',
			array(
				'name'         => 'img-metadata-wide',
				'label'        => __( 'Attribution wide' ),
				'inline_style' => '.wp-block-image.is-style-attribution-wide',
			)
		);
		/** define new render function to core/image block */
		add_action( 'init', array($this, 'ccgn_register_image') );
	}
	public function ccgn_register_image() {
		$block                  = WP_Block_Type_Registry::get_instance()->get_registered( 'core/image' );
		$block->render_callback = array($this, 'ccgn_gallery_render');
		unregister_block_type( 'core/image' );
		register_block_type( $block );
	}
	/**
	 * This function replaces the core render function to display the
	 * core/image gutenberg block
	 *
	 */
	public function ccgn_gallery_render( $attributes, $content ) {
		$image_size              = 'full';
		$attr                    = array();
		$image_classes           = array();
		$image_container_classes = array( 'wp-block-image' );
		$image_container_size    = '';
		$out                     = '';
		if ( ! empty( $attributes['className'] ) ) {
			$image_container_classes[] = $attributes['className'];
		}
		if ( ! empty( $attributes['alt'] ) ) {
			$attr['alt'] = $attributes['alt'];
		}
		if ( ! empty( $attributes['width'] ) && ! empty( $attributes['height'] ) ) {
			$image_size      = array( $attributes['width'], $attributes['height'] );
			$image_classes[] = 'is_resized';
		}
		if ( ! empty( $attributes['sizeSlug'] ) ) {
			$image_size = $attributes['sizeSlug'];
	
			switch ( $attributes['sizeSlug'] ) {
				case 'full':
					$image_classes[] = 'size-large';
					break;
				case 'medium':
					$image_classes[] = 'size-medium';
					break;
				case 'thumbnail':
					$image_classes[] = 'size-thumbnail';
					break;
			}
		}
		if ( ! empty( $attributes['align'] ) ) {
			switch ( $attributes['align'] ) {
				case 'right':
					$image_classes[] = 'alignright';
					break;
				case 'left':
					$image_classes[] = 'alignleft';
					break;
			}
		}
		$attachment_data = get_post( $attributes['id'] );
		$image           = wp_get_attachment_image( $attributes['id'], $image_size, '', $attr );
	
		$out .= '<div class="' . join( ' ', $image_container_classes ) . '">';
		$out .= '<figure class="' . join( ' ', $image_classes ) . '">';
		$out .= $image;
		if ( ! empty( $attachment_data->post_excerpt ) || ! empty( $attachment_data->post_content ) ) {
			$out .= '<div class="image-data">';
			if ( ! empty( $attachment_data->post_excerpt ) ) {
				$out .= '<figcaption>' . $attachment_data->post_excerpt . '</figcaption>';
			}
			if ( ! empty( $attachment_data->post_content ) ) {
				$out .= '<p>' . $attachment_data->post_content . '</p>';
			}
			$out .= '</div>';
		}
		$out .= '</figure>';
		$out .= '</div>';
	
		return $out;
	}
}

$_cc_blocks = CC_Blocks::get_instance();