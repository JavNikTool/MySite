<?php

use core\Router;

require_once 'core/Router.php';


Router::route('/', function(){
    include 'src/main/main.php';
});

Router::route('/about', function(){
    include 'src/about/index.php';
});

Router::route('/blog', function(){
    include 'src/blog/index.php';
});

Router::route('/contacts', function(){
    include 'src/contacts/index.php';
});

Router::route('/admin', function(){
    include 'src/admin/index.php';
});
Router::route('/admin/start', function(){
    include 'src/admin/start.php';
});

Router::route('/admin/insert', function(){
    include 'src/admin/insert.php';
});

Router::execute($_SERVER['REQUEST_URI']);

