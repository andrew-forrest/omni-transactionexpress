<?php

/**
 * Transaction Express Purchase Request.
 */
namespace Omnipay\TransactionExpress\Message;

class PurchaseRequest extends AuthorizeRequest
{
    public function getData()
    {	
	 	$data = parent::getData();
        return $data;
    }
}
