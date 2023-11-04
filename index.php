<?php

ini_set('display_errors', E_ALL);

require_once 'vendor/autoload.php';

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->get('/', '/src/main/main.php');
    $r->get('/about', '/src/about/index.php');
    $r->get('/contacts', '/src/contacts/index.php');

    $r->addGroup('/blog', function (\FastRoute\RouteCollector $r) {
        $r->get('', '/src/blog/index.php');
        $r->get('/element/{id:\d+}', '/src/blog/element.php');
        $r->get('/element_delete', '/src/blog/element_delete.php');
        $r->post('/element_handler', '/src/blog/element_handler.php');
    });

    $r->addGroup('/admin', function (\FastRoute\RouteCollector $r) {
        $r->get('', '/src/admin/index.php');
        $r->post('/admin_handler', '/src/admin/admin_handler.php');
        $r->get('/settings', '/src/admin/settings.php');
        $r->get('/blog', '/src/admin/blog/index.php');
        $r->post('/insert/test', '/test.php');

        $r->addRoute([ 'GET' , 'POST' ], '/insert', '/src/admin/blog/insert.php');
        $r->addRoute([ 'GET' , 'POST' ], '/delete', '/src/admin/blog/delete.php');
        $r->addRoute([ 'GET' , 'POST' ], '/update', '/src/admin/blog/update.php');
        $r->addRoute([ 'GET' , 'POST' ], '/update_submit', '/src/admin/blog/update_submit.php');
    });
});


// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        include '404.php';
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        // ... call $handler with $vars
        require __DIR__ . $handler;
        break;
}


