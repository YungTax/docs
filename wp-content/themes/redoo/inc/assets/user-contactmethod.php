<?php

$extra_fields =  array( 
    array( 'facebook', __( 'Facebook', 'redoo' ), true ),
    array( 'twitter', __( 'Twitter ', 'redoo' ), true ),
    array( 'googleplus', __( 'Google+', 'redoo' ), true ),
    array( 'linkedin', __( 'Linked In', 'redoo' ), false ),
    array( 'pinterest', __( 'Pinterest ', 'redoo' ), false ),
    array( 'wordpress', __( 'WordPress ', 'redoo' ), false ),
    array( 'phone', __( 'Phone Number', 'redoo' ), true ),
    array( 'instagram',__( 'Instagram','redoo'),true),
    array( 'tumblr',__( 'Tumblr','redoo'),true ),
    array( 'youtube',__('Youtube','redoo'),true ),
    array( 'dribbble',__('Dribbble','redoo'),true ),
    array( 'email',__('E-mail','redoo'),true ),
);

// Use the user_contactmethods to add new fields
add_filter( 'user_contactmethods', 'redoo_add_user_contactmethods' );

function  redoo_add_user_contactmethods( $user_contactmethods ) {

    // Get fields
    global $extra_fields;
    
    // Display each fields
    foreach( $extra_fields as $field ) {
        if ( !isset( $contactmethods[ $field[0] ] ) )
            $user_contactmethods[ $field[0] ] = $field[1];
    }

    // Returns the contact methods
    return $user_contactmethods;
}
// Add our fields to the registration process
add_action( 'register_form', 'redoo_register_form_display_extra_fields' );
add_action( 'user_register', 'redoo_user_register_save_extra_fields', 100 );

function redoo_register_form_display_extra_fields() {
    
    // Get fields
    global $extra_fields;
    foreach( $extra_fields as $field ) {
        if ( $field[2] == true ) { 
        $field_value = isset( $_POST[ $field[0] ] ) ? $_POST[ $field[0] ] : '';
        echo '<p>
            <label for="'. esc_attr( $field[0] ) .'">'. esc_html( $field[1] ) .'<br />
            <input type="text" name="'. esc_attr( $field[0] ) .'" id="'. esc_attr( $field[0] ) .'" class="input" value="'. esc_attr( $field_value ) .'" size="20" /></label>
            </label>
        </p>';
        } 
    }
}

function redoo_user_register_save_extra_fields( $user_id, $password = '', $meta = array() )  {

    global $extra_fields;
    
    $userdata       = array();
    $userdata['ID'] = $user_id;
    foreach( $extra_fields as $field ) {
        if( $field[2] == true ) { 
            $userdata[ $field[0] ] = $_POST[ $field[0] ];
        } 
    } 
    $new_user_id = wp_update_user( $userdata );
}
?>