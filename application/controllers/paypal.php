<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paypal extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');	
		$this->load->helper('form');
		$this->load->helper('date');
		$this->load->library('paypal_lib');

	}

	public function index()
	{
		$this->load->view('users/form');
	}
	
	function expresscheckout(){				
		$url = base_url().'user';
		$paymentAmount = $_POST["Payment_Amount"];
		$_SESSION["Payment_Amount"] = $paymentAmount;
		$currencyCodeType = "USD";
		$paymentType = "Sale";
		$returnURL = $url."/review";
		$cancelURL = $url."/dashboard";
		$resArray = $this->paypal_lib->CallShortcutExpressCheckout($paymentAmount, $currencyCodeType, $paymentType, $returnURL, $cancelURL);
		//$resArray = CallShortcutExpressCheckout($paymentAmount, $currencyCodeType, $paymentType, $returnURL, $cancelURL);
		$ack = strtoupper($resArray["ACK"]);
		if($ack=="SUCCESS" || $ack=="SUCCESSWITHWARNING")
		{
			$this->paypal_lib->RedirectToPayPal( $resArray["TOKEN"] );
		} 
		else  
		{
			//Display a user friendly Error on the page using any of the following error information returned by PayPal
			$ErrorCode = urldecode($resArray["L_ERRORCODE0"]);
			$ErrorShortMsg = urldecode($resArray["L_SHORTMESSAGE0"]);
			$ErrorLongMsg = urldecode($resArray["L_LONGMESSAGE0"]);
			$ErrorSeverityCode = urldecode($resArray["L_SEVERITYCODE0"]);
			
			echo "<br>SetExpressCheckout API call failed. ";
			echo "<br>Detailed Error Message: " . $ErrorLongMsg;
			echo "<br>Short Error Message: " . $ErrorShortMsg;
			echo "<br>Error Code: " . $ErrorCode;
			echo "<br>Error Severity Code: " . $ErrorSeverityCode;
		}
	}
	
	function review(){
		session_start();
		$data = array();
		$token = "";
		if (isset($_REQUEST['token']))
		{
			$token = $_REQUEST['token'];
		}
		
		if ( $token != "" )
		{
			$resArray = $this->paypal_lib->GetShippingDetails( $token );
			$ack = strtoupper($resArray["ACK"]);
			if( $ack == "SUCCESS" || $ack == "SUCESSWITHWARNING") 
			{
/*				$data['email'] 				= $resArray["EMAIL"]; // ' Email address of payer.
				$data['payerId'] 			= $resArray["PAYERID"]; // ' Unique PayPal customer account identification number.
				$data['payerStatus']		= $resArray["PAYERSTATUS"]; // ' Status of payer. Character length and limitations: 10 single-byte alphabetic characters.
				$data['salutation']			= $resArray["SALUTATION"]; // ' Payer's salutation.
				$data['firstName']			= $resArray["FIRSTNAME"]; // ' Payer's first name.
				$data['middleName']			= $resArray["MIDDLENAME"]; // ' Payer's middle name.
				$data['lastName']			= $resArray["LASTNAME"]; // ' Payer's last name.
				$data['suffix']				= $resArray["SUFFIX"]; // ' Payer's suffix.
				$data['cntryCode']			= $resArray["COUNTRYCODE"]; // ' Payer's country of residence in the form of ISO standard 3166 two-character country codes.
				$data['business']			= $resArray["BUSINESS"]; // ' Payer's business name.
				$data['shipToName']			= $resArray["SHIPTONAME"]; // ' Person's name associated with this address.
				$data['shipToStreet']		= $resArray["SHIPTOSTREET"]; // ' First street address.
				$data['shipToStreet2']		= $resArray["SHIPTOSTREET2"]; // ' Second street address.
				$data['shipToCity']			= $resArray["SHIPTOCITY"]; // ' Name of city.
				$data['shipToState']		= $resArray["SHIPTOSTATE"]; // ' State or province
				$data['shipToCntryCode']	= $resArray["SHIPTOCOUNTRYCODE"]; // ' Country code. 
				$data['shipToZip']			= $resArray["SHIPTOZIP"]; // ' U.S. Zip code or other country-specific postal code.
				$data['addressStatus'] 		= $resArray["ADDRESSSTATUS"]; // ' Status of street address on file with PayPal   
				$data['invoiceNumber']		= $resArray["INVNUM"]; // ' Your own invoice or tracking number, as set by you in the element of the same name in SetExpressCheckout request .
				$data['phonNumber']			= $resArray["PHONENUM"]; // ' Payer's contact telephone number. Note:  PayPal returns a contact telephone number only if your Merchant account profile settings require that the buyer enter one. 
*/
				echo '<pre>';
				print_r($resArray);
				echo '</pre>';
				$this->load->view('users/review');
		
			} 
			else  
			{
				//Display a user friendly Error on the page using any of the following error information returned by PayPal
				$ErrorCode = urldecode($resArray["L_ERRORCODE0"]);
				$ErrorShortMsg = urldecode($resArray["L_SHORTMESSAGE0"]);
				$ErrorLongMsg = urldecode($resArray["L_LONGMESSAGE0"]);
				$ErrorSeverityCode = urldecode($resArray["L_SEVERITYCODE0"]);
				
				echo "<br>GetExpressCheckoutDetails API call failed. ";
				echo "<br>Detailed Error Message: " . $ErrorLongMsg;
				echo "<br>Short Error Message: " . $ErrorShortMsg;
				echo "<br>Error Code: " . $ErrorCode;
				echo "<br>Error Severity Code: " . $ErrorSeverityCode;
			}
		}
	}
	
	function order_confirm(){
		session_start();
		$PaymentOption = "PayPal";
		if ( $PaymentOption == "PayPal" )
		{
			$finalPaymentAmount =  $_SESSION["Payment_Amount"];
			$resArray = $this->paypal_lib->ConfirmPayment($finalPaymentAmount );
			$ack = strtoupper($resArray["ACK"]);
			if( $ack == "SUCCESS" || $ack == "SUCCESSWITHWARNING" )
			{
				/*$transactionId		= $resArray["TRANSACTIONID"]; // ' Unique transaction ID of the payment. Note:  If the PaymentAction of the request was Authorization or Order, this value is your AuthorizationID for use with the Authorization & Capture APIs. 
				$transactionType 	= $resArray["TRANSACTIONTYPE"]; //' The type of transaction Possible values: l  cart l  express-checkout 
				$paymentType		= $resArray["PAYMENTTYPE"];  //' Indicates whether the payment is instant or delayed. Possible values: l  none l  echeck l  instant 
				$orderTime 			= $resArray["ORDERTIME"];  //' Time/date stamp of payment
				$amt				= $resArray["AMT"];  //' The final amount charged, including any shipping and taxes from your Merchant Profile.
				$currencyCode		= $resArray["CURRENCYCODE"];  //' A three-character currency code for one of the currencies listed in PayPay-Supported Transactional Currencies. Default: USD. 
				$feeAmt				= $resArray["FEEAMT"];  //' PayPal fee amount charged for the transaction
				$settleAmt			= $resArray["SETTLEAMT"];  //' Amount deposited in your PayPal account after a currency conversion.
				$taxAmt				= $resArray["TAXAMT"];  //' Tax charged on the transaction.
				$exchangeRate		= $resArray["EXCHANGERATE"];  //' Exchange rate if a currency conversion occurred. Relevant only if your are billing in their non-primary currency. If the customer chooses to pay with a currency other than the non-primary currency, the conversion occurs in the customer's account.
				$paymentStatus	= $resArray["PAYMENTSTATUS"]; 
				$pendingReason	= $resArray["PENDINGREASON"];  
				$reasonCode		= $resArray["REASONCODE"]; */
				echo '<pre>';
				print_r($resArray);
				echo '</pre>';				
				echo "Thank you for your payment.";
			}
			else  
			{
				//Display a user friendly Error on the page using any of the following error information returned by PayPal
				$ErrorCode = urldecode($resArray["L_ERRORCODE0"]);
				$ErrorShortMsg = urldecode($resArray["L_SHORTMESSAGE0"]);
				$ErrorLongMsg = urldecode($resArray["L_LONGMESSAGE0"]);
				$ErrorSeverityCode = urldecode($resArray["L_SEVERITYCODE0"]);
				
				echo "<br>GetExpressCheckoutDetails API call failed. ";
				echo "<br>Detailed Error Message: " . $ErrorLongMsg;
				echo "<br>Short Error Message: " . $ErrorShortMsg;
				echo "<br>Error Code: " . $ErrorCode;
				echo "<br>Error Severity Code: " . $ErrorSeverityCode;
			}
		}		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */