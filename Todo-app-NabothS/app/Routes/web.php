<?php
use App\Http\Controllers\TodoController;
use App\Seeders\CategorySeeder;
use Slim\Factory\AppFactory;

// slim app factory creation, for eeezeee routing
$app = AppFactory::create();



// user detail route, with id wildcard
$app->get('/[{category}]', TodoController::class . ":index");

$app->post('/create', TodoController::class . ":createTodo");

$app->post('/edit', TodoController::class . ":editTodo");

$app->post('/delete', TodoController::class . ":deleteTodo");

// seeding routes
 $app->get('/seed/categories', CategorySeeder::class . ':seed');



// beam me up, scotty
$app->run();