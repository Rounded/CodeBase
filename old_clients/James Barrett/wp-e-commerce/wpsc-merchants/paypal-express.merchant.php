<?php
/**
 * This is the PayPal Certified 2.0 Gateway. 
 * It uses the wpsc_merchant class as a base class which is handy for collating user details and cart contents.
 */

 /*
  * This is the gateway variable $nzshpcrt_gateways, it is used for displaying gateway information on the wp-admin pages and also
  * for internal operations.
  */
$nzshpcrt_gateways[$num] = array(
	'name' =>  __( 'PayPal Express Checkout 2.0', 'wpsc' ),
	'api_version' => 2.0,
	'image' => WPSC_URL . '/images/paypal.gif',
	'class_name' => 'wpsc_merchant_paypal_express',
	'has_recurring_billing' => false,
	'wp_admin_cannot_cancel' => true,
	'display_name' => __( 'PayPal Express', 'wpsc' ),
	'requirements' => array(
		/// so that you can restrict merchant modules to PHP 5, if you use PHP 5 features
		'php_version' => 4.3,
		 /// for modules that may not be present, like curl
		'extra_modules' => array()
	),
	
	// this may be legacy, not yet decided
	'internalname' => 'wpsc_merchant_paypal_express',

	// All array members below here are legacy, and use the code in paypal_multiple.php
	'form' => 'form_paypal_express',
	'submit_function' => 'submit_paypal_express',
	'payment_type' => 'paypal',
	'supported_currencies' => array(
		'currency_list' =>  array('AUD', 'BRL', 'CAD', 'CHF', 'CZK', 'DKK', 'EUR', 'GBP', 'HKD', 'HUF', 'ILS', 'JPY', 'MXN', 'MYR', 'NOK', 'NZD', 'PHP', 'PLN', 'SEK', 'SGD', 'THB', 'TWD', 'USD'),
		'option_name' => 'paypal_curcode'
	)
);



/**
	* WP eCommerce PayPal Express Checkout Merchant Class
	*
	* This is the paypal express checkout merchant class, it extends the base merchant class
	*
	* @package wp-e-commerce
	* @since 3.8
	* @subpackage wpsc-merchants
*/
class wpsc_merchant_paypal_express extends wpsc_merchant {
  var $name = 'PayPal Express';
  var $paypal_ipn_values = array();

	/**
	* construct value array method, converts the data gathered by the base class code to something acceptable to the gateway
	* @access public
	*/
	function construct_value_array() {
		global $PAYPAL_URL;
		$PROXY_HOST = '127.0.0.1';
		$PROXY_PORT = '808';
		$USE_PROXY = false;
		$version="56.0";
	
		// PayPal API Credentials 
		$API_UserName=get_option('paypal_certified_apiuser');
		$API_Password=get_option('paypal_certified_apipass');
		$API_Signature=get_option('paypal_certified_apisign');
	
		// BN Code 	is only applicable for partners
		$sBNCode = "PP-ECWizard";
		
		if ('sandbox'  == get_option('paypal_certified_server_type')) {
			$API_Endpoint = "https://api-3t.sandbox.paypal.com/nvp";
			$PAYPAL_URL = "https://www.sandbox.paypal.com/webscr?cmd=_express-checkout&token=";
		}else{
			$API_Endpoint = "https://api-3t.paypal.com/nvp";
			$PAYPAL_URL = "https://www.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=";
		}
	
		//$collected_gateway_data
		$paypal_vars = array();		

		// User settings to be sent to paypal
		$paypal_vars += array(
			'email' => $this->cart_data['email_address'],
			'first_name' => $this->cart_data['shipping_address']['first_name'],
			'last_name' => $this->cart_data['shipping_address']['last_name'],
			'address1' => $this->cart_data['shipping_address']['address'],
			'city' => $this->cart_data['shipping_address']['city'],
			'country' => $this->cart_data['shipping_address']['country'],
			'zip' => $this->cart_data['shipping_address']['post_code']
			);
		if($this->cart_data['shipping_address']['state'] != '') {
			$paypal_vars += array(
				'state' => $this->cart_data['shipping_address']['state']
			);
		}

		$this->collected_gateway_data = $paypal_vars;
	}
	
	/**
	* submit method, sends the received data to the payment gateway
	* @access public
	*/
	function submit() {
		//$_SESSION['paypalExpressMessage']= '<h4>Transaction Canceled</h4>';

		// PayPal Express Checkout Module		
		$paymentAmount = $this->cart_data['total_price'];
		$_SESSION['paypalAmount'] = $paymentAmount;
		$_SESSION['paypalexpresssessionid'] = $this->cart_data['session_id'];
		paypal_express_currencyconverter();

		$currencyCodeType = get_option('paypal_curcode');
		$paymentType = "Sale";
		
		if(get_option('permalink_structure') != '')
			$separator ="?";
		else
			$separator ="&";

		$transact_url = get_option('transact_url');
		$returnURL =  $transact_url.$separator."sessionid=".$this->cart_data['session_id']."&gateway=paypal";
		$cancelURL = get_option('shopping_cart_url');
		$resArray = $this->CallShortcutExpressCheckout ($paymentAmount, $currencyCodeType, $paymentType, $returnURL, $cancelURL);
		$ack = strtoupper($resArray["ACK"]);
		
		if($ack=="SUCCESS")	{
			$this->RedirectToPayPal ( $resArray["TOKEN"] );
		} else  {
			//Display a user friendly Error on the page using any of the following error information returned by PayPal
			$ErrorCode = urldecode($resArray["L_ERRORCODE0"]);
			$ErrorShortMsg = urldecode($resArray["L_SHORTMESSAGE0"]);
			$ErrorLongMsg = urldecode($resArray["L_LONGMESSAGE0"]);
			$ErrorSeverityCode = urldecode($resArray["L_SEVERITYCODE0"]);
			
			echo "SetExpressCheckout API call failed. ";
			echo "<br />Detailed Error Message: " . $ErrorLongMsg;
			echo "<br />Short Error Message: " . $ErrorShortMsg;
			echo "<br />Error Code: " . $ErrorCode;
			echo "<br />Error Severity Code: " . $ErrorSeverityCode;
		}
	    exit();

	}
	
	function CallShortcutExpressCheckout( $paymentAmount, $currencyCodeType, $paymentType, $returnURL, $cancelURL) {
		global $wpdb;
	
		$nvpstr = "&Amt=". $paymentAmount;
		$nvpstr = $nvpstr . "&PAYMENTACTION=" . $paymentType;
		$nvpstr = $nvpstr . "&RETURNURL=" . $returnURL;
		$nvpstr = $nvpstr . "&CANCELURL=" . $cancelURL;
		$nvpstr = $nvpstr . "&CURRENCYCODE=" . $currencyCodeType;
		$data = array();
		if(!isset($this->cart_data['shipping_address']['first_name']) && !isset($this->cart_data['shipping_address']['last_name'])){
			$this->cart_data['shipping_address']['first_name'] =$this->cart_data['billing_address']['first_name'];
			$this->cart_data['shipping_address']['last_name'] = $this->cart_data['billing_address']['last_name'];
			
		}
		$data += array(
			'SHIPTONAME'		=> $this->cart_data['shipping_address']['first_name'].' '.$this->cart_data['shipping_address']['last_name'],
			'SHIPTOSTREET' 		=> $this->cart_data['shipping_address']['address'],
			'SHIPTOCITY'		=> $this->cart_data['shipping_address']['city'],
			'SHIPTOCOUNTRYCODE' => $this->cart_data['shipping_address']['country'],
			'SHIPTOZIP'			=> $this->cart_data['shipping_address']['post_code']
		);
		if( '' != $this->cart_data['shipping_address']['state']){
			$data += array(
				'SHIPTOSTATE' => $this->cart_data['shipping_address']['state']
				);
		}	

		if(count($data) >= 4) {
			$temp_data = array();
			foreach($data as $key => $value)
				$temp_data[] = $key."=".$value;
	
			$nvpstr = $nvpstr . "&".implode("&",$temp_data);
		}
		$_SESSION["currencyCodeType"] = $currencyCodeType;	  
		$_SESSION["PaymentType"] = $paymentType;
	    $resArray= paypal_hash_call("SetExpressCheckout", $nvpstr);
		$ack = strtoupper($resArray["ACK"]);
		if($ack=="SUCCESS")	{
			$token = urldecode($resArray["TOKEN"]);
			$_SESSION['token']=$token;
		}
		   
	    return $resArray;
	}

	function RedirectToPayPal ( $token ){
		global $PAYPAL_URL;
		// Redirect to paypal.com here
		$payPalURL = $PAYPAL_URL . $token;
//		echo 'REDIRECT:'.$payPalURL;
		wp_redirect($payPalURL);
//		exit();
	}

	

	
} // end of class


/**
 * Saving of PayPal Express Settings
 * @access public
 *
 * @since 3.8
 */
function submit_paypal_express() {  
	if(isset($_POST['paypal_certified_apiuser']))
		update_option('paypal_certified_apiuser', $_POST['paypal_certified_apiuser']);
	
	if(isset($_POST['paypal_certified_apipass']))
		update_option('paypal_certified_apipass', $_POST['paypal_certified_apipass']);
	
	if(isset($_POST['paypal_curcode']))
		update_option('paypal_curcode', $_POST['paypal_curcode']);
	
	if(isset($_POST['paypal_certified_apisign']))
		update_option('paypal_certified_apisign', $_POST['paypal_certified_apisign']);
	
	if(isset($_POST['paypal_certified_server_type']))
		update_option('paypal_certified_server_type', $_POST['paypal_certified_server_type']);
	
	return true;
}

/**
 * Form Express Returns the Settings Form Fields
 * @access public
 *
 * @since 3.8
 * @return $output string containing Form Fields
 */
function form_paypal_express() {
	global $wpdb, $wpsc_gateways;
	
	$serverType1 = '';
	$serverType2 = '';
	$select_currency[get_option('paypal_curcode')] = "selected='selected'";
	
  	if (get_option('paypal_certified_server_type') == 'sandbox')
		$serverType1="checked='checked'";
	elseif(get_option('paypal_certified_server_type') == 'production')
		$serverType2 ="checked='checked'";
	
	$output = "
		<tr>
		  <td>" . __('API Username', 'wpsc' ) . "
		  </td>
		  <td>
		  <input type='text' size='40' value='".get_option('paypal_certified_apiuser')."' name='paypal_certified_apiuser' />
		  </td>
		</tr>
		<tr>
		  <td>" . __('API Password', 'wpsc' ) . "
		  </td>
		  <td>
		  <input type='text' size='40' value='".get_option('paypal_certified_apipass')."' name='paypal_certified_apipass' />
		  </td>
		</tr>
		<tr>
		 <td>" . __('API Signature', 'wpsc' ) . "
		 </td>
		 <td>
		 <input type='text' size='70' value='".get_option('paypal_certified_apisign')."' name='paypal_certified_apisign' />
		 </td>
		</tr>
		<tr>
		 <td>" . __('Server Type', 'wpsc' ) . "
		 </td>
		 <td>
			<input $serverType1 type='radio' name='paypal_certified_server_type' value='sandbox' /> " . __('Sandbox (For testing)', 'wpsc' ) . "
			<input $serverType2 type='radio' name='paypal_certified_server_type' value='production' /> " . __('Production', 'wpsc' ) . "
		 </td>
		</tr>";
		
		$store_currency_code = $wpdb->get_var("SELECT `code` FROM `".WPSC_TABLE_CURRENCY_LIST."` WHERE `id` IN ('".absint(get_option('currency_type'))."')");
		$current_currency = get_option('paypal_curcode');

		if(($current_currency == '') && in_array($store_currency_data['code'], $wpsc_gateways['wpsc_merchant_paypal_express']['supported_currencies']['currency_list'])) {
			update_option('paypal_curcode', $store_currency_data['code']);
			$current_currency = $store_currency_data['code'];
		}
		if($current_currency != $store_currency_code) {
			$output .= "<tr> <td colspan='2'><strong class='form_group'>".__('Currency Converter')."</td> </tr>
			<tr>
				<td colspan='2'>".__('Your website is using a currency not accepted by PayPal, select an accepted currency using the drop down menu bellow. Buyers on your site will still pay in your local currency however we will convert the currency and send the order through to PayPal using the currency you choose below.', 'wpsc')."</td>
			</tr>\n";
		
			$output .= "<tr>\n <td>" . __('Convert to', 'wpsc' ) . " </td>\n ";
			$output .= "<td>\n <select name='paypal_curcode'>\n";
	
			if (!isset($wpsc_gateways['wpsc_merchant_paypal_express']['supported_currencies']['currency_list'])) 
				$wpsc_gateways['wpsc_merchant_paypal_express']['supported_currencies']['currency_list'] = array();
			
			$paypal_currency_list = $wpsc_gateways['wpsc_merchant_paypal_express']['supported_currencies']['currency_list'];
	
			$currency_list = $wpdb->get_results("SELECT DISTINCT `code`, `currency` FROM `".WPSC_TABLE_CURRENCY_LIST."` WHERE `code` IN ('".implode("','",$paypal_currency_list)."')", ARRAY_A);
			foreach($currency_list as $currency_item) {
				$selected_currency = '';
				if($current_currency == $currency_item['code']) {
					$selected_currency = "selected='selected'";
				}
				$output .= "<option ".$selected_currency." value='{$currency_item['code']}'>{$currency_item['currency']}</option>";
			}
			$output .= "            </select> \n";
			$output .= "          </td>\n";
			$output .= "       </tr>\n";
		}
 
  	return $output;
}

  
function paypal_express_currencyconverter(){
	global $wpdb;
	$currency_code = $wpdb->get_var("SELECT `code` FROM `".WPSC_TABLE_CURRENCY_LIST."` WHERE `id`='".get_option('currency_type')."' LIMIT 1");
	$local_currency_code = $currency_code;
	$paypal_currency_code = get_option('paypal_curcode');
	if($paypal_currency_code == '')
		$paypal_currency_code = 'US';
	
	$curr=new CURRENCYCONVERTER();
	if($paypal_currency_code != $local_currency_code) {
		$paypal_currency_productprice = $curr->convert($_SESSION['paypalAmount'],$paypal_currency_code,$local_currency_code);
		$paypal_currency_shipping = $curr->convert($local_currency_shipping,$paypal_currency_code,$local_currency_code);
		$base_shipping = $curr->convert($purchase_log['base_shipping'],$paypal_currency_code, $local_currency_code);
	} else {
		$paypal_currency_productprice = $_SESSION['paypalAmount'];
		$paypal_currency_shipping = $local_currency_shipping;
		$base_shipping = $purchase_log['base_shipping'];
	}
	switch($paypal_currency_code) {
	    case "JPY":
	    $decimal_places = 0;
	    break;
	    
	    case "HUF":
	    $decimal_places = 0;
	    break;
	    
	    default:
	    $decimal_places = 2;
	    break;
	}
	$_SESSION['paypalAmount'] = number_format(sprintf("%01.2f", $paypal_currency_productprice),$decimal_places,'.','');
	
}


/**
 * prcessing functions, this is where the main logic of paypal express lives
 * @access public
 *
 * @since 3.8
 */
function paypal_processingfunctions(){
	global $wpdb, $wpsc_cart;

	$sessionid = '';
	if (isset($_SESSION['paypalexpresssessionid']))
	$sessionid = $_SESSION['paypalexpresssessionid'];
	if(isset($_REQUEST['act']) && ($_REQUEST['act']=='error')){
		session_start();
		$resArray=$_SESSION['reshash']; 
		$_SESSION['paypalExpressMessage']= '
		<center>
		<table width="700" align="left">
		<tr>
			<td colspan="2" class="header">' . __('The PayPal API has returned an error!', 'wpsc' ) . '</td>
		</tr>
		';
	    //it will print if any URL errors 
		if(isset($_SESSION['curl_error_msg'])) { 
			$errorMessage=$_SESSION['curl_error_msg'] ;	
			$response = $_SESSION['response'];
			session_unset();	
			
			$_SESSION['paypalExpressMessage'].='
			<tr>
				<td>response:</td>
				<td>'.$response.'</td>
			</tr>
			   
			<tr>
				<td>Error Message:</td>
				<td>'.$errorMessage.'</td>
			</tr>';
		 } else {
	
			/* If there is no URL Errors, Construct the HTML page with 
			   Response Error parameters.   */
			$_SESSION['paypalExpressMessage'] .="
				<tr>
					<td>Ack:</td>
					<td>".$resArray['ACK']."</td>
				</tr>
				<tr>
					<td>Correlation ID:</td>
					<td>".$resArray['CORRELATIONID']."</td>
				</tr>
				<tr>
					<td>Version:</td>
					<td>".$resArray['VERSION']."</td>
				</tr>";
			
			$count=0;
			while (isset($resArray["L_SHORTMESSAGE".$count])) {		
				$errorCode    = $resArray["L_ERRORCODE".$count];
				$shortMessage = $resArray["L_SHORTMESSAGE".$count];
				$longMessage  = $resArray["L_LONGMESSAGE".$count]; 
				$count=$count+1; 
				$_SESSION['paypalExpressMessage'] .="
					<tr>
						<td>" . __('Error Number:', 'wpsc' ) . "</td>
						<td> $errorCode </td>
					</tr>
					<tr>
						<td>" . __('Short Message:', 'wpsc' ) . "</td>
						<td> $shortMessage </td>
					</tr>
					<tr>
						<td>" . __('Long Message:', 'wpsc' ) . "</td>
						<td> $longMessage </td>
					</tr>";
			
		 	}//end while
		}// end else
		$_SESSION['paypalExpressMessage'] .="
			</center>
				</table>";
	
	}else if(isset($_REQUEST['act']) && ($_REQUEST['act']=='do')){
		session_start();		

		/* Gather the information to make the final call to
		   finalize the PayPal payment.  The variable nvpstr
		   holds the name value pairs   */
		
		$token =urlencode($_REQUEST['token']);
		$paymentAmount =urlencode ($_SESSION['paypalAmount']);
		$paymentType = urlencode($_SESSION['paymentType']);
		$currCodeType = urlencode(get_option('paypal_curcode'));
		$payerID = urlencode($_REQUEST['PayerID']);
		$serverName = urlencode($_SERVER['SERVER_NAME']);
		$BN='Instinct_e-commerce_wp-shopping-cart_NZ';	
		$nvpstr='&TOKEN='.$token.'&PAYERID='.$payerID.'&PAYMENTACTION=Sale&AMT='.$paymentAmount.'&CURRENCYCODE='.$currCodeType.'&IPADDRESS='.$serverName."&BUTTONSOURCE=".$BN ;
		$resArray=paypal_hash_call("DoExpressCheckoutPayment",$nvpstr);
		
		/* Display the API response back to the browser.
		   If the response from PayPal was a success, display the response parameters'
		   If the response was an error, display the errors received using APIError.php. */
		$ack = strtoupper($resArray["ACK"]);
		$_SESSION['reshash']=$resArray;
		if($ack!="SUCCESS"){
			$location = get_option('transact_url')."&act=error";
		}else{
			$transaction_id = $wpdb->escape($resArray['TRANSACTIONID']);
			switch($resArray['PAYMENTSTATUS']) {
				case 'Processed': // I think this is mostly equivalent to Completed
				case 'Completed':
				$wpdb->query("UPDATE `".WPSC_TABLE_PURCHASE_LOGS."` SET `processed` = '3' WHERE `sessionid` = ".$sessionid." LIMIT 1");
	
				transaction_results($_SESSION['wpsc_sessionid'], false, $transaction_id);
				break;
		
				case 'Pending': // need to wait for "Completed" before processing
				$wpdb->query("UPDATE `".WPSC_TABLE_PURCHASE_LOGS."` SET `transactid` = '".$transaction_id."',`processed` = '2', `date` = '".time()."'  WHERE `sessionid` = ".$sessionid." LIMIT 1");
				break;
			}
			$location = add_query_arg('sessionid', $sessionid, get_option('transact_url'));
			
			$_SESSION['paypalExpressMessage'] = null;
			wp_redirect($location);
			exit();
		}
	
		@$_SESSION['nzshpcrt_serialized_cart'] = '';
		$_SESSION['nzshpcrt_cart'] = '';
		$_SESSION['nzshpcrt_cart'] = Array();	 
		$wpsc_cart->empty_cart();
				
	} else if(isset($_REQUEST['paymentType']) || isset($_REQUEST['token'])){

		$token = $_REQUEST['token'];
		if(!isset($token)) {
		   $paymentAmount=$_SESSION['paypalAmount'];
		   $currencyCodeType=get_option('paypal_curcode');
		   $paymentType='Sale';
			if(get_option('permalink_structure') != '')
				$separator ="?";
			else
				$separator ="&";
			
			$returnURL =urlencode(get_option('transact_url').$separator.'currencyCodeType='.$currencyCodeType.'&paymentType='.$paymentType.'&paymentAmount='.$paymentAmount);
			$cancelURL =urlencode(get_option('transact_url').$separator.'paymentType=$paymentType' );
		
			/* Construct the parameter string that describes the PayPal payment
			the varialbes were set in the web form, and the resulting string
			is stored in $nvpstr */
		  
			$nvpstr="&Amt=".$paymentAmount."&PAYMENTACTION=".$paymentType."&ReturnUrl=".$returnURL."&CANCELURL=".$cancelURL ."&CURRENCYCODE=".$currencyCodeType;
		 
			/* Make the call to PayPal to set the Express Checkout token
			If the API call succeded, then redirect the buyer to PayPal
			to begin to authorize payment.  If an error occured, show the
			resulting errors
			*/
		   $resArray=paypal_hash_call("SetExpressCheckout",$nvpstr);
		   $_SESSION['reshash']=$resArray;
		   $ack = strtoupper($resArray["ACK"]);

		   if($ack=="SUCCESS"){
				// Redirect to paypal.com here
				$token = urldecode($resArray["TOKEN"]);
				$payPalURL = $PAYPAL_URL.$token;
				wp_redirect($payPalURL);
		   } else  {
				// Redirecting to APIError.php to display errors. 
				$location = get_option('transact_url')."&act=error";
				wp_redirect($location);
		   }
		   exit();
		} else {
		 /* At this point, the buyer has completed in authorizing payment
			at PayPal.  The script will now call PayPal with the details
			of the authorization, incuding any shipping information of the
			buyer.  Remember, the authorization is not a completed transaction
			at this state - the buyer still needs an additional step to finalize
			the transaction
			*/
		
		   $token =urlencode( $_REQUEST['token']);
		
		 /* Build a second API request to PayPal, using the token as the
			ID to get the details on the payment authorization
			*/
		   $nvpstr="&TOKEN=".$token;
	
		 /* Make the API call and store the results in an array.  If the
			call was a success, show the authorization details, and provide
			an action to complete the payment.  If failed, show the error
			*/
		   $resArray=paypal_hash_call("GetExpressCheckoutDetails",$nvpstr);

		   $_SESSION['reshash']=$resArray;
		   $ack = strtoupper($resArray["ACK"]);
		   if($ack=="SUCCESS"){			
				
				/********************************************************
				GetExpressCheckoutDetails.php
				
				This functionality is called after the buyer returns from
				PayPal and has authorized the payment.
				
				Displays the payer details returned by the
				GetExpressCheckoutDetails response and calls
				DoExpressCheckoutPayment.php to complete the payment
				authorization.
				
				Called by ReviewOrder.php.
				
				Calls DoExpressCheckoutPayment.php and APIError.php.
				
				********************************************************/
				
				
				session_start();
				
				/* Collect the necessary information to complete the
				authorization for the PayPal payment
				*/
				
				$_SESSION['token']=$_REQUEST['token'];
				$_SESSION['payer_id'] = $_REQUEST['PayerID'];
						
				$resArray=$_SESSION['reshash'];
				
				if(get_option('permalink_structure') != '')
					$separator ="?";
				else
					$separator ="&";
			
				
				/* Display the  API response back to the browser .
				If the response from PayPal was a success, display the response parameters
				*/
				if(isset($_REQUEST['TOKEN']) && !isset($_REQUEST['PAYERID'])){
					$_SESSION['paypalExpressMessage']= '<h4>TRANSACTION CANCELED</h4>';
				}else{
					$output ="
				       <table width='400' class='paypal_express_form'>
				        <tr>
				            <td align='left' class='firstcol'><b>" . __('Error Number:', 'wpsc' ) . "Order Total:</b></td>
				            <td align='left'>" . wpsc_currency_display($_SESSION['paypalAmount']) . "</td>
				        </tr>
						<tr>
						    <td align='left'><b>" . __('Shipping Address:', 'wpsc' ) . " </b></td>
						</tr>
				        <tr>
				            <td align='left' class='firstcol'>
				                " . __('Street 1:', 'wpsc' ) . "</td>
				            <td align='left'>".$resArray['SHIPTOSTREET']."</td>
				
				        </tr>
				        <tr>
				            <td align='left' class='firstcol'>
				                " . __('Street 2:', 'wpsc' ) . "</td>
				            <td align='left'>".$resArray['SHIPTOSTREET2']."
				            </td>
				        </tr>
				        <tr>
				            <td align='left' class='firstcol'>
				                " . __('City:', 'wpsc' ) . "</td>
				
				            <td align='left'>".$resArray['SHIPTOCITY']."</td>
				        </tr>
				        <tr>
				            <td align='left' class='firstcol'>
				                " . __('State:', 'wpsc' ) . "</td>
				            <td align='left'>".$resArray['SHIPTOSTATE']."</td>
				        </tr>
				        <tr>
				            <td align='left' class='firstcol'>
				                " . __('Postal code:', 'wpsc' ) . "</td>
				
				            <td align='left'>".$resArray['SHIPTOZIP']."</td>
				        </tr>
				        <tr>
				            <td align='left' class='firstcol'>
				                " . __('Country:', 'wpsc' ) . "</td>
				            <td align='left'>".$resArray['SHIPTOCOUNTRYNAME']."</td>
				        </tr>
				        <tr>
				            <td>";
					
					$output .= "<form action=".get_option('transact_url')." method='post'>\n";
					$output .= "	<input type='hidden' name='totalAmount' value='".wpsc_cart_total(false)."' />\n";
					$output .= "	<input type='hidden' name='shippingStreet' value='".$resArray['SHIPTOSTREET']."' />\n";
					$output .= "	<input type='hidden' name='shippingStreet2' value='".$resArray['SHIPTOSTREET2']."' />\n";
					$output .= "	<input type='hidden' name='shippingCity' value='".$resArray['SHIPTOCITY']."' />\n";
					$output .= "	<input type='hidden' name='shippingState' value='".$resArray['SHIPTOSTATE']."' />\n";
					$output .= "	<input type='hidden' name='postalCode' value='".$resArray['SHIPTOZIP']."' />\n";
					$output .= "	<input type='hidden' name='country' value='".$resArray['SHIPTOCOUNTRYNAME']."' />\n";
					$output .= "	<input type='hidden' name='token' value='".$_SESSION['token']."' />\n";
					$output .= "	<input type='hidden' name='PayerID' value='".$_SESSION['payer_id']."' />\n";
					$output .= "	<input type='hidden' name='act' value='do' />\n";
					$output .= "	<p>  <input name='usePayPal' type='submit' value='".__('Confirm Payment','wpsc')."' /></p>\n";
					$output .= "</form>";
					$output .=" </td>
					        </tr>
					    </table>
					</center>
					";
					$_SESSION['paypalExpressMessage'] = $output;
				}
			}
		}

	}
	
} 



function paypal_hash_call($methodName,$nvpStr)	{
	//declaring of variables
	$version = 56;			
	if ( 'sandbox' == get_option('paypal_certified_server_type') ) {
		$API_Endpoint = "https://api-3t.sandbox.paypal.com/nvp";
		$paypal_certified_url  = "https://www.sandbox.paypal.com/webscr?cmd=_express-checkout&token=";
	} else {
		$API_Endpoint = "https://api-3t.paypal.com/nvp";
		$paypal_certified_url  = "https://www.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=";
	}

	$USE_PROXY = false;
	$API_UserName=get_option('paypal_certified_apiuser');
	$API_Password=get_option('paypal_certified_apipass');
	$API_Signature=get_option('paypal_certified_apisign');
	$sBNCode = "PP-ECWizard";
	//NVPRequest for submitting to server
	$nvpreq="METHOD=" . urlencode($methodName) . "&VERSION=" . urlencode($version) . "&PWD=" . urlencode($API_Password) . "&USER=" . urlencode($API_UserName) . "&SIGNATURE=" . urlencode($API_Signature) . $nvpStr . "&BUTTONSOURCE=" . urlencode($sBNCode);

	// Configure WP_HTTP
	if($USE_PROXY) {
		if (!defined('WP_PROXY_HOST') && !defined('WP_PROXY_PORT')) {
			define('WP_PROXY_HOST', $PROXY_HOST);
			define('WP_PROXY_PORT', $PROXY_PORT);
		}
	}
	add_filter('http_api_curl', 'wpsc_curl_ssl');
	
	$options = array(
		'timeout' => 5,
		'body' => $nvpreq,
	);
	
	$_SESSION['nvpReqArray']=$nvpReqArray;
	$nvpReqArray=paypal_deformatNVP($nvpreq);
	
	$res = wp_remote_post($API_Endpoint, $options);
	
	if ( is_wp_error($res) ) {
		$_SESSION['curl_error_msg'] = 'WP HTTP Error: ' . $res->get_error_message();
		$nvpResArray=paypal_deformatNVP('');
	} else {
		$nvpResArray=paypal_deformatNVP($res['body']);
	}

	return $nvpResArray;
}

function paypal_deformatNVP($nvpstr) {
	$intial=0;
	$nvpArray = array();

	while(strlen($nvpstr)) {
		//postion of Key
		$keypos= strpos($nvpstr,'=');
		//position of value
		$valuepos = strpos($nvpstr,'&') ? strpos($nvpstr,'&'): strlen($nvpstr);

		/*getting the Key and Value values and storing in a Associative Array*/
		$keyval=substr($nvpstr,$intial,$keypos);
		$valval=substr($nvpstr,$keypos+1,$valuepos-$keypos-1);
		//decoding the respose
		$nvpArray[urldecode($keyval)] =urldecode( $valval);
		$nvpstr=substr($nvpstr,$valuepos+1,strlen($nvpstr));
	}
	return $nvpArray;
}
add_action('init', 'paypal_processingfunctions');
?>
