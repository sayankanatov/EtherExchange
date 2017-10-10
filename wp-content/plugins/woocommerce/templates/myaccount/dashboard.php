<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<?php  echo do_shortcode('[vc_row type="in_container" full_screen_row_position="middle" scene_position="center" text_color="dark" text_align="left" overlay_strength="0.3"][vc_column centered_text="true" column_padding="no-extra-padding" column_padding_position="all" background_color_opacity="1" background_hover_color_opacity="1" column_shadow="none" width="1/1" tablet_text_alignment="default" phone_text_alignment="default" column_border_width="none" column_border_style="solid"][vc_custom_heading text="Welcome to Ether Coin!" font_container="tag:h2|text_align:center" use_theme_fonts="yes" css_animation="fadeIn"][vc_column_text]What do you want to do?[/vc_column_text][vc_row_inner column_margin="default" text_align="left" css=".vc_custom_1506949137148{margin-top: 32px !important;margin-bottom: 32px !important;}"][vc_column_inner column_padding="no-extra-padding" column_padding_position="all" background_color_opacity="1" width="1/2" column_border_width="none" column_border_style="solid"][nectar_btn size="jumbo" button_style="regular-tilt" button_color="Accent-Color" icon_family="none" text="Buy Ethers" url="downloads"][/vc_column_inner][vc_column_inner column_padding="no-extra-padding" column_padding_position="all" background_color_opacity="1" width="1/2" column_border_width="none" column_border_style="solid"][nectar_btn size="jumbo" button_style="regular-tilt" button_color="Accent-Color" icon_family="none" text="Sell Ethers" url="edit-address"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]');
?>
<?php
	/**
	 * My Account dashboard.
	 *
	 * @since 2.6.0
	 */
	do_action( 'woocommerce_account_dashboard' );

	/**
	 * Deprecated woocommerce_before_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_before_my_account' );

	/**
	 * Deprecated woocommerce_after_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_after_my_account' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
