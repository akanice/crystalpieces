<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'libraries/paypal-php-sdk/paypal/rest-api-sdk-php/sample/bootstrap.php'); // require paypal files


use PayPal\Api\ItemList;
use PayPal\Api\Payment;
use PayPal\Api\Capture;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Amount;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RefundRequest;
use PayPal\Api\Sale;

class Paypal extends MY_Controller
{
    public $_api_context;

    function  __construct()    {
        parent::__construct();
        $this->load->model('paypal_model', 'paypal');
        $this->load->model('ordersmodel');
		$this->load->model('orderdetailsmodel');
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
        $item1["name"] = $this->input->post('item_name');
        $item1["sku"] = $this->input->post('item_number');  // Similar to `item_number` in Classic API
        $item1["description"] = $this->input->post('item_description');
        $item1["currency"] ="USD";
        $item1["quantity"] =1;
        $item1["price"] = $this->input->post('item_price');

        $itemList = new ItemList();
        $itemList->setItems(array($item1));
		
		// Set shipping address
		$shipping_address['recipient_name'] = 'Beckham';
		$shipping_address['city'] = 'Ha Noi';
		$shipping_address['state'] = '';
		$shipping_address['postal_code'] = '100000';
		$shipping_address['country_code'] = 'VN';
		$shipping_address['line1'] = @$this->input->post('item_address');
        $itemList->setShippingAddress(@$shipping_address);
		
// ### Additional payment details
// Use this optional field to set additional
// payment information such as tax, shipping
// charges etc.
		$details['tax'] = $this->input->post('details_tax');
        $details['subtotal'] = $this->input->post('details_subtotal');
// ### Amount
// Lets you specify a payment amount.
// You can also specify additional details
// such as shipping, tax.
        $amount['currency'] = "USD";
        $amount['total'] = $details['tax'] + $details['subtotal'];
        $amount['details'] = $details;
// ### Transaction
// A transaction defines the contract of a
// payment - what is the payment for and who
// is fulfilling it.
        $transaction['description'] ='Payment description';
        $transaction['amount'] = $amount;
        $transaction['invoice_number'] = uniqid();
        $transaction['item_list'] = $itemList;
        // ### Redirect urls
		
// Set the urls that the buyer must be redirected to after
// payment approval/ cancellation.
        $baseUrl = base_url();
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($baseUrl."paypal/getPaymentStatus")
            ->setCancelUrl($baseUrl."paypal/getPaymentStatus");

// ### Payment
// A Payment Resource; create one using
// the above types and intent set to sale 'sale'
        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));
		
        try {
            $payment->create($this->_api_context);
        } catch (Exception $ex) {
            // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
            ResultPrinter::printError("Created Payment Using PayPal. Please visit the URL to Approve.", "Payment", null, $ex);
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
		// print_r($data);die();
		$order_id = $this->ordersmodel->create($data);
		$data1 = array(
			'order_id' => $order_id, 
			'product_id' => $this->input->post('item_number'),
			'quantity' => $this->input->post('details_subtotal'),
			'total' => $details['subtotal'],
		);
		$this->orderdetailsmodel->create($data1);
		
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
            redirect('paypal/index');
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
            $this->paypal->create($payment_id,$Total,$Subtotal,$Tax,$PaymentMethod,$PayerStatus,$PayerMail,$saleId,$CreateTime,$UpdateTime,$State);
			
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
        $this->data['temp'] = 'frontend/cart/cancel';
		$this->load->view('frontend/index', $this->data);
    }

    function load_refund_form(){
        $this->load->view('content/Refund_payment_form');
    }

    function refund_payment(){
        $refund_amount = $this->input->post('refund_amount');
        $saleId = $this->input->post('sale_id');
        $paymentValue =  (string) round($refund_amount,2); ;

// ### Refund amount
// Includes both the refunded amount (to Payer)
// and refunded fee (to Payee). Use the $amt->details
// field to mention fees refund details.
        $amt = new Amount();
        $amt->setCurrency('USD')
            ->setTotal($paymentValue);

// ### Refund object
        $refundRequest = new RefundRequest();
        $refundRequest->setAmount($amt);

// ###Sale
// A sale transaction.
// Create a Sale object with the
// given sale transaction id.
        $sale = new Sale();
        $sale->setId($saleId);
        try {
            // Refund the sale
            // (See bootstrap.php for more on `ApiContext`)
            $refundedSale = $sale->refundSale($refundRequest, $this->_api_context);
        } catch (Exception $ex) {
            // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
            ResultPrinter::printError("Refund Sale", "Sale", null, $refundRequest, $ex);
            exit(1);
        }

// NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
        ResultPrinter::printResult("Refund Sale", "Sale", $refundedSale->getId(), $refundRequest, $refundedSale);

        return $refundedSale;
    }
}