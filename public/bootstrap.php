<?php

ini_set('default_charset', 'UTF-8');

ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ERROR);

/* CONSTANTES DO BANCO */
define('HOST', 'localhost');
define('BANCO', 'DB_NAME');
define('USUARIO', 'DB_USER');
define('SENHA', 'DB_PASS');

/* OUTRAS CONSTANTES */
define('DS', DIRECTORY_SEPARATOR);
define('DIR_APP', '/application/public');
define('DIR_PROJETO', 'api');

if (file_exists(DIR_APP.'/autoload.php')) {
    include 'autoload.php';
} else {
    die('Falha ao carregar autoload!');
}