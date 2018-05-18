add_action('admin_init', 'crb_remove_editor_init');
function crb_remove_editor_init() {

	// if post is not set, just return 
	if ( isset( $_GET['post'] ) ) {
		$post_id = $_GET['post'];
	} else if ( isset( $_POST['post_ID'] ) ) {
		$post_id = $_POST['post_ID'];
	} else {
		return;
	};

	$template_file = get_post_meta( $post_id, '_wp_page_template', TRUE );
	$templates = array( 'templates/home.php', 'templates/columns.php' );

	if ( in_array( $template_file, $templates ) ) {
		remove_post_type_support( 'page', 'editor' );
	};
}