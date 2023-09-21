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
Router::route('/admin/settings', function(){
    include 'src/admin/settings.php';
});

Router::route('/admin/settings/blog', function(){
    include 'src/admin/blog/index.php';
});

Router::route('/admin/settings/blog/insert', function(){
    include 'src/admin/blog/insert.php';
});

Router::route('/admin/settings/blog/delete', function(){
    include 'src/admin/blog/delete.php';
});

Router::route('/admin/settings/blog/update', function(){
    include 'src/admin/blog/update.php';
});

Router::route('/admin/settings/blog/update_submit', function(){
    include 'src/admin/blog/update_submit.php';
});

Router::execute($_SERVER['REQUEST_URI']);

