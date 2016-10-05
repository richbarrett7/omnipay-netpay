<?php

namespace Omnipay\NetPay\Message;

/**
 * NetPay API ProcessAcsResultRequest Request
 */
class ApiProcessAcsResultRequest extends AbstractRequest
{ 
    
    function setDddSecureId($dddSecureId) {
      $this->setParameter('dddSecureId',$dddSecureId);
    }
    
    function getDddSecureId() {
      $this->getParameter('dddSecureId');
    }
    
    function setPares($pares) {
      $this->setParameter('pares',$pares);
    }
    
    function getPares() {
      $this->getParameter('pares');
    }
            
    public function getData()
    {
        
        $this->setApiMethod('gateway/transaction');
        
        $data = $this->getBaseData();


        $data['merchant']['operation_type'] = 'PROCESS_ACS_RESULT';
        $data['transaction']['source'] = 'INTERNET';
        $data['ddd_secure_id'] = $this->getParameter('dddSecureId');
        $data['ddd_secure']['pares'] = $this->getParameter('pares');
                        
        return $data;
    }
    
    protected function createResponse($data)
    {
        return $this->response = new ApiProcessAcsResultResponse($this, $data);
    }
    
}