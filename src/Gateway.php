<?php

namespace Omnipay\Transactionexpress;

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
        return 'Transactionexpress';
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
            'merc'      =>'',
            'regKey'    =>'',
            'hostedKey' => '5f5be27f-f29e-4190-864c-38ddefeefb66'
        );
    }

    public function getUsername()
    {
        return $this->getParameter('username');
    }

    public function setUsername($value)
    {
        return $this->setParameter('username', $value);
    }


    public function getQuery()
    {
        return $this->getParameter('query');
    }

    public function setQuery($value)
    {
        return $this->setParameter('query',$value);
    }

    public function getApiKey()
    {
        return $this->getParameter('apiKey');
    }

    public function setApiKey($value)
    {
        return $this->setParameter('apiKey', $value);
    }

    
    public function authorize(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Transactionexpress\Message\AuthorizeRequest', $parameters);
    }

    public function capture(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Transactionexpress\Message\CaptureRequest', $parameters);
    }

    
    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Transactionexpress\Message\PurchaseRequest', $parameters);
    }

   
    public function refund(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Transactionexpress\Message\RefundRequest', $parameters);
    }

    
    public function void(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Transactionexpress\Message\VoidRequest', $parameters);
    }

   
    public function fetchCharge(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Transactionexpress\Message\FetchChargeRequest', $parameters);
    }

   
    public function fetchTransaction(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Transactionexpress\Message\FetchTransactionRequest', $parameters);
    }

   
    public function fetchBalanceTransaction(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Transactionexpress\Message\FetchBalanceTransactionRequest', $parameters);
    }

   
    public function createCard(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Transactionexpress\Message\CreateCardRequest', $parameters);
    }

    
    public function updateCard(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Transactionexpress\Message\UpdateCardRequest', $parameters);
    }

    
    public function deleteCard(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Transactionexpress\Message\DeleteCardRequest', $parameters);
    }
    
    public function createCustomer(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Transactionexpress\Message\CreateCustomerRequest', $parameters);
    }


    public function fetchCustomer(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Transactionexpress\Message\FetchCustomerRequest', $parameters);
    }

    public function updateCustomer(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Transactionexpress\Message\UpdateCustomerRequest', $parameters);
    }

    public function deleteCustomer(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Transactionexpress\Message\DeleteCustomerRequest', $parameters);
    }

   
    public function fetchToken(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Transactionexpress\Message\FetchTokenRequest', $parameters);
    }

   
    public function createPlan(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Transactionexpress\Message\CreatePlanRequest', $parameters);
    }

  
    public function fetchPlan(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Transactionexpress\Message\FetchPlanRequest', $parameters);
    }

  
    public function deletePlan(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Transactionexpress\Message\DeletePlanRequest', $parameters);
    }

   
    public function listPlans(array $parameters = array())
    {
        return $this->createRequest('App\Lib\Omnipay\Transactionexpress\Message\ListPlansRequest', $parameters);
    }

   
    public function createSubscription(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Transactionexpress\Message\CreateSubscriptionRequest', $parameters);
    }

   
    public function fetchSubscription(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Transactionexpress\Message\FetchSubscriptionRequest', $parameters);
    }

    
    public function updateSubscription(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Transactionexpress\Message\UpdateSubscriptionRequest', $parameters);
    }

    public function cancelSubscription(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Transactionexpress\Message\CancelSubscriptionRequest', $parameters);
    }

  

    
    public function fetchEvent(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Transactionexpress\Message\FetchEventRequest', $parameters);
    }

    public function fetchInvoiceLines(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Transactionexpress\Message\FetchInvoiceLinesRequest', $parameters);
    }

  
    public function fetchInvoice(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Transactionexpress\Message\FetchInvoiceRequest', $parameters);
    }

   
    public function listInvoices(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Transactionexpress\Message\ListInvoicesRequest', $parameters);
    }

   
    public function createInvoiceItem(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Transactionexpress\Message\CreateInvoiceItemRequest', $parameters);
    }

   
    public function fetchInvoiceItem(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Transactionexpress\Message\FetchInvoiceItemRequest', $parameters);
    }

    public function deleteInvoiceItem(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Transactionexpress\Message\DeleteInvoiceItemRequest', $parameters);
    }

}
