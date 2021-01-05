<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Paypal_model extends MY_Model {
	protected $tableName = 'payments';
	protected $table = array(
        'txn_id' =>  array(
            'isIndex'   => true,
            'nullable'  => true,
            'type'      => 'string'
        ),
		'PaymentMethod' =>  array(
            'isIndex'   => true,
            'nullable'  => true,
            'type'      => 'string'
        ),
        'paymentID' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'string'
        ),
        'PayerStatus' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'string'
        ),
        'PayerMail' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'string'
        ),
		'Total' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'integer'
        ),
		'SubTotal' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'integer'
        ),
        'Tax' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'integer'
        ),
        'Payment_state' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'string'
        ),
		 'CreateTime' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'string'
        ),
        'UpdateTime' => array(
            'isIndex'   => false,
            'nullable'  => false,
            'type'      => 'string'
        ),
	);

	function __construct() {
		parent::__construct();
		$this->checkTableDefine();
	}

	/* This function create new Service. */

	public function createRecord($PaymentID,$Total,$SubTotal,$Tax,$PaymentMethod,$PayerStatus,$PayerMail,$saleId,$CreateTime,$UpdateTime,$State) {
        $this->db->set('txn_id',$saleId);
        $this->db->set('PaymentID',$PaymentID);
        $this->db->set('PaymentMethod',$PaymentMethod);
        $this->db->set('PayerStatus',$PayerStatus);
        $this->db->set('PayerMail',$PayerMail);
        $this->db->set('Total',$Total);
        $this->db->set('SubTotal',$SubTotal);
        $this->db->set('Tax',$Tax);
        $this->db->set('Payment_state',$State);
		$this->db->set('CreateTime',$CreateTime);
		$this->db->set('UpdateTime',$UpdateTime);
		$this->db->insert('payments');
		$id = $this->db->insert_id();
		return $id;
	}

}