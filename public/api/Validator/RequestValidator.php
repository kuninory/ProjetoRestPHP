<?php

namespace Validator;

use InvalidArgumentException;
use Repository\TokensAutorizadosRepository;
use Service\UsuariosService;
use Util\ConstantesGenericasUtil;
use Util\JsonUtil;

class RequestValidator
{

    private array $request;
    private array $dadosRequest;
    private object $TokensAutorizadosRepository;

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
        $this->TokensAutorizadosRepository = new TokensAutorizadosRepository();
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
        }
        
        $this->TokensAutorizadosRepository->validarToken(getallheaders()['Authorization']);

        $metodo = $this->request['metodo'];
        return $this->$metodo(); //Isto é uma execução de uma Variable functions.
    }

    /**
     * Metodo para tratar os GETS
     * @return array|mixed|string
     */
    private function get()
    {
        $retorno = ConstantesGenericasUtil::MSG_ERRO_TIPO_ROTA;

        if (in_array($this->request['rota'], ConstantesGenericasUtil::TIPO_GET, true)) {
            
            switch ($this->request['rota']) {
                case self::USUARIOS:
                    $UsuariosService = new UsuariosService($this->request);
                    $retorno = $UsuariosService->validarGet();
                    break;
                default:
                    throw new InvalidArgumentException(ConstantesGenericasUtil::MSG_ERRO_RECURSO_INEXISTENTE);
            }
        }
        return $retorno;
    }
}