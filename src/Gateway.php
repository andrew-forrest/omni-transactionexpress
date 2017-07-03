<?php

namespace Omnipay\TransactionExpress;

use Omnipay\Common\AbstractGateway;

define('TXP_WSDL_URL_TEST', 'https://ws.cert.processnow.com/portal/merchantframework/MerchantWebServices-v1?wsdl');
define('TXP_WSDL_URL_LIVE', 'https://ws.processnow.com/portal/merchantframework/MerchantWebServices-v1?wsdl');

class Gateway extends AbstractGateway
{
    private $mercId;
    private $regKey;
    private $useTestMode;
    private $serviceUrl;

    public function getName()
    {
        return 'TransactionExpress';
    }

    public function setConfig($mercId, $regKey, $useTestMode = true)
    {
        $this->mercId      = $mercId;
        $this->regKey      = $regKey;
        $this->useTestMode = $useTestMode;

        if($this->useTestMode)
            $this->serviceUrl = TXP_WSDL_URL_TEST;
        else
            $this->serviceUrl = TXP_WSDL_URL_LIVE;
    }

    public function getDefaultParameters()
    {
        return array(
            'id'      =>'',
            'regKey'    =>'',
        );
    }

    public function getMerchantId()
    {
        return $this->getParameter('mercId');
    }

    public function setMerchantId($value)
    {
        return $this->setParameter('mercId', $value);
    }

    public function getRegistrationKey()
    {
        return $this->getParameter('regKey');
    }

    public function setRegistrationKey($value)
    {
        return $this->setParameter('regKey', $value);
    }

    public function getTestMode()
    {
        return $this->getParameter('useTestMode');
    }

    public function setTestMode($value)
    {
        return $this->setParameter('useTestMode', $value);
    }


    public function getQuery()
    {
        return $this->getParameter('query');
    }

    public function setQuery($value)
    {
        return $this->setParameter('query',$value);
    }

    public function authorize(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\TransactionExpress\Message\AuthorizeRequest', $parameters);
    }

    public function capture(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\TransactionExpress\Message\CaptureRequest', $parameters);
    }


    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\TransactionExpress\Message\PurchaseRequest', $parameters);
    }


    public function refund(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\TransactionExpress\Message\RefundRequest', $parameters);
    }


    public function void(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\TransactionExpress\Message\VoidRequest', $parameters);
    }


    public function fetchCharge(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\TransactionExpress\Message\FetchChargeRequest', $parameters);
    }


    public function fetchTransaction(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\TransactionExpress\Message\FetchTransactionRequest', $parameters);
    }


    public function fetchBalanceTransaction(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\TransactionExpress\Message\FetchBalanceTransactionRequest', $parameters);
    }


    public function createCard(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\TransactionExpress\Message\CreateCardRequest', $parameters);
    }


    public function updateCard(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\TransactionExpress\Message\UpdateCardRequest', $parameters);
    }


    public function deleteCard(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\TransactionExpress\Message\DeleteCardRequest', $parameters);
    }

    public function createCustomer(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\TransactionExpress\Message\CreateCustomerRequest', $parameters);
    }


    public function fetchCustomer(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\TransactionExpress\Message\FetchCustomerRequest', $parameters);
    }

    public function updateCustomer(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\TransactionExpress\Message\UpdateCustomerRequest', $parameters);
    }

    public function deleteCustomer(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\TransactionExpress\Message\DeleteCustomerRequest', $parameters);
    }


    public function fetchToken(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\TransactionExpress\Message\FetchTokenRequest', $parameters);
    }


    public function createPlan(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\TransactionExpress\Message\CreatePlanRequest', $parameters);
    }


    public function fetchPlan(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\TransactionExpress\Message\FetchPlanRequest', $parameters);
    }


    public function deletePlan(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\TransactionExpress\Message\DeletePlanRequest', $parameters);
    }


    public function listPlans(array $parameters = array())
    {
        return $this->createRequest('App\Lib\Omnipay\TransactionExpress\Message\ListPlansRequest', $parameters);
    }


    public function createSubscription(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\TransactionExpress\Message\CreateSubscriptionRequest', $parameters);
    }


    public function fetchSubscription(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\TransactionExpress\Message\FetchSubscriptionRequest', $parameters);
    }


    public function updateSubscription(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\TransactionExpress\Message\UpdateSubscriptionRequest', $parameters);
    }

    public function cancelSubscription(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\TransactionExpress\Message\CancelSubscriptionRequest', $parameters);
    }


    public function fetchEvent(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\TransactionExpress\Message\FetchEventRequest', $parameters);
    }

    public function fetchInvoiceLines(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\TransactionExpress\Message\FetchInvoiceLinesRequest', $parameters);
    }


    public function fetchInvoice(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\TransactionExpress\Message\FetchInvoiceRequest', $parameters);
    }


    public function listInvoices(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\TransactionExpress\Message\ListInvoicesRequest', $parameters);
    }


    public function createInvoiceItem(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\TransactionExpress\Message\CreateInvoiceItemRequest', $parameters);
    }


    public function fetchInvoiceItem(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\TransactionExpress\Message\FetchInvoiceItemRequest', $parameters);
    }

    public function deleteInvoiceItem(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\TransactionExpress\Message\DeleteInvoiceItemRequest', $parameters);
    }

}