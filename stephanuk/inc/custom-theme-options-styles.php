<?php
// File Security Check
if (!defined('ABSPATH')) {
	exit;
}
function trydus_theme_options_style()
{
	// Globalizing theme options values
	$trydus = get_option('trydus');
	//
	// Enqueueing StyleSheet file
	//
	wp_enqueue_style('trydus-theme-options-style', get_theme_file_uri( '/assets/css/theme_options_style.css'));
	$page_id = get_the_ID();
	$css_output = '';
	/*=============================================
	=            CUSTOM BACKGROUND STYLE          =
	=============================================*/

	if (isset($trydus['logo_max_width_desktop'])) {
		$css_output .= "
			.site-branding,.site-logo{
				max-width: {$trydus['logo_max_width_desktop']}px;
			}
		";
	}
	if (isset($trydus['logo_max_width_mobile'])) {
		$css_output .= "
			@media (max-width: 680px){
				.site-branding, .site-logo{
					max-width: {$trydus['logo_max_width_mobile']}px;
				}
			}
		";
	}

	if (isset($trydus['scustom_css'])) {
		$css_output .= $trydus['scustom_css'];
	}

	// theme color set 
	if (isset($trydus['custom_accent_color']) || isset($trydus['heading_color']) || isset($trydus['text_color'])) {

		$body_bg_color = $trydus['body_bg_color'] ? $trydus['body_bg_color'] : '';
		$accent_color = $trydus['custom_accent_color'] ? $trydus['custom_accent_color'] : '';
		$heading_color = $trydus['heading_color'] ? $trydus['heading_color'] : '';
		$text_color = $trydus['text_color']? $trydus['text_color'] : '' ;

		$css_output .= "
		:root {
			--accent-color: {$trydus['custom_accent_color']};
			--accent-color-2: {$trydus['custom_accent_color_2']};
			--heading-color: {$trydus['heading_color']};
			--text-color: {$trydus['text_color']};
		}

		body {
			background-color: {$body_bg_color};
		}

		";


		update_option( 'elementor_scheme_color', array($heading_color, $heading_color, $text_color, $accent_color) );

	
	}

	//
	// Header Buttons Color
	//
	$body_background_color = get_post_meta(get_the_ID(), 'body_background_color', true);
	$btns_bg_color = get_post_meta(get_the_ID(), 'buttons_background_color', true);
	$btns_text_color = get_post_meta(get_the_ID(), 'buttons_text_color', true);
	$buttons_border_color = get_post_meta(get_the_ID(), 'buttons_border_color', true);
	$buttons_hover_background_color = get_post_meta(get_the_ID(), 'buttons_hover_background_color', true);
	$buttons_hover_text_color = get_post_meta(get_the_ID(), 'buttons_hover_text_color', true);
	$buttons_hover_border_color = get_post_meta(get_the_ID(), 'buttons_hover_border_color', true);
	$btn2_btns_bg_color = get_post_meta(get_the_ID(), 'btn2_buttons_background_color', true);
	$btn2_btns_text_color = get_post_meta(get_the_ID(), 'btn2_buttons_text_color', true);
	$btn2_buttons_hover_background_color = get_post_meta(get_the_ID(), 'btn2_buttons_hover_background_color', true);
	$btn2_buttons_hover_text_color = get_post_meta(get_the_ID(), 'btn2_buttons_hover_text_color', true);
	$btn2_buttons_hover_border_color = get_post_meta(get_the_ID(), 'btn2_buttons_hover_border_color', true);
	$button_1_custom_css = get_post_meta(get_the_ID(), 'button_1_custom_css', true);
	$button_2_custom_css = get_post_meta(get_the_ID(), 'button_2_custom_css', true);
	if ($body_background_color) {
		$css_output .= "
			body.page-id-{$page_id} {
				background-color: {$body_background_color};
			}
		";
	}
	if ($btns_bg_color) {
		$css_output .= "
			body.page-id-{$page_id} .trydus-header-area a.trydus-login-btn{
				background: {$btns_bg_color};
			}
		";
	}
	if ($buttons_border_color) {
		$css_output .= "
			body.page-id-{$page_id} .trydus-header-area a.trydus-login-btn{
				border-color: {$buttons_border_color} !important;
			}
		";
	}
	if ($btns_text_color) {
		$css_output .= "
			body.page-id-{$page_id} .trydus-header-area a.trydus-login-btn{
				color: {$btns_text_color} !important;
			}
		";
	}
	if ($buttons_hover_background_color) {
		$css_output .= "
			body.page-id-{$page_id} .trydus-header-area a.trydus-login-btn:hover, .trydus-header-area a.trydus-login-btn:last-child{
				background: {$buttons_hover_background_color};
			}
		";
	}
	if ($buttons_hover_text_color) {
		$css_output .= "
			body.page-id-{$page_id} .trydus-header-area a.trydus-login-btn:hover, .trydus-header-area a.trydus-login-btn:last-child{
				color: {$buttons_hover_text_color} !important;
			}
		";
	}
	if ($buttons_hover_border_color) {
		$css_output .= "
			body.page-id-{$page_id} .trydus-header-area a.trydus-login-btn:hover, .trydus-header-area a.trydus-login-btn:last-child{
				border-color: {$buttons_hover_border_color};
			}
		";
	}
	//
	// Header Buttons Color on btn2 mode
	//
	if ($btn2_btns_bg_color) {
		$css_output .= "
			body.page-id-{$page_id} .trydus-header-area a.trydus-login-btn:nth-child(2){
				background: {$btn2_btns_bg_color};
			}
		";
	}
	if ($btn2_btns_text_color) {
		$css_output .= "
			body.page-id-{$page_id} .trydus-header-area a.trydus-login-btn:nth-child(2){
				color: {$btn2_btns_text_color} !important;
			}
		";
	}
	if ($btn2_buttons_hover_background_color) {
		$css_output .= "
			body.page-id-{$page_id} .trydus-header-area a.trydus-login-btn:nth-child(2):hover, .trydus-header-area a.trydus-login-btn:nth-child(2):last-child{
				background: {$btn2_buttons_hover_background_color};
			}
		";
	}
	if ($btn2_buttons_hover_text_color) {
		$css_output .= "
			body.page-id-{$page_id} .trydus-header-area a.trydus-login-btn:nth-child(2):hover, .trydus-header-area a.trydus-login-btn:nth-child(2):last-child{
				color: {$btn2_buttons_hover_text_color} !important;
			}
		";
	}
	if ($btn2_buttons_hover_border_color) {
		$css_output .= "
			body.page-id-{$page_id} .trydus-header-area a.trydus-login-btn:nth-child(2):hover, .trydus-header-area a.trydus-login-btn:nth-child(2):last-child{
				border-color: {$btn2_buttons_hover_border_color} !important;
			}
		";
	}

	// Header buttons custom css
	if($button_1_custom_css){
		$css_output .= "
		.trydus-header-area a.trydus-login-btn:nth-child(1){
				{$button_1_custom_css}
			}
		";
	}
	if($button_2_custom_css){
		$css_output .= "
		.trydus-header-area a.trydus-login-btn:nth-child(2){
				{$button_2_custom_css}
			}
		";
	}



	wp_add_inline_style('trydus-theme-options-style', $css_output);

}
add_action('wp_enqueue_scripts', 'trydus_theme_options_style');

