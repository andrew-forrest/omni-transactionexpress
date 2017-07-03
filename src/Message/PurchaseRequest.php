<?php

/**
 * Stripe Purchase Request.
 */
namespace Omnipay\Transactionexpress\Message;

class PurchaseRequest extends AuthorizeRequest
{
    public function getData()
    {	
	 	$data = parent::getData();
        return $data;
    }
}
