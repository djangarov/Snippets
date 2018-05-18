add_action( 'admin_menu', 'crb_show_post_type_order', 99 );
function crb_show_post_type_order() {
	$post_type_name = 'page';
	if ( ! class_exists( 'CPTO' ) || ! method_exists( 'CPTO', 'admin_init' ) || ! method_exists( 'CPTO', 'SortPage' ) ) {
		return;
	}
	$custom_post_type_order = new CPTO();
	$custom_post_type_order->admin_init();
	add_submenu_page( 'edit.php?post_type=' . $post_type_name, __( 'Re-Order', 'cpt' ), __( 'Re-Order', 'cpt' ), 'switch_themes', 'order-post-types-' . $post_type_name, array( $custom_post_type_order, 'SortPage' ) );
}