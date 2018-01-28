<?php
/*
 *  Author: Todd Motto | @toddmotto
 *  URL: html5blank.com | @html5blank
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
	'default-color' => 'FFF',
	'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
	'default-image'			=> get_template_directory_uri() . '/img/headers/default.jpg',
	'header-text'			=> false,
	'default-text-color'		=> '000',
	'width'				=> 1000,
	'height'			=> 198,
	'random-default'		=> false,
	'wp-head-callback'		=> $wphead_cb,
	'admin-head-callback'		=> $adminhead_cb,
	'admin-preview-callback'	=> $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// HTML5 Blank navigation
function html5blank_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

    	wp_register_script('conditionizr', get_template_directory_uri() . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0'); // Conditionizr
        wp_enqueue_script('conditionizr'); // Enqueue it!

        wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1'); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!

        wp_register_script('html5blankscripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0'); // Custom scripts
        wp_enqueue_script('html5blankscripts'); // Enqueue it!
    }
}

// Load HTML5 Blank conditional scripts
function html5blank_conditional_scripts()
{
    if ( is_front_page() || is_singular( 'proizvodjaci' ) ) {
        wp_register_script('slick', get_template_directory_uri() . '/js/lib/slick.min.js', array('jquery'), '1.0.0', true); // Conditional script(s)
        wp_enqueue_script('slick'); // Enqueue it!
    }
    
    if (is_front_page() || is_singular( 'proizvodjaci' )) {
        wp_register_script('sliderinit', get_template_directory_uri() . '/js/sliderinit.js', array( 'slick' ), '1.0.0', true); // initial slider 
        wp_enqueue_script('sliderinit'); // Enqueue it!
    }
}

// Load HTML5 Blank styles
function html5blank_styles()
{
    wp_register_style('normalize', get_template_directory_uri() . '/normalize.css', array(), '1.0', 'all');
    wp_enqueue_style('normalize'); // Enqueue it!

    wp_register_style('html5blank', get_template_directory_uri() . '/style.min.css', array(), '1.0', 'all');
    wp_enqueue_style('html5blank'); // Enqueue it!

    wp_register_style('fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '1.0', 'all');
    wp_enqueue_style('fontawesome'); // Enqueue it!
}

// Load HTML5 Blank conditional styles
function html5blank_conditional_styles()
{


    if ( is_front_page() || is_singular( 'proizvodjaci' ) ) {
        wp_register_style('slicks', get_template_directory_uri() . '/css/slick.min.css', array(), '1.0', 'all'); // slick styles
        wp_enqueue_style('slicks'); // Enqueue it!
    }
    
}

// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'html5blank'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'html5blank'), // Sidebar Navigation
        'extra-menu' => __('Extra Menu', 'html5blank'), // Extra Navigation if needed (duplicate as many as you need!)
        'footer' => __('Footer Menu', 'html5blank')
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('saznaj više', 'html5blank') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
	<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
	</div>
<?php if ($comment->comment_approved == '0') : ?>
	<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
	<br />
<?php endif; ?>

	<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
		<?php
			printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
		?>
	</div>

	<?php comment_text() ?>

	<div class="reply">
	<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php }

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'html5blank_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menumanufacturers
add_action('init', 'create_post_type_usluge'); // Add Usluge Custom Post Type
add_action('init', 'create_post_type_proizvodjaci'); // Add proizvodjaci Custom Post Type
add_action('init', 'create_post_type_novosti'); // Add novosti Custom Post Type
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination
add_action('wp_enqueue_scripts', 'html5blank_conditional_styles'); // Add Theme Custom Stylesheet

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/

// Create 1 Custom Post type for a Demo, called HTML5-Blank
function create_post_type_usluge()
{
    register_taxonomy_for_object_type('category', 'usluge'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'usluge');
    register_post_type('usluge', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Usluge', 'usluge'), // Rename these to suit
            'singular_name' => __('Usluga', 'usluge'),
            'add_new' => __('Dodaj novu', 'usluge'),
            'add_new_item' => __('Dodaj novu uslugu', 'usluge'),
            'edit' => __('Edituj', 'usluge'),
            'edit_item' => __('Edituj Uslugu', 'usluge'),
            'new_item' => __('Nova usluga', 'usluge'),
            'view' => __('Vidi usluge', 'usluge'),
            'view_item' => __('Vidi uslugu', 'usluge'),
            'search_items' => __('Pretraži usluge', 'usluge'),
            'not_found' => __('Nije pronađena nijedna usluga', 'usluge'),
            'not_found_in_trash' => __('Nema usluga u kanti za otpatke', 'usluge')
        ),
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'menu_icon'  => 'dashicons-admin-tools',
        'taxonomies' => array(
            'post_tag',
            'category'
        ) // Add Category and Post Tags support
    ));
}

// Create 1 Custom Post type for a Demo, called HTML5-Blank
function create_post_type_proizvodjaci()
{
    register_taxonomy_for_object_type('category', 'proizvodjaci'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'proizvodjaci');
    register_post_type('proizvodjaci', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Proizvođači', 'proizvodjaci'), // Rename these to suit
            'singular_name' => __('Proizvođač', 'proizvodjaci'),
            'add_new' => __('Dodaj novog', 'proizvodjaci'),
            'add_new_item' => __('Dodaj novog Proizvođača', 'proizvodjaci'),
            'edit' => __('Edituj', 'proizvodjaci'),
            'edit_item' => __('Edituj Proizvođača', 'proizvodjaci'),
            'new_item' => __('Nov Proizvođač', 'proizvodjaci'),
            'view' => __('Vidi Proizvođače', 'proizvodjaci'),
            'view_item' => __('Vidi Proizvođača', 'proizvodjaci'),
            'search_items' => __('Pretraži Proizvođače', 'proizvodjaci'),
            'not_found' => __('Nije pronađen nijedan Proizvođač', 'proizvodjaci'),
            'not_found_in_trash' => __('Nema Proizvođača u kanti za otpatke', 'proizvodjaci')
        ),
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'menu_icon'  => 'dashicons-universal-access',
        'taxonomies' => array(
            'post_tag',
           // 'category'
        ) // Add Category and Post Tags support
    ));
}

// Create 1 Custom Post type for a Demo, called HTML5-Blank
function create_post_type_novosti()
{
    register_taxonomy_for_object_type('category', 'novosti'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'novosti');
    register_post_type('novosti', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Novosti', 'novosti'), // Rename these to suit
            'singular_name' => __('Novost', 'novosti'),
            'add_new' => __('Dodaj novu', 'novosti'),
            'add_new_item' => __('Dodaj novu Novost', 'novosti'),
            'edit' => __('Edituj', 'novosti'),
            'edit_item' => __('Edituj Novost', 'novosti'),
            'new_item' => __('Nova Novost', 'novosti'),
            'view' => __('Vidi Novost', 'novosti'),
            'view_item' => __('Vidi Novost', 'novosti'),
            'search_items' => __('Pretraži Novosti', 'novosti'),
            'not_found' => __('Nije pronađena nijedna Novost', 'novosti'),
            'not_found_in_trash' => __('Nema Novosti u kanti za otpatke', 'novosti')
        ),
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'menu_icon'  => 'dashicons-universal-access',
        'taxonomies' => array(
            'post_tag',
            'category'
        ) // Add Category and Post Tags support
    ));
}
/*------------------------------------*\
	ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
function html5_shortcode_demo($atts, $content = null)
{
    return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}

// Shortcode Demo with simple <h2> tag
function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
    return '<h2>' . $content . '</h2>';
}

//shortcode za lokacije
function my_loc_shortcode( $attr ) {
    ob_start();
    get_template_part( 'templates/lokacije' );
    return ob_get_clean();
}
add_shortcode( 'lokacije', 'my_loc_shortcode' );

//shortcode za call centar banner
function my_callcenter_shortcode( $attr ) {
    ob_start();
    get_template_part( 'templates/call-center-banner' );
    return ob_get_clean();
}
add_shortcode( 'call-center-banner', 'my_callcenter_shortcode' );


//shortcode za upit za cenu banner
function my_upitzacenu_shortcode( $attr ) {
    ob_start();
    get_template_part( 'templates/upit-za-cenu' );
    return ob_get_clean();
}
add_shortcode( 'upit-za-cenu', 'my_upitzacenu_shortcode' );


//shortcode za upit za popravku na uslugama
function my_upitzaposebnupopravku_shortcode( $attr ) {
    ob_start();
    get_template_part( 'templates/upit-za-posebnu-popravku' );
    return ob_get_clean();
}
add_shortcode( 'upit-za-posebnu-popravku', 'my_upitzaposebnupopravku_shortcode' );

//shortcode za istaknute ponude
function my_istaknuteponude_shortcode( $attr ) {
    ob_start();
    get_template_part( 'templates/istaknute-ponude' );
    return ob_get_clean();
}
add_shortcode( 'istaknute-ponude', 'my_istaknuteponude_shortcode' );


/*------------------------------------*\
     Class ACTIVE in navigation
\*------------------------------------*/
        
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}




/*------------------------------------*\
              Breadcrumbs
    \*------------------------------------*/    
    
    function the_breadcrumb() {
    global $post;
    echo '<ul id="breadcrumbs">';
    if (!is_home() && !in_category( 'Uncategorized' )) {
        echo '<li><a href="';
        echo get_option('home');
        echo '">';
        echo 'Naslovna ';
        echo '</a></li><li class="separator"> > </li>';
        if (is_category() || is_single() ) {
            if(is_singular('proizvodjaci')){
               echo '<li> <a href="';
               echo get_post_type_archive_link( 'proizvodjaci' );
               echo   '"> Proizvođači</a></li><li class="separator">> </li><li>';
                   the_title();
                    echo '</li>';
            } elseif (is_singular('usluge')){
                echo '<li><a href="';
                echo get_post_type_archive_link( 'usluge' );
                 echo   '">Usluge</a></li><li class="separator"> > </li><li>';
                    the_title();
                    echo '</li>';
            } else {
                echo '<li>';
                the_category(' </li><li class="separator"> > </li><li> ');
                if (is_single()) {
                    echo '</li><li class="separator"> > </li><li>';
                    the_title();
                    echo '</li>';
                }
            }
        } elseif (is_page()) {
            if($post->post_parent){
                $anc = get_post_ancestors( $post->ID );
                $title = get_the_title();
                foreach ( $anc as $ancestor ) {
                    $output = '<li><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li> <li class="separator">/</li>';
                }
                echo $output;
                echo '<strong title="'.$title.'"> '.$title.'</strong>';
            }else {
                echo '<li><strong> '.get_the_title().'</strong></li>';
            }
        }
    }
    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
    elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
    echo '</ul>';
}



//add acf options page
if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'Podešavanja teme',
        'menu_title'    => 'Podešavanja teme',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Socijalne mreže u header-u i footer-u',
        'menu_title'    => 'Socijalne mreže',
        'parent_slug'   => 'theme-general-settings',
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Istaknute servisne ponude',
        'menu_title'    => 'Istaknute servisne ponude',
        'parent_slug'   => 'theme-general-settings',
    ));
}




/*Add this code to your functions.php file of current theme OR plugin file if you're making a plugin*/
//add the button to the tinymce editor
add_action('media_buttons_context','add_my_tinymce_media_button');
function add_my_tinymce_media_button($context){
return $context.=__("
<a href=\"#TB_inline?width=480&inlineId=my_shortcode_popup&width=640&height=513\" class=\"button thickbox\" id=\"my_shortcode_popup_button\" title=\"Dodaj custom Shortcode\">Dodaj custom Shortcode</a>");
}
add_action('admin_footer','my_shortcode_media_button_popup');
//Generate inline content for the popup window when the "my shortcode" button is clicked
function my_shortcode_media_button_popup(){?>
  <div id="my_shortcode_popup" style="display:none;">
    <--".wrap" class div is needed to make thickbox content look good-->
    <div class="wrap">
      <div>
        <h2>Spisak shortcodova</h2>
        <div class="my_shortcode_add">
            <select  id="id_of_textbox_user_typed_in">
                <option value="lokacije">Lokacije</option>
                 <option value="upit-za-cenu">Upit za cenu</option>
                  <option value="call-center-banner">Call centar banner</option>
                  <option value="upit-za-posebnu-popravku">Upit na stranama za usluge</option>
                  <option value="istaknute-ponude">Istaknute ponude sa cenom</option>
            </select><button class="button-primary" id="id_of_button_clicked">Dodaj Shortcode</button>

        </div>
      </div>
    </div>
  </div>
<?php
}
//javascript code needed to make shortcode appear in TinyMCE edtor
add_action('admin_footer','my_shortcode_add_shortcode_to_editor');
function my_shortcode_add_shortcode_to_editor(){?>
<script>
jQuery('#id_of_button_clicked ').on('click',function(){

    $.fn.getCursorPosition = function () {
        var el = $(this).get(0);
        var pos = 0;
        if ('selectionStart' in el) {
            pos = el.selectionStart;
        } else if ('selection' in document) {
            el.focus();
            var Sel = document.selection.createRange();
            var SelLength = document.selection.createRange().text.length;
            Sel.moveStart('character', -el.value.length);
            pos = Sel.text.length - SelLength;
        }
        return pos;
    }



  var user_content = jQuery('#id_of_textbox_user_typed_in').val();
  var shortcode = '['+user_content+']';
  if( !tinyMCE.activeEditor || tinyMCE.activeEditor.isHidden()) {
        var content = $('textarea#content').val();
        var position = $("textarea#content").getCursorPosition();
var newContent = content.substr(0, position) + shortcode + content.substr(position);
$('textarea#content').val(newContent);
    //jQuery('textarea#content').val($('textarea#content').val() +' '+ shortcode);
  } else {
    tinyMCE.execCommand('mceInsertContent', false, shortcode);
  }
  //close the thickbox after adding shortcode to editor
  self.parent.tb_remove();
});
</script>
<?php
}




//enable svg upload in wp
function custom_mtypes( $m ){
    $m['svg'] = 'image/svg+xml';
    $m['svgz'] = 'image/svg+xml';
    return $m;
}
add_filter( 'upload_mimes', 'custom_mtypes' );

?>
