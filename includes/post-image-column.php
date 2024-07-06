<?php
/**
 * This class adds new column to Dasboard Post table's new column
 */

 class Post_Image_Column {

	public function __construct() {
		add_filter( 'manage_post_posts_columns', array( $this, 'post_columns'), 10, 1 );
		add_action( 'manage_post_posts_custom_column', array( $this, 'add_column_image' ), 10, 2 ); 
	}

	public function post_columns($columns){
		$new_columns = array();

		foreach( $columns as $key => $column ) {
			if ( 'cb' == $key ) {
				$new_columns[ $key ] = $column;
				$new_columns['thumb'] = 'Image';
				continue;
			}

			$new_columns[ $key ] = $column;
		}

		return $new_columns;
	}

	public function add_column_image($column, $post_id) {
		if ( 'thumb' == $column ){
			echo get_the_post_thumbnail( $post_id, 'thumbnail', array( 'class' => 'alignleft post-list-thumb' ) );
		}

	}
 }