<?php

/**
 * Transaction Express Authorize Request.
 */
namespace Omnipay\Transactionexpress\Message;

class AuthorizeRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate('amount');

        $data = $this->getBaseData();
        $data['data'] = $this->getQuery();
        return $data;
    }

    public function getEndpoint()
    {
        return $this->endpoint.'/SendTran';
    }
}
