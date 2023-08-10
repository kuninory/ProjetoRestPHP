<?php

ini_set('default_charset', 'UTF-8');

ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ERROR);

/* CONSTANTES DO BANCO */
define('HOST', 'mysql');
define('BANCO', 'DB_NAME');
define('USUARIO', 'DB_USER');
define('SENHA', 'DB_PASS');

/* OUTRAS CONSTANTES */
define('DS', DIRECTORY_SEPARATOR);
define('DIR_APP', __DIR__);
define('DIR_PROJETO', 'api');

if (getcwd() == '/application/public/api') {
    if (file_exists(DIR_APP.DS.DIR_PROJETO.'/autoloadApi.php')) {
        include 'autoloadApi.php';
    } else {
        die('Falha ao carregar autoload!');
    }
}