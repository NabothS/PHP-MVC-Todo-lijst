<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Capsule\Manager as Capsule;


//use App\Http\Models\Todo
class Todo extends Model {

    public static function getAllTodos(){
        if($_SESSION['cat'] == 'default'){
            $todos = Capsule::table('tasks')->get();
            return $todos;
        }
        else {
            $todos = Capsule::table('tasks')->where('category_id', '=' , $_SESSION['cat'])->get();
            return $todos;
        }
    }

    public static function createTodo($title = '', $cat='') {
        $time = date("Y-m-d H:i:s");

        if($cat == 'default')$cat = null;
         Capsule::table('tasks')->insert([
            ['category_id' => 0, 'name'=>$title, 'created_at' => $time, 'updated_at' => $time, 'is_complete' => 0]
         ]);
         header('location: /' . $_SESSION['cat']);
         die();
    }

    public static function editTodo($id){
        $time = date("Y-m-d H:i:s");

        Capsule::table('tasks')->where('id' , '=' , $id)->update([
            'is_done' => 1, 'updatedAt' => $time
        ]);
        header('location: /' . $_SESSION['cat']);
         die();
    }
    public static function deleteTodo($id){
        Capsule::table('tasks')->where('id' , '=' , $id)->delete();
        header('location: /' . $_SESSION['cat']);
         die();
    }
}