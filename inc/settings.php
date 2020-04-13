<?php 
use Queulat\Forms\Element\Div;
use Queulat\Forms\Element\Form;
use Queulat\Forms\Node_Factory;
use Queulat\Forms\Element\WP_Nonce;
use Queulat\Forms\Element\WP_Editor;
use Queulat\Forms\Element\WP_Image;
use Queulat\Forms\Element\Input;
use Queulat\Forms\Element\Input_Number;
use Queulat\Forms\Element\Input_Checkbox;
use Queulat\Forms\Element\Select;

class ThemeSettings {
	private $flash;
	public $settings;
	public function __construct()
	{
			$this->init();
			$this->flash = array('updated' => __('Settings saved', 'cc-theme-base'), 'error' => __('There was a problem saving your settings', 'cc-theme-base'));
			$this->settings = get_option('site_theme_settings');
	}
	public function init()
	{
			add_action('admin_menu', array($this, 'addAdminMenu'));
			add_action('admin_init', array($this, 'saveSettings'));
	}
	public function addAdminMenu()
	{
			add_submenu_page('index.php', _x('Custom settings', 'site settings title', 'cc-theme-base'), _x('Custom settings', 'site settings menu', 'cc-theme-base'), 'edit_theme_options', 'cc-theme-base-site-settings', array($this, 'adminMenuScreen'));
	}
	public function get_terms() {
			$reports = front::get_reports();
			$return = array( '' => 'Choose');
			foreach ($reports as $report) {
					$return[$report->ID] = $report->post_title;
			}
			return $return;
	}
	public function adminMenuScreen()
	{
			wp_enqueue_media();
			echo '<div class="wrap">';
			screen_icon('index');
			echo '<h2>' . _x('Custom Settings', 'site settings title', 'cc-theme-base') . '</h2>';
			if (!empty($_GET['msg']) && isset($this->flash[$_GET['msg']])) :
					echo '<div class="updated">';
			echo '<p>' . $this->flash[$_GET['msg']] . '</p>';
			echo '</div>';
			endif;
			$data = get_option('site_theme_settings');
			echo '<h4>Front page settings</h4>';
			$form = Node_Factory::make(
				Form::class,
				[
					'attributes' => [
							'class' => 'form',
							'id' => 'site-settings',
							'method' => 'POST'
					],
					'children' => [
						Node_Factory::make(
							Div::class,
								[
									'text_content' => '<h3>Features settings</h3>'
								]
						),
						Node_Factory::make(
							Input_Checkbox::class,
							[
								'name' => 'enable_featured',
								'label' => 'Enable featured content on homepage?',
								'value' => (!empty($data['enable_featured'])) ? $data['enable_featured'] : '',
								'options' => [
									'1' => 'Yes'
								]
							]
						),
						Node_Factory::make(
							WP_Image::class,
							[
								'name' => 'featured_image',
								'label' => 'Feature Background image',
								'value' => (!empty($data['featured_image'])) ? $data['featured_image'] : '',
								'properties' => [
										'description' => 'Background image'
								]
							]
            ),
						Node_Factory::make(
							WP_Editor::class,
							[
								'name' => 'featured_content',
								'label' => 'Content over the image',
								'value' => (!empty($data['featured_content'])) ? $data['featured_content'] : '',
								'attributes' => [
									'class' => 'widefat'
								],
								'properties' => [
									'media_buttons' => true,
									'drag_drop_upload' => false,
									'textarea_rows' => 5
								]
							]
						),
						Node_Factory::make(
							Select::class,
							[
								'name' => 'featured_background_color',
								'label' => 'Choose background color',
								'value' => (!empty($data['featured_background_color'])) ? $data['featured_background_color'] : '',
								'attributes' => [
									'class' => 'widefat'
								],
								'options' => (function () {
									$status = array(
										'' => 'Choose color',
										'tomato' => 'Tomato',
										'dark-slate-gray' => 'Dark Slate Gray',
										'gold' => 'Gold',
										'orange' => 'Orange',
										'forest-green' => 'Forest Green',
										'dark-turquoise' => 'Dark Turquoise',
										'dark-slate-blue' => 'Dark Slate Blue'
									);
									return $status;
								})()
              ]
            ),
						Node_Factory::make(
								Input_Checkbox::class,
								[
										'name' => 'include_donate',
										'label' => 'Include donate button?',
										'value' => (!empty($data['include_donate'])) ? $data['include_donate'] : '',
										'options' =>[
											'1' => 'Yes'
										]
								]
						),
						Node_Factory::make(
								Input_Checkbox::class,
								[
										'name' => 'enabled_announcement',
										'label' => 'Enable notification sidebar?',
										'value' => (!empty($data['enabled_announcement'])) ? $data['enabled_announcement'] : '',
										'options' =>[
											'1' => 'Yes'
										]
								]
						),
					Node_Factory::make(
							WP_Nonce::class,
							[
									'properties' => [
											'name' => '_site_settings_nonce',
											'action' => 'update_site_settings'
									]
							]
					),
					Node_Factory::make(
							Input::class,
							[
									'value' => 'Submit',
									'attributes' => [
											'type' => 'submit',
											'class' => 'button button-primary button-large'
									],
							]
					),
				Node_Factory::make(
						Input::class,
						[
							'name' => 'action',
							'value' => 'update_site_settings',
							'attributes' => [
									'type' => 'hidden'
							],
						]
					)
				]
			]  
	);
		echo $form;
	}
	public function saveSettings() {
		//echo '<pre>'; print_r($_POST); echo '</pre>';
		if (empty($_POST['action'])) return;
		if ($_POST['action'] !== 'update_site_settings') return;
		if (!wp_verify_nonce($_POST['_site_settings_nonce'], 'update_site_settings')) wp_die(_x("You are not supposed to do that", 'site settings error', 'cc-theme-base'));
		if (!current_user_can('edit_theme_options')) wp_die(_x("You are not allowed to edit this options", 'site settings error', 'cc-theme-base'));
		$fields = array(
				'enable_featured',
				'featured_image',
				'featured_content',
				'featured_background_color',
				'include_donate',
				'enabled_announcement'
		);
		$_POST['featured_image'] = $_POST['featured_image'][0];
		$raw_post = stripslashes_deep($_POST);
		$data = array_intersect_key($raw_post, array_combine($fields, $fields));
		update_option('site_theme_settings', $data);
		wp_redirect(admin_url('admin.php?page=cc-theme-base-site-settings&msg=updated', 303));
		exit;
	}
}
$_set = new ThemeSettings;

