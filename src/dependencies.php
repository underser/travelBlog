<?php
// DIC configuration

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($container) {
    $settings = $container->get('settings')['renderer'];
    $renderer = new \Slim\Views\Twig($settings['template_path'], [
        'cache' => false //must be path to cache dir in production env
    ]);

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $renderer->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

    return $renderer;
};
//$container['view'] = function ($container) {
//    $settings = $container['container']->get('settings');
//    $view = new \Slim\Views\Twig($settings['template_path'], [
//        'cache' => false //must be path to cache dir in production env
//    ]);
//
//    // Instantiate and add Slim specific extension
//    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
//    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));
//
//    return $view;
//};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], Monolog\Logger::DEBUG));
    return $logger;
};
