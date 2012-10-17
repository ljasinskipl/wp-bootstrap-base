<?php

/* LJPL Bootstrap
 * Add custom user's profile fields
 * - Twitter - no current use
 * - Google+ - enables user to be shown his photo in google SERP listings
 */
add_action( 'show_user_profile', 'ljpl_bootstrap_show_user_profile_fields' );
add_action( 'edit_user_profile', 'ljpl_bootstrap_show_user_profile_fields' );

function ljpl_bootstrap_show_user_profile_fields( $user ) { ?>

	<h3>Social Networks</h3>

	<table class="form-table">

		<tr>
			<th><label for="ljpltwitter">Twitter</label></th>

			<td>
				<input type="text" name="ljpltwitter" id="ljpltwitter" value="<?php echo esc_attr( get_the_author_meta( 'ljpltwitter', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your Twitter username.</span>
			</td>
		</tr>
		<tr>
			<th><label for="ljplgplus">Google+</label></th>

			<td>
				<input type="text" name="ljplgplus" id="ljplgplus" value="<?php echo esc_attr( get_the_author_meta( 'ljplgplus', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please paste your Google+ profile link</span>
			</td>
		</tr>

	</table>
<?php }

add_action( 'personal_options_update', 'ljpl_bootstrap_save_user_profile_fields' );
add_action( 'edit_user_profile_update', 'ljpl_bootstrap_save_user_profile_fields' );

function ljpl_bootstrap_save_user_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	/* Copy and paste this line for additional fields. Make sure to change 'twitter' to the field ID. */
	update_usermeta( $user_id, 'ljpltwitter', $_POST['ljpltwitter'] );
	update_usermeta( $user_id, 'ljplgplus', $_POST['ljplgplus'] );
}
