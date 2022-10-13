<?php

namespace App\Seeders;

use App\Http\Models\Category;
use Faker\Factory as Faker;

class CategorySeeder {
    private static $amountOfRecords = 10;

    public function seed() {
        $categories = [];
       for ($i = 0; $i<self::$amountOfRecords; $i++){
            $randomCategory = self::generate();

            //nieuwe entiteit instantieren
            $categoryEntity = new Category();
            //beginnen entiteit vullen
            $categoryEntity->name = $randomCategory;
            //vormen tot een url friendly slug
            $categoryEntity->slug = self::slugify($randomCategory);
            $categoryEntity->save();
       }
       dd($categories);
    }
    private function generate() {
        $faker = Faker::create();
        return $faker->words(2,true);
    }


    private static function slugify($text, string $divider = '-')
    {
        // replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, $divider);

        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
}