<?php
namespace Quwi\framework;

class ResponseHandler implements ResponseHandler_Interface{

    protected $body = [];

    public function __construct (ResponseHeader $head, ResponseState $state, ResponseLogger $log){
        $this->body['header'] = $head;
        $this->body['state'] = $state;
        $this->body['log'] = $log;
    }


   
    public function giveHeader() : ResponseHeader{
        return clone $this->body['header'];
    }

    public function giveState(): ResponseState {
        return clone $this->body['state'];
    }

    public function giveLogger(): ResponseLogger {
        return clone $this->body['log'];
    }
}