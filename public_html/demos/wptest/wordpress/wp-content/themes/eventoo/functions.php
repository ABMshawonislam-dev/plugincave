<?php
require_once(get_theme_file_path('/inc/customizer.php'));
require_once(get_theme_file_path('/inc/tgm.php'));
if ( ! isset( $content_width ) ) $content_width = 1140;
    if(class_exists('Attachments')){
        require_once(get_theme_file_path('/lib/attachments.php'));
    }
if(site_url() == "http://www.themesitem.com/demos/wordpress/eventoo"){
    define("VERSION",wp_get_theme()->get("Version"));
}else{
    define("VERSION",time());
}

// after setup theme start
function eventoo_theme_setup(){
    load_theme_textdomain("eventoo");
    add_theme_support( 'custom-logo', array(
        'height'      => 40,
        'width'       => 148,
    ) );
    add_theme_support("post-thumbnails");
    add_theme_support("title-tag");
    add_theme_support("html5",array("search-form","comment-list"));
    add_theme_support( 'automatic-feed-links' );
    add_editor_style("/assets/css/editor-style.css");
    register_nav_menu("topmenu",__("Top Menu","eventoo"));
    register_nav_menu("footermenu",__("Footer Menu","eventoo"));
}
add_action("after_setup_theme","eventoo_theme_setup");
// after setup theme end
// css and js enque start
function eventoo_assets(){
   wp_enqueue_style("googlefonts","//fonts.googleapis.com/css?family=Barlow+Condensed:300,400,500,600,700,800,900&display=swap",null,VERSION);
   wp_enqueue_style("bootstrap",get_theme_file_uri("/assets/css/bootstrap.min.css",null,VERSION));
   wp_enqueue_style("slick-slider",get_theme_file_uri("/assets/css/slick.css",null,VERSION));
   wp_enqueue_style("fontawsome",get_theme_file_uri("/assets/css/font-awesome.min.css",null.VERSION));
   wp_enqueue_style("venobox",get_theme_file_uri("/assets/css/venobox.css"),null,VERSION);
   wp_enqueue_style("style",get_theme_file_uri("/assets/css/style.css"),null,VERSION);
   wp_enqueue_style("responsive",get_theme_file_uri("/assets/css/responsive.css"),null,VERSION);
   wp_enqueue_style("eventoo-css",get_stylesheet_uri());
   wp_enqueue_script("popper",get_theme_file_uri("/assets/js/popper.min.js"),array("jquery"),VERSION,true);
   wp_enqueue_script("bootstrap",get_theme_file_uri("/assets/js/bootstrap.min.js"),array("jquery"),VERSION,true);
   wp_enqueue_script("slick",get_theme_file_uri("/assets/js/slick.min.js"),array("jquery"),VERSION,true);
   wp_enqueue_script("venobox",get_theme_file_uri("/assets/js/venobox.min.js"),array("jquery"),VERSION,true);
   wp_enqueue_script("loopcounter",get_theme_file_uri("/assets/js/loopcounter.js"),array("jquery"),VERSION,true);
   wp_enqueue_script("nicescroll",get_theme_file_uri("/assets/js/jquery.nicescroll.min.js"),array("jquery"),VERSION,true);
   wp_enqueue_script( 'comment-reply' );
   wp_enqueue_script("script",get_theme_file_uri("/assets/js/script.js"),array("jquery"),VERSION,true);
}
add_action("wp_enqueue_scripts","eventoo_assets");
// css and js enque end

//customizer assets start
function eventoo_customizer_assets(){
    wp_enqueue_script("customizer",get_theme_file_uri("/assets/js/customizer.js"),array("jquery",'customize-preview'),VERSION,true);
}
add_action("customize_preview_init","eventoo_customizer_assets");
//customizer assets start

// banner background change start
function eventoo_home_page_banner(){
    if(is_front_page()){
        ?>
           <style>
                 .single-slider{
                background: url('<?php echo esc_url( get_theme_mod( 'eventoo_theme_banner_options' ) ); ?>')
            }
           </style>
        <?php
    }
}
add_action("wp_head","eventoo_home_page_banner");
// banner background change start

//comment form input add start
function eventoo_chage_input_field( $defaults ) {
  $id = get_the_ID();
    $defaults['fields']['email'] = '<p class="comment-form-email"><label for="email"></label> <input id="email" name="email"  type="email" placeholder="Email"></p>';
    $defaults['fields']['author'] = '<p class="comment-form-author"><label for="author"></label> <input id="author" name="author"  type="text" placeholder="Name"></p>';
    $defaults['comment_field'] = '<p class="comment-form-comment"><label for="comment"></label> <textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" required="required" spellcheck="false" placeholder="Your Message"></textarea></p>';
    $defaults['submit_field'] = '<p class="form-submit"><button name="submit" type="submit" id="submit" class="submit text-center">
    Submit
</button> <input type="hidden" name="comment_post_ID" value="'.$id.'" id="comment_post_ID">
    <input type="hidden" name="comment_parent" id="comment_parent" value="0">
    </p>';
	return $defaults;
}
add_filter( 'comment_form_defaults', 'eventoo_chage_input_field' );
//comment form input add end

//comment form input remove start
function eventoo_website_input_remove($fields){
    if(isset($fields['url'] ))
    unset($fields['url']);
    if(isset($fields['cookies'] ))
    unset($fields['cookies']);
    return $fields;
}
add_filter('comment_form_default_fields', 'eventoo_website_input_remove');
//comment form input remove start

//move textarea comment field position start
function eventoo_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}
add_filter( 'comment_form_fields', 'eventoo_move_comment_field_to_bottom' );
//move textarea comment field position end

//blog sidebar start
function eventoo_bloge_grid_sidebar() {
    register_sidebar( array(
        'name'          => __( 'Blog Gride', 'eventoo' ),
        'id'            => 'blog-gride',
        'description'   => __( 'Blog Gride Sidebar', 'eventoo' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widgettitle">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'eventoo_bloge_grid_sidebar' );
//blog sidebar end

//remove category parenheses start
function eventoo_categories_postcount_paretheses_remove ($variable) {
    $variable = str_replace('(', '<span class="post_count"> ', $variable);
    $variable = str_replace(')', ' </span>', $variable);
    return $variable;
}
add_filter('wp_list_categories','eventoo_categories_postcount_paretheses_remove');
//remove category parenheses end

//remove archives post count parenthese start
function eventoo_archives_postcount_paretheses_remove ($variable) {
    $variable = str_replace('(', '<span class="post_count"> ', $variable);
    $variable = str_replace(')', ' </span>', $variable);
    return $variable;
}
add_filter('get_archives_link','eventoo_archives_postcount_paretheses_remove');
//remove archives post count parenthese end

//pagination start
function eventoo_pagination(){
    $published_posts = wp_count_posts()->publish;
    $posts_per_page = get_option('posts_per_page');
    $page_number_max = ceil($published_posts / $posts_per_page);
    $eventoo_links = paginate_links(array(
        'current' => max(1,get_query_var('paged')),
        'total' => $page_number_max,
        'prev_text'=>'<i class="fa fa-angle-left"></i>',
        'next_text'=>'<i class="fa fa-angle-right"></i>',
        'type' => 'list'
    ));
    $eventoo_links= str_replace('page-numbers','page-numbers  pagination',$eventoo_links);
    $eventoo_links= str_replace('<li>','<li class="page-item">',$eventoo_links);
    echo wp_kses_post($eventoo_links);
}

//pagination end

// search result highlight start
function eventoo_hightlight_search_results($text){
    if(is_search()){
        $eventoo_search_pattern = '/('.join('|',explode(' ',get_search_query())).')/i';
        $text = preg_replace($eventoo_search_pattern,'<span class="search_highlight">\0</span>',$text);
    }
    return $text;
}
add_filter('the_content','eventoo_hightlight_search_results');
add_filter('the_excerpt','eventoo_hightlight_search_results');
add_filter('the_title','eventoo_hightlight_search_results');
// search result highlight start

//import demo file start
function eventoo_imports_files() {
    return array(
      array(
        'import_file_name'             => 'Import Eventoo Demo Data',
        'categories'                   => array( 'New category', 'Old category' ),
        'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo-content/eventoo-content.xml',
        'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo-content/eventoo-widgets.wie',
        'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo-content/eventoo-customizer.dat',
        'import_notice'                => __( 'After import the demo data, you need to setup your home page and blog page from setting -> Reading Setting -> Home Page & Post Page, and also setup the menu from Appearance -> Menus', 'eventoo' ),
      ),
    );
  }
  add_filter( 'pt-ocdi/import_files', 'eventoo_imports_files' );
?>
