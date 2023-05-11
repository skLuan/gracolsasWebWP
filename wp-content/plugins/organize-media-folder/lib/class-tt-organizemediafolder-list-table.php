<?php
/**
 * Organize Media Folder
 *
 * @package    Organize Media Folder
 * @subpackage OrganizeMediaFolder List Table
 * reference   Custom List Table Example
 *             https://wordpress.org/plugins/custom-list-table-example/
/*
	Copyright (c) 2020- Katsushi Kawamori (email : dodesyoswift312@gmail.com)
	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; version 2 of the License.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */

if ( ! class_exists( 'WP_List_Table' ) ) {
	require_once( ABSPATH . 'wp-admin/includes/class-wp-screen.php' );
	require_once( ABSPATH . 'wp-admin/includes/screen.php' );
	require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
	require_once( ABSPATH . 'wp-admin/includes/template.php' );
}

/** ==================================================
 * List table
 */
class TT_OrganizeMediaFolder_List_Table extends WP_List_Table {

	/** ==================================================
	 * Max items
	 *
	 * @var $max_items  max_items.
	 */
	public $max_items;

	/** ==================================================
	 * Add on bool
	 *
	 * @var $is_add_on_activate  is_add_on_activate.
	 */
	private $is_add_on_activate;

	/** ==================================================
	 * Construct
	 *
	 * @since 1.00
	 */
	public function __construct() {

		$this->is_add_on_activate = false;
		if ( function_exists( 'organize_media_folder_add_on_load_textdomain' ) ) {
			$this->is_add_on_activate = true;
		}

		global $status, $page;
		/* Set parent defaults */
		parent::__construct(
			array(
				'singular'  => 'bulk_folder_update',
				'ajax'      => false,
			)
		);

	}

	/** ==================================================
	 * Read data
	 *
	 * @since 1.00
	 */
	private function read_data() {

		$search_text = get_user_option( 'omf_search_text', get_current_user_id() );
		if ( isset( $_POST['organize-media-folder-filter'] ) && ! empty( $_POST['organize-media-folder-filter'] ) ) {
			if ( check_admin_referer( 'omf_filter', 'organize_media_folder_filter' ) ) {
				if ( ! empty( $_POST['user_id'] ) ) {
					update_user_option( get_current_user_id(), 'omf_filter_user', absint( $_POST['user_id'] ) );
				} else {
					update_user_option( get_current_user_id(), 'omf_filter_user', null );
				}
				if ( ! empty( $_POST['mime_type'] ) ) {
					$mime_type = sanitize_text_field( wp_unslash( $_POST['mime_type'] ) );
					update_user_option( get_current_user_id(), 'omf_filter_mime_type', $mime_type );
				} else {
					update_user_option( get_current_user_id(), 'omf_filter_mime_type', null );
				}
				if ( ! empty( $_POST['monthly'] ) ) {
					$monthly = sanitize_text_field( wp_unslash( $_POST['monthly'] ) );
					$monthly_arr = explode( ',', $monthly );
					update_user_option( get_current_user_id(), 'omf_filter_monthly', $monthly_arr );
				} else {
					update_user_option( get_current_user_id(), 'omf_filter_monthly', null );
				}
				if ( ! empty( $_POST['term_type'] ) ) {
					$term_type_csv = sanitize_text_field( wp_unslash( $_POST['term_type'] ) );
					$term_type_arr = explode( ',', $term_type_csv );
					update_user_option( get_current_user_id(), 'omf_filter_term', $term_type_arr );
				}
				if ( ! empty( $_POST['search_text'] ) ) {
					$search_text = sanitize_text_field( wp_unslash( $_POST['search_text'] ) );
					update_user_option( get_current_user_id(), 'omf_search_text', $search_text );
				} else {
					delete_user_option( get_current_user_id(), 'omf_search_text' );
					$search_text = null;
				}
			}
		}

		if ( current_user_can( 'manage_options' ) ) {
			$author = get_user_option( 'omf_filter_user', get_current_user_id() );
		} else {
			$author = get_current_user_id();
		}

		$args = array(
			'post_type'      => 'attachment',
			'post_status'    => 'any',
			'tax_query' => array(
				array(
					'taxonomy' => 'omf_folders',
					'field' => 'slug',
					'terms' => get_user_option( 'omf_filter_term', get_current_user_id() ),
				),
			),
			'author'         => $author,
			'post_mime_type' => get_user_option( 'omf_filter_mime_type', get_current_user_id() ),
			'posts_per_page' => -1,
			'orderby'        => 'date',
			'order'          => 'DESC',
		);
		$posts = get_posts( $args );

		$listtable_array = array();

		$monthly_archive = get_user_option( 'omf_filter_monthly', get_current_user_id() );

		if ( ! empty( $posts ) ) {
			foreach ( $posts as $post ) {
				if ( empty( $monthly_archive ) ) {
					$monthly = true;
				} else {
					if ( in_array( $post->ID, $monthly_archive ) ) {
						$monthly = true;
					} else {
						$monthly = false;
					}
				}
				if ( $monthly ) {
					$display_name = get_the_author_meta( 'display_name', $post->post_author );
					$pathname = get_post_meta( $post->ID, '_wp_attached_file', true );
					$filename = wp_basename( $pathname );
					$folder = '/' . untrailingslashit( str_replace( $filename, '', $pathname ) );

					$search = false;
					if ( $search_text ) {
						if ( false !== strpos( $post->post_title, $search_text ) ) {
							$search = true;
						}
						if ( false !== strpos( $folder, $search_text ) ) {
							$search = true;
						}
						if ( false !== strpos( $display_name, $search_text ) ) {
							$search = true;
						}
						if ( false !== strpos( $post->post_mime_type, $search_text ) ) {
							$search = true;
						}
						if ( false !== strpos( $post->post_date, $search_text ) ) {
							$search = true;
						}
					} else {
						$search = true;
					}

					if ( $search ) {
						$listtable_array[] = array(
							'ID'       => $post->ID,
							'title'    => $post->post_title,
							'folder'   => $folder,
							'author'   => $display_name,
							'datetime' => $post->post_date,
						);
					}
				}
			}
		}

		return $listtable_array;

	}

	/** ==================================================
	 * Column default
	 *
	 * @param array  $item  item.
	 * @param string $column_name  column_name.
	 * @since 1.00
	 */
	public function column_default( $item, $column_name ) {

		switch ( $column_name ) {
			case 'folder':
				$attach_rel_dir = get_post_meta( $item['ID'], '_wp_attached_file', true );
				$attach_rel_dir = '/' . untrailingslashit( str_replace( wp_basename( $attach_rel_dir ), '', $attach_rel_dir ) );

				$html = '<select name="targetdirs[' . $item['ID'] . ']" style="width: 100%; font-size: small; text-align: left;" form="organizemediafolder_forms">';
				$html .= apply_filters( 'omf_dir_selectbox', $attach_rel_dir, get_current_user_id() );
				$html .= '</select>';

				$allowed_html = array(
					'select'  => array(
						'name'  => array(),
						'style'  => array(),
						'form'  => array(),
					),
					'option'  => array(
						'value'  => array(),
						'select'  => array(),
						'selected'  => array(),
					),
				);

				return wp_kses( $html, $allowed_html );
			case 'author':
				return $item[ $column_name ];
			case 'datetime':
				return $item[ $column_name ];
			default:
				return print_r( $item, true ); /* Show the whole array for troubleshooting purposes */
		}
	}

	/** ==================================================
	 * Column title
	 *
	 * @param array $item  item.
	 * @since 1.00
	 */
	public function column_title( $item ) {

		$image_src = wp_get_attachment_image_src( $item['ID'], 'thumbnail', true );

		$pathname = get_attached_file( $item['ID'] );
		$filename = wp_basename( $pathname );

		$view_thumb_url = '<a href="' . get_the_permalink( $item['ID'] ) . '"><img style="margin: 0 5px 0 0; padding: 0 5px 0 0; width: 60px; height: 60px; vertical-align: middle; float: left;" src="' . $image_src[0] . '"><span style="vertical-align: top;">' . $item['title'] . '</span></a>';
		$filename_html = '<div>' . $filename . '</div>';
		$id_html = '<div>ID: ' . $item['ID'] . '</div>';
		$caption_html = null;
		if ( $this->is_add_on_activate ) {
			global $wpdb;
			$caption = $wpdb->get_var(
				$wpdb->prepare(
					"
						SELECT	post_excerpt
						FROM	{$wpdb->prefix}posts
						WHERE	ID = %d
					",
					$item['ID']
				)
			);
			$caption_html = '<div>' . $caption . '</div>';
		}

		/* Return the title contents */
		return sprintf(
			'%1$s <span style="color:silver"></span>',
			/*$1%s*/ $view_thumb_url . $filename_html . $id_html . $caption_html
		);

	}

	/** ==================================================
	 * Column checkbox
	 *
	 * @param array $item  item.
	 * @since 1.00
	 */
	public function column_cb( $item ) {

		return sprintf(
			'<input type="checkbox" name="bulk_folder_check[]" value="%1$s" form="organizemediafolder_forms" />',
			/*%1$s*/ $item['ID']
		);
	}

	/** ==================================================
	 * Get Columns
	 *
	 * @since 1.00
	 */
	public function get_columns() {

		$columns = array(
			'cb'       => '<input type="checkbox" />', /* Render a checkbox instead of text */
			'title'    => __( 'Title' ),
			'folder'   => __( 'Folder', 'organize-media-folder' ),
			'author'   => __( 'Author' ),
			'datetime' => __( 'Date/time' ),
		);

		return $columns;

	}

	/** ==================================================
	 * Get Sortable Columns
	 *
	 * @since 1.00
	 */
	public function get_sortable_columns() {
		$sortable_columns = array(
			'title'    => array( 'title', false ),
			'folder'   => array( 'folder', false ),
			'author'   => array( 'author', false ),
			'datetime' => array( 'datetime', false ),
		);
		return $sortable_columns;
	}

	/** ************************************************************************
	 * REQUIRED! This is where you prepare your data for display. This method will
	 * usually be used to query the database, sort and filter the data, and generally
	 * get it ready to be displayed. At a minimum, we should set $this->items and
	 * $this->set_pagination_args(), although the following properties and methods
	 * are frequently interacted with here...
	 *
	 * @global WPDB $wpdb
	 * @uses $this->_column_headers
	 * @uses $this->items
	 * @uses $this->get_columns()
	 * @uses $this->get_sortable_columns()
	 * @uses $this->get_pagenum()
	 * @uses $this->set_pagination_args()
	 **************************************************************************/
	public function prepare_items() {

		/**
		 * First, lets decide how many records per page to show
		 */
		$per_page = get_user_option( 'omf_per_page', get_current_user_id() );

		/**
		 * REQUIRED. Now we need to define our column headers. This includes a complete
		 * array of columns to be displayed (slugs & titles), a list of columns
		 * to keep hidden, and a list of columns that are sortable. Each of these
		 * can be defined in another method (as we've done here) before being
		 * used to build the value for our _column_headers property.
		 */
		$columns = $this->get_columns();
		$hidden = array();
		$sortable = $this->get_sortable_columns();

		/**
		 * REQUIRED. Finally, we build an array to be used by the class for column
		 * headers. The $this->_column_headers property takes an array which contains
		 * 3 other arrays. One for all columns, one for hidden columns, and one
		 * for sortable columns.
		 */
		$this->_column_headers = array( $columns, $hidden, $sortable );

		/**
		 * Instead of querying a database, we're going to fetch the example data
		 * property we created for use in this plugin. This makes this example
		 * package slightly different than one you might build on your own. In
		 * this example, we'll be using array manipulation to sort and paginate
		 * our data. In a real-world implementation, you will probably want to
		 * use sort and pagination data to build a custom query instead, as you'll
		 * be able to use your precisely-queried data immediately.
		 */
		$data = $this->read_data();
		do_action( 'omf_filter_form', get_current_user_id() );
		do_action( 'omf_bulk_select', get_current_user_id() );

		/**
		 * This checks for sorting input and sorts the data in our array accordingly.
		 *
		 * In a real-world situation involving a database, you would probably want
		 * to handle sorting by passing the 'orderby' and 'order' values directly
		 * to a custom query. The returned data will be pre-sorted, and this array
		 * sorting technique would be unnecessary.
		 *
		 * @param array $a  a.
		 * @param array $b  b.
		 */
		function usort_reorder( $a, $b ) {
			/* If no sort, default to title */
			if ( isset( $_REQUEST['orderby'] ) && ! empty( $_REQUEST['orderby'] ) ) {
				$orderby = sanitize_text_field( wp_unslash( $_REQUEST['orderby'] ) );
			} else {
				$orderby = 'datetime';
			}
			/* If no order, default to asc */
			if ( isset( $_REQUEST['order'] ) && ! empty( $_REQUEST['order'] ) ) {
				$order = sanitize_text_field( wp_unslash( $_REQUEST['order'] ) );
			} else {
				$order = 'asc';
			}
			$result = strcmp( $a[ $orderby ], $b[ $orderby ] ); /* Determine sort order */
			return ( 'desc' === $order ) ? $result : -$result; /* Send final sort direction to usort */
		}
		usort( $data, 'usort_reorder' );

		/***********************************************************************
		 * ---------------------------------------------------------------------
		 * vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv
		 *
		 * In a real-world situation, this is where you would place your query.
		 *
		 * For information on making queries in WordPress, see this Codex entry:
		 * http://codex.wordpress.org/Class_Reference/wpdb
		 *
		 * ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
		 * ---------------------------------------------------------------------
		 */

		/**
		 * REQUIRED for pagination. Let's figure out what page the user is currently
		 * looking at. We'll need this later, so you should always include it in
		 * your own package classes.
		 */
		$current_page = $this->get_pagenum();

		/**
		 * REQUIRED for pagination. Let's check how many items are in our data array.
		 * In real-world use, this would be the total number of items in your database,
		 * without filtering. We'll need this later, so you should always include it
		 * in your own package classes.
		 */
		$total_items = count( $data );
		$this->max_items = $total_items;

		/**
		 * The WP_List_Table class does not handle pagination for us, so we need
		 * to ensure that the data is trimmed to only the current page. We can use
		 * array_slice() to
		 */
		$data = array_slice( $data, ( ( $current_page - 1 ) * $per_page ), $per_page );

		/**
		 * REQUIRED. Now we can add our *sorted* data to the items property, where
		 * it can be used by the rest of the class.
		 */
		$this->items = $data;

		/**
		 * REQUIRED. We also have to register our pagination options & calculations.
		 */
		$this->set_pagination_args(
			array(
				'total_items' => $total_items,                  /* WE have to calculate the total number of items */
				'per_page'    => $per_page,                     /* WE have to determine how many items to show on a page */
				'total_pages' => ceil( $total_items / $per_page ),   /* WE have to calculate the total number of pages */
			)
		);
	}

}


