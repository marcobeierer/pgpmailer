<?php
define('PATH_ROOT', dirname( __DIR__ ));
define('PATH_CACHE', PATH_ROOT . '/cache');
define('PATH_PUBLIC', PATH_ROOT . '/public');
define('PATH_SRC', PATH_ROOT . '/src');
define('PATH_VENDOR', PATH_ROOT . '/vendor');
define('PATH_GPG', PATH_ROOT . '/gpg');
define('PATH_VIEWS', PATH_SRC . '/views');

require_once PATH_VENDOR . '/autoload.php';

$app = new Silex\Application();

require PATH_SRC . '/config.php';
require PATH_SRC . '/app.php';

// set base url
$protocol = 'http';
if (isset($_SERVER['HTTPS'])) {
	$protocol = 'https';
}
$config->baseURL = sprintf('%s://%s%s', $protocol, $_SERVER['HTTP_HOST'], $_SERVER['REQUEST_URI']);

$app->run();
?>
