<?php
// file contain const
date_default_timezone_set('Asia/Ho_Chi_Minh');
// thiet lap hang so cho client
const _MODULE_DEFAULT = 'home';
const _ACTION_DEFAULT = 'lists';

// thiet lap hang so cho admin
const _MODULE_DEFAULT_ADMIN = 'dashboard';


const _INCODE = true;
// config host
define('_WEB_HOST_ROOT', 'http://' . $_SERVER['HTTP_HOST'] . '/php-learning/module6/radix');
define('_WEB_HOST_TEMPLATE', _WEB_HOST_ROOT . '/templates');
define('_WEB_HOST_ROOT_ADMIN', _WEB_HOST_ROOT.'/admin');
define('_WEB_HOST_ADMIN_TEMPLATE', _WEB_HOST_ROOT.'/templates/admin');

// confgi path
define('_WEB_PATH_ROOT', __DIR__);
define('_WEB_PATH_TEMPLATE', _WEB_PATH_ROOT . '/templates');
// database connect
const _HOST = 'localhost';
const _USER = 'root';
const _PASS = '';
const _DB = 'phponline_radix';
const _DRIVER = 'mysql';
// config perpage 
const _PER_PAGE = 10;
