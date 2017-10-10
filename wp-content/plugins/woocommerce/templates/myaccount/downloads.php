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

	.tilt-button-inner {
		text-align: center;
	}

</style>

<?php
/**
 * Downloads
 *
 * Shows downloads on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/downloads.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$downloads     = WC()->customer->get_downloadable_products();
$has_downloads = (bool) $downloads;

do_action( 'woocommerce_before_account_downloads', $has_downloads ); ?>

<?php

if(isset($_POST['submit'])){

    $to = get_bloginfo('admin_email');
    $from = 'Customer';
    $subject = 'Buy Ethers';
    $message = 'I want to buy ethers on '.$_POST['num1'].' euros';
    $headers = 'From:'.$from;
    wp_mail($to,$subject,$message,$headers);

  //  print_r($_POST);
}

?>

<?php  echo '
	<div class="container">
		<div class="row">

			<div class="vc_col-sm-12">
				<h2 style="text-align: center" class="vc_custom_heading wpb_animate_when_almost_visible wpb_fadeIn fadeIn animated wpb_start_animation">How would you like to pay?</h2>
			</div>

			<div class="col span_12">
				<div class="vc_col-sm-12 vc_col-md-6">

					<div class="tilt-button-wrap">
					 <div class="tilt-button-inner">
						 <a id="button-BT" class="nectar-button jumbo regular-tilt accent-color tilt  regular-button button-1 instance-0" style="visibility: visible;" href="#" data-color-override="false" data-hover-color-override="false" data-hover-text-color-override="#fff">
						 <span>Online Bank Transfer</span>
						 </a>
						</div>
					</div>

				</div>

				<div class="vc_col-sm-12 vc_col-md-6">

					<div class="tilt-button-wrap">
						<div class="tilt-button-inner">
							<a id="button-CD" class="nectar-button jumbo regular-tilt accent-color tilt  regular-button button-2 instance-1 instance-2" style="visibility: visible;" href="#" data-color-override="false" data-hover-color-override="false" data-hover-text-color-override="#fff">
								<span>Cash Deposit</span>
							</a>
						</div>
					</div>

				</div>
			</div>

		</div>
	</div>
'?>

<form id="form_data" class="buy-form" style="display: none;" action="" method="post">
	<h2>Create a Buy Order</h2>
	<fieldset>
		<select id="sign" style="width: 100%;">
			<option value="/">-- Payment Type --</option>
		</select>
		<p>Amount to spend</p>
		<div style="display: flex;">
			<i class="fa fa-eur"></i>
			<input type="text" id="num1" name="num1" />
		</div>

		<div style="display: table; width: 100%;">
			<div style="display: table-cell;">
				<p>Current EUR to ETH</p>
			</div>
			<div style="display: table-cell;">
				<p type="text" id="num2" name="num2" value="ETH: <?php buyKrakenAPI(); ?>" style="text-align: right; color: #000000; opacity: 0.5;">€ <?php sellKrakenAPI(); ?> / ETH</p>
			</div>
		</div>
		<div style="display: flex;">
			<i class="fa fa-eth"><img src="http://crypto.sayen.pw/wp-content/uploads/2017/ETHEREUM-PIC.png" alt=""></i>
			<input type="text" id="result" name="result" readonly/>
		</div>

		<input type="submit" value="submit" name="submit" />

	</fieldset>
</form>


<script>
	jQuery( document ).ready(function($) {

		function ResultCalc() {
			var amountEUR = $('#num1').val();
			var curentExchangeRate = <?php buyKrakenAPI(); ?>;
			var summ = (amountEUR / curentExchangeRate);
			var res = summ.toFixed(2);
			$('#result').val(res);
		}
		setInterval(ResultCalc, 1000);
		$('#button-BT').click(function(){
			$('#form_data').css('display','block');
			$('#sign').empty();
			$('#sign').append( '<option value="/">-- Payment Type --</option><option class="INBT" value="INBT">Irish National Bank Transfer</option>' );
		});
		$('#button-CD').click(function(){
			$('#form_data').css('display','block');
			$('#sign').empty();
			$('#sign').append( '<option value="/">-- Payment Type --</option><option class="PTSB" value="PTSB">Permanent TSB</option>' );
		});

	});
</script>




<?php do_action( 'woocommerce_after_account_downloads', $has_downloads ); ?>
