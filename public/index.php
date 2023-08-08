<?php

use Util\RotasUtil;

include 'bootstrap.php';

try {
    phpinfo();
    //$RequestValidator = new \Validator\RequestValidator(RotasUtil::getRotas());
} catch (Exception $ex) {
    echo $ex->getMessage();
}