<?php
use GutenPress\Forms;
use GutenPress\Forms\Element;
use GutenPress\Validate;
use GutenPress\Validate\Validations;
use GutenPress\Model;

class ThemeSettings{
	private $flash;
	public $settings;
	public function __construct(){
		$this->init();
		$this->flash = array(
			'updated' => __('Settings saved', 'cc-main'),
			'error'   => __('There was a problem saving your settings', 'cc-main')
		);
		$this->settings = get_option( 'site_theme_settings');
	}
	public function init(){
		add_action('admin_menu', array($this, 'addAdminMenu'));
		add_action('admin_init', array($this, 'saveSettings'));
	}
	public function addAdminMenu(){
		add_submenu_page( 'index.php' , _x('Website Settings', 'site settings title', 'cc-main'), _x('Website settings', 'site settings menu', 'cc-main'), 'edit_theme_options', 'cc-main-site-settings', array($this, 'adminMenuScreen'));
	}
	public function adminMenuScreen(){
		echo '<div class="wrap">';
			screen_icon('index');
			echo '<h2>'. _x('Configuraciones', 'site settings title', 'cc-main') .'</h2>';
			if ( ! empty($_GET['msg']) && isset($this->flash[ $_GET['msg'] ]) ) :
				echo '<div class="updated">';
					echo '<p>'. $this->flash[ $_GET['msg'] ] .'</p>';
				echo '</div>';
			endif;
			$data = get_option( 'site_theme_settings' );
			$form = new Forms\Form('site-settings');
			$form->addElement( new Element\InputCheckbox(
				_x('Enable featured content on homepage?', 'site settings fields', 'cc-main'),
				'enable_featured',
				array( '1' => 'Yes'),
				array(
					'value' => isset($data['enable_featured']) ? $data['enable_featured'] : '',
					'description' => 'Enable featured content on homepage?'
				)
			) )->addElement( new Element\WPImage(
				_x('Feature Background image', 'site settings fields', 'cc-main'),
				'featured_image',
				array(
					'value' => isset($data['featured_image']) ? $data['featured_image'] : '',
					'description' => 'Background image'
				)
			) )->addElement( new Element\WPEditor(
				_x('Content over the image', 'site settings fields', 'cc-main'),
				'featured_content',
				array(
					'value' => isset($data['featured_content']) ? $data['featured_content'] : '',
					'textarea_rows' => 7,
					'media_buttons' => false
				)
			) )->addElement( new Element\Select(
				_x('Choose background color', 'site settings fields', 'cc-main'),
				'featured_background_color',
				array( 
					''                => 'Choose color',
					'tomato'          => 'Tomato',
					'dark-slate-gray' => 'Dark Slate Gray',
					'gold'            => 'Gold',
					'orange'          => 'Orange',
					'forest-green'    => 'Forest Green',
					'dark-turquoise'  => 'Dark Turquoise',
					'dark-slate-blue' => 'Dark Slate Blue',
				),
				array(
					'value' => isset($data['featured_background_color']) ? $data['featured_background_color'] : '',
					'description' => 'Choose background color'
				)
			) )->addElement( new Element\InputCheckbox(
				_x('Include donate button?', 'site settings fields', 'cc-main'),
				'include_donate',
				array( '1' => 'Yes'),
				array(
					'value' => isset($data['include_donate']) ? $data['include_donate'] : '',
					'description' => 'Enable featured content on homepage?'
				)
			) )->addElement( new Element\InputCheckbox(
				_x('Enable notification sidebar?', 'site settings fields', 'cc-main'),
				'enabled_announcement',
				array( '1' => 'Yes'),
				array(
					'value' => isset($data['enabled_announcement']) ? $data['enabled_announcement'] : '',
					'description' => 'Enable notification sidebar?'
				)
			) );
			$form = apply_filters( 'cc-main_main_configuration_form', $form, $data );
			/*
			Fin opciones newsletter
			*/
			$form->addElement( new Element\InputSubmit(
				_x('Save', 'site settings fields', 'cc-main')
			) )->addElement( new Element\WPNonce(
				'update_site_settings',
				'_site_settings_nonce'
			) )->addElement( new Element\InputHidden(
				'action',
				'update_site_settings'
			) );
			echo '<h3>'._x('Home settings', 'site settings fields', 'cc-main').'</h3>';
			echo $form;
		echo '</div>';
	}


	public function saveSettings(){
		if ( empty($_POST['action']) )
			return;
		if ( $_POST['action'] !== 'update_site_settings' )
			return;
		if ( ! wp_verify_nonce( $_POST['_site_settings_nonce'], 'update_site_settings' ) )
			wp_die( _x("You are not supposed to do that", 'site settings error', 'cc-main') );
		if ( ! current_user_can( 'edit_theme_options' ) )
			wp_die( _x("You are not allowed to edit this options", 'site settings error', 'cc-main') );
		$fields = array(
			'enable_featured',
			'featured_image',
			'featured_content',
			'featured_background_color',
			'include_donate',
			'enabled_announcement',
			'show_authors'
		);
		$fields = apply_filters('cc-main_main_configuration_fields',$fields);
		$raw_post = stripslashes_deep( $_POST );
		$data = array_intersect_key($raw_post, array_combine($fields, $fields) );
		update_option( 'site_theme_settings' , $data );
		wp_redirect( admin_url('admin.php?page=cc-main-site-settings&msg=updated', 303) );
		exit;
	}
}
$_set = new ThemeSettings;