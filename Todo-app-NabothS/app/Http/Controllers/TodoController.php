<?php
namespace App\Http\Controllers;

use App\Http\Models\Category;
use App\Http\Models\Todo;

use App\Providers\View;
use Exception;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class TodoController {
    
    /**
     * Index Action
     * --> show all todo's
     */

    public static function index(Request $request, Response $response, $args) {
        $category = $request->getAttribute('category');
    
/*         $Category = new Category();
        $cats = $Category::getCategories(); */
        // get view

        

        try{
            $_SESSION['cat']  = $args['category'];
        }
        catch(Exception $e){
            $_SESSION['cat'] = 'default';
            header('location: /' . $_SESSION['cat']);      
        }
        

        $view = View::display('Home.php', [
            'category' => $category
        ]);

        // return view, via controller action
        $response->getBody()->write($view);
        return $response;
    }

    public static function createTodo(Request $request, Response $response, $args) {
        $Todo = new Todo();

        //dd($args);
        $Todo::createTodo($_POST['inputTask'], $_SESSION['cat']);
        //dd($_POST['inputTask']);
    }

    public static function editTodo(Request $request, Response $response, $args){
        $Todo = new Todo();

        $Todo::editTodo($_POST['todoid']);
    }

    public static function deleteTodo(Request $request, Response $response, $args){
        $Todo = new Todo();

        $Todo::deleteTodo($_POST['todoid']);
    }
}