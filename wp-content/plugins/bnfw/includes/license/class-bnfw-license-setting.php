<?php
/**
 * BNFW License setting Handler.
 *
 * @since v1.4
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly

function bnfw_license_settings() {
	$settings = apply_filters( 'bnfw_settings_licenses', array() );

	if ( ! empty( $settings ) ) {

		// Set-up - General Options Section
		add_settings_section(
			'bnfw_license_section',     // Section ID
			__( 'Addon Licenses', 'bnfw' ),                                 // Title above settings section
			'__return_false',    // Name of function that renders a description of the settings section
			'bnfw-settings'                     // Page to show on
		);

		foreach ( $settings as $option ) {
			$name = isset( $option['name'] ) ? $option['name'] : '';
			add_settings_field(
				'bnfw_licenses[' . $option['id'] . ']',
				$name,
				'bnfw_license_key_callback',
				'bnfw-settings',
				'bnfw_license_section',
				array(
					'id'          => isset( $option['id'] )          ? $option['id']          : null,
					'desc'        => ! empty( $option['desc'] )      ? $option['desc']        : '',
					'name'        => isset( $option['name'] )        ? $option['name']        : null,
					'size'        => isset( $option['size'] )        ? $option['size']        : null,
					'options'     => isset( $option['options'] )     ? $option['options']     : '',
					'std'         => isset( $option['std'] )         ? $option['std']         : '',
					'min'         => isset( $option['min'] )         ? $option['min']         : null,
					'max'         => isset( $option['max'] )         ? $option['max']         : null,
					'step'        => isset( $option['step'] )        ? $option['step']        : null,
					'chosen'      => isset( $option['chosen'] )      ? $option['chosen']      : null,
					'placeholder' => isset( $option['placeholder'] ) ? $option['placeholder'] : null,
					'allow_blank' => isset( $option['allow_blank'] ) ? $option['allow_blank'] : true,
					'readonly'    => isset( $option['readonly'] )    ? $option['readonly']    : false,
					'faux'        => isset( $option['faux'] )        ? $option['faux']        : false,
				)
			);
		}

		register_setting(
			'bnfw-settings',
			'bnfw_licenses'
		);
	}
}
add_action( 'admin_init', 'bnfw_license_settings', 11 );

/**
 * Register the new license field type
 *
 * @return  void
 */
function bnfw_license_key_callback( $args ) {
	$bnfw_options = get_option( 'bnfw_licenses' );

	if ( isset( $bnfw_options[ $args['id'] ] ) ) {
		$value = $bnfw_options[ $args['id'] ];
	} else {
		$value = isset( $args['std'] ) ? $args['std'] : '';
	}

	$size = isset( $args['size'] ) && ! is_null( $args['size'] ) ? $args['size'] : 'regular';
	$html = '<input type="text" class="' . $size . '-text" id="bnfw_licenses[' . $args['id'] . ']" name="bnfw_licenses[' . $args['id'] . ']" value="' . esc_attr( $value ) . '"/>';

	if ( 'valid' == get_option( $args['options']['is_valid_license_option'] ) ) {
		$html .= '<input type="submit" class="button-secondary" name="' . $args['id'] . '_deactivate" value="' . __( 'Deactivate License',  'bnfw' ) . '"/>';
	}

	$html .= '<label for="bnfw_licenses[' . $args['id'] . ']"> '  . $args['desc'] . '</label>';

	echo $html;
}
