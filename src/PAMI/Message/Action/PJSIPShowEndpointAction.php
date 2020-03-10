<?php
namespace PAMI\Message\Action;

class PJSIPShowEndpointAction extends ActionMessage
{
    /**
     * @param string $endpoint
     */
    public function __construct($endpoint)
    {
        parent::__construct('PJSIPShowEndpoint');
        $this->setKey('Endpoint', $endpoint);
    }
}
