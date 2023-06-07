<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

	<div class="u-columns col2-set" id="customer_login">

		<div class="u-column1 col-1">

		<?php endif; ?>

		<h2><?php esc_html_e( 'Login', 'woocommerce' ); ?></h2>

		<form class="woocommerce-form woocommerce-form-login login" method="post">

			<?php do_action( 'woocommerce_login_form_start' ); ?>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="username"><?php esc_html_e( 'Email Address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
				<input placeholder="Email Address" type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
			</p>
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
				<input placeholder="Password" class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />
			</p>

			<?php do_action( 'woocommerce_login_form' ); ?>
			<div class="login-links">
				<a href="/client-portal/lost-password/">FORGOTTEN PASSWORD?</a>
				<a href="#register" id="register-link">REGISTER</a>
			</div>
			<p class="form-row">
				<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
					<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> 
				</label>
				<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
				<button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Log in', 'woocommerce' ); ?>
				<span class="icon-after btn-icon">
					<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M1.16669 14H26.25" stroke="#127DC1" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
						<path d="M18.0834 5.83334L26.25 14L18.0834 22.1667" stroke="#127DC1" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round">

						</path>
					</svg>
				</span>
			</button>
		</p>
		<p class="woocommerce-LostPassword lost_password">
			<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
		</p>

		<?php do_action( 'woocommerce_login_form_end' ); ?>

	</form>

	<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

	</div>

	<div class="u-column2 col-2">

		<h2><?php esc_html_e( 'Register', 'woocommerce' ); ?></h2>

		<form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

			<?php do_action( 'woocommerce_register_form_start' ); ?>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide mb-15">
					<label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
				</p>

			<?php endif; ?>
			<p class="form-row form-row-first mb-15">
				<label for="reg_billing_first_name"><?php _e( 'First name', 'woocommerce' ); ?> <span class="required">*</span></label>
				<input placeholder="First name" type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />
			</p>

			<p class="form-row form-row-last mb-15">
				<label for="reg_billing_last_name"><?php _e( 'Last name', 'woocommerce' ); ?> <span class="required">*</span></label>
				<input placeholder="Last name" type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" />
			</p>
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide mb-15">
				<label for="reg_company"><?php _e( 'Company', 'woocommerce' ); ?> <span class="required">*</span></label>
				<input placeholder="Company" type="text" class="input-text" name="company" id="reg_company" value="<?php if ( ! empty( $_POST['company'] ) ) esc_attr_e( $_POST['company'] ); ?>" />
			</p>
			
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide mb-15">
				<label for="reg_company"><?php _e( 'application', 'woocommerce' ); ?> <span class="required">*</span></label>
				<select name="application">
				    <?= get_application_option() ?>
				</select>
			</p>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide mb-15">
				<label for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
				<input placeholder="Email Address" type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
			</p>


			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>


				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide mb-15">
					<label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
					<input placeholder="Password" type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
				</p>
				<p class="form-row form-row-wide mb-15">
					<label for="reg_password2"><?php _e('Confirm Password', 'woocommerce'); ?> <span class="required">*</span></label>
					<input placeholder="Confirm Password" type="password" class="input-text" name="password2" placeholder="<?php echo esc_attr("********") ?>" id="reg_password2" value="<?php if (!empty($_POST['password2'])) echo esc_attr($_POST['password2']); ?>" />
				</p>

			<?php else : ?>

				<p><?php esc_html_e( 'A password will be sent to your email address.', 'woocommerce' ); ?></p>

			<?php endif; ?>

			<?php do_action( 'woocommerce_register_form' ); ?>

			<p class="woocommerce-form-row form-row">
				<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
				<button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?>
				<span class="icon-after btn-icon">
					<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M1.16669 14H26.25" stroke="#127DC1" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
						<path d="M18.0834 5.83334L26.25 14L18.0834 22.1667" stroke="#127DC1" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round">

						</path>
					</svg>
				</span>
			</button>
			<div class="or-login">
				<span class="or">OR</span>
				<a href="#login" id="login-link">LOGIN</a>
			</div>
		</p>

		<?php do_action( 'woocommerce_register_form_end' ); ?>

	</form>

</div>

</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
<script>
	jQuery(document).ready(function() {
		$hash = window.location.hash;

		var $register_link = jQuery('#register-link');
		var $login_link = jQuery('#login-link');
		var $login_form = jQuery('.u-column1');
		var $register_form = jQuery('.u-column2');
		$register_form.attr('id', 'register');
		$login_form.attr('id', 'login');


		$register_link.click(function(event) {
			$login_form.css({
				display: 'none',
			});

			$register_form.css({
				display: 'block',
			});
		});

		$login_link.click(function(event) {
			$register_form.css({
				display: 'none',
			});

			$login_form.css({
				display: 'block',
			});
		});

		if($hash == '#register') {
			$login_form.css({
				display: 'none',
			});

			$register_form.css({
				display: 'block',
			});
		} else {
			$register_form.css({
				display: 'none',
			});

			$login_form.css({
				display: 'block',
			});
		}
	});
</script>