export const filters = { 
    sidebar: `function filter_function_name( $mandatory_sidebars ) {
        // ...
      }
      add_filter( 
        'cc_theme_base_mandatory_sidebars','filter_function_name', 10, 1 );
      
    `,
    placeholder: `function filter_menu_list( $menu_list ) {
      // $menu_list['menu_ID'] = 'Menu name';
    $menu_list['new_menu'] = 'This is a new menu';
    return $menu_list;
  }
  add_filter( 'cc_theme_base_menus', 'filter_menu_list', 10, 1 )
  
    `
} 
