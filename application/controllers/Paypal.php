<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'libraries/paypal-php-sdk/paypal/rest-api-sdk-php/sample/bootstrap.php'); // require paypal files


use PayPal\Api\ItemList;
use PayPal\Api\Payment;
use PayPal\Api\Capture;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Amount;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RefundRequest;
use PayPal\Api\DetailedRefund;
use PayPal\Api\Sale;

class Paypal extends MY_Controller
{
    public $_api_context;

    function  __construct()    {
        parent::__construct();
        $this->load->model('paypal_model', 'paypal');
        $this->load->model('ordersmodel');
		$this->load->model('orderdetailsmodel');
		$this->load->model('productsmodel');
		// paypal credentials
        $this->config->load('paypal');

        $this->_api_context = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                $this->config->item('client_id'), $this->config->item('secret')
            )
        );
    }

    function index(){
        $this->load->view('content/payment_credit_form');
    }


    function create_payment_with_paypal() {

        // setup PayPal api context
        $this->_api_context->setConfig($this->config->item('settings'));


// ### Payer
// A resource representing a Payer that funds a payment
// For direct credit card payments, set payment method
// to 'credit_card' and add an array of funding instruments.

        $payer['payment_method'] = 'paypal';

// ### Itemized information
// (Optional) Lets you specify item wise
// information
		$array_item = $this->input->post('item');
		foreach ($array_item as $k=>$v) {
			// Get price from DB
			$product_data = $this->productsmodel->read(array('id'=>$v['number']),array(),true);
			
			$item[$k]["name"] = $product_data->title;
			$item[$k]["sku"] = $v['number']; // Same Product ID
			$item[$k]["description"] = $product_data->description;
			$item[$k]["currency"] ="USD";
			$item[$k]["quantity"] = strval($v['qty']);
			$item[$k]["price"] = $product_data->price;
		}
        $itemList = new ItemList();
        $itemList->setItems($item);

		// Set shipping address
		$shipping_address['recipient_name'] = $this->input->post('item_name');
		$shipping_address['city'] = $this->input->post('ship_city');
		$shipping_address['state'] = @$this->input->post('ship_state');
		$shipping_address['postal_code'] = @$this->input->post('ship_postal_code');
		$shipping_address['country_code'] = $this->input->post('ship_billing_country');
		$shipping_address['line1'] = @$this->input->post('item_address');
        $itemList->setShippingAddress(@$shipping_address);
		
		// ### Additional payment details
		$details['tax'] = $this->input->post('details_tax');
        $details['subtotal'] = $this->input->post('details_subtotal');
		
		// ### Amount
        $amount['currency'] = "USD";
        $amount['total'] = $details['tax'] + $details['subtotal'];
        $amount['details'] = $details;
		
		// ### Transaction
        $transaction['description'] ='Payment description';
        $transaction['amount'] = $amount;
        $transaction['invoice_number'] = uniqid();
        $transaction['item_list'] = $itemList;
        // ### Redirect urls
		
		// Set the urls that the buyer must be redirected to after payment approval/ cancellation.
        $baseUrl = base_url();
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($baseUrl."paypal/getPaymentStatus")
            ->setCancelUrl($baseUrl."paypal/getPaymentStatus");

		// ### Payment
        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));
		
        try {
            $payment->create($this->_api_context);
        } catch (Exception $ex) {
			$this->session->set_flashdata('notif_msg','Unknown error occurred. Please re-check your information.');
            redirect(base_url('cart'));
			exit(1);
        }
        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
		
		$paymentID = $payment->getID();
		// Save Order Information to Database
		
		$data = array(
			'status' => 'pending',
			'name' =>$this->input->post('f_name'), 
			'phone' =>$this->input->post('f_phone'), 
			'email' =>$this->input->post('f_email'), 
			'address' =>$this->input->post('item_address'), 
			'signature' => '',
			'note' => $this->input->post('f_note'),
			'total_price' => $this->input->post('details_subtotal'),
			'type' => 'product',
			'code' => $paymentID,
			'payment' => $this->input->post('payment_type'),
			'create_time' => time(),
		);
		
		$order_id = $this->ordersmodel->create($data);
		foreach ($array_item as $v) {
			$data1 = array(
				'order_id' => $order_id, 
				'product_id' => $v['number'],
				'quantity' =>$v['qty'],
				'total' => $details['subtotal'],
			);
			$this->orderdetailsmodel->create($data1);
		}
		
		// Destroy cart
		$this->cart->destroy();
		
        if(isset($redirect_url)) {
            /** redirect to paypal **/
            redirect($redirect_url);
        }

        $this->session->set_flashdata('success_msg','Unknown error occurred');
        redirect('paypal/index');

    }


    public function getPaymentStatus() {

        // paypal credentials
		
        /** Get the payment ID before session clear **/
        $payment_id = $this->input->get("paymentId") ;
        $PayerID = $this->input->get("PayerID") ;
        $token = $this->input->get("token") ;
        /** clear the session payment ID **/

        if (empty($PayerID) || empty($token)) {
            $this->session->set_flashdata('success_msg','Payment failed');
            redirect('paypal/cancel');
        }

        $payment = Payment::get($payment_id,$this->_api_context);


        /** PaymentExecution object includes information necessary **/
        /** to execute a PayPal account payment. **/
        /** The payer_id is added to the request query parameters **/
        /** when the user is redirected from paypal back to your site **/
        $execution = new PaymentExecution();
        $execution->setPayerId($this->input->get('PayerID'));

        /**Execute the payment **/
        $result = $payment->execute($execution,$this->_api_context);



        //  DEBUG RESULT, remove it later **/
        if ($result->getState() == 'approved') {
            $trans = $result->getTransactions();

            // item info
            $Subtotal = $trans[0]->getAmount()->getDetails()->getSubtotal();
            $Tax = $trans[0]->getAmount()->getDetails()->getTax();

            $payer = $result->getPayer();
            // payer info //
            $PaymentMethod =$payer->getPaymentMethod();
            $PayerStatus =$payer->getStatus();
            $PayerMail =$payer->getPayerInfo()->getEmail();

            $relatedResources = $trans[0]->getRelatedResources();
            $sale = $relatedResources[0]->getSale();
            // sale info //
            $saleId = $sale->getId();
            $CreateTime = $sale->getCreateTime();
            $UpdateTime = $sale->getUpdateTime();
            $State = $sale->getState();
            $Total = $sale->getAmount()->getTotal();
            /** it's all right **/
            /** Here Write your database logic like that insert record or value in database if you want **/
            $this->paypal->createRecord($payment_id,$Total,$Subtotal,$Tax,$PaymentMethod,$PayerStatus,$PayerMail,$saleId,$CreateTime,$UpdateTime,$State);

			$this->db->where('paymentID', $payment_id);
			$this->db->update('payments', array('payerstatus'=>'VERIFIED'));
			
            $this->session->set_flashdata('success_msg','Payment success');
            $this->session->set_flashdata('payment_id',$payment_id);
            redirect('paypal/success');
        }
        $this->session->set_flashdata('success_msg','Payment failed');
        redirect('paypal/cancel');
    }
    function success(){
		$this->data['paymentID'] = @$this->session->flashdata('payment_id'); 
		
		$this->data['title'] = 'Payment successfully';
        $this->data['temp'] = 'frontend/cart/success';
		$this->load->view('frontend/index', $this->data);
    }
    function cancel(){
		
		$this->data['title'] = 'Payment cancelled';
        $this->data['temp'] = 'frontend/cart/cancel';
		$this->load->view('frontend/index', $this->data);
    }

    function load_refund_form(){
        $this->load->view('content/Refund_payment_form');
    }

    function refund_payment(){
        $refund_amount 	= $this->input->post('refund_amount');
        $paymentValue	= (string) round($refund_amount,2); ;
        $redirect_url 			= $this->input->get("redirect_url") ;
        $saleId 					= $this->input->post('sale_id');

        $amt = new Amount();
        $amt->setCurrency('USD')
            ->setTotal($paymentValue);

        $refundRequest = new RefundRequest();
        $refundRequest->setAmount($amt);

        $sale = new Sale();
        $sale->setId($saleId);
        try {
            // Refund the sale
            $refundedSale = $sale->refundSale($refundRequest, $this->_api_context);
        } catch (Exception $ex) {
            //ResultPrinter::printError("Refund Sale", "Sale", null, $refundRequest, $ex);
            exit(1);
        }
        // ResultPrinter::printResult("Refund Sale", "Sale", $refundedSale->getId(), $refundRequest, $refundedSale);
		$this->testFunction($refundedSale);
		die();
		
        redirect($redirect_url);
    }
	
	public function testFunction($refundedSale) {
		$n1 = $refundedSale->getRefundFromTransactionFee();
		$n2 = $refundedSale->getRefundFromReceivedAmount();
		$n3 = $refundedSale->getTotalRefundedAmount();
		print_r($n1->value);
		print_r($n2->value);
		print_r($n3->value);
	}

}