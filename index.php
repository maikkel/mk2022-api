<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once 'route/Route.php';
require_once 'config/Database.php';
require_once 'models/MenuItems.php';


$db = new Database();
$conn = $db->connect();

Route::get('/menu-items',function() {
    global $conn;
    $menuItems = new MenuItems($conn);

    return json_encode($menuItems->getAll());
});

Route::run('/');