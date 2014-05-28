<?php
use Silex\Provider\FormServiceProvider;

$app['debug'] = $config->debug;

$app->register(new Silex\Provider\TwigServiceProvider(), array(
	'twig.path' => __DIR__.'/views',
	'twig.options' => array(
		'strict_variables' => false,
		'cache' => $config->cache
	)
));

$app->register(new Silex\Provider\ValidatorServiceProvider());
$app->register(new Silex\Provider\SessionServiceProvider());
$app->register(new Silex\Provider\ServiceControllerServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider(), array(
    'translator.messages' => array(),
));

$app->register(new FormServiceProvider());

require PATH_SRC . '/routes.php';

return $app;
?>
