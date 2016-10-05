<?php

namespace Omnipay\NetPay\Message;

use Omnipay\Common\Message\RequestInterface;

/**
 * NetPay API ProcessAcsResultResponse Response
 */
class ApiProcessAcsResultResponse extends Response
{
    public function __construct(RequestInterface $request, $data)
    {
        parent::__construct($request, $data);
    }
    
    public function getMessage()
    {
        if(isset($this->data->error)) {
            return $this->data->error->explanation;
        }
        return ((isset($this->data->result) && $this->data->result === 'SUCCESS' && isset($this->data->response->acquirer_message))?$this->data->response->acquirer_message:null);
    }
    
    public function getSummaryStatus() {
      return $this->data->ddd_secure->summary_status;
    }

}
