<?php

use Util\RotasUtil;

include ('/application/public/bootstrap.php');

try {
    $RequestValidator = new \Validator\RequestValidator(RotasUtil::getRotas());
    $retorno = $RequestValidator->processarRequest();
} catch (Exception $ex) {
    echo $ex->getMessage();
}