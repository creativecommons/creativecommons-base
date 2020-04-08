<?php
use Queulat\Metabox;
use Queulat\Forms\Node_Factory;
use Queulat\Forms\Element\WP_Gallery;
use Queulat\Forms\Element\Input;


class Post_Metabox extends Metabox {

	public function get_fields() : array {
		return array(
			Node_Factory::make(
				Input::class,
				array(
					'name'       => 'video_url',
					'label'      => 'Video URL',
					'properties' => array(
						'description' => 'Video url (Vimeo and Youtube support), "Video" post format should be selected',
					),
				)
			),
			Node_Factory::make(
				WP_Gallery::class,
				array(
					'name'       => 'gallery',
					'label'      => 'Image Gallery',
					'properties' => array(
						'description' => '"Gallery" post format should be selected to show gallery on top',
					),
				)
			),
		);
	}
	public function sanitize_data( array $data ) : array {
		$sanitized = array();
		foreach ( $data as $key => $val ) {
			switch ( $key ) {
				case 'video_url':
					$sanitized[ $key ] = $val;
					break;
				case 'gallery':
					$sanitized[ $key ] = $val;
					break;
			}
		}
		return $sanitized;
	}
}

new Post_Metabox( 'post', 'Post format', 'post', array( 'context' => 'normal' ) );
