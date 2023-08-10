<?php

use Util\ConstantesGenericasUtil;
use Util\RotasUtil;
use Validator\RequestValidator;

include ('/application/public/bootstrap.php');

try {
    $RequestValidator = new RequestValidator(RotasUtil::getRotas());
    $retorno = $RequestValidator->processarRequest();
} catch (Exception $ex) {
    
    header('Content-Type: application/json; charset=utf-8');

    echo json_encode([
        ConstantesGenericasUtil::TIPO => ConstantesGenericasUtil::TIPO_ERRO,
        ConstantesGenericasUtil::RESPOSTA => $ex->getMessage()
    ]);
}