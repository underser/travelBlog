<?php
// Routes
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

//$app->get('/[{name}]', function ($request, $response, $args) {
//    // Sample log message
//    $this->logger->info("Slim-Skeleton '/' route");
//
//    // Render index view
//    return $this->renderer->render($response, 'index.phtml', $args);
//});

$app->get('/', function(Request $req, Response $res, $args) {
    $this->logger->info("It's home route!");
    return $this->renderer->render($res, 'home.twig', [
        'global' => [
            'site_name' => 'RELOLVER LAB'
        ],
        'page_title' => 'HOME'
    ]);
});

$app->get('/article/[{id}]', function(Request $req, Response $res, $args) {
    $articleId = $req->getAttribute('id');

    if ($articleId) {
        return $this->renderer->render($res, 'post.twig', [
            'global' => [
                'site_name' => 'RELOLVER LAB',
                'header_mod' => 1
            ],
            'page_title' => 'HOME'
        ]);
    }

    return $this->renderer->render($res, '404.twig', [
        'global' => [
            'site_name' => 'RELOLVER LAB',
            'header_mod' => 1
        ],
        'page_title' => '404',
        'message' => [
            'title' => 'Упсі',
            'message_text' => 'шото пішло не так, ми не можемо знайти статтю, але робити з цим ми нічого не будемо',
            'image' => [
                'url' => '/img/cat-mi.jpg',
                'alt' => 'мі-мі-шна котейка'
            ]
        ]
    ]);
});