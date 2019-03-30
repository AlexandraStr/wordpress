<?php
//
//В топ меню прибираємо wp-logo
function wph_new_toolbar() {
global $wp_admin_bar;
$wp_admin_bar->remove_menu('wp-logo');
$wp_admin_bar->remove_menu('add_product_menu');
 
}
REMOVE_ACTION(‘WP_HEAD’, ‘WP_GENERATOR’);
add_action('wp_before_admin_bar_render', 'wph_new_toolbar');
/**
 * AccessPress Root functions and definitions
 *
 * @package AccessPress Root
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'accesspress_root_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function accesspress_root_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on AccessPress Root, use a find and replace
	 * to change 'accesspress-root' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'accesspress-root', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Add callback for custom TinyMCE editor stylesheets. (editor-style.css)
	 * @see http://codex.wordpress.org/Function_Reference/add_editor_style
	 */
	add_editor_style('css/editor-style.css');	

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/** Woocommerce Compatibility **/
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size('accesspress-root-service-thumbnail', 380, 252, true);
	add_image_size('accesspress-root-blog-thumbnail', 558, 237, true);
	add_image_size('accesspress-root-project-thumbnail', 264, 200, true);
	add_image_size('accesspress-root-project-big-thumbnail', 558, 160, true);
	add_image_size('accesspress-root-blog-big-thumbnail', 760, 300, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'accesspress-root' ),
		'footer' => __( 'Footer Menu', 'accesspress-root' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );

}
endif; // accesspress_root_setup
add_action( 'after_setup_theme', 'accesspress_root_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function accesspress_root_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Left Sidebar', 'accesspress-root' ),
		'id'            => 'sidebar-left',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Right Sidebar', 'accesspress-root' ),
		'id'            => 'sidebar-right',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'accesspress-root' ),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="footer-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'accesspress-root' ),
		'id'            => 'footer-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="footer-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'accesspress-root' ),
		'id'            => 'footer-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="footer-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'accesspress-root' ),
		'id'            => 'footer-4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="footer-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'accesspress_root_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
//****************************************
function accesspress_root_scripts() {
	$query_args = array(
        'family' => 'PF+Handbook+Pro:400,300,700|Verdana:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic',
    ); 
	wp_enqueue_style('accesspress-root-google-fonts-css', add_query_arg($query_args, "//fonts.googleapis.com/css"));
	wp_enqueue_style('accesspress-root-step3-css', get_template_directory_uri() . '/css/off-canvas-menu.css');
    wp_enqueue_style('accesspress-root-font-awesome-css', get_template_directory_uri() . '/css/fontawesome/css/font-awesome.min.css');
    wp_enqueue_style('accesspress-root-bx-slider-css', get_template_directory_uri() . '/css/jquery.bxslider.css');
    wp_enqueue_style('accesspress-root-nivo-lightbox-css', get_template_directory_uri() . '/css/nivo-lightbox.css');
    wp_enqueue_style('accesspress-root-woocommerce-style',get_template_directory_uri().'/woocommerce/woocommerce-style.css');
    wp_enqueue_style('accesspress-root-style', get_stylesheet_uri() );
    if(of_get_option('responsive') == '1') :
		wp_enqueue_style( 'accesspress-root-responsive', get_template_directory_uri() . '/css/responsive.css' );
	endif;

	wp_enqueue_script( 'accesspress-root-bx-slider-js', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array('jquery'), '4.2.1', true );
	wp_enqueue_script( 'accesspress-root-actual-js', get_template_directory_uri() . '/js/jquery.actual.min.js', array('jquery'), '1.0.16', true );
	wp_enqueue_script( 'accesspress-root-lightbox-js', get_template_directory_uri() . '/js/nivo-lightbox.min.js', array('jquery'), '1.2.0', true );
	wp_enqueue_script( 'accesspress-root-modernizr', get_template_directory_uri() . '/js/modernizr.min.js', array('jquery'), '1.2.0', false );
    wp_enqueue_script( 'accesspress-root-custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0', true);
    wp_enqueue_script( 'accesspress-root-off-canvas-menu-js', get_template_directory_uri() . '/js/off-canvas-menu.js', array(), '1.0.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'accesspress_root_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/accesspress-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Option Framework.
 */
require get_template_directory() . '/inc/panel/options-framework.php';

/**
 * Woocommerce Functions
 */
//require get_template_directory() .'/woocommerce/woocommerce-function.php';

/**
 *
 * Add Welcome Page
 */
//require get_template_directory() .'/welcome/welcome.php';
/**
 * Excerpt length
 **/
add_filter( 'excerpt_length', function(){
	return 20;
} );
/**
 *
 * Add Dynamic Styles
 */
//******************************
require get_template_directory() .'/css/style.php';
// max word in the title
function maxWord($title){
    global $post;
    $title = $post->post_title;
    if (str_word_count($title) >= 10 ) //set this to the maximum number of words
    wp_die( __('Error: your post title is over the maximum word count.') );
}
add_action('publish_post', 'maxWord');
// Довжина анонса для певної категорії
add_filter('excerpt_length', 'my_excerpt_length');
function my_excerpt_length($length) {
    if(in_category(16)) {
        return 20;
    } else {
    return 30;
    }
}
// колонка "ID" для таксономий (рубрик, меток и т.д.) в админке
foreach (get_taxonomies() as $taxonomy) {
 add_action("manage_edit-${taxonomy}_columns", 'tax_add_col');
 add_filter("manage_edit-${taxonomy}_sortable_columns", 'tax_add_col');
 add_filter("manage_${taxonomy}_custom_column", 'tax_show_id', 10, 3);
}
add_action('admin_print_styles-edit-tags.php', 'tax_id_style');
function tax_add_col($columns) {return $columns + array ('tax_id' => 'ID');}
function tax_show_id($v, $name, $id) {return 'tax_id' === $name ? $id : $v;}
function tax_id_style() {print '<style>#tax_id{width:4em}</style>';}
// колонка "ID" для постов и страниц в админке
add_filter('manage_posts_columns', 'posts_add_col', 5);
add_action('manage_posts_custom_column', 'posts_show_id', 5, 2);
add_filter('manage_pages_columns', 'posts_add_col', 5);
add_action('manage_pages_custom_column', 'posts_show_id', 5, 2);
add_action('admin_print_styles-edit.php', 'posts_id_style');
function posts_add_col($defaults) {$defaults['wps_post_id'] = __('ID'); return $defaults;}
function posts_show_id($column_name, $id) {if ($column_name === 'wps_post_id') echo $id;}
function posts_id_style() {print '<style>#wps_post_id{width:4em}</style>';}


// Адмінка 
// Повідомлення про оновлення wordpress тільки для адміністратора
add_action( 'admin_head', function () {
	if ( ! current_user_can( 'manage_options' ) ) {
		remove_action( 'admin_notices', 'update_nag', 3 );
		remove_action( 'admin_notices', 'maintenance_nag', 10 );
	}
} );
// Видалення метабоксів на сторінці редагування записів
add_action('admin_menu','remove_default_post_screen_metaboxes');
function remove_default_post_screen_metaboxes() {
	// для постів
	remove_meta_box( 'postcustom','post','normal' ); // произвольные поля
	remove_meta_box( 'postexcerpt','post','normal' ); // цитата
	remove_meta_box( 'commentstatusdiv','post','normal' ); // комменты
	remove_meta_box( 'trackbacksdiv','post','normal' ); // блок уведомлений
	remove_meta_box( 'slugdiv','post','normal' ); // блок альтернативного названия статьи
	remove_meta_box( 'authordiv','post','normal' ); // автор

	// для сторінок
	remove_meta_box( 'postcustom','page','normal' ); // произвольные поля
	remove_meta_box( 'postexcerpt','page','normal' ); // цитата
	remove_meta_box( 'commentstatusdiv','page','normal' ); // комменты
	remove_meta_box( 'trackbacksdiv','page','normal' ); // блок уведомлений
	remove_meta_box( 'slugdiv','page','normal' ); // блок альтернативного названия статьи
	remove_meta_box( 'authordiv','page','normal' ); // автор
}
// Довільний порядок записів в меню адмінки
if( is_admin() ){
	add_filter('custom_menu_order', '__return_true'); // включаем ручную сортировку
	add_filter('menu_order', 'custom_menu_order'); // ручная сортировка
	function custom_menu_order( $menu_order ){
		/*
		$menu_order - массив где элементы меню выставлены в нужном порядке.
		Array(
			[0] => index.php
			[1] => separator1
			[2] => edit.php
			[3] => upload.php
			[4] => edit.php?post_type=page
			[5] => edit-comments.php
			[6] => edit.php?post_type=events
			[7] => separator2
			[8] => themes.php
			[9] => plugins.php
			[10] => snippets
			[11] => users.php
			[12] => tools.php
			[13] => options-general.php
			[14] => separator-last
			[15] => edit.php?post_type=cfs
		)
		*/
		if( ! $menu_order ) return true;

		return array(
			'index.php', // консоль
			'edit.php?post_type=page&cat=17', // страницы
			'edit.php', // посты
			'edit.php?post_type=events', // записи типа events
		);
	}
}
// Відміняємо показ вибраного терміну зверху
add_filter( 'wp_terms_checklist_args', 'set_checked_ontop_default', 10 );
function set_checked_ontop_default( $args ) {
	// изменим параметр по умолчанию на false
	if( ! isset($args['checked_ontop']) )
		$args['checked_ontop'] = false;

	return $args;
}
// Додаємо мініатюру запису в адмінку
if(1){
	add_action('init', 'add_post_thumbs_in_post_list_table', 20 );
	function add_post_thumbs_in_post_list_table(){
		// проверим какие записи поддерживают миниатюры
		$supports = get_theme_support('post-thumbnails');

		// $ptype_names = array('post','page'); // указывает типы для которых нужна колонка отдельно

		// Определяем типы записей автоматически
		if( ! isset($ptype_names) ){
			if( $supports === true ){
				$ptype_names = get_post_types(array( 'public'=>true ), 'names');
				$ptype_names = array_diff( $ptype_names, array('attachment') );
			}
			// для отдельных типов записей
			elseif( is_array($supports) ){
				$ptype_names = $supports[0];
			}
		}

		// добавляем фильтры для всех найденных типов записей
		foreach( $ptype_names as $ptype ){
			add_filter( "manage_{$ptype}_posts_columns", 'add_thumb_column' );
			add_action( "manage_{$ptype}_posts_custom_column", 'add_thumb_value', 10, 2 );
		}
	}

	// добавим колонку
	function add_thumb_column( $columns ){
		// подправим ширину колонки через css
		add_action('admin_notices', function(){
			echo '
			<style>
				.column-thumbnail{ width:80px; text-align:center; }
			</style>';
		});

		$num = 1; // после какой по счету колонки вставлять новые

		$new_columns = array( 'thumbnail' => __('Thumbnail') );

		return array_slice( $columns, 0, $num ) + $new_columns + array_slice( $columns, $num );
	}

	// заполним колонку
	function add_thumb_value( $colname, $post_id ){
		if( 'thumbnail' == $colname ){
			$width  = $height = 45;

			// миниатюра
			if( $thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true ) ){
				$thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
			}
			// из галереи...
			elseif( $attachments = get_children( array(
				'post_parent'    => $post_id,
				'post_mime_type' => 'image',
				'post_type'      => 'attachment',
				'numberposts'    => 1,
				'order'          => 'DESC',
			) ) ){
				$attach = array_shift( $attachments );
				$thumb = wp_get_attachment_image( $attach->ID, array($width, $height), true );
			}

			echo empty($thumb) ? ' ' : $thumb;
		}
	}
}
//
add_action('widgets_init', 'unregister_basic_widgets' );
function unregister_basic_widgets() {
	unregister_widget('WP_Widget_Pages');            // Виджет страниц
	unregister_widget('WP_Widget_Calendar');         // Календарь
	unregister_widget('WP_Widget_Archives');         // Архивы
	unregister_widget('WP_Widget_Links');            // Ссылки
	unregister_widget('WP_Widget_Search');           // Поиск
	unregister_widget('WP_Widget_Custom_HTML');      // HTML
	unregister_widget('WP_Widget_Media_Audio');      // Audio
	unregister_widget('WP_Widget_Media_Image class');//Image
	unregister_widget('WP_Widget_Meta');             // Мета виджет
	unregister_widget('WP_Widget_Recent_Comments');  // Последние комментарии
	unregister_widget('WP_Widget_RSS');              // RSS
	unregister_widget('WP_Widget_Tag_Cloud');        // Облако меток
	unregister_widget('WP_Nav_Menu_Widget');         // Меню
}
// Замінюємо шрифт в редакторі wordpress
function change_editor_font(){
    echo "<style type='text/css'>
    #editorcontainer textarea#content {
        font-family: 'PF Handbook Pro',Verdana, monospace;
        font-size:14px;
        color:#333;
        }
    </style>";
}
add_action("admin_print_styles", "change_editor_font");

// Прибираємо пунк додати з адмінпанелі зверху
function remove_admin_bar_links() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('new-content');
    $wp_admin_bar->remove_menu('new-link');
$wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );
// Прибираємо коментарі і лінки з панелі
//add_action( 'admin_init', 'my_remove_menu_pages' );
//    function my_remove_menu_pages() {
//        remove_menu_page('edit.php');
//        remove_menu_page('edit-comments.php');
//        remove_menu_page('link-manager.php');
//    }
//
//
function add_mycms_admin_bar_link() {
    global $wp_admin_bar;
    if ( !is_super_admin() || !is_admin_bar_showing() )
        return;
    $wp_admin_bar->add_menu( array(
    'id' => 'add_product_menu', // Could be anything make sure its unique
    'title' => __( 'Add Products'), //This will appear on the Menu
    'href' => __('http://www.example.com/wp-admin/post-new.php?post_type=products'),
    ));
    // Add sub menu link "View All Products"
    $wp_admin_bar->add_menu( array(
        'parent' => 'add_product_menu', // The unique ID of the parent menu
        'id'     => 'view_all_products',
        'title' => __( 'View All Products'),
        'href' => __('http://www.example.com/wp-admin/edit.php?post_type=products'),
    ));
    // Add sub menu link "Sections"
    $wp_admin_bar->add_menu( array(
        'parent' => 'add_product_menu',
        'id'     => 'my_sections',
        'title' => __( 'Sections'),
        'href' => __('http://www.example.com/wp-admin/edit-tags.php?taxonomy=Section&post_type=products'),
    ));
}
add_action('admin_bar_menu', 'add_mycms_admin_bar_link',25);
//
define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/panel/' );