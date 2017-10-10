<style media="all">
	form#form_data {
		background: #fbfbfb;
		padding: 0 0 32px;
		box-shadow: 0 3px 10px rgba(0,0,0,.1), 0 1px rgba(0,0,0,.1), 0 -2px rgba(0,0,0,.05) inset;
	}

	form#form_data h2 {
		background: #ffffff;
		font-size: 24px;
		padding: 16px 0;
		border-bottom: 1px solid #cfcfcf;
		text-align: center;
		line-height: 24px;
		font-weight: 400;
	}

	form#form_data fieldset { padding: 0 32px; }
	form#form_data fieldset p { padding: 16px 0 16px; }
	form#form_data fieldset i[class*="fa-"] { height: 40px; width: 40px; }
	form#form_data fieldset i.fa {
    display: block;
    padding-top: 6px;
    font-size: 18px;
		margin-right: 14px;
	}
	form#form_data fieldset i.fa.fa-eur {
    color: green;
	}
	form#form_data fieldset i.fa.fa-eth {
    color: #d59532;
	}

	form#form_data .minimal-form-input { padding-top: 0; }
	form#form_data .minimal-form-input label { display: none }
	form#form_data fieldset input[type="submit"] {	margin-top: 32px!important; border-radius: 0!important; width: 100%;}
	form#form_data .minimal-form-input input[type='text'] {	border: 1px solid #e0e0e0!important;
		padding: 8px!important;
		border-radius: 3px;
		color: #676767;
		font-weight: 600;
		font-size: 14px!important;
	}
</style>

<?php
/**
 * Edit address form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-address.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.9
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$page_title = ( 'billing' === $load_address ) ? __( 'Billing address', 'woocommerce' ) : __( 'Shipping address', 'woocommerce' );

do_action( 'woocommerce_before_edit_account_address_form' ); ?>

<?php

if(isset($_POST['submit'])){

    $to = get_bloginfo('admin_email');
    $from = $_POST['username'];
    $subject = 'Sell Ethers';
    $message = 'I want to sell '.$_POST['num1'].' ethers. My IBAN - '.$_POST['iban'];
    $headers = 'From:'.$from;
    wp_mail($to,$subject,$message,$headers);

  //  print_r($_POST);
}

?>

<form id="form_data" action="" method="post">
	<h2>Create a Sell Order</h2>
	<fieldset>
		<select id="sign">
			<option value="*">-- Payment Type --</option>
			<option value="INBT">Irish National Bank Transfer</option>
		</select>
		<p>Amount to spend</p>
		<div style="display: flex;">
			<i class="fa fa-eth"><img src="http://crypto.sayen.pw/wp-content/uploads/2017/ETHEREUM-PIC.png" alt=""></i>
			<input type="text" id="num1" name="num1" />
		</div>
		<div style="display: table; width: 100%;">
			<div style="display: table-cell;">
				<p>Current EUR to ETH</p>
			</div>
			<div style="display: table-cell;">
				<p type="text" id="num2" name="num2" value="€ <?php sellKrakenAPI(); ?>" style="text-align: right; color: #000000; opacity: 0.5;">€ <?php sellKrakenAPI(); ?> / ETH</p>
			</div>
		</div>
		<!-- <p>Result:</p> -->
		<div style="display: flex;">
			<i class="fa fa-eur"></i>
			<input type="text" id="result" name="result" readonly/>
		</div>

		<p>Account Name</p>
		<div style="">
			<input type="text" id="username" name="username" />
		</div>

		<p>IBAN</p>
		<div style="">
			<input type="text" id="iban" name="iban" />
		</div>

		<input type="submit" value="submit" name="submit" />
	</fieldset>
</form>

<script>
	jQuery( document ).ready(function($) {

		function ResultCalc() {
			var amountEUR = $('#num1').val();
			var curentExchangeRate = <?php sellKrakenAPI(); ?>;
			var summ = (amountEUR * curentExchangeRate);
			var res = summ.toFixed(2);
			$('#result').val(res);
		}
		setInterval(ResultCalc, 1000);
	});
</script>


<?php do_action( 'woocommerce_after_edit_account_address_form' ); ?>
