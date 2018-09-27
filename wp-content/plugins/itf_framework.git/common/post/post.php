<?php

Class ITFF_POST {

	public static function delete( $post_data ) {

		$answer = null;
		if ( !$post_data['ID'] ) {
			$answer = array(
				'result'  => 'error',
				'message' => 'No post ID received',
				'source'  => __METHOD__
			);
		} else {
			$post = get_post( $post_data['ID'] );
			$deleted_post = wp_delete_post( $post_data['ID'], true );

			if ( !$deleted_post ) {
				$answer = array(
					'result'  => 'error',
					'message' => 'Failse to delete post',
					'source'  => __METHOD__
				);
			} else {

				if ( $post == $deleted_post ) {
					$equality = true;
				} else {
					$equality = false;
				}

				$answer = array(
					'result'  => 'success',
					'message' => 'Post successfully deleted',
					'source'  => __METHOD__,
					'post_data' => $deleted_post,
					'equality' => $equality
				);
			}
		}

		if ( !$answer ) {
			$answer = array(
				'result'  => 'error',
				'message' => 'Nothing Happens ¯\_(ツ)_/¯',
				'source'  => __METHOD__
			);
		}
		return $answer;
	}

	public static function ajax_handler() {

		$answer = null;

		if ( !$_POST ) {
			$answer = array(
				'result'  => 'error',
				'message' => 'No request received',
				'source'  => __METHOD__
			);
		} else {
			if ( !$_POST['command'] ) {
				$answer = array(
					'result'  => 'error',
					'message' => 'No command received',
					'source'  => __METHOD__
				);
			} else {
				if ( !$_POST['post_data'] ) {
					$answer = array(
						'result'  => 'error',
						'message' => 'No post_data received',
						'source'  => __METHOD__
					);
				} else {

					if ( $_POST['command'] == 'delete' ) {
						$answer = self::delete( $_POST['post_data'] );
					}

					else {
						$answer = array(
							'result'  => 'error',
							'message' => 'Unknown command ¯\_(ツ)_/¯',
							'source'  => __METHOD__
						);
					}
				}
			}
		}

		if ( !$answer ) {
			$answer = array(
				'result'  => 'error',
				'message' => 'Nothing Happens ¯\_(ツ)_/¯',
				'source'  => __METHOD__
			);
		}
		echo json_encode( $answer );
		wp_die();

	}

}

add_action( 'wp_ajax_nopriv_itff_post', array( 'ITFF_POST', 'ajax_handler') );
add_action( 'wp_ajax_itff_post', array( 'ITFF_POST', 'ajax_handler') );