<?php

namespace Omnipay\NetPay\Message;

/**
 * NetPay API Check3dsEnrollment Request
 */
class ApiCheck3dsEnrollmentRequest extends ApiPurchaseRequest
{ 
    
    function setDddSecureId($dddSecureId) {
      $this->setParameter('dddSecureId',$dddSecureId);
    }
    
    function getDddSecureId() {
      $this->getParameter('dddSecureId');
    }
    
    function setDddSecureResponseUrl($in) {
      $this->setParameter('dddSecureResponseUrl',$in);
    }
    
    function getDddSecureResponseUrl() {
      $this->getParameter('dddSecureResponseUrl');
    }
        
    public function getData()
    {
      
        $data = parent::getData();

        $data['merchant']['operation_type'] = 'CHECK_3DS_ENROLLMENT';
        
        $data['ddd_secure_id'] = $this->getParameter('dddSecureId');
        $data['ddd_secure_redirect']['page_generation_mode'] = 'SIMPLE';
        $data['ddd_secure_redirect']['response_url'] = $this->getParameter('dddSecureResponseUrl');
        $data['ddd_secure_redirect']['goods_description'] = $data['transaction']['description'];
        unset($data['transaction']['transaction_id']);
        unset($data['transaction']['description']);
        unset($data['payment_source']['card']['security_code']);
        unset($data['payment_source']['card']['holder']);
        unset($data['shipping']);
        unset($data['customer']);

        return $data;
    }
    
    protected function createResponse($data)
    {
        return $this->response = new ApiCheck3dsEnrollmentResponse($this, $data);
    }
    
}