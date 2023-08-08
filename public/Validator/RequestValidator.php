<?php

namespace Validator;

use Util\ConstantesGenericasUtil;
use Util\JsonUtil;

class RequestValidator
{

    private $request;
    private $dadosRequest;

    const GET = 'GET';
    const DELETE = 'DELETE';
    const USUARIOS = 'USUARIOS';

    /**
     * RequestValidator constructor.
     * @param array $request
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * @return String
     */
    public function processarRequest()
    {
        $retorno = ConstantesGenericasUtil::MSG_ERRO_TIPO_ROTA;

        if (in_array($this->request['metodo'], ConstantesGenericasUtil::TIPO_REQUEST, true)) {
            $retorno = $this->direcionarRequest();
        }
        return $retorno;
    }

    private function direcionarRequest()
    {
        if ($this->request['metodo'] !== self::GET && $this->request['metodo'] !== self::DELETE) {
            $this->dadosRequest = JsonUtil::tratarCorpoRequisicaoJson();
            return $this->dadosRequest;
        } else {
            return 'Teste';
        }
        
    }
}