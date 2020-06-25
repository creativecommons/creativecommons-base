<?php
use GutenPress\Forms;
use GutenPress\Forms\Element;
use GutenPress\Validate;
use GutenPress\Validate\Validations;
use GutenPress\Model;

class MpostMeta extends Model\PostMeta{
    protected function setId(){
        return 'post';
    }
    protected function setDataModel(){
        return array(
            new Model\PostMetaData(
                'video_url',
                'video URL',
                '\GutenPress\Forms\Element\InputText',
                array(
                	'description' => 'Video url (Vimeo and Youtube support), "Video" post format should be selected'
                )
            ),
            new Model\PostMetaData(
				'gallery',
				'Image gallery',
				'\GutenPress\Forms\Element\WPGallery',
				array(
					'description' => '"Gallery" post format should be selected to show gallery on top'
				)
			)
	        );
    }
}
new Model\Metabox( 'MpostMeta', 'Entry data', 'post', array('priority' => 'high') );
