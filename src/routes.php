<?php
// Routes

//$app->get('/[{name}]', function ($request, $response, $args) {
//    // Sample log message
//    $this->logger->info("Slim-Skeleton '/' route");
//
//    // Render index view
//    return $this->renderer->render($response, 'index.phtml', $args);
//});

$app->get('/', function($req, $res, $args) {
    $this->logger->info("It's home route!");
    return $this->renderer->render($res, 'home.twig', [
        'name' => 'Roman Sliusar'
    ]);
});
