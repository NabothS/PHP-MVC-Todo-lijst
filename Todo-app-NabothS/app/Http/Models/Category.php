<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Capsule\Manager as Capsule;

//use App\Http\Models\Category
class Category extends Model {

    public static function getCategories() {
        $categories = Capsule::table('categories')->get();
        return $categories;
    }

}