<?php

/**
 * Stripe Abstract Request.
 */
namespace Omnipay\TransactionExpress\Message;
use Omnipay\Common\Exception\InvalidResponseException;

abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
    /**
     * Live or Test Endpoint URL.
     *
     * @var string URL
     */
    protected $endpoint = 'https://cert.web.transaction.transactionexpress.com/TransFirst.Transaction.Web/api';

    abstract public function getEndpoint();
    
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

    public function getPassword()
    {
        return $this->getParameter('password');
    }

    public function setPassword($value)
    {
        return $this->setParameter('password', $value);
    }

    public function getSignature()
    {
        return $this->getParameter('signature');
    }

    public function setSignature($value)
    {
        return $this->setParameter('signature', $value);
    }

    public function getSubject()
    {
        return $this->getParameter('subject');
    }

    public function setSubject($value)
    {
        return $this->setParameter('subject', $value);
    }

    public function getSolutionType()
    {
        return $this->getParameter('solutionType');
    }

    public function setSolutionType($value)
    {
        return $this->setParameter('solutionType', $value);
    }

    public function getLandingPage()
    {
        return $this->getParameter('landingPage');
    }

    public function setLandingPage($value)
    {
        return $this->setParameter('landingPage', $value);
    }

    public function getHeaderImageUrl()
    {
        return $this->getParameter('headerImageUrl');
    }

    public function setHeaderImageUrl($value)
    {
        return $this->setParameter('headerImageUrl', $value);
    }

    public function getLogoImageUrl()
    {
        return $this->getParameter('logoImageUrl');
    }

    public function setLogoImageUrl($value)
    {
        return $this->setParameter('logoImageUrl', $value);
    }

    public function getBorderColor()
    {
        return $this->getParameter('borderColor');
    }

    public function setBorderColor($value)
    {
        return $this->setParameter('borderColor', $value);
    }

    public function getBrandName()
    {
        return $this->getParameter('brandName');
    }

    public function setBrandName($value)
    {
        return $this->setParameter('brandName', $value);
    }

    public function getNoShipping()
    {
        return $this->getParameter('noShipping');
    }

    public function setNoShipping($value)
    {
        return $this->setParameter('noShipping', $value);
    }

    public function getAllowNote()
    {
        return $this->getParameter('allowNote');
    }

    public function setAllowNote($value)
    {
        return $this->setParameter('allowNote', $value);
    }

    public function getAddressOverride()
    {
        return $this->getParameter('addressOverride');
    }

    public function setAddressOverride($value)
    {
        return $this->setParameter('addressOverride', $value);
    }

    public function getMaxAmount()
    {
        return $this->getParameter('maxAmount');
    }

    public function setMaxAmount($value)
    {
        return $this->setParameter('maxAmount', $value);
    }

    public function getTaxAmount()
    {
        return $this->getParameter('taxAmount');
    }

    public function setTaxAmount($value)
    {
        return $this->setParameter('taxAmount', $value);
    }

    public function getShippingAmount()
    {
        return $this->getParameter('shippingAmount');
    }

    public function setShippingAmount($value)
    {
        return $this->setParameter('shippingAmount', $value);
    }

    public function getHandlingAmount()
    {
        return $this->getParameter('handlingAmount');
    }

    public function setHandlingAmount($value)
    {
        return $this->setParameter('handlingAmount', $value);
    }

    public function getShippingDiscount()
    {
        return $this->getParameter('shippingDiscount');
    }

    public function setShippingDiscount($value)
    {
        return $this->setParameter('shippingDiscount', $value);
    }

    public function getInsuranceAmount()
    {
        return $this->getParameter('insuranceAmount');
    }

    public function setInsuranceAmount($value)
    {
        return $this->setParameter('insuranceAmount', $value);
    }

    public function getLocaleCode()
    {
        return $this->getParameter('localeCode');
    }

    /*
     * Used to change the locale of PayPal pages.
     * Accepts 2 or 5 character language codes as described here:
     * https://developer.paypal.com/docs/classic/express-checkout/integration-guide/ECCustomizing/
     *
     * If no value/invalid value is passed, the gateway will default it for you
    */
    public function setLocaleCode($value)
    {
        return $this->setParameter('localeCode', $value);
    }

    public function setCustomerServiceNumber($value)
    {
        return $this->setParameter('customerServiceNumber', $value);
    }

    public function getCustomerServiceNumber()
    {
        return $this->getParameter('customerServiceNumber');
    }

    public function setSellerPaypalAccountId($value)
    {
        return $this->setParameter('sellerPaypalAccountId', $value);
    }

    public function getSellerPaypalAccountId()
    {
        return $this->getParameter('sellerPaypalAccountId');
    }

    /**
     * The Button Source (BN Code) is for PayPal Partners taking payments for a 3rd party
     */
    public function setButtonSource($value)
    {
        return $this->setParameter('ButtonSource', $value);
    }

    public function getButtonSource()
    {
        return $this->getParameter('ButtonSource');
    }

    public function getHttpMethod()
    {
        return 'POST';
    }

    public function sendData($data)
    {   
        try 
        {
            $ch = curl_init($this->getEndpoint());
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data['data']) );
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                                                    'Content-Type: application/json',
                                                    'Content-Length: ' . strlen(json_encode($data['data'])))
                                                    );
            $result = curl_exec($ch);

            return $this->response = json_decode($result);
        } 
        catch (\Exception $e) 
        {
            throw new InvalidResponseException(
                'Error communicating with payment gateway: ' . $e->getMessage(),
                $e->getCode()
            );
        }
    }

    protected function createResponse($data, $statusCode)
    {
        return $this->response = new RestResponse($this, $data, $statusCode);
    }

    protected function getBaseData()
    {
        $data = array();    
        return $data;
    }
}
