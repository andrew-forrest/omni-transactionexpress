<?php

/**
 * Stripe List Plans Request.
 */
namespace App\Lib\Omnipay\TransactionExpress\Message;

// use Omnipay\Common\Message\AbstractRequest;

/**
 * Stripe List Plans Request.
 *
 * @see Omnipay\Stripe\Gateway
 * @link https://stripe.com/docs/api/curl#list_plans
 */
class ListPlansRequest extends \Omnipay\TransactionExpress\Message\AbstractRequest
{
    public function getData()
    {
        $data = array();

        return $data;
    }

    public function getEndpoint()
    {
        return $this->endpoint.'/plans';
    }

    public function getHttpMethod()
    {
        return 'GET';
    }
}
